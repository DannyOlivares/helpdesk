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
 * Controlador bitacora/
 *
 * @author Jorge Jara H. <jjara@wys.cl>
*/

class bitacoraController extends Controllers implements IControllers {

    public function __construct(IRouter $router) {
        $op = '5';
        parent::__construct($router,array(
            'users_logged' => true,
            'access_menu' => ['id_menu' => $op, 'access' => true]
        ));
            //'users_logged' => true ... evia el ingreso por url siesq no se ha loggeado
        switch ($this->method) {

            case 'editar':
            $t =  new Model\Bitacora();
                echo $this->template->render('bitacora/editar',array(
                'data' => $t->getRegistroById($router->getId()),
                'menu_op' => $op
                ));
                break;

        case 'eliminar':
                $t =  new Model\Bitacora();
                $t->eliminarBitacora($router->getId());

            break;

        case 'agregarBitacora':
            echo $this->template->render('bitacora/agregarBitacora');
            break;

            default:

                echo $this->template->render('bitacora/agregarEvento',array(
                    'data'=>(new Model\Bitacora)->mostrarBitacorasTotales(),
                    'menu_op' => $op
                ));


                break;
        }


    }

}
