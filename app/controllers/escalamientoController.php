<?php

namespace app\controllers;

use app\models as Model;
use Ocrend\Kernel\Router\IRouter;
use Ocrend\Kernel\Controllers\Controllers;
use Ocrend\Kernel\Controllers\IControllers;

/**
 * Controlador escalamiento/
 *
 * @author Danny Olivares <danny.olivares@molder.cl>
*/

class escalamientoController extends Controllers implements IControllers {

    public function __construct(IRouter $router) {
        parent::__construct($router,array(
            'users_logged' => true
        ));

        switch ($this->method) {
            case 'agregarEscalamiento':
                echo $this->template->render('escalamiento/agregarEscalamiento', array(
                    'id_actividad' => $router->getId()
                    
                ));
            break;

            case 'agregarEscalamientoNoCorresponde':

                $router->setRoute('/mi_nueva_ruta');
                
                echo $this->template->render('escalamiento/agregarEscalamientoNoCorresponde', array(                 
                    'id_actividad'      => $router->getId(),
                    'nombreRemitente'   => $router->getRoute('/mi_nueva_ruta')
                ));
            break;

            case 'escalamiento':
                $t = new Model\Escalamiento();
                echo $this->template->render('escalamiento/escalamiento',array(
                    'data2'     =>  (new Model\Escalamiento)->actividadesPendientes(),
                    'data3'     =>  (new Model\Escalamiento)->actividadesAsignadas(),
                    'data1'     =>  (new Model\Escalamiento)->actividadesTotales(),
                    'data4'     =>  (new Model\Escalamiento)->actividadesFinalizadasHoyAll(),
                    'data7'     =>  (new Model\Escalamiento)->totalCompromisosHoy(),
                    'data8'     =>  (new Model\Escalamiento)->TotalAlertasActividades(),
                    'data9'     =>  (new Model\Escalamiento)->AlertaCompromisosPorVencer(),
                    'data10'    =>  (new Model\Escalamiento)->TotalAlertasCompromisos()
                ));
            break;

            case 'listaActividades':
                $t = new Model\Escalamiento();
                echo    $this->template->render('escalamiento/listaActividades', array(
                    'data'  =>  (new Model\Escalamiento)->actividadesAll()
                ));
                break;
            default:
                echo $this->template->render('escalamiento/agregarEncargadoFiltrar');
            break;
        }

    }

}
