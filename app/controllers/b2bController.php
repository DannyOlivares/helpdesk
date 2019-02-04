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
 * @author Felipe Andrade V. <f.andradevalenzuela@gmail.com>
*/

class b2bController extends Controllers implements IControllers {

    public function __construct(IRouter $router) {
        global $config;
        $op = '4';
        parent::__construct($router,array(
            'users_logged' => true,
            'access_menu' => ['id_menu' => $op, 'access' => true]
        ));

        switch($this->method){
            case 'altas':
                echo $this->template->render('b2b/altas/dashboardaltas',array(
                    'menu_op' => $op
                ));
            break;
            case 'carga_altas':
                echo $this->template->render('b2b/altas/carga_pendientes',array(
                    'menu_op' => $op,
                    'db_archivos' => (new Model\Varios)->listar_archivos_cargados('Carga de Altas'),
                    'db_tmpbase' => (new Model\B2b)->getTMP_Q_BaseAltas()
                ));
            break;
            case 'seguimiento_altas':
                echo $this->template->render('b2b/altas/seguimiento_altas',array(
                    'menu_op' => $op,
                    'db_HOY' => (new Model\B2b)->getResumenOrdenesAltasSeguimiento('ULTIMA_AGENDA="'.date('Ymd').'"'),
                    //'db_FUTURO' => (new Model\B2b)->getResumenOrdenesAltasSeguimiento('ULTIMA_AGENDA>"'.date('Ymd').'"'),
                    'db_ATRASADO' => (new Model\B2b)->getResumenOrdenesAltasSeguimiento('ULTIMA_AGENDA<"'.date('Ymd').'"'),
                    'db_HORARIO_COMPROMISO' => (new Model\B2b)->getHORARIO_COMPROMISO()
                ));
            break;
            case 'reporteria_altas':
                echo $this->template->render('b2b/altas/reporteria',array(
                    'menu_op' => $op,
                    'bloque_act' => (new Model\Varios)->ObtenerBloqueActual(),
                    'bloque_ant' => (new Model\Varios)->ObtenerBloqueAnterior()
                ));
            break;
            case 'exporta_excel_b2b_Altas_hoy':
                (new Model\B2b)->exporta_excel_b2b_Altas_hoy();
            break;
//----------MANTENEDORES ALTAS
            case 'listar_motivopendiente':
                echo $this->template->render('b2b/altas/master_motivopendiente/listar_motivopendiente',array(
                    'menu_op' => $op,
                    'db_motivopendiente' => (new Model\B2b)->getAll_db_motivopendiente('ALTAS')
                ));
            break;
            case 'nuevo_motivopendiente':
                echo $this->template->render('b2b/altas/master_motivopendiente/nuevo_motivopendiente',array(
                    'menu_op' => $op
                ));
            break;
            case 'editar_motivopendiente':
                if($this->isset_id and false !== ($data = (new Model\B2b)->getMotivoPendientebyID($router->getId(true)))) {
                    echo $this->template->render('b2b/altas/master_motivopendiente/editar_motivopendiente', array(
                       'menu_op' => $op,
                       'db_motivopendiente' => $data[0]
                    ));
                } else {
                    $this->functions->redir($config['site']['url'] . 'b2b/&error=true');
                }
            break;
            case 'estado_motivopendiente':
                 (new Model\B2b)->update_estado_motivopendiente($router->getId(true));
            break;

            case 'listar_motivoincumplimiento':
                echo $this->template->render('b2b/altas/master_motivoincumplimiento/listar_motivoincumplimiento',array(
                    'menu_op' => $op,
                    'db_motivoincumplimiento' => (new Model\B2b)->getAll_db_motivoincumplimiento('ALTAS')
                ));
            break;
            case 'nuevo_motivoincumplimiento':
                echo $this->template->render('b2b/altas/master_motivoincumplimiento/nuevo_motivoincumplimiento',array(
                    'menu_op' => $op
                ));
            break;
            case 'editar_motivoincumplimiento':
                if($this->isset_id and false !== ($data = (new Model\B2b)->getMotivoInCumplimientobyID($router->getId(true)))) {
                    echo $this->template->render('b2b/altas/master_motivoincumplimiento/editar_motivoincumplimiento', array(
                       'menu_op' => $op,
                       'db_motivoincumplimiento' => $data[0]
                    ));
                } else {
                    $this->functions->redir($config['site']['url'] . 'b2b/&error=true');
                }
            break;
            case 'estado_motivoincumplimiento':
                 (new Model\B2b)->update_estado_motivoincumplimiento($router->getId(true));
            break;
//----------MANTENEDORES ALTAS
            default:
                echo $this->template->render('b2b/b2b',array(
                    'menu_op' => $op,
                    'getResumenGestionCompromisoHoy' => (new Model\B2b)->getResumenGestionCompromisoHoy(date('Ymd')),
                    'getResumenGestionCompromisoHoyBloques' => (new Model\B2b)->getResumenGestionCompromisoHoyBloques(date('Ymd'))
                ));
            break;
        }

    }
}
