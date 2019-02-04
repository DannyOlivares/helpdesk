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
 * Controlador evento/
 *
 * @author Jorge Jara H. <jjara@wys.cl>
*/

class eventoController extends Controllers implements IControllers {

    public function __construct(IRouter $router) {
        $op = '5';
        parent::__construct($router,array(
            'users_logged' => true,
            'access_menu' => ['id_menu' => $op, 'access' => true]
        ));

        switch($this->method){

            case 'editar_evento':
                    echo $this      ->template->render('evento/modificar_evento',array(
                        'data'      =>  (new Model\Evento)->getRegistroById($router->getId(), "editar"),
                        'dataEvento'=>  (new Model\Evento)->getRegistroArea($router->getId()),
                        'dato'      =>  (new Model\Evento)->obtenerResponsables(),
                        'dat'       =>  (new Model\Evento)->obtenerAreas(),
                        'date'      =>  (new Model\Evento)->obtenerResponsableEvento($router->getId()),
                        'dataArea'  =>  (new Model\Evento)->getAreas($router->getId()),
                        'dataRes'   =>  (new Model\Evento)->getResponsables($router->getId())

                    ));
                break;

            case 'eliminar_evento':
                    $t = new Model\Evento();
                    $t->eliminar_evento($router->getId());
                break;

            case 'agregarEvento':
                echo $this->template->render('evento/agregarEvento',array(
                    'data'=>(new Model\Evento)->obtenerResponsables(),
                    'dato'=>(new Model\Evento)->obtenerAreas()
                ));
                break;

            case 'listar_evento':
                $ctrl = $router->getId(true);
                if ($ctrl == "") {
                    echo $this->template->render('evento/list_evento', array(
                        'data'=>(new Model\Evento)->mostrarEventosTotales(),
                        'user'=>(new Model\Evento)->enviarUsuarioLogeado()
                    ));
                } else {
                    echo $this->template->render('evento/list_evento', array(
                        'data'=>(new Model\Evento)->getRegistroById($ctrl, "listar"),
                        'user'=>(new Model\Evento)->enviarUsuarioLogeado()
                    ));
                }
                break;

                default:
                    echo $this ->template->render('evento/bienvenida',array(
                        'data'  =>(new Model\Evento)->timeline(),
                        'fin'   =>(new Model\Evento)->totalFinalizadas(),
                        'pen'    =>(new Model\Evento)->totalPendientes()
                    ));
        }

    }

}
