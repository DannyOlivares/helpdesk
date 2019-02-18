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
            $fechaFinalizacion              = '2019-02-12';
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

                
            $sql = "select * from escalamientocorresponde
            where idActividadManual = '$idActividadManual'";
            $result1 = $this->db->query_select($sql);
            //print_r($result1);

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
            return array('success'=>1, 'message'=>'registro creado correctamente');

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
                    return array('success'=>2, 'message'=>'Actividad Mal Enviada', 'idActv'=>$idActividadManual);
            }else{
                return array('success'=> 3, 'message'=>'Crear Actividad', 'idActv'=>$idActividadManual);
            }
            //return array('success'=>1, 'message'=>'Encargado creado correctamente');

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

        $validar = [
                'nombreUsuario'         =>   $nombreUsuario,
                'nombreRemitente'       =>   $nombreRemitente,
                'fechaCreacion'         =>   $fechaCreacion,
                'rutCliente'            =>   $rutCliente,
                'idActividad'           =>   $idActividad,
                'descripcionActividad'  =>   $descripcionActividad
        ];

        foreach ($validar as $i => $value) {
            if(trim($value)==''){
                return array('success' => 0 , 'message'=>'Error al intentar validar el campo '.$i);
            }
        }

        $sql                =   "insert escalamientonocorresponde (
                                nombreUsuarioLogeado,
                                fecha,
                                rutCliente,
                                descripcion,
                                nombreRemitente,
                                idActividadManual
            )value(             '$nombreUsuario',
                                '$fechaCreacion',
                                '$rutCliente',
                                '$descripcionActividad',
                                '$nombreRemitente',
                                '$idActividad'

            )";

            $result             =   $this->db->query_select($sql);

            return array('success'=>1, 'message'=>'Actividad Finalizada correctamente');
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
