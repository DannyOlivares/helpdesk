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
            $fechaFinalizacion              = '19/08/12';
            $descripcionActividad           = $http->request->get('descripcionActividad');
            $fechaCreacion                  = $http->request->get('fechaCreacion');

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
                "descripcionActividad"      =>$descripcionActividad,
                "fechaCreacion"             => $fechaCreacion
            ];

            foreach ($validar as $i => $value) {
                if(trim($value)==''){
                    return array('success'=>0, 'message'=>'ERROR de validacion en '.$i);
                }
            }

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
                                                    fechaCreacion

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
                                                    '$fechaCreacion'
                                                    )";

            $result     =   $this->db->query_select($sql);
            return array('success'=>1, 'message'=>'registro creado correctamente');

        } catch (\Exception $e) {
            return array ('success'=>0, 'message'=> $e->getMessage());
        }

    }//----------------------------FIN CREAR ACTIVIDAD-------------------------------------------------
    //-----------------------------INICIO CREAR ENCARGADO-----------------------------------------
    public function crearEncargadoFiltrar(){
        global $http;

        try {

            $nombreRemitente        = $http->request->get('nombreRemitente');
            $areaIngreso            = $http->request->get('areaIngreso');
            $comuna                 = $http->request->get('comuna');
            $selectTipoActividad    = $http->request->get('selectTipoActividad');

            $validar = [
                    'nombreRemitente'       =>  $nombreRemitente,
                    'areaIngreso'           =>  $areaIngreso,
                    'comuna'                =>  $comuna,
                    'selectTipoActividad'   =>  $selectTipoActividad
            ];

            foreach ($validar as $i => $value) {
                if(trim($value)==''){
                    return array('success' => 0 , 'message'=>'Error al intentar validar el campo '.$i);
                }
            }

            if($selectTipoActividad     == 'deuda'                      ||
                $selectTipoActividad    == 'sinActividad'               ||
                $selectTipoActividad    == 'reclamoComercial'           ||
                $selectTipoActividad    ==  'actividadesPendientesAndes'){
                    return array('success'=>2, 'message'=>'Actividad Mal Enviada');
            }

            $sql=   "insert escalamientoremitente(
                                                    areaIngreso,
                                                    comuna,
                                                    nombreRemitente
            )value(
                                                    '$areaIngreso',
                                                    '$comuna',
                                                    '$nombreRemitente'
                                                                        )";
            $result=    $this->db->query_select($sql);
            return array('success'=>1, 'message'=>'Encargado creado correctamente');

        } catch (\Exception $e) {
            return array('success'=>0, 'message'=>$e->getMessage());
        }


    }
    //-----------------------------FIN CREAR ENCARGADO--------------------------------------------

    //-----------------------------CONEXIÓN BD---------------------------------------------------
    public function __construct(IRouter $router = null) {
        parent::__construct($router);
        $this->startDBConexion();
    }

    public function __destruct() {
        parent::__destruct();
        $this->endDBConexion();
    }
}
