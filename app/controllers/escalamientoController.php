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
                echo $this->template->render('escalamiento/agregarEscalamiento');
            break;

            case 'agregarEscalamientoNoCorresponde':
                echo $this->template->render('escalamiento/agregarEscalamientoNoCorresponde');
            break;

            case 'escalamiento':
                $t = new Model\Escalamiento();
                echo $this->template->render('escalamiento/escalamiento',array(
                    'data2'     => (new Model\Escalamiento)->actividadesPendientes(),
                    'data3'     => (new Model\Escalamiento)->actividadesAsignadas(),
                    'data1'     => (new Model\Escalamiento)->actividadesTotales(),
                    'data4'     => (new Model\Escalamiento)->actividadesFinalizadasHoyAll()
                ));
            break;

            default:
                echo $this->template->render('escalamiento/agregarEncargadoFiltrar');
            break;
        }

    }

}
