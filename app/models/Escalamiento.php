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
use \datetime;

/**
 * Modelo Escalamiento
 *
 * @author Jorge Jara H. <jjara@wys.cl>
 */

class Escalamiento extends Models implements IModels {
    /**
      * Característica para establecer conexión con base de datos.
    */
    use DBModel;

    function valida_rut($rut){
        if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {
            return false;
        }
        $rut = preg_replace('/[\.\-]/i', '', $rut);
        $dv = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut) - 1);
        $i = 2;
        $suma = 0;
        foreach (array_reverse(str_split($numero)) as $v) {
            if ($i == 8)
                $i = 2;
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);
        if ($dvr == 11)
            $dvr = 0;
        if ($dvr == 10)
            $dvr = 'K';
        if ($dvr == strtoupper($dv))
            return true;
        else
            return false;
    }

    public function agregarEscalamiento(){
        global $http;

        try {

            $idActividadManual              = $http->request->get('idActividadManual');
            $rutCliente                     = $http->request->get('rutCliente');
            $fechaCompromiso                = $http->request->get('fechaCompromiso');
            $canal                          = $http->request->get('canal');
            $bloque                         = $http->request->get('bloque');
            $estadoEscalamiento             = $http->request->get('estadoEscalamiento');
            $tipoActividad                  = $http->request->get('selectTipoActividad');
            $estadoOrden                    = $http->request->get('selectEstadoOrden');
            $nombreUsuario                  = $http->request->get('nombreUsuario');
            $fechaFinalizacion              = $http->request->get('fechaFinalizacion');
            $descripcionActividad           = $http->request->get('descripcionActividad');
            $fechaCreacion                  = $http->request->get('fechaCreacion');
            $comuna                         = $http->request->get('comuna');
            $horaCompromiso                 = $http->request->get('horaCompromiso');

            $validar = [
                "Id_Actividad_Manual"       => $idActividadManual,
                "rutCliente"                => $rutCliente,
                "fechaCompromiso"           => $fechaCompromiso,
                "canal"                     => $canal,
                "bloque"                    => $bloque,
                "estadoEscalamiento"        => $estadoEscalamiento,
                "tipoActividad"             => $tipoActividad,
                "estadoOrden"               => $estadoOrden,
                "nombreUsuario"             => $nombreUsuario,
                "fechaFinalizacion"         => $fechaFinalizacion,
                "descripcionActividad"      => $descripcionActividad,
                "fechaCreacion"             => $fechaCreacion,
                "comuna"                    => $comuna,
                "horaCompromiso"            => $horaCompromiso
            ];

            $validaRut=$this->valida_rut($rutCliente);

            if($validaRut == false){
                return array('success'=>0, 'message'=>'Ingrese un rut válido', 'id' => 'rutCliente');
            }
            
            foreach ($validar as $i => $value) {
                if(trim($value)==''){
                    return array('success'=>0, 'message'=>'ERROR de validacion en '.$i, 'id' => $i);
                }
            }
            
            $sql1 = "select * from escalamientoCorresponde";
            $result = $this->db->query_select($sql1);
            
            if($estadoOrden == 'finalizada'){
                $sql = "select * from escalamientocorresponde
            where idActividadManual = '$idActividadManual'";
            $result1 = $this->db->query_select($sql);   

            $sql = "insert escalamientocorresponde(
                                                    idActividadManual,
                                                    rutCliente,
                                                    fechaCompromiso,
                                                    canal,
                                                    bloque,
                                                    estadoEscalamiento,
                                                    tipoActividad,
                                                    estadoOrden,
                                                    nombreUserLog,
                                                    fechaFinalizacion,
                                                    descripcionActividad,
                                                    fechaCreacion,
                                                    comuna,
                                                    horaCompromiso

            )value(
                                                    '$idActividadManual',
                                                    '$rutCliente',
                                                    '$fechaCompromiso',
                                                    '$canal',
                                                    '$bloque',
                                                    '$estadoEscalamiento',
                                                    '$tipoActividad',
                                                    '$estadoOrden',
                                                    '$nombreUsuario',
                                                    '$fechaFinalizacion',
                                                    '$descripcionActividad',
                                                    '$fechaCreacion',
                                                    '$comuna',
                                                    '$horaCompromiso'
                                                    )";

                $result     =   $this->db->query_select($sql);
                    return array('success'=>1, 'message'=>'registro creado correctamente, Se a finalizado');
            }else{
                $sql = "select * from escalamientocorresponde
                    where idActividadManual = '$idActividadManual'";
                    $result1 = $this->db->query_select($sql);   

                $sql = "insert escalamientocorresponde(
                                                        idActividadManual,
                                                        rutCliente,
                                                        fechaCompromiso,
                                                        canal,
                                                        bloque,
                                                        estadoEscalamiento,
                                                        tipoActividad,
                                                        estadoOrden,
                                                        nombreUserLog,
                                                        fechaFinalizacion,
                                                        descripcionActividad,
                                                        fechaCreacion,
                                                        comuna,
                                                        horaCompromiso

                )value(
                                                        '$idActividadManual',
                                                        '$rutCliente',
                                                        '$fechaCompromiso',
                                                        '$canal',
                                                        '$bloque',
                                                        '$estadoEscalamiento',
                                                        '$tipoActividad',
                                                        '$estadoOrden',
                                                        '$nombreUsuario',
                                                        'pendienteFinalizar',
                                                        '$descripcionActividad',
                                                        '$fechaCreacion',
                                                        '$comuna',
                                                        '$horaCompromiso'
                                                        )";

            $result     =   $this->db->query_select($sql);
            return array('success'=>1, 'message'=>'registro creado correctamente, pendiente Finalizar');
            }
            

        } catch (\Exception $e) {
            return array ('success'=>0, 'message'=> $e->getMessage());
        }

    }
    
    public function crearEncargadoFiltrar(){
        global $http;

        try {

            $nombreRemitente        = $http->request->get('nombreRemitente');
            $areaIngreso            = $http->request->get('areaIngreso');
            $comuna                 = $http->request->get('comuna');
            $selectTipoActividad    = $http->request->get('selectTipoActividad');
            $idActividadManual      = $http->request->get('idActividadManual');

            $validar = [
                    'nombreRemitente'       =>  $nombreRemitente,
                    'areaIngreso'           =>  $areaIngreso,
                    'comuna'                =>  $comuna,
                    'selectTipoActividad'   =>  $selectTipoActividad,
                    'idActividadManual'     =>  $idActividadManual
            ];

            foreach ($validar as $i => $value) {
                if(trim($value)==''){
                    return array('success' => 0 , 'message'=>'Error al intentar validar el campo '.$i);
                }
            }
            
            $sql1 = "SELECT * FROM escalamientoCorresponde";
            $result= $this->db->query_select($sql1);

            $sql2 = "SELECT * FROM  escalamientonocorresponde";
            $result1 = $this->db->query_select($sql2);

            $arrResult = $result;
            $arrResult1 = $result1;

                if($arrResult){
                    for ($i = 0; $i < count($arrResult); $i++)
                {
                    if($arrResult[$i]['idActividadManual'] == $idActividadManual){
                        return array('success'=>0, 'message'=> 'Esta Actividad ya existe en nuestros registros');
                    }
                }
                }

                if($arrResult1){
                    for ($i = 0; $i < count($arrResult1); $i++)
                    {
                        if((integer)$arrResult1[$i]['idActividadManual'] == (integer)$idActividadManual){
                            return array('success'=>0, 'message'=> 'Esta Actividad ya existe en nuestros registros');
                        }
                    }
                }
                        
            $sql=   "insert escalamientoremitente(
                                                    areaIngreso,
                                                    comuna,
                                                    nombreRemitente,
                                                    idActividadIngresar
            )value(
                                                    '$areaIngreso',
                                                    '$comuna',
                                                    '$nombreRemitente',
                                                    '$idActividadManual'
                                                                        )";
            $result=    $this->db->query_select($sql);

            if($selectTipoActividad     == 'deuda'                      ||
                $selectTipoActividad    == 'sinActividad'               ||
                $selectTipoActividad    == 'reclamoComercial'           ||
                $selectTipoActividad    ==  'actividadesPendientesAndes'){
                    return array('success'          =>2,
                                'message'           =>'Actividad Mal Enviada', 
                                'idActv'            =>$idActividadManual,
                                'nombreRemitente'   =>$nombreRemitente);  
            }else{
                return array('success'          => 3,
                            'message'           =>'Crear Actividad',
                            'idActv'            =>$idActividadManual, 
                            'nombreRemitente'   =>$nombreRemitente);  
            }

        } catch (\Exception $e) {
            return array('success'=>0, 'message'=>$e->getMessage());
        }
    }

    public function agregarEscalamientoNoCorresponde(){
        global $http;
        try {

        $nombreUsuario          =   $http->request->get('nombreUsuario');
        $nombreRemitente        =   $http->request->get('nombreRemitente');
        $fechaCreacion          =   $http->request->get('fecha');
        $rutCliente             =   $http->request->get('rutCliente');
        $idActividad            =   $http->request->get('idActividad');
        $descripcionActividad   =   $http->request->get('descripcionActividad');
        $canal                  =   $http->request->get('canal');
        $fechaCompromiso        =   $http->request->get('fechaCompromiso');
        $bloque                 =   $http->request->get('bloque');
        $estadoEscalamiento     =   $http->request->get('estadoEscalamiento');
        $tipoActividad          =   $http->request->get('selectTipoActividad');
        $estadoOrden            =   $http->request->get('selectEstadoOrden');
        $fechaFinalizacion      =   $http->request->get('fechaFinalizacion');
        $comuna                 =   $http->request->get('comuna');
        $horaCompromiso         =   $http->request->get('horaCompromiso');

        $validaRut=$this->valida_rut($rutCliente);

        if($validaRut == false){
            return array('success'=>0, 'message'=>'Ingrese un rut válido', 'id' => 'rutCliente');
        }

        $validar = [
                'nombreUsuario'         =>   $nombreUsuario,
                'nombreRemitente'       =>   $nombreRemitente,
                'fechaCreacion'         =>   $fechaCreacion,
                'rutCliente'            =>   $rutCliente,
                'idActividad'           =>   $idActividad,
                'descripcionActividad'  =>   $descripcionActividad,
                'canal'                 =>   $canal,
                'fechaCompromiso'       =>   $fechaCompromiso,
                'bloque'                =>   $bloque,
                'estadoEscalamiento'    =>   $estadoEscalamiento,
                'tipoActividad'         =>   $tipoActividad,
                'estadoOrden'           =>   $estadoOrden,
                'comuna'                =>   $comuna,
                'fechaFinalizacion'     =>   $fechaFinalizacion,
                'horaCompromiso'        =>   $horaCompromiso
        ];

        $validaRut=$this->valida_rut($rutCliente);

        foreach ($validar as $i => $value) {
            if(trim($value)==''){
                return array('success' => 0 , 'message'=>'Error al intentar validar el campo '.$i);
            }
        }

        $sql                =   "insert escalamientonocorresponde (
                                nombreUsuarioLogeado,
                                fechaCreacion,
                                rutCliente,
                                fechaCompromiso,
                                canal,
                                bloque,
                                estadoEscalamiento,
                                tipoActividad,
                                estadoOrden,
                                fechaFinalizacion,
                                comuna,
                                descripcion,
                                nombreRemitente,
                                idActividadManual,
                                horaCompromiso

            )value(             '$nombreUsuario',
                                '$fechaCreacion',
                                '$rutCliente',                            
                                '$fechaCompromiso',
                                '$canal',
                                '$bloque',
                                '$estadoEscalamiento',
                                '$tipoActividad',
                                '$estadoOrden',
                                '$fechaFinalizacion',
                                '$comuna',
                                '$descripcionActividad',
                                '$nombreRemitente',
                                '$idActividad',
                                '$horaCompromiso'
            )";

            $result             =   $this->db->query_select($sql);
            
            return array('success'=>1,
                        'message'=>'Actividad Finalizada correctamente');
        } catch (\Exception $e) {
            return array('success' => 0, 'message' =>$e->getMessage());
        }
    }

    public function actividadesPendientes(){
        $sql = 'SELECT count(*) FROM escalamientocorresponde
                WHERE estadoOrden = "pendiente"';
        return $this->db->query_select($sql);
    }

    public function actividadesAsignadas(){
        $sql = 'SELECT count(*) FROM escalamientocorresponde
                WHERE estadoOrden = "seguimiento"';
        return $this->db->query_select($sql);
    }

    public function actividadesTotales(){
        $sql = 'SELECT count(*) FROM escalamientocorresponde';
        return $this->db->query_select($sql);
    }
    
    public function actividadesFinalizadasHoy(){
        $sql = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'), DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'), rutCliente, idActividadManual, e.comuna, nombreRemitente, bloque, tipoActividad
                FROM escalamientoremitente e INNER JOIN escalamientocorresponde c ON e.idActividadIngresar = c.idActividadManual
                WHERE fechaFinalizacion = curdate()";
        $result = $this->db->query_select($sql);

        return array('data' => $result);
    }

    public function actividadesPendientesAll(){
        $sql = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'), DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'), rutCliente, idActividadManual, e.comuna, nombreRemitente, bloque, tipoActividad,gestion
                FROM escalamientoremitente e INNER JOIN escalamientocorresponde c ON e.idActividadIngresar = c.idActividadManual
                WHERE estadoOrden= 'pendiente'";
        $result = $this->db->query_select($sql);
        return  array('data'=> $result);
    }

    public function actividadesAsignadasAll(){
        $sql = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'), DATE_FORMAT(fechaCompromiso,'%d-%m-%Y'), rutCliente, idActividadManual, e.comuna, nombreRemitente, bloque, tipoActividad,gestion
                FROM escalamientoremitente e INNER JOIN escalamientocorresponde c ON e.idActividadIngresar = c.idActividadManual
                WHERE estadoOrden= 'seguimiento'";
        $result =  $this->db->query_select($sql);
        
        return array('data' => $result);
    }

    public function actividadesAll(){
        
            $sql = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'), DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'), c. rutCliente, c.idActividadManual, e.comuna, nombreRemitente, bloque, tipoActividad
                    FROM escalamientoremitente e RIGHT JOIN escalamientocorresponde c ON e.idActividadIngresar = c.idActividadManual";

                    $result = $this->db->query_select($sql);
        return array( 'data' => $result);
        
    }

    public function actividadesFinalizadasHoyAll(){
        $sql = 'select count(*) from escalamientocorresponde
                where  fechaFinalizacion = curdate()';
        $result = $this->db->query_select($sql);

        return  array( 'data' => $result);
    }

    public function totalCompromisosHoy(){
        $sql    =   "SELECT count(*) FROM escalamientocorresponde 
        WHERE fechaCompromiso = curdate() AND estadoOrden <> 'finalizada'";

        $result =   $this->db->query_select($sql);
        return $result;
    }

    public function actividadesNoCorresponden(){
        $sql = 'SELECT  idActividadManual,
                        fechaCreacion,
                        fechaCompromiso,
                        rutCliente, 
                        descripcion,
                        nombreRemitente,
                        canal,
                        nombreUsuarioLogeado,
                        tipoActividad
                         FROM escalamientoNoCorresponde';
        $result = $this->db->query_select($sql);

        return array('data' => $result);
    }

    public function visualizarActividad($select = '*'){
        global $http;

        $idActividad            =   $http->request->get('idActividad');
        $consulta               =   $this->db->select($select, 'escalamientoCorresponde',
                                    "idActividadManual = '$idActividad'", 'limit 1');
        $idActividad            =   $consulta[0]['idActividadManual'];
        $rutCliente             =   $consulta[0]['rutCliente'];
        $fechaCompromiso        =   $consulta[0]['fechaCompromiso'];
        $canal                  =   $consulta[0]['canal'];
        $bloque                 =   $consulta[0]['bloque'];
        $estadoEscalamiento     =   $consulta[0]['estadoEscalamiento'];
        $tipoActividad          =   $consulta[0]['tipoActividad'];
        $estadoOrden            =   $consulta[0]['estadoOrden'];
        $descripcionActividad   =   $consulta[0]['descripcionActividad'];
        $fechaCreacion          =   $consulta[0]['fechaCreacion'];
        $comuna                 =   $consulta[0]['comuna'];

         $html="<h3 class='text-center'>
                 ".$descripcionActividad."
                 </h3>
                 <h4>
                 <table table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Id Actividad</th>
                            <th>Rut Cliente</th>
                            <th>Fecha Compromiso</th>
                            <th>Canal</th>
                            <th>Bloque</th>
                            <th>Estado Escalamiento</th>
                            <th>Tipo Actividad</th>
                            <th>Estado Orden</th>
                            <th>Descripcion Actividad</th>
                            <th>Fecha Creación</th>
                            <th>Comuna</th>
                        </tr>
                    <tbody>
                        <tr>
                            <td>".$idActividad."</td>
                            <td>".$rutCliente."</td>
                            <td>".$fechaCompromiso."</td>
                            <td>".$canal."</td>
                            <td>".$bloque."</td>
                            <td>".$estadoEscalamiento."</td>
                            <td>".$tipoActividad."</td>
                            <td>".$estadoOrden."</td>
                            <td>".$descripcionActividad."</td>
                            <td>".$fechaCreacion."</td>
                            <td>".$comuna."</td>
                        </tr>
                    </tbody>
                </table>            ";
            return array('success'=>1, 'html'=> $html);

    }

    public function visualizarActividadNoCorresponde($select = '*'){
        global $http;

        $idActividad            =   $http->request->get('idActividad');
        $consulta               =   $this->db->select($select, 'escalamientoNoCorresponde',
                                    "idActividadManual = '$idActividad'", 'limit 1');
        $idActividad            =   $consulta[0]['idActividadManual'];
        $rutCliente             =   $consulta[0]['rutCliente'];
        $fechaCompromiso        =   $consulta[0]['fechaCompromiso'];
        $canal                  =   $consulta[0]['canal'];
        $bloque                 =   $consulta[0]['bloque'];
        $estadoEscalamiento     =   $consulta[0]['estadoEscalamiento'];
        $tipoActividad          =   $consulta[0]['tipoActividad'];
        $estadoOrden            =   $consulta[0]['estadoOrden'];
        $descripcionActividad   =   $consulta[0]['descripcion'];
        $fechaCreacion          =   $consulta[0]['fechaCreacion'];
        $comuna                 =   $consulta[0]['comuna'];

         $html="<h3 class='text-center'>
                ".$descripcionActividad."
                 </h3>
                 <h4>
                 <table table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Id Actividad</th>
                            <th>Rut Cliente</th>
                            <th>Fecha Compromiso</th>
                            <th>Canal</th>
                            <th>Bloque</th>
                            <th>Estado Escalamiento</th>
                            <th>Tipo Actividad</th>
                            <th>Estado Orden</th>
                            <th>Descripcion Actividad</th>
                            <th>Fecha Creación</th>
                            <th>Comuna</th>
                        </tr>
                    <tbody>
                        <tr>
                            <td>".$idActividad."</td>
                            <td>".$rutCliente."</td>
                            <td>".$fechaCompromiso."</td>
                            <td>".$canal."</td>
                            <td>".$bloque."</td>
                            <td>".$estadoEscalamiento."</td>
                            <td>".$tipoActividad."</td>
                            <td>".$estadoOrden."</td>
                            <td>".$descripcionActividad."</td>
                            <td>".$fechaCreacion."</td>
                            <td>".$comuna."</td>
                        </tr>
                    </tbody>

                </table>            ";
            return array('success'=>1, 'html'=> $html);

    }
    /* 
    crear funcion de retorno data al cambiar el estado de la actividad
    */
    public function cambiarEstadoActividad($select = '*'){
        global $http;   
        $idActividad            =   $http->request->get('idActividad');
        $estado                 =   $http->request->get('estado');
        $consulta               =   $this->db->select($select, 'escalamientoCorresponde',
                                    "idActividadManual = '$idActividad'", 'limit 1');
        $rutCliente             =   $consulta[0]['rutCliente'];
        $fechaCompromiso        =   $consulta[0]['fechaCompromiso'];
        $canal                  =   $consulta[0]['canal'];
        $bloque                 =   $consulta[0]['bloque'];
        $estadoEscalamiento     =   $consulta[0]['estadoEscalamiento'];
        $tipoActividad          =   $consulta[0]['tipoActividad'];
        $horaCompromiso         =   $consulta[0]['horaCompromiso'];
        $estadoOrden            =   $consulta[0]['estadoOrden'];
        $nombreUserLog          =   $consulta[0]['nombreUserLog'];
        $fechaFinalizacion      =   $consulta[0]['fechaFinalizacion'];
        $descripcionActividad   =   $consulta[0]['descripcionActividad'];
        $fechaCreacion          =   $consulta[0]['fechaCreacion'];
        $comuna                 =   $consulta[0]['comuna'];
        $gestion                =   $consulta[0]['gestion'];

        $sql = "insert escalamientoHistory(
                                                idActividadManual,
                                                rutCliente,
                                                fechaCompromiso,
                                                canal,
                                                bloque,
                                                estadoEscalamiento,
                                                tipoActividad,
                                                estadoOrden,
                                                nombreUserLog,
                                                fechaFinalizacion,
                                                descripcionActividad,
                                                fechaCreacion,
                                                comuna,
                                                horaCompromiso

        )value(
                                                '$idActividad',
                                                '$rutCliente',
                                                '$fechaCompromiso',
                                                '$canal',
                                                '$bloque',
                                                '$estadoEscalamiento',
                                                '$tipoActividad',
                                                '$estadoOrden',
                                                '$nombreUserLog',
                                                '$fechaFinalizacion',
                                                '$descripcionActividad',
                                                '$fechaCreacion',
                                                '$comuna',
                                                '$horaCompromiso'
                    )";
        $resultHistory =    $this->db->query_select($sql);

        switch($estado){
            case    "finalizada":
            if($gestion == 'nulo'){
                return array('success'=>0, 'message'=>'para Finalizar Debe agregar una Gestión');
            }else{
                $sql    =   "UPDATE escalamientocorresponde
                            SET estadoOrden = '$estado',
                            fechaFinalizacion = curdate()
                            WHERE idActividadmanual = '$idActividad'";
                $result =   $this->db->query_select($sql);
                return array('success'=>1, 'message'=>'ha cambiado el estado de la actividad con el id'.$idActividad);
            }            
                break;
            case    "seguimiento":
                $sql =  "UPDATE escalamientocorresponde 
                        SET estadoOrden = '$estado'
                        WHERE   idActividadManual = '$idActividad'";
                $result = $this->db->query_select($sql);
                return array('success'=>1, 'message'=>'Se ha cambiado el estado de la actividad con el id'.$idActividad);
                break;

            case    "pendiente":
                $sql = "UPDATE escalamientocorresponde
                    SET estadoOrden = '$estado'
                    WHERE idActividadmanual = '$idActividad'";
                $result = $this->db->query_select($sql);
                return array('success'=>1, 'message'=>'Se Ha Cambiado el estado satisfactoriamente');
                break;
        }
    }

    public function cambiarEstadoActividadNoCorresponde($select = '*'){
        global $http;

        $idActividad    =   $http->request->get('idActividad');
        $estado         =   $http->request->get('estado');
        $consulta       =   $this->db->select($select, 'escalamientoNoCorresponde',
                            "idActividadManual = '$idActividad'", 'limit 1');
        $nombreUsuario      =   $consulta[0][0];
        $fechaCreacion      =   $consulta[0][1];
        $rutCliente         =   $consulta[0][3];
        $fechaCompromiso    =   $consulta[0][4];
        $canal              =   $consulta[0][5];
        $bloque             =   $consulta[0][6];
        $estadoEscalamiento =   $consulta[0][7];
        $tipoActividad      =   $consulta[0][8];
        $fechaFinalizacion  =   "null";
        $comuna             =   $consulta[0][11];
        $descripcion        =   $consulta[0][12];
        $nombreRemitente    =   $consulta[0][13];
        $idActividadManual  =   $consulta[0][14];
        $horaCompromiso     =   $consulta[0][8];
         
        

            $sql =      "insert escalamientocorresponde(
                                                            idActividadManual,
                                                            rutCliente,
                                                            fechaCompromiso,
                                                            canal,
                                                            bloque,
                                                            estadoEscalamiento,
                                                            tipoActividad,
                                                            estadoOrden,
                                                            nombreUserLog,
                                                            fechaFinalizacion,
                                                            descripcionActividad,
                                                            fechaCreacion,
                                                            comuna,
                                                            horaCompromiso
        
                        )value(
                                                            '$idActividad',
                                                            '$rutCliente',
                                                            '$fechaCompromiso',
                                                            '$canal',
                                                            '$bloque',
                                                            '$estadoEscalamiento',
                                                            '$tipoActividad',
                                                            '$estado',
                                                            '$nombreUsuario',
                                                            '$fechaFinalizacion',
                                                            '$descripcion',
                                                            '$fechaCreacion',
                                                            '$comuna',
                                                            '$horaCompromiso'
                                                            )";
                    
        $result2    =   $this->db->query_select($sql);
                return array('success'=>1);
    }

    public function AlertaOrdenesPorVencer(){
        $sql1 = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'), DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'), c.rutCliente, c.idActividadManual, e.comuna, e.nombreRemitente, c.bloque, c.tipoActividad, c.horaCompromiso
        FROM escalamientoremitente e RIGHT JOIN escalamientocorresponde c ON e.idActividadIngresar = c.idActividadManual
        where c.fechaCompromiso  = CAST(CURRENT_TIMESTAMP AS DATE) and c.estadoOrden <> 'finalizada'";
        $arrayCompromisoHoy = $this->db->query_select($sql1);

        if ($arrayCompromisoHoy) {
            foreach ($arrayCompromisoHoy as $valor) {
                $horaActual =  new DateTime (date_default_timezone_get());
                $horaDeCompromiso = new DateTime($valor['horaCompromiso']);

                $diff = $horaActual->diff($horaDeCompromiso);

                $calcHoras = ( ($diff->days * 24 ) * 60 ) + ( $diff->h );

                if($diff->invert != 1 && $calcHoras <= 1)
                {
                 $arrayHoraCompromisoXvencer[] = $valor;  
                }
            }  
        } 
        if (!empty($arrayHoraCompromisoXvencer)){
            return  array( "data"=> $arrayHoraCompromisoXvencer);
        }
        else {
            $arrayCompromisoHoy ="";
            return  array('data'=> $arrayCompromisoHoy);
            
             }
    }

    public function agregarGestion(){
        global $http;

        $idActividad    = $http->request->get('idActividad');
        $mensaje        = $http->request->get('mensaje');

        if(trim($mensaje) =='nulo'){
            return array('success'=>0, 'message'=>'Error, no a ingresado ningún mensaje');
        }

        $sql    =   "UPDATE escalamientocorresponde
        SET gestion = '$mensaje'
        WHERE idActividadManual = '$idActividad'";

        $result = $this->db->query_select($sql);

        return array('success'=>1, 'message'=>'Guardado correctamente');
    }

    public function mostrarComunas(){
        $sql    =   "select descripcion from tblcomuna";
        $result = $this->db->query_select($sql);
        return $result;
    }
    
    public function compromisoHoyMañana(){
        $sql    =   "   SELECT idActividadManual,
                        DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
                        DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'), 
                        rutCliente,
                        descripcionActividad,
                        nombreRemitente,
                        canal,
                        nombreUserLog, 
                        tipoActividad,
                        estadoOrden
                        FROM escalamientoRemitente e
                        INNER JOIN escalamientoCorresponde c ON
                        e.idActividadIngresar = c.idActividadManual 
                        WHERE estadoOrden <> 'finalizada' AND fechaCompromiso = curdate() 
                        OR fechaCompromiso =  DATE_SUB(CURDATE(), INTERVAL -1 DAY)";

        $result =   $this->db->query_select($sql);
        return array('data' => $result);
    }

    public function betweenFechas(){
        global $http;

        $fechaInicio    = $http->request->get('fechaInicio');
        $fechaFin       = $http->request->get('fechaFin');
        $valorTab       = $http->request->get('valorTab');

        
        switch($valorTab){
            case "pendiente":

                $sql = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
                        DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'),
                        rutCliente,
                        idActividadManual,
                        e.comuna,
                        nombreRemitente,
                        bloque,
                        tipoActividad,
                        gestion
                        FROM escalamientoremitente e 
                        INNER JOIN escalamientocorresponde c 
                        ON e.idActividadIngresar = c.idActividadManual
                        WHERE estadoOrden = 'pendiente' AND fechaCompromiso BETWEEN '$fechaInicio' AND '$fechaFin'";
                $result = $this->db->query_select($sql);

                return array("data" => $result);

            break;
            case "seguimiento":
                
            $sql = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
                    DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'),
                    rutCliente,
                    idActividadManual,
                    e.comuna,
                    nombreRemitente,
                    bloque,
                    tipoActividad,
                    gestion
                    FROM escalamientoremitente e 
                    INNER JOIN escalamientocorresponde c 
                    ON e.idActividadIngresar = c.idActividadManual
                    WHERE estadoOrden = 'seguimiento' AND fechaCompromiso BETWEEN '$fechaInicio' AND '$fechaFin'";
                $result = $this->db->query_select($sql);

                return array("data" => $result);
                break;

            case "finalizada":
            $sql = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'), DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'), rutCliente, idActividadManual, e.comuna, nombreRemitente, bloque, tipoActividad
                    FROM escalamientoremitente e INNER JOIN escalamientocorresponde c ON e.idActividadIngresar = c.idActividadManual
                    WHERE estadoOrden = 'finalizada' AND fechaCompromiso BETWEEN '$fechaInicio' AND '$fechaFin'";
                $result = $this->db->query_select($sql);

                return array("data" => $result);
                break;

                case "noCorresponde":
                $sql = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'), DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'), rutCliente, idActividadManual, e.comuna, nombreRemitente, bloque, tipoActividad
                        FROM escalamientonocorresponde e INNER JOIN escalamientocorresponde c ON e.idActividadIngresar = c.idActividadManual
                        WHERE fechaCompromiso BETWEEN '$fechaInicio' AND '$fechaFin'";
                    $result = $this->db->query_select($sql);
    
                    return array("data" => $result);
                    break;
    
                default:
                    break;
        }
    }

    //TODO:
    public function AlertaActividadesPorVencer(){
        $sql1 = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
        DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'),
        c.rutCliente, 
        c.idActividadManual, 
        e.comuna, 
        e.nombreRemitente, 
        c.bloque, 
        c.tipoActividad, 
        c.horaCompromiso
        FROM escalamientoremitente e RIGHT JOIN escalamientocorresponde c ON e.idActividadIngresar = c.idActividadManual
        where c.fechaCompromiso  = CAST(CURRENT_TIMESTAMP AS DATE) and c.estadoOrden <> 'finalizada'";
        $arrayCompromisoHoy = $this->db->query_select($sql1);

        if ($arrayCompromisoHoy) {
            foreach ($arrayCompromisoHoy as $valor) {
                $diayhorayActual =  new DateTime (date_default_timezone_get());
                $objDate = get_object_vars($diayhorayActual);
                $onlytoday= $objDate['date'];
           
            $porciones = explode(" ", $onlytoday);
            $DAY= $porciones[0]; // porción1 // obtengo solo fecha

                $x = $valor['bloque'];
                $sql= "select hasta from tblbloque where bloque = '".$x."'";
                $sql2= $this->db->query_select($sql);

                $HOUR = ($sql2[0]['hasta']);

                $DIA_Y_HORAVENCIMIENTO= $DAY." ".$HOUR;
                $hora_fin_bloque = new DateTime ($DIA_Y_HORAVENCIMIENTO);

                $diff = $diayhorayActual->diff($hora_fin_bloque);

                            $calcHoras = ( ($diff->days * 24 ) * 60 ) + ( $diff->h );

                            if($diff->invert != 1 && $calcHoras < 1)
                            {
                                $arrayHoraCompromisoXvencer[] = $valor; 
                            }
                        }  
                    }

                    if (!empty($arrayHoraCompromisoXvencer)){
                        return  array( "data"=> $arrayHoraCompromisoXvencer);
                    }
                    else {
                        $arrayCompromisoHoy ="";
                        return  array('data'=> $arrayCompromisoHoy);
                    }
    }

    //TODO: 

    public function TotalAlertasActividades()
        {
        $sql1 = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
        DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'),
        c.rutCliente,
        c.idActividadManual,
        e.comuna,
        e.nombreRemitente,
        c.bloque,
        c.tipoActividad,
        c.horaCompromiso
        FROM escalamientoremitente e
        RIGHT JOIN escalamientocorresponde c
        ON e.idActividadIngresar = c.idActividadManual
        where c.fechaCompromiso  = CAST(CURRENT_TIMESTAMP AS DATE) and c.estadoOrden <> 'finalizada'";
        $arrayCompromisoHoy = $this->db->query_select($sql1);
            $cont=0;
        if ($arrayCompromisoHoy) {
            foreach ($arrayCompromisoHoy as $valor) {
                $diayhorayActual =  new DateTime (date_default_timezone_get());
                $objDate = get_object_vars($diayhorayActual);
                $onlytoday= $objDate['date'];
        
                $porciones = explode(" ", $onlytoday);
                $DIA= $porciones[0]; // porción1

                $x = $valor['bloque'];
                $sql= "select hasta from tblbloque where bloque = '".$x."'";
                $sql2= $this->db->query_select($sql);

                $HORA = ($sql2[0]['hasta']);

                $DIA_Y_HORAVENCIMIENTO= $DIA." ".$HORA;
                $hora_fin_bloque = new DateTime ($DIA_Y_HORAVENCIMIENTO);

                $diff = $diayhorayActual->diff($hora_fin_bloque);

                $calcHoras = ( ($diff->days * 24 ) * 60 ) + ( $diff->h );

                    if($diff->invert != 1 && $calcHoras <= 1)
                    {
                        $cont++; 
                    }
                }    
            }
            if ($cont >0)
            {
                return $cont;
            }
            else   
            {
                return 0;
            }
        }
    //TODO:
    public function TotalAlertasCompromisos(){
        $sql1 = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'), 
                DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'), 
                c.rutCliente, 
                c.idActividadManual, 
                e.comuna, 
                e.nombreRemitente, 
                c.bloque, 
                c.tipoActividad, 
                c.horaCompromiso
                FROM escalamientoremitente e 
                RIGHT JOIN escalamientocorresponde c 
                ON e.idActividadIngresar = c.idActividadManual
                where c.fechaCompromiso  = CAST(CURRENT_TIMESTAMP AS DATE) and c.estadoOrden <> 'finalizada'";

        $arrayCompromisoHoy = $this->db->query_select($sql1);
        $cont=0; 
          if ($arrayCompromisoHoy) {
            foreach ($arrayCompromisoHoy as $valor) {
                $timezone =  new DateTime (date_default_timezone_get());
                $horaDeCompromiso = new DateTime($valor['horaCompromiso']);                
                $diff = ($timezone)->diff($horaDeCompromiso);
                $calcHoras = ( ($diff->days * 24 ) * 60 ) + ( $diff->h );
                    if($diff->invert != 1 && $calcHoras < 1)
                    {
                        $cont++; 
                    }
                }    
            }
            if (!empty($cont))
            {
                return $cont;
            }
            else   
            {
                return 0;
            }
    }
    //TODO:
    public function AlertaCompromisosPorVencer(){
        $sql1 = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
        DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'),
        c.rutCliente,
        c.idActividadManual,
        e.comuna,
        e.nombreRemitente,
        c.bloque,
        c.tipoActividad,
        c.horaCompromiso
        FROM escalamientoremitente e RIGHT JOIN escalamientocorresponde c ON e.idActividadIngresar = c.idActividadManual
        where c.fechaCompromiso  = CAST(CURRENT_TIMESTAMP AS DATE) and c.estadoOrden <> 'finalizada'";
        $arrayCompromisoHoy = $this->db->query_select($sql1);

        if ($arrayCompromisoHoy) {
            foreach ($arrayCompromisoHoy as $valor) {
                $horaActual =  new DateTime (date_default_timezone_get());
                $horaDeCompromiso = new DateTime($valor['horaCompromiso']);

                $diff = $horaActual->diff($horaDeCompromiso);

                $calcHoras = ( ($diff->days * 24 ) * 60 ) + ( $diff->h );

                if($diff->invert != 1 && $calcHoras < 1)
                {
                 $arrayHoraCompromisoXvencer[] = $valor;  
                }
            }  
        }
        if (!empty($arrayHoraCompromisoXvencer)){
            return  array( "data"=> $arrayHoraCompromisoXvencer);
        }
        else {
            $arrayCompromisoHoy ="";
            return  array('data'=> $arrayCompromisoHoy);
            
             }
    }     

    //-----------------------------CONEXIÓN BD-------------------------------------------------------
    public function __construct(IRouter $router = null) {
        parent::__construct($router);
        $this->startDBConexion();
    }

    public function __destruct() {
        parent::__destruct();
        $this->endDBConexion();
    }
}
