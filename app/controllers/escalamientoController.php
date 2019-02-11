<?php

namespace app\controllers;

use app\models as Model;
use Ocrend\Kernel\Router\IRouter;
use Ocrend\Kernel\Controllers\Controllers;
use Ocrend\Kernel\Controllers\IControllers;

/**
 * Controlador escalamiento/
 *
 * @author Jorge Jara H. <jjara@wys.cl>
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
                    'data1'     => (new Model\Escalamiento)->actividadesTotales()
                ));
            break;

            default:
                echo $this->template->render('escalamiento/agregarEncargadoFiltrar');
            break;
        }

    }

}
