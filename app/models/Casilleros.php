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

class Casilleros extends Models implements IModels {

    // Contenido del modelo...
    use DBModel;
    protected $user = array();
    /**
      * Devuelve un arreglo para la api
      *
      * @return array
    */
    public function verOrdenesCasilleros($fecha){
        return $this->db->query_select("SELECT
        c.id,
        c.n_orden,
        c.rut,
        c.comuna,
        c.actividad,
        c.accion,
        c.observacion,
        c.fecha,
        c.casillero,
        c.id_user,
        c.dia,
        z.descripcion,
        z.id_comuna
        FROM tbl_orden_casilleros c
        left join tblcomuna z
        ON c.comuna = z.nombre
        WHERE date(fecha)='$fecha' And id_user='$this->id_user'
        order by id");
    }
     public function verOrdenesCasillerosAll($fechaini,$fechafin){
        return $this->db->query_select("SELECT
        c.id,
        c.n_orden,
        c.rut,
        c.comuna,
        c.eps,
        c.actividad,
        c.accion,
        c.observacion,
        c.fecha,
        c.casillero,
        c.id_user,
        c.dia,
        z.descripcion,
        z.id_comuna,
        u.name,
        c.fecha,
        z.zona,
        z.empresa,
        e.descripcion_eps,
        ma.descripcion 'motivo_accion'
        FROM (((tbl_orden_casilleros c
        left JOIN tblcomuna z ON c.comuna = z.nombre)
        inner join users u on c.id_user=u.id_user)
        left join tbl_plataforma_motivos_casilleros ma on c.motivo_accion = ma.id)
        left join tbleps e on c.eps = e.codigo Where dia BETWEEN '$fechaini' and '$fechafin'
        Order By fecha,id");
    }
    public function verOrdenesCasillerosById(int $id, string $select = '*'){
        return $this->db->select($select,'tbl_orden_casilleros',"id='$id'",'LIMIT 1');
    }
    public function contarOrdenesCasilleros(){
        return $this->db->query_select("SELECT COUNT(*) FROM tbl_orden_casilleros WHERE `dia` = CURRENT_DATE");
    }
    public function eliminarCasillero(){
        try{
            global $http;
            $nOrden = $http->request->get('Norden');
            $this->db->delete('tbl_orden_casilleros',"id='$nOrden'",'LIMIT 1');
            return array('success' => 1, 'message'=> 'Casillero Eliminado.');
        }catch (ModelsException $e) {
             return array('success' => 0, 'message' => $e->getMessage());
        }
    }
    public function getUltimoCasillero($id_user){
        $result = $this->db->query_select("Select casillero from tbl_orden_casilleros where id_user='$id_user' order by id desc limit 1");
        return $result[0]['casillero'];
    }
    public function agregarCasillero(){
        try{
            global $http;

            $nOrden         =   str_replace('.','',$http->request->get('nOrden'));
            $nOrden         =   str_replace(',','',$nOrden);
            $rut            =   $http->request->get('rut');
            $comuna         =   $http->request->get('comuna');
            $eps            =   $http->request->get('opcioneps');
            $actividad      =   $http->request->get('actividad');
            $accion         =   $http->request->get('accion');
            $observacion    =   $http->request->get('observacion');
            $casillero      =   $http->request->get('casillero');
            $motivo         =   $http->request->get('motivo');
            if ($motivo == "--"){
                throw new ModelsException('Debe seleccionar un motivo valido...');
            }

            $result = $this->db->query_select("select id_comuna from tblcomuna where nombre='$comuna' limit 1");
            if (false == $result){
                throw new ModelsException('Codigo de comuna no valido...');
            }

            if(strlen($nOrden) != 9){
                throw new ModelsException('Largo de numero de orden no valido');
            }

            # Verificar que no están vacíos
            if ($this->functions->e($observacion,$rut,$nOrden)) {
                throw new ModelsException('Todos los datos son necesarios');
            }elseif ($actividad == '--' || $accion == '--'){
                throw new ModelsException('Debe seleccionar una opcion y no dejar la opcion "--" ');
            }
            $datos=$this->db->query_select("select validate_rut('$rut')");
            if($datos[0][0]==0){
                return array('success' => 0, 'message' => 'Rut no valido:'.$rut );
            }

            $this->db->insert('tbl_orden_casilleros', array(
                'n_orden'       => $nOrden,
                'rut	'       => $rut,
                'comuna'        => $comuna,
                'eps'           => $eps,
                'actividad'     => $actividad,
                'accion'        => $accion,
                'observacion'   => $observacion,
                'casillero'     => $casillero,
                'id_user'       => $this->id_user,
                'motivo_accion' => $motivo,
                'dia'           => date('Y-m-d')
            ));

            return array('success' => 1, 'message' => 'Guardado con exito');
        }catch (ModelsException $e) {
             return array('success' => 0, 'message' => $e->getMessage());
        }
    }
    public function editarCasillero(){
        try{
            global $http;

            $nOrden         = $http->request->get('nOrden');
            $rut            = $http->request->get('rut');
            $comuna         = strtoupper($http->request->get('comuna'));
            $actividad      = $http->request->get('actividad');
            $accion         = $http->request->get('accion');
            $observacion    = $http->request->get('observacion');
            $id             = $http->request->get('id');
            $casillero      = strtoupper($http->request->get('casillero'));
            $motivo         = $http->request->get('motivo');
            if ($motivo == "--"){
                throw new ModelsException('Debe seleccionar un motivo valido...');
            }

            # Verificar que no están vacíos
            if ($this->functions->e($observacion,$rut,$nOrden)) {
                throw new ModelsException('Todos los datos son necesarios');
            }elseif ($actividad == '--' || $accion == '--'){
                throw new ModelsException('Debe seleccionar una opcion y no dejar la opcion "--" ');
            }

            $result = $this->db->query_select("select id_comuna from tblcomuna where nombre='$comuna' limit 1");
            if (false == $result){
                throw new ModelsException('Codigo de comuna no valido...');
            }

            $this->db->update('tbl_orden_casilleros', array(
                'n_orden'       => $nOrden,
                'rut'           => $rut,
                'comuna'        => $comuna,
                'actividad'     => $actividad,
                'accion'        => $accion,
                'motivo_accion' => $motivo,
                'observacion'   => $observacion,
                'casillero'     => $casillero
            ),"id='$id'");

            return array('success' => 1, 'message' => 'Casillero modificado con exito');
            }catch (ModelsException $e) {
                return array('success' => 0, 'message' => $e->getMessage());
            }
    }
    public function casilleros_filtrar_todas_ordenes(){
        global $http;
        $fechadesde=$http->request->get('fechaI');
        $fechahasta=$http->request->get('fechaF');
        $registros=$this->verOrdenesCasillerosAll($fechadesde,$fechahasta);

        if ($registros == false){
            return array('success' => 0, 'message' => "Sin Datos");
        }else{
            $json = array(
                "aaData"=>array(
                )
            );
            try {
                $numero=0;
                foreach ($registros as $key => $value) {
                    $numero++;
                    $html ="<a data-toggle='tooltip' data-placement='top' id='visualizar' name='visualizar' title='Ver Observacion' class='btn btn-primary btn-sm' onclick=\"visualizar(".$value['id'].");\">
                        <i class='glyphicon glyphicon-eye-open'></i>
                    </a>";
                    $json['aaData'][]= array($numero,$value['n_orden'],$value['rut'],$value['descripcion'],$value['actividad'],$value['accion'],$value['casillero'],$value['fecha'],$html);
                }
                $jsonencoded = json_encode($json,JSON_UNESCAPED_UNICODE);
                $fh = fopen(API_INTERFACE . "views/app/temp/result_cons_".$this->user['id_user'].".dbj", 'w');
                fwrite($fh, $jsonencoded);
                fclose($fh);
                return array('success' => 1, 'message' => "result_cons_".$this->user['id_user'].".dbj" );
            } catch (\Exception $e) {
                return array('success' => 0, 'message' => "Error Inesperado" );
            }
        }
    }
    public function exporta_excel_casilleros() {
          global $config,$http;
          $fechadesde=$http->query->get('desde');
          $fechahasta=$http->query->get('hasta');

          $objPHPExcel = new PHPExcel();

          //Informacion del excel
          $objPHPExcel->getProperties() ->setCreator("Felipe Andrade V.")
                                        ->setLastModifiedBy("FAV")
                                        ->setTitle("Casilleros");
          //encabezado
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Numero Orden')
                                              ->setCellValue('B1', 'RUT Cliente')
                                              ->setCellValue('C1', 'Comuna')
                                              ->setCellValue('D1', 'Actividad')
                                              ->setCellValue('E1', 'Accion')
                                              ->setCellValue('F1', 'motivo')
                                              ->setCellValue('G1', 'Casillero')
                                              ->setCellValue('H1', 'Fecha')
                                              ->setCellValue('I1', 'Ejecutivo')
                                              ->setCellValue('J1', 'Zona')
                                              ->setCellValue('K1', 'Empresa')
                                              ->setCellValue('L1', 'Observacion');


          $objPHPExcel->getActiveSheet()->setTitle('Gestion Casilleros');
          $u = $this->verOrdenesCasillerosAll($fechadesde,$fechahasta);
          $fila = 2;
          if(false != $u){
              foreach ($u as $value => $data) {
                  $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$fila, $data['n_orden'])
                                                      ->setCellValue('B'.$fila, $data['rut'])
                                                      ->setCellValue('C'.$fila, $data['descripcion'])
                                                      ->setCellValue('D'.$fila, $data['actividad'])
                                                      ->setCellValue('E'.$fila, $data['accion'])
                                                      ->setCellValue('F'.$fila, $data['motivo_accion'])
                                                      ->setCellValue('G'.$fila, $data['casillero'])
                                                      ->setCellValue('H'.$fila, $data['fecha'])
                                                      ->setCellValue('I'.$fila, $data['name'])
                                                      ->setCellValue('J'.$fila, $data['zona'])
                                                      ->setCellValue('K'.$fila, $data['descripcion_eps'])
                                                      ->setCellValue('L'.$fila, $data['observacion']);
                  $fila++;
              }
          }
          //autisize para las columna
          foreach(range('A','K') as $columnID)
          {
              $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
          }

          $objPHPExcel->setActiveSheetIndex(0);

          $objPHPExcel->getActiveSheet()->setTitle('listado_casilleros');

          // Redirect output to a client’s web browser (Excel2007)
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment;filename="listado_casilleros.xlsx"');
          header('Cache-Control: max-age=0');
          // If you're serving to IE 9, then the following may be needed
          header('Cache-Control: max-age=1');

          // If you're serving to IE over SSL, then the following may be needed
          header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
          header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
          header ('Pragma: public'); // HTTP/1.0

          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
          $objWriter->save('php://output');
      }
    public function visualizarCasillero($select = '*'){
        global $http;
        $nOrden = $http->request->get('Norden');

        $consulta = $this->db->select($select,'tbl_orden_casilleros',"id='$nOrden'",'LIMIT 1');
        $timestamp = $consulta[0]['fecha'];

        $user = (new Model\users)->getUserById($consulta[0]['id_user']);
        $user = $user[0]['name'];

        $splitTimeStamp = explode(" ",$timestamp);
        $fecha = $splitTimeStamp[0];
        $hora = $splitTimeStamp[1];

        $html="<h4 class='text-center'>
            ".$consulta[0]['observacion']."
            </h4>
            <h4>
            <br>Acción: ".$consulta[0]['accion'];

        if($consulta[0]['motivo_accion'] != '0'){

            $motivo = (new Model\MdlPlataformaMaestros)->getMotivosCasilleros($consulta[0]['motivo_accion']);
            $html.="<br>Motivo: ".$motivo[0]['descripcion'];
        }

        $html.="
                    <br>Usuario: ".$user."
                    <br>Fecha: ".$fecha."
                    <br>Hora: ".$hora."
                </h4>";

        return array('success' => 1, 'html'=> $html);
    }
    public function getMotivoAccionCasilleros(string $acciondirecta=""){
        if ($acciondirecta != ""){
            $accion = $acciondirecta;
            $result = $this->db->query_select('select id,accion,descripcion,estado from tbl_plataforma_motivos_casilleros where accion="'.$accion.'" and estado=1');
            return $result;
        }else{
            global $http;
            $accion=$http->request->get('accion');
            $result = $this->db->query_select('select id,accion,descripcion,estado from tbl_plataforma_motivos_casilleros where accion="'.$accion.'" and estado=1');
            if (false == $result){
                return array('success' => '0');
            }else{
                $html ="<label>Motivo:</label><select name='motivo' id='motivo' class='form-control'>
                    <option value='--' selected='selected'>--</option>";
                    foreach ($result as $key => $value) {
                        $html.="<option value='".$value['id']."'>".$value['descripcion']."</option>";
                    }
                $html.="</select>";
                return array('success' => '1', 'data' => $html);
            }
        }
    }
    public function getResumenGestionEjecutivos($desde,$hasta){
        $sql="select c.id_user,u.name,c.accion,count(c.id_user) cantidad from (tbl_orden_casilleros c inner join users u on c.id_user=u.id_user) where dia BETWEEN '$desde' and '$hasta' group by c.id_user,c.accion order by u.name";
        return $this->db->query_select($sql);
    }
    public function getTotalesGestionEjecutivos($desde,$hasta){
        $sql="select c.accion,count(c.id_user) cantidad from (tbl_orden_casilleros c) where dia BETWEEN '$desde' and '$hasta' group by c.accion order by c.accion";
        return $this->db->query_select($sql);
    }
    public function getEjecutivosCasilleros($desde,$hasta){
        $sql="select c.id_user,u.name from (tbl_orden_casilleros c inner join users u on c.id_user=u.id_user) where dia BETWEEN '$desde' and '$hasta' group by c.id_user order by u.name";
        return $this->db->query_select($sql);
    }
    public function getQueryProducciondia($desde,$hasta){

        $result_grafico = $this->db->query_select("select dia,accion,count(id) cantidad from tbl_orden_casilleros where dia BETWEEN '$desde' and '$hasta' group by dia,accion");
        $result_tabla = $this->db->query_select("select g.dia,count(g.id) cantidad,(select count(id) cantidad from tbl_orden_casilleros a where a.dia=g.dia and a.accion='Anulacion') anulaciones from tbl_orden_casilleros g where g.dia BETWEEN '$desde' and '$hasta' group by g.dia");

        return array('result_grafico' => $result_grafico, 'result_tabla' => $result_tabla );
    }
    public function getGraficoProducciondia(){
        global $http;
        $desde=$http->request->get('desde');
        $hasta=$http->request->get('hasta');

        $filtro=$this->getQueryProducciondia($desde,$hasta);
        $result_tabla = $filtro['result_tabla'];

        unset($pend_valores_test);
        $html="<table class='table table-bordered'>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Gestiones</th>
                <th>Anulaciones</th>
                <th>% Anulacion</th>
            </tr>
        </thead>
        <tbody>";
            if (false != $result_tabla){
                foreach ($result_tabla as $key => $value) {
                    $html.="<tr>";
                        $html.="<td>".$value['dia']."</td>";
                        $html.="<td>".$value['cantidad']."</td>";
                        $html.="<td>".$value['anulaciones']."</td>";
                        $html.="<td>".ceil(($value['anulaciones']/$value['cantidad'])*100)."%</td>";
                    $html.="</tr>";
                }
            }
        $html.="
        </tbody>
        </table>";
        $result_grafico =  $filtro['result_grafico'];

        if (false != $result_grafico){
            foreach ($result_grafico as $key => $value) {
                $pend_valores_test[]=array("x" => $value['dia'], "y" => $value['cantidad'],"z" => $value['accion']);
            }
        }

        if (isset($pend_valores_test)){
            return array('success' => 1, 'html'=>$html, 'json'=>$pend_valores_test);
        }else{
            return array('success' => 1, 'message'=>'error sistema');
        }
    }

    public function cargareps(){
      global $http;
      $comuna=$http->request->get("comuna");
      if ($comuna==false) {
          $html="<label>EPS</label>
                 <select id='opcioneps' name='opcioneps' class='form-control'>
                   <option value='0'>--</option>
                 </select>";
                 return array("success"=>0,"html"=>$html);
      }else{
          $eps=$this->db->query_select("select * from tbleps where casilleros=1");
          $html="<label>EPS</label>
              <select id='opcioneps' name='opcioneps' class='form-control'>
                <option value='0'>--</option>";
                foreach ($eps as $key => $value) {
                    $html.="<option value=".$value['codigo'].">".$value['descripcion_eps']."</option>";
                }
          $html.="</select>";

          return array("success"=>1,"html"=>$html);
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
