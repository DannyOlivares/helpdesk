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
 * Controlador areacontingencia/
 *
 * @author Jorge Jara H. <jjara@wys.cl>
*/

class areacontingenciaController extends Controllers implements IControllers {

    public function __construct(IRouter $router) {
        parent::__construct($router,array(
            // 'users_logged' => true
        ));

        //opcion correspondiente a menú
        // $op = array(0);
        //remplazar vista a mostrar


        // $a = new Model\Areacontingencia;
        switch ($this->method) {
            case 'editar':
                // code...
                break;

            case 'eliminar':
                    // code...
                    break;

            case 'agregarAreaContingencia':
                // code...
                break;

            default:
                echo $this->template->render('areacontingencia/listarAreasContingencia',array(
                    'data'=>(new Model\Areacontingencia)->mostrarAreaContingenciaTotales()
                ));
                break;
        }


    }

}
