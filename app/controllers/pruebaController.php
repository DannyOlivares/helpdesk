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
 * Controlador prueba/
 *
 * @author Jorge Jara H. <jjara@wys.cl>
*/

class pruebaController extends Controllers implements IControllers {

    public function __construct(IRouter $router) {
        parent::__construct($router,array(
            'users_logged' => true
        ));

        //opcion correspondiente a menú
        $op = array(0);
        //remplazar vista a mostrar
		    echo $this->template->render('carpeta/vistaTWIG', array('menu_op' => $op ));

        $p = new Model\Prueba;
		echo $this->template->render('prueba/prueba');

    }

}
