<?php

/*
 * This file is part of the Ocrend Framewok 2 package.
 *
 * (c) Ocrend Software <info@ocrend.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace app\models;

use app\models as Model;
use Ocrend\Kernel\Models\Models;
use Ocrend\Kernel\Models\IModels;
use Ocrend\Kernel\Models\ModelsException;
use Ocrend\Kernel\Models\Traits\DBModel;
use Ocrend\Kernel\Router\IRouter;

/**
 * Modelo Bitacora
 *
 * @author Jorge Jara H. <jjara@wys.cl>
 */

class Bitacora extends Models implements IModels {
    /**
      * Característica para establecer conexión con base de datos.
    */
    use DBModel;

    public function crearBitacora(){
        global $http;

        try {
            $campoDetalle       =   $http->request->get('iDetalle');
            $campoDescripcion   =   $http->request->get('iDescripcion');

            if($this->functions->e($campoDetalle,$campoDescripcion)){
                throw new \Exception('Todos los datos deben ser ingresados');
            }

            $sql="insert bitacora(detalle,descripcion) value('$campoDetalle', '$campoDescripcion')";
            $result = $this->db->query_select($sql);

            return array('success'=> 1, 'message' => 'Registro con exito');
        } catch (\Exception $e) {
            return array("success" => 0, 'message' => $e->getMessage());
        }

    }

    public function eliminarBitacora($id){
        global $config;

        $sql="delete from bitacora where idBitacora='$id'";
        $this->db->query_select($sql);
        $this->functions->redir($config['site']['url'].'/bitacora');
    }

    public function mostrarBitacorasTotales(){
        $sql= "select * from bitacora";
        return $this->db->query_select($sql);
    }

    public function getRegistroById($id){
        $sql = "select * from bitacora where idBitacora='$id'";
        $result = $this->db->query_select($sql);
        return $result[0];
    }

    public function editarBitacora(){
        global $http;

        $idBitacora = $http->request->get('idBitacora');
        $descripcion = $http->request->get('descripcion');
        $detalle = $http->request->get('detalle');

        $sql = "update bitacora set descripcion = '$descripcion', detalle ='$detalle' where idBitacora = '$idBitacora'";
        $this->db->query_select($sql);

        return array("success" => 1);
    }


    /**
      * __construct()
    */
    public function __construct(IRouter $router = null) {
        parent::__construct($router);
        $this->startDBConexion();
    }

    /**
      * __destruct()
    */
    public function __destruct() {
        parent::__destruct();
        $this->endDBConexion();
    }
}
