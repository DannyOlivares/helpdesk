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
 * Modelo Areacontingencia
 *
 * @author Jorge Jara H. <jjara@wys.cl>
 */

class Areacontingencia extends Models implements IModels {
    /**
      * Característica para establecer conexión con base de datos.
    */
    use DBModel;

    // Contenido del modelo...


		/**
      * Obtiene elementos de Areacontingencia en
      *
      * @param string $select: Elementos de  a seleccionar
      *
      * @return false|array: false si no hay datos.
      *                     array con los datos.
    */
    final public function get(string $select = '*') {
      return $this->db->select($select,'');
    }

    public function mostrarAreaContingenciaTotales(){
        $sql="  SELECT  id_contingencia, nombre, name
                FROM    area_contingencia , users
                WHERE   id_responsable = id_user";
        
        return $this->db->query_select($sql);
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
