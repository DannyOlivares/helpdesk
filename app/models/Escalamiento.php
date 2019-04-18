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
use \datetime;

// $GLOBALS['contador']=0;

/**
 * Modelo Escalamiento
 *
 * @author Jorge Jara H. <jjara@wys.cl>
 */

class Escalamiento extends Models implements IModels
{
    var $contador = 0;
    /**
     * Característica para establecer conexión con base de datos.
     */
    use DBModel;


    function valida_rut($rut)
    {
        if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {
            return false;
        }
        $rut = preg_replace('/[\.\-]/i', '', $rut);
        $dv = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut) - 1);
        $i = 2;
        $suma = 0;
        foreach (array_reverse(str_split($numero)) as $v) {
            if ($i == 8)
                $i = 2;
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);
        if ($dvr == 11)
            $dvr = 0;
        if ($dvr == 10)
            $dvr = 'K';
        if ($dvr == strtoupper($dv))
            return true;
        else
            return false;
    }

    public function verRemitente($id)
    {

        $sql    =   "SELECT idActividadManual, nombreRemitente, areaIngreso 
                    FROM tblescalamiento_actividad
                    WHERE idActividadManual = '$id'";

        $result = $this->db->query_select($sql);

        return $result[0];
    }

    public function agregarEscalamiento()
    {
        global $http;

        try {

            $idActividadManual              = $http->request->get('idActividadManual');
            $rutCliente                     = $http->request->get('rutCliente');
            $fechaCompromiso                = $http->request->get('fechaCompromiso');
            $canal                          = $http->request->get('canal');
            $bloque                         = $http->request->get('bloque');
            $estadoEscalamiento             = $http->request->get('estadoEscalamiento');
            $tipoActividad                  = $http->request->get('selectTipoActividad');
            $estadoOrden                    = $http->request->get('selectEstadoOrden');
            $nombreUsuario                  = $http->request->get('nombreUsuario');
            $fechaFinalizacion              = "sin finalizar";
            $descripcionActividad           = $http->request->get('descripcionActividad');
            $fechaCreacion                  = $http->request->get('fechaCreacion');
            $comuna                         = $http->request->get('comuna');
            $horaCompromiso                 = $http->request->get('horaCompromiso');
            $nombreUsuario                  = $http->request->get('nombreUsuario');
            $observacionActividad           = $http->request->get('observacionActividad');

            $validar = [
                "Id_Actividad_Manual"       => $idActividadManual,
                "rutCliente"                => $rutCliente,
                "fechaCompromiso"           => $fechaCompromiso,
                "canal"                     => $canal,
                "bloque"                    => $bloque,
                "estadoEscalamiento"        => $estadoEscalamiento,
                "tipoActividad"             => $tipoActividad,
                "estadoOrden"               => $estadoOrden,
                "nombreUsuario"             => $nombreUsuario,
                "fechaFinalizacion"         => $fechaFinalizacion,
                "descripcionActividad"      => $descripcionActividad,
                "fechaCreacion"             => $fechaCreacion,
                "comuna"                    => $comuna,
                "horaCompromiso"            => $horaCompromiso,
                "observacion"               => $observacionActividad
            ];

            $validaRut = $this->valida_rut($rutCliente);

            if ($validaRut == false) {
                return array('success' => 0, 'message' => 'Ingrese un rut válido', 'id' => 'rutCliente');
            }

            foreach ($validar as $i => $value) {
                if (trim($value) == '') {
                    return array('success' => 0, 'message' => 'ERROR de validacion en ' . $i, 'id' => $i);
                }
            }

            $sql = "UPDATE tblescalamiento_actividad
                    SET rutCliente          =   '$rutCliente',
                        fechaCompromiso     =   '$fechaCompromiso',
                        canal               =   '$canal',
                        bloque              =   '$bloque',
                        estadoEscalamiento  =   '$estadoEscalamiento',
                        tipoActividad       =   '$tipoActividad',
                        nombreUserLog       =   '$nombreUsuario',
                        descripcionActividad=   '$descripcionActividad',
                        fechaCreacion       =   '$fechaCreacion',
                        comunaActividad     =   '$comuna',
                        horaCompromiso      =   '$horaCompromiso',
                        observacion         =   '$observacionActividad'
                    WHERE idActividadManual =   '$idActividadManual'";

            $result     =   $this->db->query_select($sql);

            $sql1 = "INSERT tblescalamiento(
                            estado,
                            idActividadManual
                )   VALUES  (
                            '$estadoOrden',
                            '$idActividadManual'
                                        )";

            $result1 = $this->db->query_select($sql1);

            return array('success' => 1, 'message' => 'registro creado correctamente, se ha agregado a vista ' . $estadoOrden);
        } catch (\Exception $e) {
            return array('success' => 0, 'message' => 'Error al crear actividad');
        }
    }
    //TODO:
    public function crearEncargadoFiltrar()
    {
        global $http;

        try {

            $nombreRemitente        = $http->request->get('nombreRemitente');
            $areaIngreso            = $http->request->get('areaIngreso');
            $comuna                 = $http->request->get('comuna');
            $selectTipoActividad    = $http->request->get('selectTipoActividad');
            $idActividadManual      = $http->request->get('idActividadManual');
            $nombreUsuarioLogeado   = $http->request->get('nombreUsuario');

            $validar = [
                'nombreRemitente'       =>  $nombreRemitente,
                'areaIngreso'           =>  $areaIngreso,
                'comuna'                =>  $comuna,
                'selectTipoActividad'   =>  $selectTipoActividad,
                'idActividadManual'     =>  $idActividadManual
            ];
            //validaciones de campos formulario
            if ($selectTipoActividad == 'sinActividad') {
                if (trim($nombreRemitente) == '' || trim($areaIngreso) == '' || trim($comuna) == '' || trim($selectTipoActividad) == '') {
                    return array('success' => 0, 'message' => 'Error, debe llenar todos los campos');
                }
            } else {
                foreach ($validar as $i => $value) {
                    if (trim($value) == '') {
                        return array('success' => 0, 'message' => 'Error, debe ingresar todos los datos');
                    }
                }
            }

            if ($selectTipoActividad != 'sinActividad') {

                $sql1 = "SELECT * FROM tblescalamiento";
                $sql2 = "SELECT * FROM tblescalamiento_actividad";
                $result = $this->db->query_select($sql1);
                $result2 = $this->db->query_select($sql2);

                $arrResult = $result;

                $arrResult2 = $result2;

                //valido si existe
                if ($arrResult) {
                    for ($i = 0; $i < count($arrResult); $i++) {
                        if ($arrResult[$i]['idActividadManual'] == $idActividadManual) {
                            return array('success' => 0, 'message' => 'Esta Actividad ya existe en nuestros registros');
                        }
                    }
                }

                if ($arrResult2) {
                    for ($i = 0; $i < count($arrResult2); $i++) {
                        if ($arrResult2[$i]['idActividadManual'] == $idActividadManual) {
                            return array('success' => 0, 'message' => 'Esta Actividad ya existe en nuestros registros');
                        }
                    }
                }

                $sql =   "INSERT tblescalamiento_actividad(
                                                        areaIngreso,
                                                        comunaRemitente,
                                                        nombreRemitente,
                                                        tipoActividad,
                                                        idActividadManual
                )VALUE(
                                                        '$areaIngreso',
                                                        '$comuna',
                                                        '$nombreRemitente',
                                                        '$selectTipoActividad',
                                                        '$idActividadManual' )";

                $result =    $this->db->query_select($sql);
                //TODO:
            } else {

                $sql1       =   "SELECT * FROM tblescalamiento";
                $sql2       =   "SELECT * FROM tblescalamiento_actividad";
                $result     =   $this->db->query_select($sql1);
                $result2    =   $this->db->query_select($sql2);

                $arrResult = $result;
                $arrResult2 = $result2;

                //valido si existe
                if ($arrResult) {
                    for ($i = 0; $i < count($arrResult); $i++) {
                        if ($arrResult[$i]['idSinActividad'] == $idActividadManual) {
                            return array('success' => 0, 'message' => 'Esta Actividad ya existe en nuestros registros');
                        }
                    }
                }

                if ($arrResult2) {
                    for ($i = 0; $i < count($arrResult2); $i++) {
                        if ($arrResult2[$i]['idSinActividad'] == $idActividadManual) {
                            return array('success' => 0, 'message' => 'Esta Actividad ya existe en nuestros registros');
                        }
                    }
                }

                $sql    =   "SELECT MAX(idSinActividad) 
                            FROM tblescalamiento";

                $actividadMaxima = $this->db->query_select($sql);
                $activMax       =   (integer)$actividadMaxima[0][0];

                $activMax = $activMax + 1;

                if ($selectTipoActividad == "sinActividad") {
                    $miEstado   =   "sin actividad";

                    $sql =   "INSERT tblescalamiento_actividad(
                                    areaIngreso,
                                    comunaActividad,
                                    nombreRemitente,
                                    tipoActividad,
                                    idSinActividad                                                   
                            )VALUE(
                                    '$areaIngreso',
                                    '$comuna',
                                    '$nombreRemitente',
                                    '$selectTipoActividad',
                                    '$activMax'                                                  
                                                    )";
                    $result =    $this->db->query_select($sql);

                    $sql =   "INSERT tblescalamiento(
                                            estado,
                                            idSinActividad
                            )VALUE(
                                            '$miEstado',
                                            '$activMax'
                            )";
                    $result = $this->db->query_select($sql);
                }
            }

            if (
                $selectTipoActividad     == 'deuda'                      ||
                $selectTipoActividad    == 'sinActividad'               ||
                $selectTipoActividad    == 'reclamoComercial'           ||
                $selectTipoActividad    ==  'actividadesPendientesAndes'
            ) {
                return array(
                    'success'          => 2,
                    'message'           => 'Actividad Mal Enviada',
                    'idActv'            => $idActividadManual,
                    'nombreRemitente'   => $nombreRemitente
                );
            } else {
                return array(
                    'success'          => 3,
                    'message'           => 'Crear Actividad',
                    'idActv'            => $idActividadManual,
                    'nombreRemitente'   => $nombreRemitente
                );
            }
        } catch (\Exception $e) {
            return array('success' => 0, 'message' => $e->getMessage());
        }
    }

    public function agregarEscalamientoNoCorresponde()
    {
        global $http;
        try {

            $nombreUsuario          =   $http->request->get('nombreUsuario');
            $nombreRemitente        =   $http->request->get('nombreRemitente');
            $fechaCreacion          =   $http->request->get('fecha');
            $fechaFinalizacion      =   $http->request->get('fechaFinalizacion');
            $observacion            =   $http->request->get('observacion');
            $rutCliente             =   $http->request->get('rutCliente');
            $selectTipoActividad    =   $http->request->get('selectTipoActividad');
            $idActividadManual      =   $http->request->get('idActividad');
            $estadoOrden            =   "No Corresponde";

            $validaRut = $this->valida_rut($rutCliente);

            if ($validaRut == false) {
                return array('success' => 0, 'message' => 'Ingrese un rut válido', 'id' => 'rutCliente');
            }

            $sql       =       "SELECT * FROM tblescalamiento";
            $result    =       $this->db->query_select($sql);

            $arrResult = $result;

            if ($arrResult) {
                for ($i = 0; $i < count($arrResult); $i++) {
                    if ($arrResult[$i]['idActividadManual'] == $idActividadManual && $arrResult[$i]['idActividadManual'] == '') {
                        return array('success' => 0, 'message' => 'Esta Actividad ya existe en nuestros registros');
                    }
                }
            }

            $validar = [
                'nombreUsuario'         =>   $nombreUsuario,
                'nombreRemitente'       =>   $nombreRemitente,
                'fechaCreacion'         =>   $fechaCreacion,
                'idActividadManual'     =>   $idActividadManual,
                'fechaFinalizacion'     =>   $fechaFinalizacion,
                'observacion'           =>   $observacion,
                'rutCliente'            =>   $rutCliente
            ];

            foreach ($validar as $i => $value) {
                if (trim($value) == '') {
                    return array('success' => 0, 'message' => 'Error al intentar validar el campo ' . $i);
                }
            }

            $sql2          =   "UPDATE tblescalamiento_actividad
                                SET     idActividadManual       =   '$idActividadManual',
                                        rutCliente              =   '$rutCliente',
                                        fechaCreacion           =   '$fechaCreacion',
                                        nombreUserLog           =   '$nombreUsuario',
                                        fechaFinalizacion       =   '$fechaFinalizacion',
                                        nombreRemitente         =   '$nombreRemitente',
                                        observacion             =   '$observacion'
                                WHERE idActividadManual = '$idActividadManual'";

            $result2             =   $this->db->query_select($sql2);

            $sql1           =  "INSERT tblescalamiento(
                                            estado,
                                            idActividadManual
                                                                )
                                    VALUES  (
                                            '$estadoOrden',
                                            '$idActividadManual'
                                                                )";

            $result1            =   $this->db->query_select($sql1);
            return array(
                'success' => 1,
                'message' => 'Actividad se ha creado y  Finalizado automáticamente'
            );
        } catch (\Exception $e) {
            return array('success' => 0, 'message' => $e->getMessage());
        }
    }

    public function actividadesPendientes()
    {
        $sql = 'SELECT count(*) FROM tblescalamiento
                WHERE estado = "pendiente"';
        return $this->db->query_select($sql);
    }

    public function actividadesTotales()
    {
        $sql = 'SELECT count(*) FROM tblescalamiento_actividad
        WHERE fechaCreacion = CURDATE()';
        return $this->db->query_select($sql);
    }

    public function actividadesFinalizadasHoy()
    {
        $sql = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
        DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'),
                    rutCliente,
                    esc.idActividadManual,
                    comunaActividad,
                    nombreRemitente,
                    bloque,
                    tipoActividad,
                    gestion
        FROM tblescalamiento_actividad esca INNER JOIN tblescalamiento esc 
        ON esca.idActividadManual = esc.idActividadManual
        WHERE fechaFinalizacion = CURDATE() AND esc.estado = 'finalizada'";

        $result = $this->db->query_select($sql);

        return array('data' => $result);
    }

    public function actividadesPendientesAll()
    {
        $sql = "SELECT 	DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
                        DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'), 
                        esca.rutCliente, 
                        esca.idActividadManual, 
                        esca.comunaActividad, 
                        esca.nombreRemitente, 
                        esca.bloque, 
                        esca.tipoActividad,
                        esca.gestion
        
                FROM tblescalamiento_actividad esca INNER JOIN tblescalamiento esc 
                ON esca.idActividadManual = esc.idActividadManual
                WHERE esc.estado = 'pendiente'";
        $result = $this->db->query_select($sql);
        return  array('data' => $result);
    }

    public function actividadesAsignadasAll()
    {
        $sql = "SELECT 	DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
                        DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'), 
                        esca.rutCliente, 
                        esca.idActividadManual, 
                        esca.comunaActividad, 
                        esca.nombreRemitente, 
                        esca.bloque, 
                        esca.tipoActividad,
                        esca.gestion
                FROM tblescalamiento_actividad esca INNER JOIN tblescalamiento esc 
                ON esca.idActividadManual = esc.idActividadManual
                WHERE esc.estado = 'seguimiento'";
        $result =  $this->db->query_select($sql);

        return array('data' => $result);
    }

    public function actividadesAsignadas()
    {
        $sql = "SELECT count(*)
                FROM tblescalamiento
                WHERE estado = 'seguimiento'";

        return $this->db->query_select($sql);
    }

    public function actividadesAll()
    {

        $sql = "SELECT
                    esca.idActividadmanual, 
                    rutCliente,
                    DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'),
                    esca.canal,
                    esca.bloque,
                    esca.estadoEscalamiento,
                    esca.tipoActividad,
                    esca.gestion,
                    esca.horaCompromiso,
                    esc.estado,
                    esca.nombreUserLog
                    FROM tblescalamiento_actividad esca 
                    INNER JOIN tblescalamiento esc 
                    ON esca.idActividadManual = esc.idActividadManual
                    WHERE esc.estado <> 'No Corresponde'";

        $result = $this->db->query_select($sql);
        return array('data' => $result);
    }

    public function actividadesFinalizadasHoyAll()
    {
        $sql = 'SELECT count(*) from tblescalamiento_actividad
                WHERE  fechaFinalizacion = curdate()';
        $result = $this->db->query_select($sql);

        return  array('data' => $result);
    }

    public function totalCompromisosHoy()
    {
        $sql    =   "SELECT COUNT(*)
                    FROM tblescalamiento esc
                    INNER JOIN tblescalamiento_actividad esca ON esc.idActividadManual = esca.idActividadManual
                    WHERE esc.estado = CURDATE() AND esc.estado <> 'finalizada'";

        $result =   $this->db->query_select($sql);
        return $result;
    }

    public function actividadesNoCorresponden()
    {
        $sql = "SELECT  esca.idActividadManual,
                     	DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
                        DATE_FORMAT(fechaFinalizacion, '%d-%m-%Y'),
                        esca.nombreRemitente,
                        esca.nombreUserLog,
                        esca.observacion
                FROM tblescalamiento_actividad esca INNER JOIN tblescalamiento esc
                ON esca.idActividadManual = esc.idActividadManual
                WHERE esc.estado = 'no corresponde'";
        $result = $this->db->query_select($sql);

        return array('data' => $result);
    }

    public function visualizarActividad($select = '*')
    {
        global $http;

        $idActividad            =   $http->request->get('idActividad');
        $consulta               =   $this->db->select(
            $select,
            'tblescalamiento_actividad esca 
                                                        INNER JOIN tblescalamiento esc ON esca.idActividadManual = esc.idActividadManual',
            "idActividadManual = '$idActividad'",
            'limit 1'
        );
        $idActividad            =   $consulta[0]['idActividadManual'];
        $rutCliente             =   $consulta[0]['rutCliente'];
        $fechaCompromiso        =   $consulta[0]['fechaCompromiso'];
        $canal                  =   $consulta[0]['canal'];
        $bloque                 =   $consulta[0]['bloque'];
        $estadoEscalamiento     =   $consulta[0]['estadoEscalamiento'];
        $tipoActividad          =   $consulta[0]['tipoActividad'];
        $estadoOrden            =   $consulta[0]['estadoOrden'];
        $descripcionActividad   =   $consulta[0]['descripcionActividad'];
        $fechaCreacion          =   $consulta[0]['fechaCreacion'];
        $comuna                 =   $consulta[0]['comunaActividad'];

        $html = "<h3 class='text-center'>
                 " . $descripcionActividad . "
                 </h3>
                 <h4>
                 <table table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Id Actividad</th>
                            <th>Rut Cliente</th>
                            <th>Fecha Compromiso</th>
                            <th>Canal</th>
                            <th>Bloque</th>
                            <th>Estado Escalamiento</th>
                            <th>Tipo Actividad</th>
                            <th>Estado Orden</th>
                            <th>Descripcion Actividad</th>
                            <th>Fecha Creación</th>
                            <th>Comuna</th>
                        </tr>
                    <tbody>
                        <tr>
                            <td>" . $idActividad . "</td>
                            <td>" . $rutCliente . "</td>
                            <td>" . $fechaCompromiso . "</td>
                            <td>" . $canal . "</td>
                            <td>" . $bloque . "</td>
                            <td>" . $estadoEscalamiento . "</td>
                            <td>" . $tipoActividad . "</td>
                            <td>" . $estadoOrden . "</td>
                            <td>" . $descripcionActividad . "</td>
                            <td>" . $fechaCreacion . "</td>
                            <td>" . $comuna . "</td>
                        </tr>
                    </tbody>
                </table>            ";
        return array('success' => 1, 'html' => $html);
    }

    public function visualizarActividadNoCorresponde($select = '*')
    {
        global $http;

        $idActividad            =   $http->request->get('idActividad');
        $sql = "SELECT * FROM tblescalamiento e INNER JOIN tblescalamiento_actividad esca
                ON e.idActividadmanual = esca.idActividadmanual
                WHERE e.idActividadmanual = '$idActividad'";
        $result = $this->db->query_select($sql);
        $consulta = $result;

        $idActividad            =   $consulta[0]['idActividadManual'];
        $rutCliente             =   $consulta[0]['rutCliente'];
        $fechaCompromiso        =   $consulta[0]['fechaCompromiso'];
        $estadoEscalamiento     =   $consulta[0]['estado'];
        $tipoActividad          =   $consulta[0]['tipoActividad'];
        $estadoOrden            =   $consulta[0]['estado'];
        $fechaCreacion          =   $consulta[0]['fechaCreacion'];
        $fechaFinalizacion      =   $consulta[0]['fechaFinalizacion'];
        $observacion            =   $consulta[0]['observacion'];

        $html = "<h3 class='text-center'>
                " . $observacion . "
                 </h3>
                 <h4>
                 <table table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Id Actividad</th>
                            <th>Rut Cliente</th>
                            <th>Estado Escalamiento</th>
                            <th>Tipo Actividad</th>
                            <th>Estado Orden</th>
                            <th>Fecha Creación</th>
                            <th>Fecha Finalización</th>
                            <th>Observación</th>
                        </tr>
                    <tbody>
                        <tr>
                            <td>" . $idActividad . "</td>
                            <td>" . $rutCliente . "</td>
                            <td>" . $estadoEscalamiento . "</td>
                            <td>" . $tipoActividad . "</td>
                            <td>" . $estadoOrden . "</td>
                            <td>" . $fechaCreacion . "</td>
                            <td>" . $fechaFinalizacion . "</td>
                            <td>" . $observacion . "</td>
                        </tr>
                    </tbody>

                </table>            ";
        return array('success' => 1, 'html' => $html);
    }
    /* 
    crear funcion de retorno data al cambiar el estado de la actividad
    */

    public function cambiarEstadoActividad($select = '*')
    {
        global $http;
        $idActividad            =   $http->request->get('idActividad');
        $estado                 =   $http->request->get('estado');

        $sql                    =   "SELECT * FROM tblescalamiento esc INNER JOIN tblescalamiento_actividad esca 
                                    ON esc.idActividadmanual = esca.idActividadmanual
                                    WHERE esc.idActividadManual = '$idActividad'";
        $result                 =   $this->db->query_select($sql);

        $consulta = $result;
        $rutCliente             =   $consulta[0]['rutCliente'];
        $fechaCompromiso        =   $consulta[0]['fechaCompromiso'];
        $canal                  =   $consulta[0]['canal'];
        $bloque                 =   $consulta[0]['bloque'];
        $estadoEscalamiento     =   $consulta[0]['estadoEscalamiento'];
        $tipoActividad          =   $consulta[0]['tipoActividad'];
        $horaCompromiso         =   $consulta[0]['horaCompromiso'];
        $estadoOrden            =   $consulta[0]['estado'];
        $nombreUserLog          =   $consulta[0]['nombreUserLog'];
        $fechaFinalizacion      =   $consulta[0]['fechaFinalizacion'];
        $descripcionActividad   =   $consulta[0]['descripcionActividad'];
        $fechaCreacion          =   $consulta[0]['fechaCreacion'];
        $comuna                 =   $consulta[0]['comunaActividad'];
        $gestion                =   $consulta[0]['gestion'];

        $sql = "insert tblescalamiento_historial(
                                                idActividadManual,
                                                rutCliente,
                                                fechaCompromiso,
                                                canal,
                                                bloque,
                                                estadoEscalamiento,
                                                tipoActividad,
                                                estadoOrden,
                                                nombreUserLog,
                                                fechaFinalizacion,
                                                descripcionActividad,
                                                fechaCreacion,
                                                comunaActividad,
                                                horaCompromiso

        )value(
                                                '$idActividad',
                                                '$rutCliente',
                                                '$fechaCompromiso',
                                                '$canal',
                                                '$bloque',
                                                '$estadoEscalamiento',
                                                '$tipoActividad',
                                                '$estadoOrden',
                                                '$nombreUserLog',
                                                '$fechaFinalizacion',
                                                '$descripcionActividad',
                                                '$fechaCreacion',
                                                '$comuna',
                                                '$horaCompromiso'
                    )";
        $resultHistory =    $this->db->query_select($sql);

        switch ($estado) {
            case    "finalizada":
                if ($gestion == null) {
                    return array('success' => 0, 'message' => 'para Finalizar Debe agregar una Gestión');
                } else {
                    $sql    =   "UPDATE tblescalamiento
                            SET estado = '$estado'
                            WHERE idActividadManual = '$idActividad'";

                    $sql1    =  "UPDATE tblescalamiento_actividad
                            SET fechaFinalizacion = curdate()
                            WHERE idActividadManual = '$idActividad'";

                    $result =   $this->db->query_select($sql);
                    $result1 =   $this->db->query_select($sql1);
                    return array('success' => 1, 'message' => 'ha cambiado el estado de la actividad con el id' . $idActividad);
                }
                break;
            case    "seguimiento":
                $sql =  "UPDATE tblescalamiento
                        SET estado = '$estado'
                        WHERE   idActividadManual = '$idActividad'";
                $result = $this->db->query_select($sql);
                return array('success' => 1, 'message' => 'Se ha cambiado el estado de la actividad con el id' . $idActividad);
                break;

            case    "pendiente":
                $sql = "UPDATE tblescalamiento
                    SET estado = '$estado'
                    WHERE idActividadmanual = '$idActividad'";
                $result = $this->db->query_select($sql);
                return array('success' => 1, 'message' => 'Se Ha Cambiado el estado satisfactoriamente');
                break;
        }
    }

    public function cambiarEstadoActividadNoCorresponde($select = '*')
    {
        global $http;

        $idActividad        =   $http->request->get('idActividad');
        $estado             =   "actividadForzada";

        $consulta           =   $this->db->select(
            $select,
            'tblescalamiento_actividad esca INNER JOIN
                                tblescalamiento esc ON esca.idActividadManual = esc.idActividadManual',
            "esca.idActividadManual = '$idActividad'",
            'limit 1'
        );

        $sql =   "UPDATE tblescalamiento
                SET     estado = '$estado'
                WHERE   idActividadManual = '$idActividad'
                        ";

        $result   =     $this->db->query_select($sql);
        return array('success' => 1, 'message' => 'Forzar Exitoso, dirijase a pestaña de escalamientos forzados');
    }

    public function AlertaOrdenesPorVencer()
    {
        $sql1 = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'), DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'), c.rutCliente, c.idActividadManual, e.comuna, e.nombreRemitente, c.bloque, c.tipoActividad, c.horaCompromiso
        FROM escalamientoremitente e RIGHT JOIN escalamientocorresponde c ON e.idActividadIngresar = c.idActividadManual
        where c.fechaCompromiso  = CAST(CURRENT_TIMESTAMP AS DATE) and c.estadoOrden <> 'finalizada'";
        $arrayCompromisoHoy = $this->db->query_select($sql1);

        if ($arrayCompromisoHoy) {
            foreach ($arrayCompromisoHoy as $valor) {
                $horaActual =  new DateTime(date_default_timezone_get());
                $horaDeCompromiso = new DateTime($valor['horaCompromiso']);

                $diff = $horaActual->diff($horaDeCompromiso);

                $calcHoras = (($diff->days * 24) * 60) + ($diff->h);

                if ($diff->invert != 1 && $calcHoras <= 1) {
                    $arrayHoraCompromisoXvencer[] = $valor;
                }
            }
        }
        if (!empty($arrayHoraCompromisoXvencer)) {
            return  array("data" => $arrayHoraCompromisoXvencer);
        } else {
            $arrayCompromisoHoy = "";
            return  array('data' => $arrayCompromisoHoy);
        }
    }

    public function agregarGestion()
    {
        global $http;

        $idActividad    = $http->request->get('idActividad');
        $mensaje        = $http->request->get('mensaje');

        if (trim($mensaje) == '') {
            return array('success' => 0, 'message' => 'Error, no a ingresado ningún mensaje');
        }

        $sql    =   "UPDATE tblescalamiento_actividad
        SET gestion = '$mensaje'
        WHERE idActividadManual = '$idActividad'";

        $result = $this->db->query_select($sql);

        return array('success' => 1, 'message' => 'Guardado correctamente');
    }

    public function mostrarComunas()
    {
        $sql    =   "select descripcion from tblcomuna";
        $result = $this->db->query_select($sql);
        return $result;
    }

    public function compromisoHoyMañana()
    {
        $sql    =   "   SELECT c.idActividadManual,
                        DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
                        DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'), 
                            rutCliente,
                            descripcionActividad,
                            nombreRemitente,
                            canal,
                            nombreUserLog, 
                            tipoActividad,
                            estado
                        FROM tblescalamiento_actividad e
                        INNER JOIN tblescalamiento c ON
                            e.idActividadManual = c.idActividadManual 
                        WHERE c.estado <> 'finalizada' AND e.fechaCompromiso = curdate() 
                        OR e.fechaCompromiso = DATE_SUB(CURDATE(), INTERVAL -1 DAY)";

        $result =   $this->db->query_select($sql);
        return array('data' => $result);
    }

    public function betweenFechas()
    {
        global $http;

        $fechaInicio    = $http->request->get('fechaInicio');
        $fechaFin       = $http->request->get('fechaFin');
        $valorTab       = $http->request->get('valorTab');

        switch ($valorTab) {
            case "pendiente":

                $sql = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
                        DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'),
                                esca.rutCliente,
                                esca.idActividadManual,
                                esca.comunaActividad,
                                esca.nombreRemitente,
                                esca.bloque,
                                esca.tipoActividad,
                                esca.gestion
                        FROM tblescalamiento_actividad esca 
                        INNER JOIN tblescalamiento esc 
                        ON esca.idActividadManual = esc.idActividadManual
                        WHERE esc.estado = 'pendiente' AND esca.fechaCompromiso BETWEEN '$fechaInicio' AND '$fechaFin'";
                $result = $this->db->query_select($sql);

                return array("data" => $result);

                break;
            case "seguimiento":

                $sql = "    SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
                        DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'),
                                esca.rutCliente,
                                esca.idActividadManual,
                                esca.comunaActividad,
                                esca.nombreRemitente,
                                esca.bloque,
                                esca.tipoActividad,
                                esca.gestion
                        FROM tblescalamiento_actividad esca 
                        INNER JOIN tblescalamiento esc 
                        ON esca.idActividadManual = esc.idActividadManual
                        WHERE esc.estado = 'seguimiento' AND esca.fechaCompromiso BETWEEN '$fechaInicio' AND '$fechaFin'";
                $result = $this->db->query_select($sql);

                return array("data" => $result);
                break;

            case "finalizada":
                $sql = "    SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
            DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'),
                    esca.rutCliente,
                    esca.idActividadManual,
                    esca.comunaActividad,
                    esca.nombreRemitente,
                    esca.bloque,
                    esca.tipoActividad,
                    esca.gestion
            FROM tblescalamiento_actividad esca 
            INNER JOIN tblescalamiento esc 
            ON esca.idActividadManual = esc.idActividadManual
            WHERE esc.estado = 'finalizada' AND esca.fechaCompromiso BETWEEN '$fechaInicio' AND '$fechaFin'";
                $result = $this->db->query_select($sql);

                return array("data" => $result);
                break;

            case "noCorresponde":
                $sql = "    SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
                            DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'),
                                    esca.idActividadManual,
                                    esca.fechaCreacion,
                                    esca.fechaFinalizacion,
                                    esca.nombreRemitente,
                                    esca.nombreUserLog,
                                    esca.observacion
                            FROM tblescalamiento_actividad esca 
                            INNER JOIN tblescalamiento esc 
                            ON esca.idActividadManual = esc.idActividadManual
                            WHERE esc.estado = 'No Corresponde' AND esca.fechaCompromiso BETWEEN '$fechaInicio' AND '$fechaFin'";
                $result = $this->db->query_select($sql);

                return array("data" => $result);
                break;

            default:
                break;
        }
    }

    public function AlertaActividadesPorVencer()
    {
        $sql1 = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
        DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'),
        c.rutCliente, 
        c.idActividadManual, 
        e.comuna, 
        e.nombreRemitente, 
        c.bloque, 
        c.tipoActividad, 
        c.horaCompromiso
        FROM escalamientoremitente e RIGHT JOIN escalamientocorresponde c ON e.idActividadIngresar = c.idActividadManual
        where c.fechaCompromiso  = CAST(CURRENT_TIMESTAMP AS DATE) and c.estadoOrden <> 'finalizada'";
        $arrayCompromisoHoy = $this->db->query_select($sql1);

        if ($arrayCompromisoHoy) {
            foreach ($arrayCompromisoHoy as $valor) {
                $diayhorayActual =  new DateTime(date_default_timezone_get());
                $objDate = get_object_vars($diayhorayActual);
                $onlytoday = $objDate['date'];

                $porciones = explode(" ", $onlytoday);
                $DAY = $porciones[0]; // porción1 // obtengo solo fecha

                $x = $valor['bloque'];
                $sql = "select hasta from tblbloque where bloque = '" . $x . "'";
                $sql2 = $this->db->query_select($sql);

                $HOUR = ($sql2[0]['hasta']);

                $DIA_Y_HORAVENCIMIENTO = $DAY . " " . $HOUR;
                $hora_fin_bloque = new DateTime($DIA_Y_HORAVENCIMIENTO);

                $diff = $diayhorayActual->diff($hora_fin_bloque);

                $calcHoras = (($diff->days * 24) * 60) + ($diff->h);

                if ($diff->invert != 1 && $calcHoras < 1) {
                    $arrayHoraCompromisoXvencer[] = $valor;
                }
            }
        }

        if (!empty($arrayHoraCompromisoXvencer)) {
            return  array("data" => $arrayHoraCompromisoXvencer);
        } else {
            $arrayCompromisoHoy = "";
            return  array('data' => $arrayCompromisoHoy);
        }
    }

    public function TotalAlertasActividades()
    {
        $sql1 = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
        DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'),
        c.rutCliente,
        c.idActividadManual,
        e.comuna,
        e.nombreRemitente,
        c.bloque,
        c.tipoActividad,
        c.horaCompromiso
        FROM escalamientoremitente e
        RIGHT JOIN escalamientocorresponde c
        ON e.idActividadIngresar = c.idActividadManual
        where c.fechaCompromiso  = CAST(CURRENT_TIMESTAMP AS DATE) and c.estadoOrden <> 'finalizada'";
        $arrayCompromisoHoy = $this->db->query_select($sql1);
        $cont = 0;
        if ($arrayCompromisoHoy) {
            foreach ($arrayCompromisoHoy as $valor) {
                $diayhorayActual =  new DateTime(date_default_timezone_get());
                $objDate = get_object_vars($diayhorayActual);
                $onlytoday = $objDate['date'];

                $porciones = explode(" ", $onlytoday);
                $DIA = $porciones[0]; // porción1

                $x = $valor['bloque'];
                $sql = "select hasta from tblbloque where bloque = '" . $x . "'";
                $sql2 = $this->db->query_select($sql);

                $HORA = ($sql2[0]['hasta']);

                $DIA_Y_HORAVENCIMIENTO = $DIA . " " . $HORA;
                $hora_fin_bloque = new DateTime($DIA_Y_HORAVENCIMIENTO);

                $diff = $diayhorayActual->diff($hora_fin_bloque);

                $calcHoras = (($diff->days * 24) * 60) + ($diff->h);

                if ($diff->invert != 1 && $calcHoras <= 1) {
                    $cont++;
                }
            }
        }
        if ($cont > 0) {
            return $cont;
        } else {
            return 0;
        }
    }

    public function TotalAlertasCompromisos()
    {
        $sql1 = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'), 
                DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'), 
                c.rutCliente, 
                c.idActividadManual, 
                e.comuna, 
                e.nombreRemitente, 
                c.bloque, 
                c.tipoActividad, 
                c.horaCompromiso
                FROM escalamientoremitente e 
                RIGHT JOIN escalamientocorresponde c 
                ON e.idActividadIngresar = c.idActividadManual
                where c.fechaCompromiso  = CAST(CURRENT_TIMESTAMP AS DATE) and c.estadoOrden <> 'finalizada'";

        $arrayCompromisoHoy = $this->db->query_select($sql1);
        $cont = 0;
        if ($arrayCompromisoHoy) {
            foreach ($arrayCompromisoHoy as $valor) {
                $timezone =  new DateTime(date_default_timezone_get());
                $horaDeCompromiso = new DateTime($valor['horaCompromiso']);
                $diff = ($timezone)->diff($horaDeCompromiso);
                $calcHoras = (($diff->days * 24) * 60) + ($diff->h);
                if ($diff->invert != 1 && $calcHoras < 1) {
                    $cont++;
                }
            }
        }
        if (!empty($cont)) {
            // return $cont;
            return false;
        } else {
            // return 0;
            return false;
        }
    }

    public function AlertaCompromisosPorVencer()
    {
        $sql1 = "SELECT DATE_FORMAT(fechaCreacion, '%d-%m-%Y'),
        DATE_FORMAT(fechaCompromiso, '%d-%m-%Y'),
        c.rutCliente,
        c.idActividadManual,
        e.comuna,
        e.nombreRemitente,
        c.bloque,
        c.tipoActividad,
        c.horaCompromiso
        FROM escalamientoremitente e RIGHT JOIN escalamientocorresponde c ON e.idActividadIngresar = c.idActividadManual
        where c.fechaCompromiso  = CAST(CURRENT_TIMESTAMP AS DATE) and c.estadoOrden <> 'finalizada'";
        $arrayCompromisoHoy = $this->db->query_select($sql1);

        if ($arrayCompromisoHoy) {
            foreach ($arrayCompromisoHoy as $valor) {
                $horaActual =  new DateTime(date_default_timezone_get());
                $horaDeCompromiso = new DateTime($valor['horaCompromiso']);

                $diff = $horaActual->diff($horaDeCompromiso);

                $calcHoras = (($diff->days * 24) * 60) + ($diff->h);

                if ($diff->invert != 1 && $calcHoras < 1) {
                    $arrayHoraCompromisoXvencer[] = $valor;
                }
            }
        }
        if (!empty($arrayHoraCompromisoXvencer)) {
            return  array("data" => $arrayHoraCompromisoXvencer);
        } else {
            $arrayCompromisoHoy = "";
            return  array('data' => $arrayCompromisoHoy);
        }
    }

    public function actividadesForzadas()
    {
        $sql = "SELECT  esc.idActividadmanual,
                        esca.rutCliente,
                        esc.estado,
                        esca.nombreUserLog,
                        esca.observacion,
                        esca.nombreRemitente,
                        esca.gestion
                FROM    tblescalamiento esc INNER JOIN 
                        tblescalamiento_actividad esca ON esc.idActividadManual = esca.idActividadManual";
        $result = $this->db->query_select($sql);
        return array('data' => $result);
    }

    public function agregarGestionForzada()
    {
        global $http;

        $idActividad    = $http->request->get('idActividad');
        $mensaje        = $http->request->get('mensaje');

        if (trim($mensaje) == '') {
            return array('success' => 0, 'message' => 'Error, no a ingresado ningún mensaje');
        }

        $sql    =   "UPDATE tblescalamiento_actividad
        SET gestion = '$mensaje'
        WHERE idActividadManual = '$idActividad'";

        $result = $this->db->query_select($sql);

        return array('success' => 1, 'message' => 'Se ha guardado la Gestión');
    }

    public function todasLasActividades()
    {
        $sql = 'SELECT * FROM escalamientocorresponde';
        $result = $this->db->query_select($sql);

        return array('data' =>  $result);
    }

    //-----------------------------CONEXIÓN BD-------------------------------------------------------
    public function __construct(IRouter $router = null)
    {
        parent::__construct($router);
        $this->startDBConexion();
    }

    public function __destruct()
    {
        parent::__destruct();
        $this->endDBConexion();
    }
}
