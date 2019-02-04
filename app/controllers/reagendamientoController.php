<?php

/*
 * This file is part of the Ocrend Framewok 2 package.
 *
 * (c) Ocrend Software <info@ocrend.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace app\controllers;

use app\models as Model;
use Ocrend\Kernel\Router\IRouter;
use Ocrend\Kernel\Controllers\Controllers;
use Ocrend\Kernel\Controllers\IControllers;

/**
 * Controlador avar/
 *
 *
*/

class reagendamientoController extends Controllers implements IControllers {

    public function __construct(IRouter $router) {
        global $config;
        $op = '6';
        parent::__construct($router,array(
            'users_logged' => true,
            'access_menu' => ['id_menu' => $op, 'access' => true]
        ));

        switch($this->method){
            case 'listar_reagendamiento':
                echo $this->template->render('reagendamiento/listar_reagendamiento', array(
                    'menu_op' => $op,
                    'db_ordenes' => (new Model\Mdlreagendamiento)->listar_ordenes("r.estado <=1 ")
                ));
            break;
            case 'reagendamiento':
                $id_actividad = (new Model\Mdlreagendamiento)->cargar_orden_reagendamiento();

                $bloque_siguiente = (new Model\Varios)->ObtenerBloqueSiguiente();
                $fecha_volver = date('d-m-Y');
                if ($bloque_siguiente['bloque'] == "10-13"){
                    $fecha_volver = date('Y-m-d',strtotime("1 day", date('Y-m-d')));
                }
                dump($fecha_volver);
                $fecha_volver = $fecha_volver." a las ".$bloque_siguiente['desde'];

                echo $this->template->render('reagendamiento/reagendamiento_usuario', array(
                    'menu_op' => $op,
                    'db_UserStatus' => (new Model\Mdlreagendamiento)->getUserOnline(),
                    'db_orden_reagendar' => $id_actividad,
                    'db_historial_actividad' => (new Model\Mdlreagendamiento)->getHistorialActividad($id_actividad['id_orden']),
                    'db_observacion_cliente' => (new Model\Mdlreagendamiento)->getObservacionCliente($id_actividad['rut_cliente']),
                    'db_comunas'=>(new Model\Mdlreagendamiento)->listar_comunas(),
                    'fecha_volver'=> $fecha_volver
                ));
            break;
            case 'altautilizacion':
                echo $this->template->render('reagendamiento/nueva_altautilizacion', array(
                    'menu_op' => $op,
                    'db_comunas'=>(new Model\Mdlreagendamiento)->listar_comunas(),
                    'db_utilizacion'=>(new Model\Mdlreagendamiento)->listar_ordenes_utilizacion(),
                ));
            break;
            case 'cargar_orden':
                echo $this->template->render('reagendamiento/cargar_ordenes', array(
                    'menu_op' => $op,
                    'q_temp' => (new Model\Mdlreagendamiento)->ver_tmp_q(),
                    'db_archivos' => (new Model\Varios)->listar_archivos_cargados('Carga de Reagendamiento'),
                ));
            break;
            case 'cruzarbases':
                (new Model\Mdlreagendamiento)->cruzarbases();
            break;
            case 'actividades':
                echo $this->template->render('reagendamiento/informes/reporte_actividades', array(
                'menu_op' => $op
              ));
            break;
            case 'gestiones':
                echo $this->template->render('reagendamiento/informes/reporte_gestiones', array(
                'menu_op' => $op
              ));
            break;
            case 'cargarinconcistencia':
                (new Model\Mdlreagendamiento)->cargarinconcistencias();
            break;
            case 'descargaractividades':
                (new Model\Mdlreagendamiento)->descargaractividades();
            break;
            case 'descargargestiones':
                (new Model\Mdlreagendamiento)->descargargestiones();
            break;
            default:
                echo $this->template->render('reagendamiento/reagendamiento',array(
                    'menu_op' => $op,
                ));
            break;
        }

      }
    }
