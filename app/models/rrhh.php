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
use Ocrend\Kernel\Helpers\Strings;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Reader_Excel2007;
use PHPExcel_Style_NumberFormat;
/**
 * Modelo Varios
 *
 * @author Jorge Jara H. <jjara@wys.cl>
 */

class Rrhh extends Models implements IModels {
    /**
      * Característica para establecer conexión con base de datos.
    */
    use DBModel;
    protected $user = array();

    public function getdbAnticipoEjecutivo($annomes,$rut){

        $result = $this->db->select('monto','tblquincenas',"annomes='$annomes' or rut_trabajador='$rut' ",'LIMIT 1');
        if ($result == false){
            return 0;
        }else{
            return $result[0][0];
        }
    }
    public function getTopeAnticipo(){
        return array('valor' => 100000,'valor_formato' => '100.000');
    }
    public function guardar_solicitud_anticipo_mensual(){
        try {
            global $http;

            $rut_personal=$http->request->get("rut_personal");
            $monto=$http->request->get("monto");

            if ($this->functions->e($rut_personal, $monto)) {
                throw new ModelsException('Debe ingresar todos los datos');
            }
            $tope = $this->getTopeAnticipo();
            if ($tope['valor'] < $monto){
                throw new ModelsException('El monto ingresado no puede ser mayor al tope'   );
            }
            $annomes = date('Ym');

            $quincena = "NO";
            if ($monto > 0 ){
                $quincena = "SI";
            }

            $this->db->delete("tblquincenas","annomes='$annomes' and rut_trabajador='$rut_personal'","limit 1");
            $this->db->insert("tblquincenas",array(
                'annomes' => $annomes,
                'rut_trabajador' => $rut_personal,
                'quincena' => $quincena,
                'monto' => $monto
            ));

            return array('opcion' => 1,'mensaje' => 'Anticipo Guardado con existo');
        } catch (ModelsException $e) {
            return array('opcion' => 0, 'mensaje' => $e->getMessage());
        }
    }
    public function GetListarAnticipoMes(){
        global $http;

        $annomes=$http->request->get('annomes');

        $result=$this->getdbAnticiposMes($annomes);

        if ($result == false){
            return array('success' => 0, 'message' => "datos erroneos");
        }else{
            $json = array(
            "aaData"=>array(
            )
            );
            $No = 1;
            foreach ($result as $key => $value) {
                $json['aaData'][]=array($No,$value['rut_personal'].'-'.$value['dv'],$value['name'],$value['quincena'],$value['monto']);
                $No++;
            }

            $jsonencoded = json_encode($json,JSON_UNESCAPED_UNICODE);
            $fh = fopen(API_INTERFACE . "views/app/temp/result_cons2_asistencia".$this->user['id_user'].".dbj", 'w');
            fwrite($fh, $jsonencoded);
            fclose($fh);
            return array('success' => 1, 'message' => "result_cons2_asistencia".$this->user['id_user'].".dbj" );
        }
    }
    public function getdbAnticiposMes($annomes) {
        $query = "Select u.rut_personal,digitoVerificador(u.rut_personal) dv,u.name,q.quincena,q.monto from tblquincenas q inner join users u on q.rut_trabajador=u.rut_personal where q.annomes='$annomes' and u.rut_personal<>0 order by u.name";
        return $this->db->query_select($query);
    }
    public function exportar_excel_listado_anticipos() {
        global $config;
        global $http;

        $annomes=$http->query->get('annomes');
        $result=$this->getdbAnticiposMes($annomes);

        if ( $result != false ){
            $objPHPExcel = new PHPExcel();
            //Informacion del excel
            $objPHPExcel->getProperties() ->setCreator("Hector Gutierrez")
                                        ->setLastModifiedBy("HG")
                                        ->setTitle("Turnos_usuarios");
            //encabezado
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'N°');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Rut');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'Nombres');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'Quincena');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'Monto');


            $fila = 2; $No = 1;
            foreach ($result as $value => $data) {
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$fila, $No);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$fila, $data['rut_personal'].'-'.$data['dv']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$fila, $data['name']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$fila, $data['quincena']);

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$fila, $data['monto']);

                $fila++;$No++;
            }

            //autisize para las columna
            foreach(range('A','N') as $columnID)
            {
                $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
            }

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->setTitle('anticipos_'.$annomes);

            // Redirect output to a client’s web browser (Excel2007)
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="anticipos_plataforma_'.$annomes.'.xlsx"');
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');

            // If you're serving to IE over SSL, then the following may be needed
            header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
            header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header ('Pragma: public'); // HTTP/1.0

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->save('php://output');
        }else{
            # Redireccionar a la página principal del controlador
            $this->functions->redir($config['site']['url'] . 'rrhh/listar_anticipos_mensual');
        }
    }
    /**
      * __construct()
    */
    public function __construct(IRouter $router = null) {
        parent::__construct($router);
        $this->startDBConexion();
        $this->user=(new Model\Users)->getOwnerUser();
    }

    /**
      * __destruct()
    */
    public function __destruct() {
        parent::__destruct();
        $this->endDBConexion();
    }
}
