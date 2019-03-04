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
                "comuna"                    => $comuna
            ];

            foreach ($validar as $i => $value) {
                if(trim($value)==''){
                    return array('success'=>0, 'message'=>'ERROR de validacion en '.$i);
                }
            }

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
                                                    comuna

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
                                                    '$comuna'
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
                                                        comuna

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
                                                        '$comuna'
                                                        )";

            $result     =   $this->db->query_select($sql);
            return array('success'=>1, 'message'=>'registro creado correctamente, pendiente Finalizar');
            }
            

        } catch (\Exception $e) {
            return array ('success'=>0, 'message'=> $e->getMessage());
        }

    }//----------------------------FIN CREAR ACTIVIDAD-------------------------------------------------
    //-----------------------------INICIO CREAR ENCARGADO--------------------------------------------
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
        $fechaFinalizacion      =   '19/09/10';
        $comuna                 =   $http->request->get('comuna');



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
                'comuna'                =>   $comuna
        ];

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
                                idActividadManual

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
                                '$idActividad'
            )";

            $result             =   $this->db->query_select($sql);
            
            return array('success'=>1,
                        'message'=>'Actividad Finalizada correctamente');
        } catch (\Exception $e) {
            return array('success' => 0, 'message' =>$e->getMessage());
        }
    }
    //-----------------------------FIN CREAR ENCARGADO-----------------------------------------------

    //-----------------------------VISTA SUPERIOR ESCALAMIENTO PRINCIPAL--------------------------------------------------
    public function actividadesPendientes(){
        $sql = 'SELECT count(*) FROM escalamientocorresponde
                WHERE estadoOrden = "pendiente"';
        return $this->db->query_select($sql);
    }
    //-----------------------------FIN TRAER PENDIENTES----------------------------------------------

    //-----------------------------TRAER ASIGNADAS-------------------------------------------------------
    public function actividadesAsignadas(){
        $sql = 'SELECT count(*) FROM escalamientocorresponde
                WHERE estadoOrden = "seguimiento"';
        return $this->db->query_select($sql);
    }
    //-----------------------------FIN TRAER ASIGNADAS---------------------------------------------------


    //-----------------------------TRAER TODAS LAS ACTIVIDADES---------------------------------------------------
    public function actividadesTotales(){
        $sql = 'SELECT count(*) FROM escalamientocorresponde';
        return $this->db->query_select($sql);
    }
    //----------------------------FIN VISTA SUPERIOR ESCALAMIENTO PRINCIPAL----------------------------
    //----------------------------FINALIZADAS HOY------------------------------------------------------
    public function actividadesFinalizadasHoy(){
        $sql = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'), DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'), rutCliente, idActividadManual, e.comuna, nombreRemitente, bloque, tipoActividad
                FROM escalamientoremitente e INNER JOIN escalamientocorresponde c ON e.idActividadIngresar = c.idActividadManual
                WHERE fechaFinalizacion = curdate()";
        $result = $this->db->query_select($sql);

        return array('data' => $result);
    }
    //----------------------------FIN FINALIZADAS HOY-----------------------------------------------

    public function actividadesPendientesAll(){
        $sql = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'), DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'), rutCliente, idActividadManual, e.comuna, nombreRemitente, bloque, tipoActividad
                FROM escalamientoremitente e INNER JOIN escalamientocorresponde c ON e.idActividadIngresar = c.idActividadManual
                WHERE estadoOrden= 'pendiente'";
        $result = $this->db->query_select($sql);
        return  array('data'=> $result);
    }

    public function actividadesAsignadasAll(){
        $sql = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'), DATE_FORMAT(fechaCompromiso,'%d-%m-%Y'), rutCliente, idActividadManual, e.comuna, nombreRemitente, bloque, tipoActividad
                FROM escalamientoremitente e INNER JOIN escalamientocorresponde c ON e.idActividadIngresar = c.idActividadManual
                WHERE estadoOrden= 'seguimiento'";
        $result =  $this->db->query_select($sql);
        
        return array('data' => $result);
    }

    public function actividadesAll(){
        $sql = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'), DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'), rutCliente, idActividadManual, e.comuna, nombreRemitente, bloque, tipoActividad
                FROM escalamientoremitente e RIGHT JOIN escalamientocorresponde c ON e.idActividadIngresar = c.idActividadManual";
        $result = $this->db->query_select($sql);
        
        return array( 'data' => $result);
    }

    //-----------------------------FIN TRAER TODAS LAS ACTIVIDADES-----------------------------------------------
    public function actividadesFinalizadasHoyAll(){
        $sql = 'select count(*) from escalamientocorresponde
                where  fechaFinalizacion = curdate()';
        $result = $this->db->query_select($sql);

        return  array( 'data' => $result);
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
                    s

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
                 $descripcionActividad
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
    TODO:
    crear funcion de retorno data al cambiar el estado de la actividad
    */
    public function cambiarEstadoActividad($select = '*'){
        global $http;
        return array('success'=>1);
        
        $idActividad    =   $http->request->get('idActividad');
        print_r($idActividad);
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
