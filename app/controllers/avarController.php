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

class avarController extends Controllers implements IControllers {

    public function __construct(IRouter $router) {
        global $config;
        $op = '1';
        parent::__construct($router,array(
            'users_logged' => true,
            'access_menu' => ['id_menu' => $op, 'access' => true]
        ));

        switch($this->method){
            case 'carga_pendientes':
                echo $this->template->render('avar/cargaordenes/carga_pendientes', array(
                    'menu_op' => $op,
                    'fecha' => date('Y-m-d'),
                    'db_archivos' => (new Model\Varios)->listar_archivos_cargados('Carga de Blindaje',10)
                ));
            break;
            case 'distribucion':
                echo $this->template->render('avar/distribucion/distribuir_blindaje', array(
                    'menu_op' => $op,
                    'fecha' => date('Y-m-d'),
                    'comunas' => (new Model\Avar)->verComunasAvar(),
                    'bloque' => (new Model\Avar)->verBloque()
                ));
            break;
            default:
                echo $this->template->render('avar/avar',array(
                    'menu_op' => $op,
                ));
            break;
        }

    }
}
