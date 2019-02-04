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

class B2b extends Models implements IModels {

    // Contenido del modelo...
    use DBModel;
    protected $user = array();

    /**
      * Devuelve un arreglo para la api
      *
      * @return array
    */
    public function cargar_excel(){
        global $http;

        $file = $http->files->get('excel');

        $docname="";
        if (null !== $file ){
            $ext_doc = strtolower($file->getClientOriginalExtension());

            if ($ext_doc<>'xlsx') return array('success' => 0, 'message' => "Debe seleccionar un archivo XLSX valido...");

            $docname = 'cargaturno.'.$ext_doc;

            $file->move(API_INTERFACE . 'views/app/temp/', $docname);

            $archivo = API_INTERFACE . 'views/app/temp/'. $docname;
            //carga del excelname
            $objReader = new PHPExcel_Reader_Excel2007();
            $objPHPExcel = $objReader->load($archivo);

            $i=2;
            $param=0;
            $celdablanco = 0;
            $this->db->query_select('truncate tmpb2baltas');

            $count=0;$max_insert=50;$sql_value="";
            $sql_insert="Insert into tmpb2baltas values";
            while($param==0){
                try {

                    if ($objPHPExcel->getActiveSheet()->getCell('A'.$i)->getvalue()!=NULL && $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getvalue()!="-" ){

                        if ($count!=0){$sql_value.=",";}

                        // $objPHPExcel->getActiveSheet()->getStyle('A'.$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD);
                        // $fecha=$objPHPExcel->getActiveSheet()->getCell('A'.$i)->getFormattedValue();
                        // $fecha = explode('-',$fecha);
                        // $DIA_BASE = implode("",$fecha);
                        $DIA_BASE = date('Ymd');

                        $objPHPExcel->getActiveSheet()->getStyle('B'.$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2);
                        $fecha=$objPHPExcel->getActiveSheet()->getCell('B'.$i)->getFormattedValue();
                        $fecha = explode('-',$fecha);
                        $FECHA_INGRESO = implode("",$fecha);

                        $objPHPExcel->getActiveSheet()->getStyle('C'.$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2);
                        $fecha=$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getFormattedValue();
                        $fecha = explode('-',$fecha);
                        $ULTIMA_AGENDA = implode("",$fecha);


                        $HORARIO_COMPROMISO = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getvalue();
                        $IDEN_TRANSAC = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getvalue();
                        $RUT_PERSONA = substr($objPHPExcel->getActiveSheet()->getCell('F'.$i)->getvalue(),0,12);
                        $TRAMO_PENDIENTE = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getvalue();
                        $AG = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getvalue();
                        $ZONA = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getvalue();
                        $COMUNA = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getvalue();
                        $REAGENDAMIENTOS = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getvalue();
                        $EMPRESA_FINAL = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getvalue();

                        $count++;


                        $sql_value=$sql_value."('$RUT_PERSONA','$IDEN_TRANSAC',$DIA_BASE,$FECHA_INGRESO,$ULTIMA_AGENDA,'$HORARIO_COMPROMISO','$TRAMO_PENDIENTE','$AG','$ZONA','$COMUNA','$REAGENDAMIENTOS','$EMPRESA_FINAL')";
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

            $result = $this->db->query_select("select count(RUT_PERSONA) cuenta from tmpb2baltas");
            if (false != $result){

                if ( $result[0]['cuenta'] > '0' ){
                    //guardo en registro de carga de archivos
                    $this->db->Insert('tbl_historialarchivoscargados', array(
                        'app'=>'Carga de Altas',
                        'nombre_archivo'=> $file->getClientOriginalName(),
                        'id_user' => $this->user['id_user'],
                        'q_registros' => $result[0]['cuenta']
                    ));

                    if (Files::delete_file(API_INTERFACE . 'views/app/temp/'.$docname)){
                        return array('success' => 1, 'message' => $result[0]['cuenta']." Registros validos cargados Exitosamente..." );
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
    public function getTMP_Q_BaseAltas(){
        $result = $this->db->query_select('select count(*) cantidad from tmpb2baltas');
        if (false != $result){
            return $result[0];
        }else {
            return array('cantidad' => '0');
        }

    }
    public function getTMP_ALL_BaseAltas(){
        $result = $this->db->query_select('select * from tmpb2baltas');

        if ($result === false){
            return array('success' => 0, 'message' => 'Sin Datos');
        }else{
            $json = array(
            "aaData"=>array(
            )
            );
            foreach ($result as $key => $value) {
                $json['aaData'][] = array($value['DIA_BASE'],$value['FECHA_INGRESO'],$value['ULTIMA_AGENDA'],$value['HORARIO_COMPROMISO'],$value['IDEN_TRANSAC'],$value['RUT_PERSONA'],$value['TRAMO_PENDIENTE'],$value['AG'],$value['ZONA'],$value['COMUNA'],$value['REAGENDAMIENTOS'],$value['EMPRESA_FINAL']);
            }
        }
        $jsonencoded = json_encode($json,JSON_UNESCAPED_UNICODE);
        $fh = fopen(API_INTERFACE . "views/app/temp/result_cons_".$this->user['id_user'].".dbj", 'w');
        fwrite($fh, $jsonencoded);
        fclose($fh);
        return array('success' => 1, 'message' => "result_cons_".$this->user['id_user'].".dbj" );

    }
    public function TraspasarsOrdenesTMP_ALTAS(){
        try {
            //actualizo Ordenes
            //$this->db->query_select("update tblb2baltas pb inner join tmpb2baltas pbt on pb.IDEN_TRANSAC=pbt.IDEN_TRANSAC Set pb.DIA_BASE=pbt.DIA_BASE,pb.ULTIMA_AGENDA=pbt.ULTIMA_AGENDA,pb.HORARIO_COMPROMISO=pbt.HORARIO_COMPROMISO,pb.TRAMO_PENDIENTE=pbt.TRAMO_PENDIENTE,pb.AG=pbt.AG,pb.ZONA=pbt.ZONA,pb.COMUNA=pbt.COMUNA,pb.REAGENDAMIENTOS=pbt.REAGENDAMIENTOS,pb.EMPRESA_FINAL=pbt.EMPRESA_FINAL,pb.ESTADO_ACTUAL='PENDIENTE' ");
            //F1 a las que no vienen en la base nueva
            $this->db->query_select("Update tblb2baltas Set ESTADO_ACTUAL='F1'  where ESTADO_ACTUAL='PENDIENTE'");
            //BORRO ORDENES DEL TMP QUE YA ESTAN EN LA BASE
            //$this->db->query_select("Delete from tmpb2baltas where IDEN_TRANSAC in (Select IDEN_TRANSAC from tblb2baltas) ");
            //MUEVO TODAS LAS ORDENES nuevas
            $this->db->query_select("INSERT INTO tblb2baltas(RUT_PERSONA,IDEN_TRANSAC,DIA_BASE,FECHA_INGRESO,ULTIMA_AGENDA,HORARIO_COMPROMISO,TRAMO_PENDIENTE,AG,ZONA,COMUNA,REAGENDAMIENTOS,EMPRESA_FINAL)
                                    SELECT RUT_PERSONA,IDEN_TRANSAC,DIA_BASE,FECHA_INGRESO,ULTIMA_AGENDA,HORARIO_COMPROMISO,TRAMO_PENDIENTE,AG,ZONA,COMUNA,REAGENDAMIENTOS,EMPRESA_FINAL FROM tmpb2baltas");
            //Dejo el hoy Pendiente
            //$this->db->query_select("Update tblb2baltas Set CLASIFICACION_PENDIENTE='0'  where ESTADO_ACTUAL='PENDIENTE' And ULTIMA_AGENDA=date(now())");
            //VACIO TMP
            $this->db->query_select('TRUNCATE tmpb2baltas');
        } catch (\Exception $e) {
            return array('success' => 0, 'message' => $e->getMessage() );
        }
        return array('success' => 1, 'message' => "ORDENES CARGADAS" );
    }
    public function getHORARIO_COMPROMISO(){
        return $this->db->query_select("select HORARIO_COMPROMISO,count(*) q from tblb2baltas where ESTADO_ACTUAL='PENDIENTE' and ULTIMA_AGENDA=date(now()) group by HORARIO_COMPROMISO");
    }
    public function getResumenOrdenesAltasSeguimiento($where){
        return $this->db->query_select("select CLASIFICACION_PENDIENTE,mp.descripcion DESC_PENDIENTE,count(iden_transac) q from tblb2baltas ba left join tblmotivospendientesseguimiento mp on ba.CLASIFICACION_PENDIENTE=mp.id and mp.seguimiento='ALTAS' where estado_actual='PENDIENTE' and ".$where." group by mp.descripcion Order By EMPRESA_FINAL,ZONA,COMUNA,HORARIO_COMPROMISO");
    }

    public function getOrdenesSeguimientoAltas(){
        global $http;

        $clasificacion_pendiente=$http->request->get('clasificacion_pendiente');
        $base=$http->request->get('tabla');
        $bloque=$http->request->get('bloque');

        if ($base == 'HOY'){
            $base = 'ULTIMA_AGENDA="'.date('Ymd').'"';
        }elseif ($base == 'ATRASADO'){
            $base = 'ULTIMA_AGENDA<"'.date('Ymd').'"';
        }elseif ($base == 'FUTURO'){
            $base = 'ULTIMA_AGENDA>"'.date('Ymd').'"';
        }

        $filtro_clasificacion_pendiente = "";
        if($clasificacion_pendiente != -1){
            $filtro_clasificacion_pendiente = " and CLASIFICACION_PENDIENTE = '".$clasificacion_pendiente."'";
        }

        $flitro_bloque ="";
        if($bloque != "undefined" && $bloque != "TODOS" && $bloque != "" ){
            $flitro_bloque =" and HORARIO_COMPROMISO = '".$bloque."'";
        }

        $sql = 'select ba.id,ESTADO_FLUJO,FECHA_INGRESO,ULTIMA_AGENDA,HORARIO_COMPROMISO,IDEN_TRANSAC,RUT_PERSONA,COMUNA,REAGENDAMIENTOS,OBSERVACION,CLASIFICACION_PENDIENTE,mp.descripcion,ZONA,EMPRESA_FINAL,ULTIMA_MODIFICACION from tblb2baltas ba left join tblmotivospendientesseguimiento mp on ba.CLASIFICACION_PENDIENTE=mp.id where estado_actual="PENDIENTE" and '.$base.' '.$filtro_clasificacion_pendiente.' '.$flitro_bloque;
        $result = $this->db->query_select($sql);
        if ($result === false){
            return array('success' => 0, 'message' => $sql);
        }else{
            $json = array(
            "aaData"=>array(
            )
            );
            foreach ($result as $key => $value) {
                if( $value['ESTADO_FLUJO'] == 'PD'){
                    $html_flujo = "<span class='label label-primary' >".$value['ESTADO_FLUJO']."</span>";
                }else {
                    $html_flujo = "<span  class='label label-danger'>".$value['ESTADO_FLUJO']."</span>";
                }

                if( $value['REAGENDAMIENTOS'] == '1'){
                    $html_reagenda = "<span class='label label-success'>".$value['REAGENDAMIENTOS']."</span>";
                }else {
                    $html_reagenda = "<span class='label label-warning'>".$value['REAGENDAMIENTOS']."</span>";
                }

                $html_pendiente = "<td><select id='motivopendiente-".$value['id']."' name='motivopendiente-".$value['id']."' onchange=\"updateEstadoOrdenAltas('".$value['id']."')\">
                                    ";
                $result_pendiente = $this->getAll_db_motivopendiente('ALTAS','1');
                foreach ($result_pendiente as $key2 => $value2) {
                    if( $value['CLASIFICACION_PENDIENTE'] == $value2['id'] ){
                        $html_pendiente.="<option value='".$value2['id']."' selected> ".$value2['descripcion']." </option>";
                    }else{
                        $html_pendiente.="<option value='".$value2['id']."'> ".$value2['descripcion']." </option>";
                    }

                }
                $html_pendiente.="</select></td>";

                $html_observacion="<td><input type='text' id='observacion-".$value['id']."' name='observacion-".$value['id']."' value='".$value['OBSERVACION']."' onchange=\"updateEstadoOrdenAltas('".$value['id']."')\"></td>";

                $html_operacion = "<select id='operacion-".$value['id']."' name=id='operacion-".$value['id']."' onchange=\"operacionFinalAltas('".$value['id']."')\">
                                    <option> PENDIENTE </option>
                                    <option> FINALIZAR </option>
                                    <option> ANULAR </option>
                                    </select>";

                $json['aaData'][] = array($html_flujo,$value['FECHA_INGRESO'],$value['ULTIMA_AGENDA'],$value['HORARIO_COMPROMISO'],$value['IDEN_TRANSAC'],$value['RUT_PERSONA'],$value['COMUNA'],$value['ZONA'],$value['EMPRESA_FINAL'],$html_reagenda,$value['ULTIMA_MODIFICACION'],$html_pendiente,$html_observacion,$html_operacion);
            }
        }

        $jsonencoded = json_encode($json,JSON_UNESCAPED_UNICODE);
        $fh = fopen(API_INTERFACE . "views/app/temp/result_cons_".$this->user['id_user'].".dbj", 'w');
        fwrite($fh, $jsonencoded);
        fclose($fh);
        return array('success' => 1, 'message' => "result_cons_".$this->user['id_user'].".dbj" );
    }
    public function updateEstadoOrdenAltas(){
        global $http;

        $id=$http->request->get('id');
        $estado=$http->request->get('estado');
        $observacion=$http->request->get('observacion');

        $this->db->update('tblb2baltas',array(
            'id_ejecutivo' => $this->user['id_user'],
            'CLASIFICACION_PENDIENTE'=>$estado,
            'observacion'=>strtoupper($observacion)
        ),"id='$id'");
        return array('success' => 1, 'message' => 'Modificacion exitosa');
    }
    public function selectBloqueHoySeguimiento(){
        global $http;

        $bloque=$http->request->get('bloque');

        if($bloque == "TODOS" || $bloque == ""){
            $result = $this->getResumenOrdenesAltasSeguimiento('ULTIMA_AGENDA="'.date('Ymd').'"');
        }else{
            $result = $this->getResumenOrdenesAltasSeguimiento('ULTIMA_AGENDA="'.date('Ymd').'" and HORARIO_COMPROMISO="'.$bloque.'" ');
        }

        if($result == false){
            return array('success' => 0, 'message' => 'Sin Datos');
        }else{
            $html='<table class="table table-bordered">
                    <thead>
                        <th>Motivo Pendiente</th>
                        <th>Q</th>
                    </thead>
                    <tbody>';
                    foreach ($result as $key => $value) {
                    $html.="<tr>
                            <td>".$value['DESC_PENDIENTE']."</td>
                            <td><a href='#' data-toggle='modal' data-target='#verTablaAltas' onclick=\"carga_ordenes_tabla_modal('HOY','".$value['CLASIFICACION_PENDIENTE']."','".$bloque."');\">".$value['q']."</a></td>
                            </tr>";
                    }
            $html.='</tbody>
                    </table>';
            return array('success' => 1, 'message' =>$html);
        }

    }
    public function operacionFinalAltas(){
        global $http;

        $id=$http->request->get('id');
        $operacion=$http->request->get('operacion');

        if($operacion == 'ANULAR'){
            $this->db->update('tblb2baltas',array(
                'id_ejecutivo' => $this->user['id_user'],
                'ESTADO_ACTUAL'=> 'ANULADA',
                'CUMPLIMIENTO'=> 'NO CUMPLE',
                'MOTIVO_INCUMPLIMIENTO' => '0'
            ),"id='$id'");
            return array('success' => 2, 'message' => 'Orden Anulada');
        }elseif($operacion == 'FINALIZAR'){
            $html = "<form id='Cumplimiento_form' name='Cumplimiento_form'>
                        <table class='table table-bordered'>
                            <tr>
                                <td>CUMPLIMIENTO :</td>
                                <td>
                                    <select id='select_cumplimiento' name='select_cumplimiento' onchange=\"showselectmotivoincumplimiento();\">
                                        <option> CUMPLE </option>
                                        <option> NO CUMPLE </option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>OBSERVACIÓN :</td><td><input type='text' id='observacion_cumplimiento' name=='observacion_cumplimiento'></td>
                            </tr>

                            <tr >
                                <td>MOTIVO INCUMPLIMIENTO :</td>
                                <td>
                                    <select style='display: none;' id='select_motivoincumplimiento' name='select_motivoincumplimiento'>
                                        <option> -- </option>";
                                        $result = $this->getAll_db_motivoincumplimiento('ALTAS','1');
                                        foreach ($result as $key => $value) {
                                            $html.="<option value='".$value['id']."'>".$value['descripcion']."</option>";
                                        }
                                    $html.="
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </form>
            ";


            return array('success' => 1, 'message' => 'Finalizar Orden', 'html' => $html);
        }
    }
    public function operacionFinalAltas_Finalizar(){
        global $http;

        $id=$http->request->get('id');
        $estado=$http->request->get('estado');
        $observacion=$http->request->get('observacion');

        $cumplimiento=$http->request->get('cumplimiento');
        $observacion_cumple=$http->request->get('observacion_cumple');
        $motivo=$http->request->get('motivo');
        try {
            # Verificar que no están vacíos
            if($this->functions->e($observacion_cumple)) {
                throw new ModelsException('Para Finalizar es necesario que registre observacion.');
            }elseif($this->functions->e($motivo)) {
                throw new ModelsException('Para Finalizar es necesario que motivo de Incumplimiento');
            }

            $this->db->update('tblb2baltas',array(
                'id_ejecutivo' => $this->user['id_user'],
                'ESTADO_ACTUAL'=> 'FINALIZADA',
                'CUMPLIMIENTO'=> $cumplimiento,
                'MOTIVO_INCUMPLIMIENTO' => $motivo,
                'observacion_cumplimiento' => strtoupper($observacion_cumple),
                'CLASIFICACION_PENDIENTE'=> $estado,
                'observacion'=>strtoupper($observacion)
            ),"id='$id'");

            return array('success' => 1, 'message' => 'Orden Finalizada');
        }catch (ModelsException $e) {
            return array('success' => 0, 'message' => $e->getMessage());
        }
    }

//--Principal
    public function getResumenGestionCompromisoHoy($fecha){
        $sql = "select tba.estado_actual,count(tba.IDEN_TRANSAC) q from (tblb2baltas tba ) where tba.ESTADO_ACTUAL <> 'F1' AND tba.ULTIMA_AGENDA='".$fecha."' group by tba.estado_actual";
        return $this->db->query_select($sql);
    }
    public function getResumenGestionCompromisoHoyBloques($fecha){
        $sql = "select tba.HORARIO_COMPROMISO,tba.estado_actual,count(tba.IDEN_TRANSAC) q from (tblb2baltas tba ) where tba.ESTADO_ACTUAL <> 'F1' AND tba.ULTIMA_AGENDA='".$fecha."' group by tba.HORARIO_COMPROMISO,tba.estado_actual";
        return $this->db->query_select($sql);
    }

//--Reporteria
    public function exporta_excel_b2b_Altas_hoy(){
        global $config;
        global $http;

        $reporte=$http->query->get('reporte');
        $filtro=$http->query->get('filtro');
        $filtro2=$http->query->get('filtro2');

        $sql="select ba.id,FECHA_INGRESO,ULTIMA_AGENDA,HORARIO_COMPROMISO,IDEN_TRANSAC,RUT_PERSONA,ZONA,COMUNA,REAGENDAMIENTOS,EMPRESA_FINAL,OBSERVACION,CLASIFICACION_PENDIENTE,mp.descripcion DESC_PENDIENTE,CUMPLIMIENTO,MOTIVO_INCUMPLIMIENTO,mis.grupo RESPONSABLE,mis.descripcion DESC_MOTIVOINCUMPLIMIENTO,OBSERVACION_CUMPLIMIENTO,ESTADO_ACTUAL,ULTIMA_MODIFICACION from (tblb2baltas ba left join tblmotivospendientesseguimiento mp on ba.CLASIFICACION_PENDIENTE=mp.id and mp.seguimiento='ALTAS') left join tblmotivosincumplimientosseguimiento mis on ba.MOTIVO_INCUMPLIMIENTO=mis.id and mis.seguimiento='ALTAS' ";
        if ($reporte == "HOY"){
            $sql.="where  ESTADO_ACTUAL <> 'F1' AND ULTIMA_AGENDA=date(now()) ";
            $reporte = "HOY";
        }elseif ($reporte == "HOY_0"){
            $sql.="where  ESTADO_ACTUAL <> 'F1' AND ULTIMA_AGENDA=date(now()) And REAGENDAMIENTOS=1 ";
            $reporte = "HOY_AGENDAMIENTO_0";
        }elseif ($reporte == "ATRASADO_HASTA"){
            $sql.="where ULTIMA_AGENDA<date(now()) and ESTADO_ACTUAL = 'PENDIENTE'";
            $reporte = "PENDIENTE_ATRASADO";
        }elseif ($reporte == "FINALIZADAS"){
            $sql.="where ESTADO_ACTUAL <> 'PENDIENTE' and ESTADO_ACTUAL <> 'F1' AND  ULTIMA_AGENDA between '".$filtro."' and '".$filtro2."' ";
            $reporte = "FINALIZADAS";
        }else{
            $sql.="where ULTIMA_AGENDA=date(now()) And HORARIO_COMPROMISO='".$filtro."' And ESTADO_ACTUAL='PENDIENTE' ";
            if ($reporte == "RIESGO"){
                $reporte = "HOY_RIESGO";
            }else{
                $reporte = "HOY_INCUMPLIMIENTO";
            }
        }
        $sql.="Order By EMPRESA_FINAL,ZONA,COMUNA,HORARIO_COMPROMISO";

        $t = $this->db->query_select($sql);
        if ( $t != false ){
            $objPHPExcel = new PHPExcel();
            //Informacion del excel
            $objPHPExcel->getProperties() ->setCreator("Jorge Jara H")
                                        ->setLastModifiedBy("JJH")
                                        ->setTitle($reporte);
            //encabezado
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'RUT_PERSONA');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'IDEN_TRANSAC');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'FECHA_INGRESO');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'ULTIMA_AGENDA');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'HORARIO_COMPROMISO');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'ZONA');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'COMUNA');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'REAGENDAMIENTOS');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'EMPRESA_FINAL');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', 'ESTADO_ACTUAL');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1', 'CLASIFICACION_PENDIENTE');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L1', 'OBSERVACION');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M1', 'CUMPLIMIENTO');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('N1', 'RESPONSABLE');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('O1', 'MOTIVO_CUMPLIMIENTO');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('P1', 'OBSERVACION_CUMPLIMIENTO');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q1', 'ULTIMA_REVISION');



            $fila = 2;
            foreach ($t as $value => $data) {
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$fila, $data['RUT_PERSONA']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$fila, $data['IDEN_TRANSAC']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$fila, $data['ULTIMA_AGENDA']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$fila, $data['FECHA_INGRESO']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$fila, $data['HORARIO_COMPROMISO']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$fila, $data['ZONA']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$fila, $data['COMUNA']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$fila, $data['REAGENDAMIENTOS']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$fila, $data['EMPRESA_FINAL']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$fila, $data['ESTADO_ACTUAL']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$fila, $data['DESC_PENDIENTE']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$fila, $data['OBSERVACION']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$fila, $data['CUMPLIMIENTO']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.$fila, $data['RESPONSABLE']);
                if($data['MOTIVO_INCUMPLIMIENTO'] != "--"){
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('O'.$fila, $data['DESC_MOTIVOINCUMPLIMIENTO']);
                }
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('P'.$fila, $data['OBSERVACION_CUMPLIMIENTO']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q'.$fila, $data['ULTIMA_MODIFICACION']);

                $fila++;
            }

            //autisize para las columna
            foreach(range('A','P') as $columnID)
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
            $this->functions->redir($config['site']['url'] . 'b2b/reporteria_altas');
        }
    }

//------------------------------------------------------------------------------
    public function getAll_db_motivopendiente($seguimiento,string $estado='-1'){
        $filtro = "";
        if ($estado != '-1'){
            $filtro = " and estado=".$estado;
        }
        return $this->db->query_select("select id,descripcion,estado from tblmotivospendientesseguimiento where seguimiento='".$seguimiento."' ".$filtro." order by id");
    }
    public function getMotivoPendientebyID($id){
        return $this->db->query_select("select id,descripcion,estado from tblmotivospendientesseguimiento where id='".$id."' limit 1");
    }
    public function master_register_motivopendiente(){
        try {
            global $http;

            # Obtener los datos $_POST
            $descripcion = $http->request->get('descripcion');

            # Verificar que no están vacíos
            if ($this->functions->e($descripcion)) {
                throw new ModelsException('Ingresar datos donde campos se especifica como Requerido');
            }
            # Registrar el bloque
            $this->db->insert('tblmotivospendientesseguimiento', array(
                'seguimiento' => 'ALTAS',
                'descripcion'=>strtoupper($descripcion)
            ));

            return array('success' => 1, 'message' => 'Registrado con éxito.');
        } catch (ModelsException $e) {
            return array('success' => 0, 'message' => $e->getMessage());
        }
    }
    public function master_editar_motivopendiente(){
        try {
            global $http;

            #Obtener los datos $_POST
            $id=$http->request->get('id_motivopendiente');
            $descripcion=$http->request->get('descripcion');

            # Verificar que no están vacíos
            if ($this->functions->e($descripcion)) {
                throw new ModelsException('Ingresar datos donde campos se especifica como Requerido');
            }

            $this->db->update('tblmotivospendientesseguimiento',array(
                'descripcion'=>strtoupper($descripcion)
            ),"id='$id'");
            //
            return array('success' => 1, 'message' => 'Modificacion exitosa');
        }catch (ModelsException $e) {
            return array('success' => 0, 'message' => $e->getMessage());
        }
    }
    public function update_estado_motivopendiente($id) {
        global $config;
        # Actualiza Estado
        $this->db->query("UPDATE tblmotivospendientesseguimiento SET estado=if(estado=0,1,0) WHERE id=$id LIMIT 1;");
        # Redireccionar a la página principal del controlador
        $this->functions->redir($config['site']['url'] . 'b2b/listar_motivopendiente');
    }


    public function getAll_db_motivoincumplimiento($seguimiento,string $estado='-1'){
        $filtro = "";
        if ($estado != '-1'){
            $filtro = " and estado=".$estado;
        }
        return $this->db->query_select("select id,descripcion,grupo,estado from tblmotivosincumplimientosseguimiento where seguimiento='".$seguimiento."' ".$filtro." order by id");
    }
    public function getMotivoInCumplimientobyID($id){
        return $this->db->query_select("select id,descripcion,grupo,estado from tblmotivosincumplimientosseguimiento where id='".$id."' limit 1");
    }
    public function master_register_motivoincumplimiento(){
        try {
            global $http;

            # Obtener los datos $_POST
            $descripcion = $http->request->get('descripcion');
            $grupo = $http->request->get('grupo');

            # Verificar que no están vacíos
            if ($this->functions->e($descripcion)) {
                throw new ModelsException('Ingresar datos donde campos se especifica como Requerido');
            }
            # Registrar el bloque
            $this->db->insert('tblmotivosincumplimientosseguimiento', array(
                'seguimiento' => 'ALTAS',
                'descripcion'=>strtoupper($descripcion),
                'grupo' => strtoupper($grupo)
            ));

            return array('success' => 1, 'message' => 'Registrado con éxito.');
        } catch (ModelsException $e) {
            return array('success' => 0, 'message' => $e->getMessage());
        }
    }
    public function master_editar_motivoincumplimiento(){
        try {
            global $http;

            #Obtener los datos $_POST
            $id=$http->request->get('id_motivoincumplimiento');
            $descripcion=$http->request->get('descripcion');
            $grupo = $http->request->get('grupo');

            # Verificar que no están vacíos
            if ($this->functions->e($descripcion)) {
                throw new ModelsException('Ingresar datos donde campos se especifica como Requerido');
            }

            $this->db->update('tblmotivosincumplimientosseguimiento',array(
                'descripcion'=>strtoupper($descripcion),
                'grupo' => strtoupper($grupo)
            ),"id='$id'");
            //
            return array('success' => 1, 'message' => 'Modificacion exitosa');
        }catch (ModelsException $e) {
            return array('success' => 0, 'message' => $e->getMessage());
        }
    }
    public function update_estado_motivoincumplimiento($id) {
        global $config;
        # Actualiza Estado
        $this->db->query("UPDATE tblmotivosincumplimientosseguimiento SET estado=if(estado=0,1,0) WHERE id=$id LIMIT 1;");
        # Redireccionar a la página principal del controlador
        $this->functions->redir($config['site']['url'] . 'b2b/listar_motivoincumplimiento');
    }
//------------------------------------------------------------------------------


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
