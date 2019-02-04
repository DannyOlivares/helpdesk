<?php

/*
 * This file is part of the Ocrend Framewok 2 package.
 *
 * (c) Ocrend Software <info@ocrend.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\models;

use app\models as Model;
use Ocrend\Kernel\Models\Models;
use Ocrend\Kernel\Models\IModels;
use Ocrend\Kernel\Models\ModelsException;
use Ocrend\Kernel\Models\Traits\DBModel;
use Ocrend\Kernel\Router\IRouter;
use Ocrend\Kernel\Helpers\Strings;
use Ocrend\Kernel\Helpers\Emails;
use Ocrend\Kernel\Helpers\Files;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Reader_Excel2007;
use PHPExcel_Style_NumberFormat;
/**
 * Modelo Avar
 *
 * @author Jorge Jara H. <jjara@wys.cl>
 */

class Mdlreagendamiento extends Models implements IModels {

    // Contenido del modelo...
    use DBModel;
    protected $user = array();

    /**
      * Devuelve un arreglo para la api
      *
      * @return array
    */
    public function cargarorden(){
      global $http;

      $file = $http->files->get('excel');
      $datusu=$this->user;
      $datousuario=$datusu['id_user'];
      $this->db->query_select("truncate tblreagendamiento_temporal");

      $docname="";
      if (null !== $file ){
          $ext_doc = $file->getClientOriginalExtension();

          if ($ext_doc<>'xls' and $ext_doc<>'xlsx') return array('success' => 0, 'message' => "Debe seleccionar un archivo valido...");

          $docname = 'ordenes.'.$ext_doc;

          $file->move(API_INTERFACE . 'views/app/temp/', $docname);

          $archivo = API_INTERFACE . 'views/app/temp/'. $docname;
          //carga del excelname
          $objReader = new PHPExcel_Reader_Excel2007();
          $objPHPExcel = $objReader->load($archivo);

          $i=2;
          $param=0;
          $celdablanco = 0;
          $this->db->query_select('truncate tblreagendamiento_temporal');

          $count=0;$max_insert=50;$sql_value="";
          $sql_insert="Insert into tblreagendamiento_temporal(idorden,tipo_cliente,rutcliente,actividad,comuna,numorden,fecha_creacion) values";
          while($param==0){
             try {
              if ($objPHPExcel->getActiveSheet()->getCell('A'.$i)->getvalue()!=NULL && $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getvalue()!="-" ){

                  if ($count!=0){$sql_value.=",";}

                     $id_orden = $objPHPExcel->getActiveSheet()->getCell('S'.$i)->getvalue();
                     $rut_cliente=$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getValue();
                     $tipo_cliente=$objPHPExcel->getActiveSheet()->getCell('E'.$i)->getValue();
                     $numero_orden=$objPHPExcel->getActiveSheet()->getCell('P'.$i)->getValue();
                     $actividad= $objPHPExcel->getActiveSheet()->getCell('AU'.$i)->getvalue();
                     $comuna= $objPHPExcel->getActiveSheet()->getCell('BL'.$i)->getvalue();
                     $rutmodificado=substr($rut_cliente,0,-6);

                     $objPHPExcel->getActiveSheet()->getStyle('BH'.$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2);
                     $fecha=$objPHPExcel->getActiveSheet()->getCell('BH'.$i)->getFormattedValue();
                     $fecha = explode('-',$fecha);
                     $fecha_creacion = implode("",$fecha);

                     $rescomuna=$this->db->query_select("select id_comuna from tblcomuna where nombre='$comuna'");
                     $comunanuv=$rescomuna[0]['id_comuna'];
                     $count++;


                     $sql_value=$sql_value."('$id_orden','$tipo_cliente','$rutmodificado','$actividad',$comunanuv,'$numero_orden','$fecha_creacion')";
                     if ($max_insert==$count)
                     {
                         $this->db->query_select($sql_insert.$sql_value);

                         $count=0;$sql_value="";
                     }

                     $celdablanco = 0;
                 }else {
                     $celdablanco++;
                 }
                 if ($celdablanco == 5) {
                     $param=1;
                 }
                 $i++;

               } catch (\Exception $e) {
                   if (Files::delete_file(API_INTERFACE . 'views/app/temp/'.$docname)){
                       return array('success' => 0, 'message' => $e->getMessage() );
                   }
               }
           }

           if ($sql_value!="")
           {
               $this->db->query_select($sql_insert.$sql_value);
           }

           //cruce de reagendamiento
           $this->db->query_select("update `tblreagendamiento_temporal` rt inner join tblreagendamiento r on rt.idorden=r.id_orden set rt.estado=r.estado,rt.nuevo=1,rt.id_user=r.id_usuario_asoc");
           //cruce de alta utilizacion
           $this->db->query_select("update `tblreagendamiento_temporal` rt inner join tblaltautilizacion a on rt.idorden=a.id_orden set rt.estado='4',rt.nuevo=1,rt.id_user='".$this->user['id_user']."'");

           $result = $this->db->query_select("select count(idorden) contador from tblreagendamiento_temporal");
           if (false != $result){

               if ( $result[0]['contador'] > '0' ){
                   //guardo en registro de carga de archivos
                   $this->db->Insert('tbl_historialarchivoscargados', array(
                       'app'=>'Carga de Reagendamiento',
                       'nombre_archivo'=> $file->getClientOriginalName(),
                       'id_user' => $this->user['id_user'],
                       'q_registros' => $result[0]['contador']
                   ));

                   if (Files::delete_file(API_INTERFACE . 'views/app/temp/'.$docname)){
                       return array('success' => 1, 'message' => $result[0]['contador']." Registros validos cargados Exitosamente..." );
                   }

               }else{
                   if (Files::delete_file(API_INTERFACE . 'views/app/temp/'.$docname)){
                       return array('success' => 0, 'message' => 'No se ha cargado ningun registro, es posible que ya se encuentren en la base de datos...');
                   }
               }
           }
       }else{
           return array('success' => 0, 'message' => "Debe seleccionar un archivo XLSX valido...");
       }
    }
    public function getTMP_Reagendamiento($reporte){
        $where = "";
        if ($reporte == "INCONCISTENCIAS"){
            $where = " and t.estado>1 ";
        }
        $sql = "select t.idorden, t.numorden, t.rutcliente, t.actividad,t.estado,c.descripcion,zona,fecha_creacion,timestampdiff(day,fecha_creacion,date(now())) dias from tblreagendamiento_temporal t inner join tblcomuna c on t.comuna=c.id_comuna where 1=1 ".$where." Order by dias desc,c.zona,c.descripcion";
        return $this->db->query_select($sql);
    }
    public function visualizarorden(){
        $datusu=$this->user;
        $datousuario=$datusu['id_user'];
        $reporte = "ALL";
        $ordenes=$this->getTMP_Reagendamiento($reporte);
        if($ordenes!=false){
            $json = array(
                "aaData"=>array(
                )
            );
            $num=0;
            foreach ($ordenes as $key => $value) {
                $num++;

                $json['aaData'][] = array($value['idorden'],$value['numorden'],$value['rutcliente'],$value['actividad'],$value['descripcion'],$value['fecha_creacion'],$value['dias']);
            }
        }
        $jsonencoded = json_encode($json,JSON_UNESCAPED_UNICODE);
        $fh = fopen(API_INTERFACE . "views/app/temp/result_cons_".$datousuario.".dbj", 'w');
        fwrite($fh, $jsonencoded);
        fclose($fh);
        return array('success' => 1, 'message' => "result_cons_".$datousuario.".dbj" );
    }
    public function cruzarbases(){
        global $config;
        global $http;
        $estado="";

        $reporte="CARGA_ORDENES";
        $ordenes=$this->getTMP_Reagendamiento($reporte);

        if($ordenes!=false){

            $objPHPExcel = new PHPExcel();
            //Informacion del excel
            $objPHPExcel->getProperties() ->setCreator("Jorge Jara H")
                                        ->setLastModifiedBy("JJH")
                                        ->setTitle($reporte);

            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'ID_ORDEN');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'NUMERO_ORDEN');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'RUT_CLIENTE');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'ACTIVIDAD');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'COMUNA');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'ZONA');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'ESTADO');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'FECHA_CREACION');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'DIAS');

            $fila = 2;
            foreach ($ordenes as $value => $data) {
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$fila, $data['idorden']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$fila, $data['numorden']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$fila, $data['rutcliente']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$fila, $data['actividad']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$fila, $data['descripcion']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$fila, $data['zona']);
                if($data['estado']==0){
                    $estado="PENDIENTE";
                }elseif($data['estado']==1){
                    $estado="VOLVER A LLAMAR";
                }elseif($data['estado']==2){
                    $estado="REAGENDADO";
                }elseif($data['estado']==3){
                    $estado="CANCELADO";
                }
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$fila, $estado);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$fila, $data['fecha_creacion']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$fila, $data['dias']);

                $fila++;
            }

            //autisize para las columna
            foreach(range('A','I') as $columnID)
            {
                $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
            }

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->setTitle($reporte);

            // Redirect output to a client’s web browser (Excel2007)
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$reporte.'.xlsx"');
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');

            // If you're serving to IE over SSL, then the following may be needed
            header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
            header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header ('Pragma: public'); // HTTP/1.0

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->save('php://output');

        }else{
            # Redireccionar a la página principal del controlador
            $this->functions->redir($config['site']['url'] . 'reagendamiento/cargar_orden');
        }
    }
    public function cargarinconcistencias(){
        global $config;
        global $http;

        $reporte="INCONCISTENCIAS";
        $ordenes=$this->getTMP_Reagendamiento($reporte);

        if($ordenes!=false){

            $objPHPExcel = new PHPExcel();
            //Informacion del excel
            $objPHPExcel->getProperties() ->setCreator("Jorge Jara H")
                                        ->setLastModifiedBy("JJH")
                                        ->setTitle($reporte);

            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'ID_ORDEN');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'NUMERO_ORDEN');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'RUT_CLIENTE');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'ACTIVIDAD');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'COMUNA');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'ZONA');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'ESTADO');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'FECHA_CREACION');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'DIAS');

            $fila = 2;
            foreach ($ordenes as $value => $data) {
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$fila, $data['idorden']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$fila, $data['numorden']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$fila, $data['rutcliente']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$fila, $data['actividad']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$fila, $data['descripcion']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$fila, $data['zona']);
                if($data['estado']==0){
                    $estado="PENDIENTE";
                }elseif($data['estado']==1){
                    $estado="VOLVER A LLAMAR";
                }elseif($data['estado']==2){
                    $estado="REAGENDADO";
                }elseif($data['estado']==3){
                    $estado="CANCELADO";
                }
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$fila, $estado);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$fila, $data['fecha_creacion']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$fila, $data['dias']);

                $fila++;
            }

            //autisize para las columna
            foreach(range('A','I') as $columnID)
            {
                $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
            }

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->setTitle($reporte);

            // Redirect output to a client’s web browser (Excel2007)
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$reporte.'.xlsx"');
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');

            // If you're serving to IE over SSL, then the following may be needed
            header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
            header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header ('Pragma: public'); // HTTP/1.0

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->save('php://output');

        }else{
            # Redireccionar a la página principal del controlador
            $this->functions->redir($config['site']['url'] . 'reagendamiento/cargar_orden');
        }
    }
    // public function exportar_inconsistencias(){
    //     $result = $this->getTemporalReagendamiento("estado>1");
    // }
    // public function exportar_temporalreagendamiento(){
    //     $result = $this->getTemporalReagendamiento();
    // }
    function getTemporalReagendamiento(string $where = "1=1"){
        $sql = "select * from tblreagendamiento_temporal  where ".$where;
        return $this->db->query_select($sql);
    }
    public function distribuirordenes(){
        $datusu=$this->user;
        $datousuario=$datusu['id_user'];
        $fecha=date('Y-m-d');

        //traspasa todas las actividades nuevas
        $this->db->query_select("update tblreagendamiento_temporal set fecha='$fecha'");
        $this->db->query_select("insert into tblreagendamiento(id_orden,rut_cliente,actividad,comuna,fecha_creacion,numero_orden,tipo_cliente,volver_llamar) select t.idorden,t.rutcliente,t.actividad,t.comuna,t.fecha_creacion,numorden,t.tipo_cliente,now() from tblreagendamiento_temporal t where t.nuevo=0");

        //gestion externa
        $this->db->query_select("update tblreagendamiento set estado=5 where estado=1 and id_orden not in (select idorden from tblreagendamiento_temporal)");

        //borrar temporal
        $this->db->query_select("truncate tblreagendamiento_temporal");

        return array("success"=>1,"message"=>'Ordenes distribuidas');
    }
    public function ver_tmp_q(){
        $result =  $this->db->query_select("select count(*) q from tblreagendamiento_temporal");
        if ($result!=false){
            return $result[0]["q"];
        }else{
            return 0;
        }
    }
    public function listar_ordenes(string $filtro = "1=1"){
        return $this->db->query_select("select r.id_orden,r.numero_orden,r.rut_cliente,r.actividad,r.comuna,r.estado,r.fecha,r.id_usuario_asoc,c.descripcion,r.fecha_creacion,timestampdiff(day,fecha_creacion,date(now())) dias  from tblreagendamiento r inner join tblcomuna c on r.comuna=c.id_comuna where ".$filtro." order by dias desc");
    }
    public function getUserOnline(){
        $datousuario=$this->user['id_user'];
        $result = $this->db->query_select("select id_user from tbluseractivo where id_user='$datousuario' and modulo='reag_andes'");
        if ($result != false){
            return true;
        }else {
            return false;
        }
    }
    public function cargar_orden_reagendamiento(){
        $datousuario=$this->user['id_user'];
        if ($this->getUserOnline() != false){
            $orden=$this->db->query_select("select r.id_orden,r.numero_orden,r.rut_cliente,r.actividad,c.descripcion,timestampdiff(day,fecha_creacion,date(now())) as dias from tblreagendamiento r inner join tblcomuna c on r.comuna=c.id_comuna where r.volver_llamar<=now() and  r.id_usuario_asoc='".$this->user['id_user']."' and r.estado<=2 limit 1");
            if ($orden == false ){
                $orden=$this->db->query_select("select r.id_orden,r.numero_orden,r.rut_cliente,r.actividad,c.descripcion,timestampdiff(day,fecha_creacion,date(now())) as dias from tblreagendamiento r inner join tblcomuna c on r.comuna=c.id_comuna where r.volver_llamar<=now() and r.id_usuario_asoc='0' ORDER BY dias desc, gestiones desc limit 1");
            }
            $this->db->update('tblreagendamiento', array(
                'id_usuario_asoc'=>$datousuario,
            ),"id_orden ='".$orden[0]['id_orden']."'");
            return $orden[0];
        }else{
            $this->db->update('tblreagendamiento', array(
                'id_usuario_asoc'=>'0',
            ),"id_usuario_asoc ='".$datousuario."' and estado<=1");
        }
    }
    public function getHistorialActividad($id_actividad){
        return $this->db->query_select("select h.fecha,h.estado,h.observacion,u.name from tblhistoricoreag h inner join users u on h.id_usuario=u.id_user where num_orden='$id_actividad'");
    }
    public function getObservacionCliente($rut_cliente){
        return $this->db->query_select("select o.fecha_observacion,o.observacion,u.name from tblobservaciones o inner join users u on o.usuario_registra=u.id_user where rut_cliente='$rut_cliente' order by fecha_observacion desc");
    }
    public function activar(){
        global $http;
        $modulo=$http->request->get('modulo');
        $datousuario=$this->user['id_user'];


        $estado=$this->db->query_select("select * from tbluseractivo where modulo='$modulo' and id_user='$datousuario'");
        if($estado==false){
            $this->db->insert('tbluseractivo', array(
                'modulo'=>$modulo,
                'id_user'=>$datousuario
            ));
            return array('success'=>1);
        }else{
            $this->db->query_select("delete from tbluseractivo where modulo='$modulo' and id_user='$datousuario'");
            return array('success'=>2);
        }
    }
    public function agregarobservacion(){
        global $http;
        $rut_cliente=$http->request->get('rut_cliente');

        $html="<div class='box col-md-4' style='height:250px; width:700px;'>
                <form id='formobs' name='formobs'>
                    <br>
                    <label>Rut Cliente</label>
                    <input type='text' class='form-control' id='txtmodalrut' name='txtmodalrut' value='$rut_cliente' readonly='readonly'>
                    <br>
                    <label>Ingresar Observacion</label>
                    <input type='text' class='form-control' id='txtmodalobs' name='txtmodalobs'>
                    <br>
                    <div class='col-md-4'>
                    </div>
                    <center><a data-toggle='tooltip' data-placement='top' title='Aceptar' data-dismiss='modal' onclick='guardar_observacion()' class='btn btn-default btn-md col-md-3'>Aceptar</a></center>
                </form>
              </div>";

        return array('success'=>1,'html'=>$html);
    }
    public function guardarobservacion(){
        global $http;
        $rut_cliente=$http->request->get('txtmodalrut');
        $area='regendamiento';
        $observacion=$http->request->get('txtmodalobs');
        $datusu=$this->user;
        $datousuario=$datusu['id_user'];

        if (!$this->functions->e($observacion)) {
            $this->db->insert('tblobservaciones',array(
                'rut_cliente'=>$rut_cliente,
                'area'=>$area,
                'observacion'=>$observacion,
                'usuario_registra'=>$datousuario
            ));

            return array('success'=>1,'message'=>'Observacion Ingresada correctamente');
        }else{
            return array('success'=>0,'message'=>'Debe Ingresar una observación');
        }
    }
    public function cargar_motivo(){
        global $http;
        $opcion=$http->request->get('opcion');

        $opciones=$this->db->query_select("select * from tblmotivoreag where contacto='$opcion'");

        $html="<h5>Seleccionar Opcion</h5>
                <select id='cmbmotivo' name='cmbmotivo' onchange='selecmotivo()' class='form-control'>
                    <option value='0'>--</option>";
                    foreach ($opciones as $key => $value) {
                        $html.="<option value=".$value['codigo_reag'].">".$value['descripcion']."</option>";
                    }
                $html.="</select>";

        return array('success'=>1,'html'=>$html);
    }
    public function opcionmotivo(){
        global $http;
        $motivo=$http->request->get('motivo');
        $opcion=$http->request->get('opcion');
        $fecha=date('Y-m-d');

        if($opcion=='2' and $motivo=='1' ){
            $html1="<h5>Seleccione en que horario se debe volver a llamar</h5>
            <input type='time' id='appt-time' name='appt-time' class='form-control'
            min='9:00' max='21:00' />";

            $html2="<h5>Seleccione el dia a llamar</h5>
            <input type='date' id='calendario' class='form-control' name='calendario' min='$fecha' value='$fecha'>";

            return array('success'=>1,'html1'=>$html1, 'html2'=>$html2);

        }elseif($opcion=='2' and $motivo=='2' ){
            $html="<h5>Observacion</h5>
            <input type='text' id='textobservacion' class='form-control' name='textobservacion'>";

            return array('success'=>3,'html'=>$html);
        }elseif($opcion=='2' and $motivo=='3' ){
            $opcancelar=$this->db->query_select("select * from tblmotivoreag where contacto='3'");
            $html2="
            <h5>Motivo de cancelacion</h5>
            <select id='cmbcancelar' name='cmbcancelar' onchange='cambiarestado()' class='form-control'>
            <option value='0'>--</option>";
            foreach ($opcancelar as $key => $value) {
                $html2.="<option value=".$value['codigo_reag'].">".$value['descripcion']."</option>";
            };

            $html1="<h5>Observacion</h5>
            <input type='text' id='textobservacion' class='form-control' name='textobservacion'>";

            return array('success'=>1,'html1'=>$html1,'html2'=>$html2);
        }elseif($opcion=='2' and $motivo=='11' ){
            $html="<h5>Observacion</h5>
            <input type='text' id='textobservacion' class='form-control' name='textobservacion'>";

            return array('success'=>3,'html'=>$html);
        }elseif($opcion=='1' and $motivo=='8' ){
            $opcancelar=$this->db->query_select("select * from tblmotivoreag where contacto='4'");
            $html2="
            <h5>Motivo de cancelacion</h5>
            <select id='cmbcancelar' name='cmbcancelar' onchange='cambiarestado()' class='form-control'>
            <option value='0'>--</option>";
            foreach ($opcancelar as $key => $value) {
                $html2.="<option value=".$value['codigo_reag'].">".$value['descripcion']."</option>";
            };

            $html1="<h5>Observacion</h5>
            <input type='text' id='textobservacion' class='form-control' name='textobservacion'>";

            return array('success'=>1,'html1'=>$html1,'html2'=>$html2);
        }elseif($opcion=='1' and $motivo=='10' ){
            $html="<h5>Observacion</h5>
            <input type='text' id='textobservacion' class='form-control' name='textobservacion'>";

            return array('success'=>3,'html'=>$html);
        }elseif($opcion=='1' and $motivo=='4' ){
            $html="";

            return array('success'=>3,'html'=>$html);
        }
    }
    public function volverallamar(){
        global $http;
        $numorden=$http->request->get('txtorden');
        $observacion=$http->request->get('textobservacion');
        $estado='1';
        $opcion=$http->request->get('cmbcontacto');
        $motivo=$http->request->get('cmbmotivo');
        $dia=$http->request->get('calendario');
        $hora=$http->request->get('appt-time');
        $motivocancelar=$http->request->get('cmbcancelar');
        $datusu=$this->user;
        $datousuario=$datusu['id_user'];

        $bloque_siguiente = (new Model\Varios)->ObtenerBloqueSiguiente();
        $fecha_volver = date('Y-m-d');
        if ($bloque_siguiente['bloque'] == "10-13"){
            $fecha_volver = date(strtotime("1 month", date('Y-m-d')),'Y-m-d');
        }
        $fecha_volver = $fecha_volver." ".$bloque_siguiente['desde'];

        if($opcion == 1 and $motivo == 4){ //volver a llamar automatica
            $contador=0;
            $cancelado=$this->db->query_select("select count(*) as q from tblhistoricoreag where num_orden='$numorden' and estado='$opcion' and motivo='$motivo'");
            if($cancelado!=false){
                if( $cancelado[0]['q'] >= 4){
                    return array('Success'=>0,'message'=>'Ya se ha alcanzado el maximo de llamados, desea cancelar la orden?');
                }else{
                    $this->db->query_select("update tblreagendamiento
                    set estado='".$estado."',volver_llamar='".$fecha_volver."',gestiones=gestiones+1
                    where id_orden ='".$numorden."'");


                    $this->db->insert('tblhistoricoreag', array(
                    'num_orden'=>$numorden,
                    'estado'=>$estado,
                    'opcion'=>$opcion,
                    'motivo'=>$motivo,
                    'observacion'=>'Volver a llamar',
                    'motivo_cancelacion'=>$motivocancelar,
                    'id_usuario'=>$datousuario
                    ));
                    return array('success'=>1,'message' => 'La actividad volverá a aparecer en la siguiente fecha y hora: '.$fecha_volver);
                }
            }else{
                $this->db->query_select("update tblreagendamiento
                set estado='".$estado."',volver_llamar='".$fecha_volver."',gestiones=gestiones+1
                where id_orden ='".$numorden."'");

                $this->db->insert('tblhistoricoreag', array(
                'num_orden'=>$numorden,
                'estado'=>$estado,
                'opcion'=>$opcion,
                'motivo'=>$motivo,
                'observacion'=>'Volver a llamar',
                'motivo_cancelacion'=>$motivocancelar,
                'id_usuario'=>$datousuario
                ));
                return array('success'=>1,'message'=> 'La actividad volverá a aparecer en la siguiente fecha y hora: '.$fecha_volver);
            }
        }
        elseif($opcion==1 and $motivo==8){ //cancelar actividad con validacion
            return array('success'=>0,'message'=>'Cancelar actividad');
        }
        elseif(($opcion==1 and $motivo==10) || ($opcion==2 and $motivo==11)){
            $fecha = date('Y-m-j');
            $nuevafecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
            $fecha_volver = date ( 'Y-m-j' , $nuevafecha );

            $fecha_volver = $fecha_volver." 09:00:00";
            $this->db->query_select("update tblreagendamiento
            set estado='".$estado."',volver_llamar='".$fecha_volver."',gestiones=gestiones+1
            where id_orden ='".$numorden."'");

            $this->db->insert('tblhistoricoreag', array(
            'num_orden'=>$numorden,
            'estado'=>$estado,
            'opcion'=>$opcion,
            'motivo'=>$motivo,
            'observacion'=>$observacion,
            'motivo_cancelacion'=>$motivocancelar,
            'id_usuario'=>$datousuario
            ));

            return array('success'=>0,'message'=>'Actividad Suspendida');
        }
        elseif ($opcion==2 and $motivo==1){ // volver a llamar asignando fecha de llamado

            return array('success'=>0,'message'=>$hora);

            $fecha_volver = $dia." ".$hora;
            $this->db->query_select("update tblreagendamiento
            set estado='".$estado."',volver_llamar='".$fecha_volver."',gestiones=gestiones+1
            where id_orden ='".$numorden."'");

            $this->db->insert('tblhistoricoreag', array(
            'num_orden'=>$numorden,
            'estado'=>$estado,
            'opcion'=>$opcion,
            'motivo'=>$motivo,
            'observacion'=>'Volver a llamar',
            'motivo_cancelacion'=>$motivocancelar,
            'id_usuario'=>$datousuario
            ));
            return array('success'=>1,'message' => 'La actividad volverá a aparecer en la siguiente fecha y hora: '.$fecha_volver);
        }
        elseif($opcion==2 and $motivo==3){ //cancelar actividad directamente

            $this->db->query_select("update tblreagendamiento
            set estado=3,volver_llamar='".$fecha_volver."',gestiones=gestiones+1
            where id_orden ='".$numorden."'");

            $this->db->insert('tblhistoricoreag', array(
                'num_orden'=>$numorden,
                'estado'=>'3',
                'opcion'=>$opcion,
                'motivo'=>$motivo,
                'observacion'=>$observacion,
                'motivo_cancelacion'=>$motivocancelar,
                'id_usuario'=>$datousuario
            ));
            return array('success'=>1,'message'=>'Orden derivada');

        }else{
            if($motivo==2){
                $this->db->query_select("update tblreagendamiento
                set estado=2,volver_llamar='".$fecha_volver."',gestiones=gestiones+1
                where id_orden ='".$numorden."'");

                $this->db->insert('tblhistoricoreag', array(
                'num_orden'=>$numorden,
                'estado'=>'2',
                'opcion'=>$opcion,
                'motivo'=>$motivo,
                'observacion'=>$observacion,
                'motivo_cancelacion'=>$motivocancelar,
                'id_usuario'=>$datousuario
                ));
                return array('success'=>1,'message'=>'Orden derivada');
            }else{
                $this->db->query_select("update tblreagendamiento
                set estado='".$estado."',volver_llamar='".$fecha_volver."',gestiones=gestiones+1
                where id_orden ='".$numorden."'");

                $this->db->insert('tblhistoricoreag', array(
                'num_orden'=>$numorden,
                'estado'=>$estado,
                'opcion'=>$opcion,
                'motivo'=>$motivo,
                'observacion'=>$observacion,
                'motivo_cancelacion'=>$motivocancelar,
                'id_usuario'=>$datousuario
                ));
                return array('success'=>1,'message'=>'Orden derivada');
            }
        }
    }













    public function devolver_orden(){
      global $http;
      $numorden=$http->request->get('id');
      $datusu=$this->user;
      $datousuario=$datusu['id_user'];

      $this->db->update('tblreagendamiento', array(
        'id_usuario_asoc'=>0,
      ),"id_orden ='$numorden'");

      return array('success'=>1,'message'=>'Orden Devuelta');
    }



    public function guardarcancelado(){
      global $http;
      $orden=$http->request->get('txtcancelarorden');
      $datusu=$this->user;
      $datousuario=$datusu['id_user'];

      $this->db->insert('tblhistoricoreag', array(
         'num_orden'=>$orden,
         'estado'=>'1',
         'opcion'=>'1',
         'motivo'=>'1',
         'observacion'=>'Volver a llamar',
         'id_usuario'=>$datousuario
       ));
       return array('success'=>1,'message'=>'Orden derivada');
    }

    public function cargar_nueva(){
      $datusu=$this->user;
      $datousuario=$datusu['id_user'];
      $activo=$this->db->query_select("select * from tbluseractivo where modulo='reag_andes' and id_user='$datousuario'");
      if($activo==false){
       //select r.id_orden,r.numero_orden,r.rut_cliente,r.actividad,r.comuna,r.estado,r.fecha,r.id_usuario_asoc,c.descripcion, (select datediff(now(),r.fecha_creacion)+1) as dias from tblreagendamiento r inner join tblcomuna c on r.comuna=c.id_comuna
      }else{
            $orden=$this->db->query_select("select r.id_orden,r.numero_orden,r.rut_cliente,r.actividad,c.descripcion from tblreagendamiento r inner join tblcomuna c on r.comuna=c.id_comuna where r.id_usuario_asoc='$datousuario' and r.estado=0 limit 1");
            if($orden==false){
                //$orden=$this->db->query_select("select r.id_orden,r.numero_orden,r.rut_cliente,r.actividad,c.descripcion,(select datediff(now(),r.fecha_creacion)+1) as dias from tblreagendamiento r inner join tblcomuna c on r.comuna=c.id_comuna  where r.id_usuario_asoc=0 ORDER BY RAND() limit 1");
                $orden=$this->db->query_select("select r.id_orden,r.numero_orden,r.rut_cliente,r.actividad,c.descripcion,(select datediff(now(),r.fecha_creacion)+1) as dias from tblreagendamiento r inner join tblcomuna c on r.comuna=c.id_comuna  where r.id_usuario_asoc=0 ORDER BY dias desc limit 1");
            }if($orden==false){
                $orden=$this->db->query_select("select count(num_orden) as cantidad,num_orden from tblhistoricoreag inner join tblreagendamiento on tblhistoricoreag.num_orden=tblreagendamiento.id_orden where tblreagendamiento.estado<2 group by num_orden order by cantidad asc limit 1");
                $orden=$this->db->query_select("select t.id_orden, t.numero_orden,t.rut_cliente,t.actividad,c.descripcion from tblreagendamiento t inner join tblcomuna c on t.comuna=c.id_comuna where id_orden='".$orden[0]['num_orden']."'");
            }

             $html5="<a data-toggle='tooltip' data-placement='top' title='Volver a llamar' class='btn btn-success btn-md col-md-4' onclick='volverallamar()'>
                    <i class='glyphicon glyphicon-earphone'></i></a><div class='col-md-3'></div><a data-toggle='tooltip' data-placement='top' title='Orden Reagendada' class='btn btn-primary btn-md col-md-4' onclick='reagendarorden()'>
                    <i class='glyphicon glyphicon-ok-sign'></i></a>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>";

              $html6="<a class='btn btn-success btn-sm  btn-social col-sm-4 pull-right' title='Agregar' onclick='agregar_observacion()' data-toggle='tooltip'>
                      <i class='fa fa-plus'></i><center>Agregar</center>
                      </a>";

              $html2="<div class='col-md-12'>
                        <label>ID ORDEN</label>
                        <input type='text' class='form-control col-md-3' id='txtnumorden' name='txtnumorden' value=".$orden[0]['id_orden'].">
                      </div>
                      <div class='col-md-12'>
                        <br>
                      </div>
                      <div class='col-md-12'>
                        <label>N° PEDIDO</label>
                        <input type=type='text' class='form-control col-md-3' id='txtpedido' name='txtpedido' >
                      </div>
                      <div class='col-md-12'>
                        <br>
                      </div>
                      <div class='col-md-12'>
                        <label>RUT CLIENTE</label>
                        <input type='text' class='form-control col-md-3' id='txtrutcliente' name='txtrutcliente' value=".$orden[0]['rut_cliente'].">
                      </div>
                      <div class='col-md-12'>
                        <br>
                      </div>
                      <div class='col-md-12'>
                        <label>TIPO ACTIVIDAD</label>
                        <input type='text' class='form-control col-md-3' id='txtnombrecliente' name='txtnombrecliente' value=".$orden[0]['actividad'].">
                      </div>
                      <div class='col-md-12'>
                        <br>
                      </div>
                      <div class='col-md-12'>
                        <label>COMUNA</label>
                            <input type='text' class='form-control col-md-3' id='txtcomuna' name='txtcomuna' value='".$orden[0]['descripcion']."'>
                      </div>";

                      $numorden=$orden[0]['id_orden'];
                      $this->db->update('tblreagendamiento', array(
                          'id_usuario_asoc'=>$datousuario,
                      ),"id_orden ='$numorden'");

                      $rut=$orden[0]['rut_cliente'];
                      $observacioncliente=$this->db->query_select("select * from tblobservaciones where rut_cliente='$rut'");
                      if($observacioncliente!=false){
                          $html4="<table id='tblobservacion' name='tblobservacion' class='table table-bordered'>
                                  <thead>
                                    <th>FECHA_LLAMADO</th>
                                    <th>RUT_CLIENTE</th>
                                    <th>OBSERVACION</th>
                                    <th>EJECUTIVO</th>
                                  </thead>
                                  <tbody>
                                  <tr>";
                           foreach ($observacioncliente as $key => $value) {
                           $html4.="<td>".$value['fecha_observacion']."</td>
                                    <td>".$value['rut_cliente']."</td>
                                    <td>".$value['observacion']."</td>
                                    <td>".$value['usuario_registra']."</td>
                                    </tr>";
                                    }
                            $html4.="</tbody>
                                     </table>";
                        }else{
                            $html4="<table id='tblobservacion' name='tblobservacion' class='table table-bordered'>
                                    <thead>
                                      <th>FECHA_LLAMADO</th>
                                      <th>RUT_CLIENTE</th>
                                      <th>OBSERVACION</th>
                                      <th>EJECUTIVO</th>
                                    </thead>
                                    <tbody>
                                      <tr>
                                      </tr>
                                    </tbody>
                                    </table>";
                        }

                $datosorden=$this->db->query_select("select * from tblhistoricoreag where num_orden='$numorden' order by fecha desc");
                if($datosorden==false){
                    $html3="<table id='tblhistorial' name='tblhistorial' class='table table-bordered'>
                              <thead>
                                <th>FECHA_LLAMADO</th>
                                <th>ESTADO</th>
                                <th>MOTIVO</th>
                                <th>OBSERVACION</th>
                                <th>EJECUTIVO</th>
                              </thead>
                              <tbody>
                              <tr>
                              </tr>
                              </tbody>
                              </table>";
                      return array('success'=>1,'html2'=>$html2,'html3'=>$html3,'html4'=>$html4,'html5'=>$html5,'html6'=>$html6);
                }else{
                    $html3="<table id='tblhistorial' name='tblhistorial' class='table table-bordered'>
                            <thead>
                              <th>FECHA_LLAMADO</th>
                              <th>ESTADO</th>
                              <th>MOTIVO</th>
                              <th>OBSERVACION</th>
                              <th>EJECUTIVO</th>
                            </thead>
                            <tbody>
                            <tr>";
                            foreach ($datosorden as $key => $value) {
                    $html3.="<td>".$value['fecha']."</td>
                             <td>".$value['opcion']."</td>
                             <td>".$value['motivo']."</td>
                             <td>".$value['observacion']."</td>
                             <td>".$value['id_usuario']."</td>
                             </tr>";
                            }

                     $html3.="</tbody>
                              </table>";
                          }

              $rut=$orden[0]['rut_cliente'];
              $observacioncliente=$this->db->query_select("select * from tblobservaciones where rut_cliente='$rut'");
              if($observacioncliente!=false){
                 $html4="<table id='tblobservacion' name='tblobservacion' class='table table-bordered'>
                      <thead>
                        <th>FECHA_LLAMADO</th>
                        <th>RUT_CLIENTE</th>
                        <th>OBSERVACION</th>
                        <th>EJECUTIVO</th>
                      </thead>
                      <tbody>
                        <tr>";
                        foreach ($observacioncliente as $key => $value) {
                          $html4.="<td>".$value['fecha_observacion']."</td>
                                  <td>".$value['rut_cliente']."</td>
                                  <td>".$value['observacion']."</td>
                                  <td>".$value['usuario_registra']."</td>
                                  </tr>";
                                  }
                    $html4.="</tbody>
                             </table>";
                    }else{
                      $html4="<table id='tblobservacion' name='tblobservacion' class='table table-bordered'>
                      <thead>
                      <th>FECHA_LLAMADO</th>
                      <th>RUT_CLIENTE</th>
                      <th>OBSERVACION</th>
                      <th>EJECUTIVO</th>
                      </thead>
                      <tbody>
                      <tr>
                      </tbody>
                      </table>";
                    }
                        return array('success'=>1,'html2'=>$html2,'html3'=>$html3,'html4'=>$html4,'html5'=>$html5,'html6'=>$html6);
          }

    }











    public function cancelarorden(){
        global $http;
        $datusu=$this->user;
        $datousuario=$datusu['id_user'];
        $orden=$http->request->get('txtorden2');
        $observacion=$http->request->get('observacion');
        $motivo='1';
        $motivocancelar='3';
        $estado='3';

        $this->db->insert('tblhistoricoreag',array(
            'num_orden'=>$orden,
            'motivo'=>$motivo,
            'motivo_cancelacion'=>$motivocancelar,
            'observacion'=>$observacion,
            'id_usuario'=>$datousuario,
        ));

        $this->db->update('tblhistoricoreag', array(
            'estado'=>$estado
        ),"num_orden='$orden'");


        $this->db->update('tblreagendamiento', array(
            'estado'=>$estado
        ),"id_orden='$orden'");

        return array('success'=>1,'message'=>'Orden Cancelada');

    }

    public function reagendarorden(){
        global $http;
        $estado='2';
        $orden=$http->request->get('txtordenreag');
        $observacion=$http->request->get('txtreagendar');
        $datusu=$this->user;
        $datousuario=$datusu['id_user'];


        $this->db->update('tblreagendamiento', array(
            'estado'=>$estado
        ),"id_orden='$orden'");

        $this->db->insert('tblhistoricoreag',array(
            'num_orden'=>$orden,
            'estado'=>$estado,
            'observacion'=>$observacion,
            'id_usuario'=>$datousuario,
        ));

        return array('success'=>1,'message'=>'Orden regendada');
    }

    public function cancelaorden(){
        global $http;
        $estado='3';
        $orden=$http->request->get('txtcancelar');
        $observacion=$http->request->get('txtcancelorden');
        $datusu=$this->user;
        $datousuario=$datusu['id_user'];


        $this->db->update('tblreagendamiento', array(
        'estado'=>$estado
        ),"id_orden='$orden'");

        $this->db->insert('tblhistoricoreag',array(
        'num_orden'=>$orden,
        'estado'=>$estado,
        'observacion'=>$observacion,
        'id_usuario'=>$datousuario,
        ));

        return array('success'=>1,'message'=>'Orden cancelada');
    }











    public function buscarorden(){
       global $http;
       $orden=$http->request->get('orden');

       $filtro=$this->db->query_select("select r.id_orden, r.numero_orden, r.rut_cliente, r.actividad,c.descripcion from tblreagendamiento r inner join tblcomuna c on r.comuna=c.id_comuna where id_orden='$orden'");
       if($filtro==false){
         return array('success'=>0,'message'=>'No existe orden asociada');
       }else{
          $html="<div class='col-md-12'>
                   <label>ID ORDEN</label>
                   <input type='text' class='form-control col-md-3' id='txtnumorden' name='txtnumorden' value=".$filtro[0]['id_orden'].">
                 </div>
                 <div class='col-md-12'>
                   <br>
                 </div>
                 <div class='col-md-12'>
                   <label>N° PEDIDO</label>
                   <input type=type='text' class='form-control col-md-3' id='txtpedido' name='txtpedido' >
                 </div>
                 <div class='col-md-12'>
                   <br>
                 </div>
                 <div class='col-md-12'>
                   <label>RUT CLIENTE</label>
                   <input type='text' class='form-control col-md-3' id='txtrutcliente' name='txtrutcliente' value=".$filtro[0]['rut_cliente'].">
                 </div>
                 <div class='col-md-12'>
                   <br>
                 </div>
                 <div class='col-md-12'>
                   <label>TIPO ACTIVIDAD</label>
                   <input type='text' class='form-control col-md-3' id='txtnombrecliente' name='txtnombrecliente' value=".$filtro[0]['actividad'].">
                 </div>
                 <div class='col-md-12'>
                   <br>
                 </div>
                 <div class='col-md-12'>
                   <label>COMUNA</label>
                   <input type='text' class='form-control col-md-3' id='txtcomuna' name='txtcomuna' value='".$filtro[0]['descripcion']."'>
                 </div>";

                 $html2="<a data-toggle='tooltip' data-placement='top' title='Volver a llamar' class='btn btn-success btn-md col-md-4' onclick='volverallamar()'>
                         <i class='glyphicon glyphicon-earphone'></i></a><div class='col-md-3'></div><a data-toggle='tooltip' data-placement='top' title='Orden Reagendada' class='btn btn-primary btn-md col-md-4' onclick='reagendarorden()'>
                         <i class='glyphicon glyphicon-ok-sign'></i></a>";

                 return array('success'=>1,'html'=>$html, 'html2'=>$html2);
               }

    }

    public function consultarorden(){
        global $http;
        $orden=$http->request->get("txtnumorden");

        $filtro=$this->db->query_select("select * from tblreagendamiento where id_orden='$orden'");
        if($filtro==false){
            return array("success"=>0);
        }else{
            return array("success"=>1);
        }
    }

    public function guardarorden(){
        global $http;
        $orden=$http->request->get("txtnumorden");
        $numpedido=$http->request->get("txtpedido");
        $rutcliente=$http->request->get("txtrutcliente");
        $actividad=$http->request->get("txtnombrecliente");
        $comuna=$http->request->get("txtcomuna");


        // if ($this->functions->e($orden,$rutcliente,$actividad,$comuna)) {
        //     throw new ModelsException('Ingresar datos donde campos se especifica como Requerido');
        // }

        $this->db->insert("tblreagendamiento", array(
            "id_orden"=>$orden,
            "numero_orden"=>$numpedido,
            "rut_cliente"=>$rutcliente,
            "actividad"=>$actividad,
            "comuna"=>$comuna
        ));

        return array("success"=>1);
    }

    public function listar_comunas(){
        return $this->db->query_select("select id_comuna,descripcion from tblcomuna order by descripcion");
    }
    public function listar_ordenes_utilizacion(){
        return $this->db->query_select("select a.id_orden,a.num_orden,a.rut_cliente,a.actividad,a.comuna,a.id_user,c.descripcion,(select DISTINCT name from users inner join tblaltautilizacion tbl2 on users.id_user=tbl2.id_user WHERE tbl2.id_user=a.id_user) as nombre from tblaltautilizacion a inner join tblcomuna c on a.comuna=c.id_comuna");
    }

    public function buscarordenalta(){
        global $http;
        $orden=$http->request->get("ordenalta");

        $filtro=$this->db->query_select("select a.id_orden,a.num_orden,a.rut_cliente,a.actividad,a.comuna,a.id_user,c.descripcion from tblaltautilizacion a inner join tblcomuna c on a.comuna=c.id_comuna where a.id_orden='$orden'");
        if($filtro==false){
            return array("success"=>0,"message"=>"Orden no registrada");
        }else{
            $html="<div class='col-md-12'>
            <label>ID ORDEN</label>
            <input type='text' class='form-control col-md-3' id='txtordenalta' name='txtordenalta' value=".$filtro[0]['id_orden'].">
            </div>
            <div class='col-md-12'>
            <br>
            </div>
            <div class='col-md-12'>
            <label>N° PEDIDO</label>
            <input type=type='text' class='form-control col-md-3' id='txtpedidoalta' name='txtpedidoalta' value=".$filtro[0]['num_orden']." >
            </div>
            <div class='col-md-12'>
            <br>
            </div>
            <div class='col-md-12'>
            <label>RUT CLIENTE</label>
            <input type='text' class='form-control col-md-3' id='txtrutclientealta' name='txtrutclientealta' value=".$filtro[0]['rut_cliente'].">
            </div>
            <div class='col-md-12'>
            <br>
            </div>
            <div class='col-md-12'>
            <label>TIPO ACTIVIDAD</label>
            <input type='text' class='form-control col-md-3' id='txtactividadalta' name='txtactividadalta' value=".$filtro[0]['actividad'].">
            </div>
            <div class='col-md-12'>
            <br>
            </div>
            <div class='col-md-12'>
            <label>COMUNA</label>
            <select id='opcioncomunaalta' name='opcioncomunaalta' class='form-control'>
            <option value=".$filtro[0]['comuna'].">".$filtro[0]['descripcion']."</opction>";
            $comunas=$this->db->query_select("select id_comuna,nombre,descripcion,empresa from tblcomuna");
            foreach ($comunas as $key => $value) {
                if($filtro[0]['comuna']==$value['id_comuna']){

                }else{
                    $localidades=utf8_decode($value['descripcion']);
                    $html.="<option value=".$value['id_comuna'].">".$localidades."</opction>";
                }
            }
            $html.="</select>
            </div>";

            $html2="<a data-toggle='tooltip' data-placement='top' title='Nueva Orden' class='btn btn-success btn-md col-md-3' onclick='nuevaordenalta()'>
            <i class='glyphicon glyphicon-plus-sign'></i></a><div class='col-md-1'></div><a data-toggle='tooltip' data-placement='top' title='Modificar Orden' class='btn btn-primary btn-md col-md-3' onclick='modificar_orden_altautilizacion()'>
            <i class='glyphicon glyphicon glyphicon-floppy-disk'></i></a><div class='col-md-1'></div><a data-toggle='tooltip' data-placement='top' title='Eliminar Orden' class='btn btn-danger btn-md col-md-3' onclick='eliminar_orden_altautilizacion()'>
            <i class='glyphicon glyphicon-remove-sign'></a></i>";

            return array('success'=>1,'html'=>$html, 'html2'=>$html2);
        }

    }
    public function nuevaordenalta(){
       $html="<div class='col-md-12'>
              <label>ID ORDEN</label>
              <input type='text' class='form-control col-md-3' id='txtordenalta' name='txtordenalta'>
            </div>
            <div class='col-md-12'>
              <br>
            </div>
            <div class='col-md-12'>
              <label>N° PEDIDO</label>
              <input type=type='text' class='form-control col-md-3' id='txtpedidoalta' name='txtpedidoalta'>
            </div>
            <div class='col-md-12'>
              <br>
            </div>
            <div class='col-md-12'>
              <label>RUT CLIENTE</label>
              <input type='text' class='form-control col-md-3' id='txtrutclientealta' name='txtrutclientealta'>
            </div>
            <div class='col-md-12'>
              <br>
            </div>
            <div class='col-md-12'>
              <label>TIPO ACTIVIDAD</label>
              <input type='text' class='form-control col-md-3' id='txtactividadalta' name='txtactividadalta'>
            </div>
            <div class='col-md-12'>
              <br>
            </div>
            <div class='col-md-12'>
              <label>COMUNA</label>
              <input type='text' class='form-control col-md-3' id='opcioncomunaalta' name='opcioncomunaalta'>
            </div>";

            $html2="<a data-toggle='tooltip' data-placement='top' title='Nueva Orden' class='btn btn-success btn-md col-md-3' onclick='nuevaordenalta()'>
                    <i class='glyphicon glyphicon-plus-sign'></i></a><div class='col-md-1'></div><a data-toggle='tooltip' data-placement='top' title='Guardar Orden' class='btn btn-primary btn-md col-md-3' onclick='guardar_orden_altautilizacion()'>
                    <i class='glyphicon glyphicon-floppy-disk'></i></a><div class='col-md-1'></div><a data-toggle='tooltip' data-placement='top' title='Eliminar Orden' onclick='eliminar_orden_altautilizacion()' class='btn btn-danger btn-md col-md-3'>
                    <i class='glyphicon glyphicon-remove-sign'></a></i>";

            return array('success'=>1,'html'=>$html, 'html2'=>$html2);
    }
    public function guardaraltautilizacion(){
     global $http;

     $idorden=$http->request->get("txtordenalta");
     $numorden=$http->request->get("txtpedidoalta");
     $rutcliente=$http->request->get("txtrutclientealta");
     $actividad=$http->request->get("txtactividadalta");
     $comuna=$http->request->get("opcioncomunaalta");
     $datusu=$this->user;
     $datousuario=$datusu['id_user'];

     $buscarorden=$this->db->query_select("select * from tblaltautilizacion where id_orden='$idorden'");
     if($buscarorden==false){
         if ($this->functions->e($idorden,$numorden,$rutcliente,$actividad,$comuna)) {
             return array("success"=>0, "message"=>"Debe llenar todos los campos");
         }

         $this->db->insert("tblaltautilizacion", array(
           "id_orden"=>$idorden,
           "num_orden"=>$numorden,
           "rut_cliente"=>$rutcliente,
           "actividad"=>$actividad,
           "comuna"=>$comuna,
           "id_user"=>$datousuario
         ));
         $this->db->query_select("delete from tblreagendamiento where id_orden='$idorden'");
         return array("success"=>1,"message"=>"Orden ingresada correctamente");
       }else{
         return array("success"=>0,"message"=>"La orden ya existe en sistema");
       }

    }
    public function modificaraltautilizacion(){
     global $http;

     $idorden=$http->request->get("txtordenalta");
     $numorden=$http->request->get("txtpedidoalta");
     $rutcliente=$http->request->get("txtrutclientealta");
     $actividad=$http->request->get("txtactividadalta");
     $comuna=$http->request->get("opcioncomunaalta");
     $datusu=$this->user;
     $datousuario=$datusu['id_user'];

     if ($this->functions->e($idorden,$numorden,$rutcliente,$actividad,$comuna)) {
        return array("success"=>0,"message"=>'Ingresar datos donde campos se especifica como Requerido');
     }

     $this->db->update("tblaltautilizacion", array(
       "num_orden"=>$numorden,
       "rut_cliente"=>$rutcliente,
       "actividad"=>$actividad,
       "comuna"=>$comuna,
       "id_user"=>$datousuario
     ),"id_orden='$idorden'");

     return array("success"=>1,"message"=>"Orden modificada correctamente");

    }
    public function eliminarraltautilizacion(){
     global $http;

     $idorden=$http->request->get("txtordenalta");

     if ($this->functions->e($idorden)) {
        return array("success"=>0,"message"=>'Debe cargar una orden antes');
     }
     $this->db->query_select("delete from tblaltautilizacion where id_orden='$idorden'");

     return array("success"=>1,"message"=>"Orden eliminada");

    }





    public function mostrardatostabla(){
     global $http;
     $fechadesde=$http->request->get('fechadesde');
     $fechahasta=$http->request->get('fechahasta');


           $gestiones=$this->calcular_gestiones($fechadesde,$fechahasta);
           unset($pend_valores_test);

           $html="<table class='table table-bordered'>
           <thead>
               <tr>
                   <th>FECHA</th>
                   <th>GESTIONES</th>
                   <th>REAGENDADOS</th>
                   <th>CANCELADOS</th>
                   <th>VOLVER_A_LLAMAR</th>
               </tr>
           </thead>
           <tbody>";
               if (false != $gestiones){
                   foreach ($gestiones as $key => $value) {
                       $html.="<tr>";
                           $html.="<td>".$value['fechas']."</td>
                           <td>".$value['gestiones']."</td>
                           <td>".$value['reagendadas']."</td>
                           <td>".$value['canceladas']."</td>
                           <td>".$value['volver_a_llamar']."</td>";
                       $html.="</tr>";

                       $pend_valores_test[]=array("x" => $value['gestiones'], "y" =>$value['reagendadas'], "z" =>$value['canceladas'],"a"=>$value['volver_a_llamar'] );
                   }
               }
               $html.="<tr>";
                   $html.="<td>TOTAL</td>";
               $html.="</tr>";
               $html.="
           </tbody>
           </table>";
           //-------------------------------------------------------------------------------

           if (isset($pend_valores_test)){
               return array('success' => 1, 'html'=>$html, 'json'=>$pend_valores_test);
           }else{
               return array('success' => 0);
           }
    }

    public function calcular_gestiones($fechadesde,$fechahasta){
      return $this->db->query_select("select DATE_FORMAT(fecha,'%Y-%m-%d') as fechas,(select count(id_orden) from tblreagendamiento where DATE_FORMAT(fecha,'%Y-%m-%d')=fechas and estado<>0) as gestiones,(select count(id_orden) from tblreagendamiento where DATE_FORMAT(fecha,'%Y-%m-%d')=fechas and estado=2) as reagendadas,(select count(id_orden) from tblreagendamiento where DATE_FORMAT(fecha,'%Y-%m-%d')=fechas and estado=3) as canceladas,(select count(id_orden) from tblreagendamiento where DATE_FORMAT(fecha,'%Y-%m-%d')=fechas and estado=1) as volver_a_llamar from tblreagendamiento where estado <>0 and DATE_FORMAT(fecha,'%Y-%m-%d') between '$fechadesde' and '$fechahasta' group by fechas order by fecha asc");
    }

    public function revisar_gestiones($fechadesde,$fechahasta){
      return $this->db->query_select("select DISTINCT id_usuario,(select DISTINCT name from users u inner join tblhistoricoreag th2 on u.id_user=th2.id_usuario where th2.id_usuario=th.id_usuario) as nombre,
      (select count(th2.num_orden) from tblhistoricoreag th2 where th2.id_usuario=th.id_usuario and th2.estado<>0 and DATE_FORMAT(fecha,'%Y-%m-%d') BETWEEN '$fechadesde' and '$fechahasta' ) as gestionadas,
      (select count(th2.num_orden) from tblhistoricoreag th2 where th2.id_usuario=th.id_usuario and th2.estado=2 and DATE_FORMAT(fecha,'%Y-%m-%d') BETWEEN '$fechadesde' and '$fechahasta' ) as reagendadas,
      (select count(th2.num_orden) from tblhistoricoreag th2 where th2.id_usuario=th.id_usuario and th2.estado=3 and DATE_FORMAT(fecha,'%Y-%m-%d') BETWEEN '$fechadesde' and '$fechahasta' ) as canceladas,
      (select count(th2.num_orden) from tblhistoricoreag th2 where th2.id_usuario=th.id_usuario and th2.estado=1 and DATE_FORMAT(fecha,'%Y-%m-%d') BETWEEN '$fechadesde' and '$fechahasta' ) as volver_a_llamar
      from tblhistoricoreag th where DATE_FORMAT(fecha,'%Y-%m-%d') BETWEEN '$fechadesde' and '$fechahasta'");
    }

    public function mostrarproduccion(){
      global $http;
      $fechadesde=$http->request->get('fechadesde');
      $fechahasta=$http->request->get('fechahasta');


            $gestiones=$this->revisar_gestiones($fechadesde,$fechahasta);
            unset($pend_valores_test);

            $html="<table class='table table-bordered'>
            <thead>
                <tr>
                    <th>EJECUTIVO</th>
                    <th>GESTIONES</th>
                    <th>REAGENDADOS</th>
                    <th>CANCELADOS</th>
                    <th>VOLVER_A_LLAMAR</th>
                </tr>
            </thead>
            <tbody>";
                if (false != $gestiones){
                    foreach ($gestiones as $key => $value) {
                        $html.="<tr>";
                            $html.="<td>".$value['nombre']."</td>
                            <td>".$value['gestionadas']."</td>
                            <td>".$value['reagendadas']."</td>
                            <td>".$value['canceladas']."</td>
                            <td>".$value['volver_a_llamar']."</td>";
                        $html.="</tr>";

                        $pend_valores_test[]=array("x" => $value['gestionadas'], "y" =>$value['reagendadas'], "z" =>$value['canceladas'],"a"=>$value['volver_a_llamar'] );
                    }
                }
                $html.="<tr>";
                    $html.="<td>TOTAL</td>";
                $html.="</tr>";
                $html.="
            </tbody>
            </table>";
            //-------------------------------------------------------------------------------

            if (isset($pend_valores_test)){
                return array('success' => 1, 'html'=>$html, 'json'=>$pend_valores_test);
            }else{
                return array('success' => 0);
            }
    }

    public function descargaractividades(){
      global $http;
      global $config;
      $fechadesde=$http->query->get("fechadesde");
      $fechahasta=$http->query->get("fechahasta");


      $gestiones=$this->db->query_select("select r.id_orden,r.numero_orden,r.rut_cliente,r.actividad,r.comuna,r.estado,r.id_usuario_asoc,DATE_FORMAT(fecha,'%Y-%m-%d') as fechas,c.descripcion,(select name from users u inner join tblreagendamiento tr2 on u.id_user=tr2.id_usuario_asoc where tr2.id_orden=r.id_orden) as nombre from tblreagendamiento r inner join tblcomuna c on r.comuna=c.id_comuna where DATE_FORMAT(fecha,'%Y-%m-%d') BETWEEN '$fechadesde' and '$fechahasta' and r.estado <> 0 order by r.estado desc");

      $reporte="ACTIVIDADES";
      if($gestiones != false){

        $objPHPExcel = new PHPExcel();
        //Informacion del excel
        $objPHPExcel->getProperties() ->setCreator("Hector G.")
                                    ->setLastModifiedBy("HG")
                                    ->setTitle($reporte);

        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'ID_ORDEN');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'NUMERO_ORDEN');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'RUT_CLIENTE');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'ACTIVIDAD');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'FECHA');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'COMUNA');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'ESTADO');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'EJECUTIVO');

        $fila = 2;
        foreach ($gestiones as $value => $data) {
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$fila, $data['id_orden']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$fila, $data['numero_orden']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$fila, $data['rut_cliente']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$fila, $data['actividad']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$fila, $data['fechas']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$fila, $data['descripcion']);
        if($data['estado']==0){
          $estado="PENDIENTE";
        }elseif($data['estado']==1){
          $estado="VOLVER A LLAMAR";
        }elseif($data['estado']==2){
          $estado="REAGENDADO";
        }elseif($data['estado']==3){
          $estado="CANCELADO";
        }
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$fila, $estado);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$fila, $data['nombre']);

        $fila++;
        }

        //autisize para las columna
        foreach(range('A','G') as $columnID)
        {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setTitle($reporte);

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$reporte.'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');

        }else{
            // # Redireccionar a la página principal del controlador
            $this->functions->redir($config['site']['url'] . 'reagendamiento/actividades');
        }

    }

    public function descargargestiones(){
      global $http;
      global $config;
      $fechadesde=$http->query->get("fechadesde");
      $fechahasta=$http->query->get("fechahasta");


      $gestiones=$this->db->query_select("select th.num_orden,th.estado,th.opcion,th.motivo,th.motivo_cancelacion,th.observacion,th.id_usuario,(select name from users u inner join tblhistoricoreag th2 on u.id_user=th2.id_usuario where th2.num_orden=th.num_orden limit 1) as nombre,
      (select m.descripcion from tblmotivoreag m inner join tblhistoricoreag th2 on m.codigo_reag=th2.motivo where th2.num_orden=th.num_orden limit 1) as motivos,(select descripcion from tblmotivoreag tm inner join tblhistoricoreag th2 on tm.codigo_reag=th2.motivo_cancelacion where th2.codigo=th.codigo) as cancelacion  from tblhistoricoreag  th where DATE_FORMAT(fecha,'%Y-%m-%d') BETWEEN '$fechadesde' and '$fechahasta'");

      $reporte="GESTIONES";
      if($gestiones != false){

        $objPHPExcel = new PHPExcel();
        //Informacion del excel
        $objPHPExcel->getProperties() ->setCreator("Hector G.")
                                    ->setLastModifiedBy("HG")
                                    ->setTitle($reporte);

        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'ID_ORDEN');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'NUMERO_ORDEN');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'ESTADO');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'OPCION');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'MOTIVO');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'MOTIVO_CANCELACION');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'OBSERVACION');
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'NOMBRE');


        $fila = 2;
        foreach ($gestiones as $value => $data) {
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$fila, $data['num_orden']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$fila, "DATOS");
        if($data['estado']==0){
          $estado="PENDIENTE";
        }elseif($data['estado']==1){
          $estado="VOLVER A LLAMAR";
        }elseif($data['estado']==2){
          $estado="REAGENDADO";
        }elseif($data['estado']==3){
          $estado="CANCELADO";
        }
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$fila, $estado);
        if($data['opcion']==1){
          $opcionmotivo="SIN CONTACTO";
        }else{
          $opcionmotivo="CON CONTACTO";
        }
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$fila, $opcionmotivo);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$fila, $data['motivos']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$fila, $data['cancelacion']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$fila, $data['observacion']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$fila, $data['nombre']);
        $fila++;
        }

        //autisize para las columna
        foreach(range('A','H') as $columnID)
        {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->setTitle($reporte);

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$reporte.'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');

        }else{
            // # Redireccionar a la página principal del controlador
            $this->functions->redir($config['site']['url'] . 'reagendamiento/gestiones');
        }

    }



    public function __construct(IRouter $router = null) {
        parent::__construct($router);
        $this->startDBConexion();
        $this->user=(new Model\Users)->getOwnerUser();
    }
    public function __destruct() {
        parent::__destruct();
        $this->endDBConexion();
    }
}
