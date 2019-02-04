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
 * Controlador portal/
 *
 * @author Jorge Jara H. <jjara@wys.cl>
*/

class portalController extends Controllers implements IControllers {

    public function __construct(IRouter $router) {
        global $config;
        $op = '0';
        parent::__construct($router,array(
            'users_logged' => true
        ));
        switch($this->method){
            case 'perfil_usuario':
                echo $this->template->render('portal/perfil_usuario',array(
                    'menu_op' => $op
                ));
            break;
            default:
                $hoy = date ('Ymd');
                $desde_quincena = date('Ymd',strtotime('-7 days',mktime(0, 0, 0, date("m")  , 15, date("Y"))));
                $hasta_quincena = date('Ymd',strtotime('-1 days',mktime(0, 0, 0, date("m")  , 15, date("Y"))));
                $fecha_plazo = date('d-m-Y',strtotime('-1 days',mktime(0, 0, 0, date("m")  , 15, date("Y"))));
                $arreglo_anticipo = array('mostrar' => 'no');

                if ($hoy >= $desde_quincena && $hoy <= $hasta_quincena){
                    $monto = (new Model\Rrhh)->getdbAnticipoEjecutivo(date('Ym'),$this->user['rut_personal']);
                    $tope = (new Model\Rrhh)->getTopeAnticipo();
                    $arreglo_anticipo = array('mostrar' => 'si', 'fecha_plazo' => $fecha_plazo, 'tope_valor' => $tope['valor'], 'tope_formato' => $tope['valor_formato'], 'monto' => $monto);
                }
                echo $this->template->render('portal/home',array(
                    'menu_op' => $op,
                    'getCumpleañosUsuariosMes' => (new Model\Varios)->getCumpleañosUsuariosMes(),
                    'arreglo_anticipo' => $arreglo_anticipo
                ));
            break;
          }
    }

}
