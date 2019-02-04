<?php

namespace app\models;

use app\models as Model;
use Ocrend\Kernel\Models\Models;
use Ocrend\Kernel\Models\IModels;
use Ocrend\Kernel\Models\ModelsException;
use Ocrend\Kernel\Models\Traits\DBModel;
use Ocrend\Kernel\Router\IRouter;
/**
 * Modelo Evento
 *
 * @author Jorge Jara H. <jjara@wys.cl>
 */
class Evento extends Models implements IModels {
    /**
      * Característica para establecer conexión con base de datos.
    */
    use DBModel;
    //instancia de clase usuario logg
    protected $user = array();

    public function crearEvento(){
        global $http;

        try {
            $campoFechaEvento       =   $http->request->get('fecha');
            $campoDescripcion       =   $http->request->get('iDescripcion');
            $campoHoraEvento        =   $http->request->get('hora');
            $campoObservacion       =   $http->request->get('observacion');
            $campoResponsable       =   $http->request->get('responsable_input');
            $campoAreaContingencia  =   $http->request->get('areaContingencia_input');
            $campoEstadoSelect      =   $http->request->get('estado_select');
            $campoCierreFecha       =   $http->request->get('fechaCierre');

            if($campoEstadoSelect == '1'){

            $sql=   "insert tblevento(  id_usuario,
                                        fecha_evento,
                                        hora_evento,
                                        descripcion_evento,
                                        observacion_evento,
                                        estado_evento,
                                        fecha_cierre)

                                        value(
                                        '".$this->user['id_user']."',
                                        '$campoFechaEvento',
                                        '$campoHoraEvento',
                                        '$campoDescripcion',
                                        '$campoObservacion',
                                        '$campoEstadoSelect',
                                        '$campoCierreFecha')";

            if($campoFechaEvento        == "" || $campoDescripcion == "" ||
                $campoHoraEvento        == "" || $campoObservacion == "" ||
                $campoEstadoSelect == ""){
                return array ('success' => 0, 'message' => 'debe llenar todos los campos');
            }

            $result =    $this->db->query_select($sql);

            $sql = "select id from tblevento where id_usuario ='".$this->user['id_user']."' order by id desc";
            $result = $this->db->query_select($sql);

            $id_evento = $result[0]['id'];

            $array_responsable = explode("|",$campoResponsable);

            foreach ($array_responsable as $key => $value) {
                if ($value != ""){
                    $this->db->insert("tbl_evento_responsables",array(
                        'evento_id' => $id_evento,
                        'responsable' => $value
                    ));
                }
            }

            $array_areaContingencia = explode("|",$campoAreaContingencia);
            foreach ($array_areaContingencia as $key => $value) {
                if ($value != ""){
                     $this->db->insert('tbl_evento_areas',array(
                         'evento_id'  =>  $id_evento,
                         'areas'     =>  $value
                ));
                }
            }
            if($this->functions->e($campoDescripcion,$campoResponsable, $campoFechaEvento
                                    , $campoHoraEvento, $campoAreaContingencia, $campoObservacion)){
                throw new \Exception("Todos los datos deben ser ingresados");
            }
            return array('success'=> 1, 'message' => 'Registro con exito');
        }else{
            $sql=   "insert tblevento(  id_usuario,
                                        fecha_evento,
                                        hora_evento,
                                        descripcion_evento,
                                        observacion_evento,
                                        estado_evento)

                                        value(
                                        '".$this->user['id_user']."',
                                        '$campoFechaEvento',
                                        '$campoHoraEvento',
                                        '$campoDescripcion',
                                        '$campoObservacion',
                                        '$campoEstadoSelect')";

            if($campoFechaEvento        == "" || $campoDescripcion == "" ||
                $campoHoraEvento        == "" || $campoObservacion == "" ){
                return array ('success' => 0, 'message' => 'debe llenar todos los campos');
            }

            $result =    $this->db->query_select($sql);

            $sql = "select id from tblevento where id_usuario ='".$this->user['id_user']."' order by id desc";
            $result = $this->db->query_select($sql);

            $id_evento = $result[0]['id'];

            $array_responsable = explode("|",$campoResponsable);

            foreach ($array_responsable as $key => $value) {
                if ($value != ""){
                    $this->db->insert("tbl_evento_responsables",array(
                        'evento_id' => $id_evento,
                        'responsable' => $value
                    ));
                }
            }

            $array_areaContingencia = explode("|",$campoAreaContingencia);
            foreach ($array_areaContingencia as $key => $value) {
                if ($value != ""){
                     $this->db->insert('tbl_evento_areas',array(
                         'evento_id'  =>  $id_evento,
                         'areas'     =>  $value
                ));
                }
            }
            if($this->functions->e($campoDescripcion,$campoResponsable, $campoFechaEvento
                                    , $campoHoraEvento, $campoAreaContingencia, $campoObservacion)){
                throw new \Exception("Todos los datos deben ser ingresados");
            }
            return array('success'=> 1, 'message' => 'Registro con exito');
        }
        } catch (\Exception $e) {
            return array("success" => 0, 'message' => $e->getMessage());
        }
    }

    public function mostrarEventosTotales(){
         $sql = "SELECT *
                FROM tblevento t
                LEFT JOIN users u
                ON t.id_usuario = u.id_user";

        return $this->db->query_select($sql);
    }

    public function timeline(){
        $sql    =   "SELECT *
                    FROM tblevento T1 INNER JOIN users u  on u.id_user
                    WHERE t1.id_usuario = u.id_user
                    order by id desc";

        return $this->db->query_select($sql);
    }

    public function eliminar_evento():array{
        global $http;

        $valorX  =   $http->request->get('valorX');

        $sql = "select * from tblevento where id=".$valorX." and id_usuario=".$this->user['id_user'];
        $arrCtrl = $this->db->query_select($sql);
            if($arrCtrl){
                $sql    =   "delete from tblevento where id = '$valorX'";
                $this->db->query_select($sql);
                return array("success" => 1, 'message' => 'Se ha eliminado correctamente');
            }
            else{
                return array("success" => 0, 'message' => 'Error al eliminar');
            }
        return true;
    }

    public function getRegistroById($id, $tipo = null){
        $sql = "SELECT *
                FROM tblevento t1 INNER JOIN users u ON u.id_user
                WHERE t1.id_usuario = u.id_user AND t1.id = '$id'";
        if ($tipo == "listar") {
            return $this->db->query_select($sql);
        } else {
            $arrSql = $this->db->query_select($sql);
            return $arrSql[0];
        }
    }

    public function getRegistroArea($id){
        $sql = "SELECT *
                FROM tbl_evento_areas
                WHERE evento_id ='$id'";
        $result = $this->db->query_select($sql);
        return $result[0];
    }

    public function getResponsables($id){
        $sql = "SELECT *
                FROM tbl_evento_responsables
                WHERE evento_id = '$id'";
        $result = $this->db->query_select($sql);
        return $result;
    }

    public function getAreas($id){
    $sql = "SELECT *
        FROM tbl_evento_areas
        WHERE evento_id = '$id'";
    $result = $this->db->query_select($sql);
    return $result;
    }

    public function editar_evento(){
        global $http;

        $id                             =   $http->request->get('idEvento');
        $descripcion                    =   $http->request->get('descripcion');
        $observacion                    =   $http->request->get('observacion');
        $fechaEvento                    =   $http->request->get('fecha');
        $horaEvento                     =   $http->request->get('hora');
        $campoAreaContingencia          =   $http->request->get('areaModInput');
        $campoResponsable               =   $http->request->get('areaResInput');
        $estado                         =   $http->request->get('estado_select');
        $cierre_evento                  =   $http->request->get('cierreEvento');

        $sql = "select id from tblevento where id_usuario ='".$this->user['id_user']."' AND id=".$id;
        $result = $this->db->query_select($sql);

        if ($result AND $estado != '1') {
            $sql    =   "update tblevento set descripcion_evento = '$descripcion', fecha_evento = '$fechaEvento',
                        hora_evento = '$horaEvento', observacion_evento = '$observacion', estado_evento = '$estado'
                        WHERE id = '$id'";

            $this->db->query_select($sql);

            $arrayRes = explode("|",$campoResponsable);
            $sql2 = "SELECT responsable FROM tbl_evento_responsables WHERE evento_id = ".$id;
            $result2 = $this->db->query_select($sql2);
            $arrResp = array();
            foreach ($result2 as $k => $valor) {
                $arrResp[$k] = $valor[0];
            }
            $arrInsRes = array_diff($arrayRes, $arrResp);
            $arrDelRes = array_diff($arrResp, $arrayRes);

            if (count($arrInsRes) > 0) {
                foreach ($arrInsRes as $j => $valor) {
                    $this->db->insert('tbl_evento_responsables',array(
                        'evento_id' => $id,
                        'responsable' => $valor
                    ));
                }
            }
            if (count($arrDelRes) > 0) {
                foreach ($arrDelRes as $i => $valor) {
                    $this->db->delete("tbl_evento_responsables","evento_id=".$id." AND responsable='".$valor."'");
                }
            }

            $arrayAreas = explode("|", $campoAreaContingencia);
            $sql3 = "SELECT areas FROM tbl_evento_areas WHERE evento_id =".$id;
            $result3 = $this->db->query_select($sql3);
            $arrArea = array();
            foreach($result3 as $k =>$valor){
                $arrArea[$k] = $valor[0];
            }
            $arrInsArea = array_diff($arrayAreas, $arrArea);
            $arrDelArea = array_diff($arrArea, $arrayAreas);

            if(count($arrInsArea) > 0){
                foreach ($arrInsArea as $j => $valor) {
                    $this->db->insert('tbl_evento_areas',array(
                        'evento_id' => $id,
                        'areas' => $valor
                    ));
                }
            }
            if (count($arrDelArea) > 0) {
                foreach ($arrDelArea as $i => $valor) {
                    $this->db->delete("tbl_evento_areas","evento_id=".$id." AND areas='".$valor."'");
                }
            }

            return array("success" => 1, 'message' => 'modificacion exitosa');
        }
        else if($estado == '1'){
            $sql    =   "update tblevento set descripcion_evento = '$descripcion', fecha_evento = '$fechaEvento',
                        hora_evento = '$horaEvento', observacion_evento = '$observacion', estado_evento = '$estado',
                        fecha_cierre = '$cierre_evento' WHERE id = '$id'";

            $this->db->query_select($sql);

            $arrayRes = explode("|",$campoResponsable);
            $sql2 = "SELECT responsable FROM tbl_evento_responsables WHERE evento_id = ".$id;
            $result2 = $this->db->query_select($sql2);
            $arrResp = array();
            foreach ($result2 as $k => $valor) {
                $arrResp[$k] = $valor[0];
            }
            $arrInsRes = array_diff($arrayRes, $arrResp);
            $arrDelRes = array_diff($arrResp, $arrayRes);

            if (count($arrInsRes) > 0) {
                foreach ($arrInsRes as $j => $valor) {
                    $this->db->insert('tbl_evento_responsables',array(
                        'evento_id' => $id,
                        'responsable' => $valor
                    ));
                }
            }
            if (count($arrDelRes) > 0) {
                foreach ($arrDelRes as $i => $valor) {
                    $this->db->delete("tbl_evento_responsables","evento_id=".$id." AND responsable='".$valor."'");
                }
            }

            $arrayAreas = explode("|", $campoAreaContingencia);
            $sql3 = "SELECT areas FROM tbl_evento_areas WHERE evento_id =".$id;
            $result3 = $this->db->query_select($sql3);
            $arrArea = array();
            foreach($result3 as $k =>$valor){
                $arrArea[$k] = $valor[0];
            }
            $arrInsArea = array_diff($arrayAreas, $arrArea);
            $arrDelArea = array_diff($arrArea, $arrayAreas);

            if(count($arrInsArea) > 0){
                foreach ($arrInsArea as $j => $valor) {
                    $this->db->insert('tbl_evento_areas',array(
                        'evento_id' => $id,
                        'areas' => $valor
                    ));
                }
            }
            if (count($arrDelArea) > 0) {
                foreach ($arrDelArea as $i => $valor) {
                    $this->db->delete("tbl_evento_areas","evento_id=".$id." AND areas='".$valor."'");
                }
            }
            return array("success" => 1, 'message' => 'modificacion exitosa');
        }
         else {
            return array("success" => 0, 'message' => 'modificacion fallida');
        }
    }

    public function obtenerEventosFecha(){
        global $http;

        $fechaMostrar  =   $http->request->get('fechaMostrar');

        $sql    =   "SELECT * FROM tblevento t1 INNER JOIN users u ON u.id_user
                    WHERE t1.id_usuario = u.id_user AND fecha_evento = '".$fechaMostrar."'
                    ORDER BY hora_evento desc";
        return $this->db->query_select($sql);

    }

    public function obtenerResponsables(){
        $sql = "select DISTINCT(responsable) from tbl_evento_responsables;";
        return $this->db->query_select($sql);
    }

    public function obtenerAreas(){
        $sql = "select DISTINCT(areas) from tbl_evento_areas;";
        return $this->db->query_select($sql);
    }

    public function obtenerResponsableEvento($id){
        $sql = "SELECT * FROM tbl_evento_responsables
                WHERE evento_id = '$id'";

        $result = $this->db->query_select($sql);
        return $result[0];
    }

    public function totalFinalizadas(){
        $sql = "SELECT count(*) from tblevento
                WHERE estado_evento = '1'";
        $result = $this->db->query_select($sql);
        return $result[0];
    }

    public function totalPendientes(){
        $sql = "SELECT count(*) from tblevento
                WHERE estado_evento = '2'";
        $result = $this->db->query_select($sql);
        return $result[0];
    }

    public function visualizar_evento($select = '*'){
        global $http;

        $id_evento  =   $http->request->get('idEvento');
        $consulta   =   $this->db->select($select, 'tblevento', "id = '$id_evento'", 'LIMIT 1');
        $consulta1  =   $this->db->select($select, 'tbl_evento_responsables',"evento_id = '$id_evento'");
        $consulta2  =   $this->db->select($select, 'tbl_evento_areas', "evento_id = '$id_evento'");
        $fecha      =   $consulta[0]['fecha_evento'];
        $hora       =   $consulta[0]['hora_evento'];
        $responsable= $consulta1[0]['responsable'];

        $user = (new Model\users)->getUserById($consulta[0]['id_usuario']);
        $descripcion = $consulta[0]['descripcion_evento'];
        $cadena1 = "";

        foreach($consulta1 as $t => $valor){
            if ($t == (count($consulta1)-1)) {
                $cadena1 .= $valor[2];
            } else {
                $cadena1 .= $valor[2]."<br>";
            }
        }
        $cadena2  =   "";

        foreach($consulta2 as $j => $valor){
            if($j == (count($consulta2)-1)){
                $cadena2.= $valor[2];
            }else{
                $cadena2 .= $valor[2]."<br>";
            }
        }

        $html="<h3 class='text-center'>
            ".$consulta[0]['descripcion_evento']."
            </h3>
            <h4>
            <table table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Datos Evento</th>
                        <th>Responsables</th>
                        <th>Areas</th>
                    </tr>
                </thead>
                <tbody>
                    <td>
                    <br>    <strong>Observación: </strong>  ".$consulta [0]['observacion_evento'].   "</br>
                    <br>    <strong>Hora Evento: </strong>  ".$consulta [0]['hora_evento'].         "</br>";
                    $html.="<br><strong>Fecha Creación: </strong>".$consulta [0]['fecha_ingreso'].      "</br>";

                    if($consulta[0]['fecha_cierre']){
                        $html.="<br><strong>Fecha De Cierre: </strong> ".$consulta[0]['fecha_cierre']."</br>";
                    }else{
                        $html.="<br><strong>Fecha De Cierre: </strong> ".'Finalizacion Pendiente'."</br>";
                    }

                    if($consulta[0]['estado_evento'] == '1'){
                        $html.="<br><strong>Estado Evento: </strong> ".'Finalizado'.         "</br>";
                    }else{
                        $html.="<br><strong>Estado Evento: </strong> ".'Pendiente'.         "</br>";
                    }       "</br>
                    </td>";

                    $html.="<td>
                        ".$cadena1.         "
                    </td>
                    <td>
                        ".$cadena2.         "
                    </td>
            </table>";
        return array('success' => 1, 'html' => $html);
    }

    public function enviarUsuarioLogeado(){
        return $this->user['id_user'];
    }

    public function getNameUser($id){
        $sql = "SELECT name
        FROM users WHERE id_user = ".$id."";
        return $this->db->query_select($sql);
    }

    public function __construct(IRouter $router = null) {
        parent::__construct($router);
        $this->startDBConexion();
        //llamado instancia metod
        $this->user=(new Model\Users)->getOwnerUser();
    }
    /**
      * __destruct()
    */
    public function __destruct() {
        parent::__destruct();
        $this->endDBConexion();
    }
}
