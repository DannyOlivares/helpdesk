<?php


namespace app\models;

use app\models as Model;
use Ocrend\Kernel\Models\Models;
use Ocrend\Kernel\Models\IModels;
use Ocrend\Kernel\Models\ModelsException;
use Ocrend\Kernel\Models\Traits\DBModel;
use Ocrend\Kernel\Router\IRouter;
use Ocrend\Kernel\Helpers\Files;
use Ocrend\Kernel\Helpers\Strings;
use Ocrend\Kernel\Helpers\Emails;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Reader_Excel2007;
use PHPExcel_Style_NumberFormat;

/**
 * Modelo Areas
 *
 * @author Jorge Jara H. <jjara@wys.cl>
 */

class Turnos extends Models implements IModels {

    use DBModel;
    protected $user = array();

    public function cargar_excel(){
        global $http;

        $file = $http->files->get('excel');

        $docname="";
        if (null !== $file ){
            $ext_doc = $file->getClientOriginalExtension();

            if ($ext_doc<>'xls' and $ext_doc<>'xlsx') return array('success' => 0, 'message' => "Debe seleccionar un archivo valido...");

            $docname = 'cargaturno.'.$ext_doc;

            $file->move(API_INTERFACE . 'views/app/temp/', $docname);

            $archivo = API_INTERFACE . 'views/app/temp/'. $docname;
            //carga del excelname
            $objReader = new PHPExcel_Reader_Excel2007();
            $objPHPExcel = $objReader->load($archivo);

            $i=2;$celdablanco=0;
            $param=0;
            $rut="";
            while($param==0){
                try {
                  //echo $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getvalue();
                    if ($objPHPExcel->getActiveSheet()->getCell('A'.$i)->getvalue()!=NULL){

                        $rut = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getvalue();
                        $servicio = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getvalue();



                        $objPHPExcel->getActiveSheet()->getStyle('C'.$i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2);
                        $ano=$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getFormattedValue();
    					$krr = explode('-',$ano);
    					$fecha = implode("",$krr);


                        $hora_ingreso= $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getvalue();
                        $hora_salida= $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getvalue();
                        $n_semana= $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getvalue();
                        $horas_turno= $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getvalue();
                        $tiempocolacion= $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getvalue();
                        $hora_colacion= $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getvalue();
                        $break1= $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getvalue();
                        $break2= $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getvalue();

    					$this->db->query_select("Delete from tblturnos Where Rut='$rut' And fecha=$fecha");

                        $this->db->Insert('tblturnos', array(
                          'rut'=>$rut,
                          'servicio'=>$servicio,
                          'fecha'=>$fecha,
                          'hora_ingreso'=>$hora_ingreso,
                          'hora_salida'=>$hora_salida,
                          'n_semana'=>$n_semana,
                          'hora_turnos'=>$horas_turno,
                          'tiempocolacion'=>$tiempocolacion,
                          'horario_colacion'=>$hora_colacion,
                          'break_1'=>$break1,
                          'break_2'=>$break2
                        ));
                        $celdablanco = 0;
                    }else{
                        $celdablanco++;
                    }
                    if ($celdablanco == 5 ){
                        $param=1;
                    }
                    $i++;
                } catch (\Exception $e) {
                    if (Files::delete_file(API_INTERFACE . 'views/app/temp/'.$docname)){
                        return array('success' => 0, 'message' => $e->getMessage() );
                    }
                }
            }
            $result = $this->db->query_select("select count(id) cuenta from tblturnos where informado=0");
            if (false != $result){

                if ( $result[0]['cuenta'] > '0' ){

                    $this->db->Insert('tbl_historialarchivoscargados', array(
                        'app'=>'Carga de Turnos',
                        'nombre_archivo'=> $file->getClientOriginalName(),
                        'id_user' => $this->user['id_user'],
                        'q_registros' => $result[0]['cuenta']
                    ));

                    if (Files::delete_file(API_INTERFACE . 'views/app/temp/'.$docname)){
                        $this->SendMailTurnoEjecutivo();
                        return array('success' => 1, 'message' => $result[0]['cuenta']." Registros validos cargados Exitosamente..." );
                    }

                }else{
                    if (Files::delete_file(API_INTERFACE . 'views/app/temp/'.$docname)){
                        return array('success' => 0, 'message' => 'No se ha cargado ningun registro, es posible que ya se encuentren en la base de datos...');
                    }
                }
            }
        }else{
            return array('success' => 0, 'message' => "Debe seleccionar un archivo valido...");
        }

    }
    public function getAllTurnosDia($fecha, string $order = 'hora_ingreso,hora_salida,servicio,p.name' ){

        return $this->db->query_select("select @rownum:=@rownum+1 as rownum, t.id ,t.rut,p.name,servicio,hora_ingreso,inicio,fin,hora_salida,hora_turnos,tiempocolacion,horario_colacion,break_1,break_2,n_semana,
        if((Select tipo_ausencia From tblausencias a  Where a.rut=p.rut_personal And a.desde<='$fecha' And a.hasta>='$fecha' limit 1) is null,if(hora_turnos IS NULL,'S/TURNO',if(hora_turnos=0,'LIBRE','C/TURNO')),(Select tipo_ausencia From tblausencias a  Where a.rut=p.rut_personal And a.desde<='$fecha' And a.hasta>='$fecha' limit 1)) asistencia,
        t.inicio,t.fin from (select @rownum:=0) r,(tblturnos t right join users p on t.rut=p.rut_personal and fecha='$fecha' ) where p.estado=1 and p.perfil<>'DEFINIDO' order by $order");
    }
    public function GetSupervisorUsuario($id_super){
      return $this->db->query_select("select name from users where id_user='".$id_super."' limit 1");
    }
    public function GetTurnoPropio($rut_personal,$mesano){
        $fecha_ini=$mesano.'-01';
        $aux = date('Y-m-d', strtotime("$fecha_ini + 1 month"));
        $fecha_fin = date('Y-m-d', strtotime("$aux - 1 day"));

        $sql="select n_semana,servicio,DATE_FORMAT(fecha, '%W, %d-%m-%Y') fecha_format,hora_ingreso,hora_salida,hora_turnos,tiempocolacion,horario_colacion,break_1,break_2 from tblturnos where rut='$rut_personal' and fecha between '$fecha_ini' and '$fecha_fin' order by fecha asc";
        return $this->db->query_select($sql);
    }
    public function verturnomes(){
        global $http;

        $rut_personal=$http->request->get('rut_personal');
        $mesano=$http->request->get('mesano');

        $consultaturno=$this->GetTurnoPropio($rut_personal,$mesano);

        if ($consultaturno == false){
            return array('success' => 0, 'message' => "datos erroneos");
        }else{
            $json = array(
            "aaData"=>array(
            )
            );
            foreach ($consultaturno as $key => $value) {
                $json['aaData'][]=array($value['n_semana'],$value['servicio'],$value['fecha_format'],$value['hora_ingreso'],$value['hora_salida'],$value['hora_turnos'],$value['tiempocolacion'],$value['horario_colacion'],$value['break_1'],$value['break_2']);
            }

            $jsonencoded = json_encode($json,JSON_UNESCAPED_UNICODE);
            $fh = fopen(API_INTERFACE . "views/app/temp/result_cons2_".$this->user['id_user'].".dbj", 'w');
            fwrite($fh, $jsonencoded);
            fclose($fh);
            return array('success' => 1, 'message' => "result_cons2_".$this->user['id_user'].".dbj" );
        }
    }
    public function revisar_turno_por_fecha(){
        global $http;
        $fechaturno=$http->request->get('fechaturno');
        $consultaturno=$this->getAllTurnosDia($fechaturno,'hora_ingreso,hora_salida,servicio,p.name');
        if ($consultaturno===false){
            return array('success' => 0, 'message' => "datos erroneos");
        }else{
            $json = array(
            "aaData"=>array(
            )
            );
            foreach ($consultaturno as $key => $value) {
                $falta = 0;
                if ($value['asistencia'] == 'LIBRE' || $value['asistencia'] == 'S/TURNO' ){
                    $html = "<div class='text-primary'>".$value['asistencia']."</div>";
                    $falta = 1;
                }elseif (substr($value['asistencia'],1,5) == 'Falta'){
                    $html = "<div class='text-green'>".$value['asistencia']."</div>";
                    $falta = 1;
                }elseif ($value['asistencia'] == 'C/TURNO'){
                    $html = "<div class='text-green'>".$value['asistencia']."</div>";
                }else{
                    $html = "<div class='text-orange'>".$value['asistencia']."</div>";
                    $falta = 1;
                }

                if ($falta == 0){
                    $html1="<input type='time' name='llegada-".$value['id']."' value='".$value['inicio']."' id='llegada-".$value['id']."' onchange=\"updateAsistenciaEjecutivo('".$value['id']."')\">";
                }else{
                    $html1="<input type='time' name='llegada-".$value['id']."' value='".$value['inicio']."' id='llegada-".$value['id']."' disabled>";
                }
                if ($falta == 0){
                    if($value['inicio'] == '00:00:00'){
                        $value_hora = $value['hora_salida'];
                    }else{
                        $value_hora = $value['fin'];
                    }
                    $html2="<input type='time' name='salida-".$value['id']."' value='".$value_hora."' id='salida-".$value['id']."' onchange=\"updateAsistenciaEjecutivo('".$value['id']."')\">";
                }else{
                    $html2="<input type='time' name='salida-".$value['id']."' value='".$value['fin']."' id='salida-".$value['id']."' disabled>";
                }

                $json['aaData'][]=array($value['rownum'],$value['name'],$value['servicio'],$value['hora_ingreso'],$value['hora_salida'],$value['horario_colacion'],$value['break_1'],$value['break_2'],$html,$html1,$html2);
            }
            $jsonencoded = json_encode($json,JSON_UNESCAPED_UNICODE);
            $fh = fopen(API_INTERFACE . "views/app/temp/result_cons2_".$this->user['id_user'].".dbj", 'w');
            fwrite($fh, $jsonencoded);
            fclose($fh);
            return array('success' => 1, 'message' => "result_cons2_".$this->user['id_user'].".dbj" );
        }
    }
    public function exportar_excel_turno_plataforma(){
        global $config;
        global $http;

        $fecha=$http->query->get('fecha');
        $t = $this->getAllTurnosDia($fecha);

        if ( $t != false ){
            $objPHPExcel = new PHPExcel();
            //Informacion del excel
            $objPHPExcel->getProperties() ->setCreator("Hector Gutierrez")
                                        ->setLastModifiedBy("HG")
                                        ->setTitle("Turnos_usuarios");
            //encabezado
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'N°Semana');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Rut');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'Nombres');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'Servicio');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'Hora_Ingreso');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'Hora_Salida');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'Horas_Turno');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'Hora_Colacion');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'Min_Colacion');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', 'Break_1');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1', 'Break_2');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L1', 'Asistencia');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M1', 'LLegada');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('N1', 'Salida');



            $fila = 2;
            foreach ($t as $value => $data) {
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$fila, $data['n_semana']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$fila, $data['rut']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$fila, $data['name']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$fila, $data['servicio']);

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$fila, $data['hora_ingreso']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$fila, $data['hora_salida']);

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$fila, $data['hora_turnos']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$fila, $data['tiempocolacion']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$fila, $data['horario_colacion']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$fila, $data['break_1']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$fila, $data['break_2']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$fila, $data['asistencia']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$fila, $data['inicio']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.$fila, $data['fin']);

                $fila++;
            }

            //autisize para las columna
            foreach(range('A','N') as $columnID)
            {
                $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
            }

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->setTitle('turnos_plataforma');

            // Redirect output to a client’s web browser (Excel2007)
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="turnos_plataforma.xlsx"');
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
            $this->functions->redir($config['site']['url'] . 'rrhh/revisar_turnos');
        }
    }
    public function getTurnoEquipoAsignado($id_user,$fecha){
        $sql="select name,t.fecha,servicio,hora_ingreso,hora_salida,u.rut_personal,hora_turnos,tiempocolacion,n_semana,break_1,break_2,horario_colacion from  users u  left join tblturnos t on u.rut_personal=t.rut And t.fecha='$fecha' where u.id_super='$id_user' and u.estado=1 order by name,servicio";
        return $this->db->query_select($sql);
    }
    public function getDatosEquipoAsignado($id_user){
        $sql="select id_user,name,fecha_nacimiento,fono,email,email_recepcion,user_tango,user_red,user_nnoc from  users u where (u.id_super='$id_user' or u.id_user='$id_user') and u.estado=1 order by name";
        return $this->db->query_select($sql);
    }
    public function updateDatosEquipoAsignado(){
        try {
            global $http;
            $id_user = strtoupper($http->request->get('id'));
            $name = strtoupper($http->request->get('name'));
            $fecha_nacimiento = strtoupper($http->request->get('fecha_nacimiento'));
            $fono = strtoupper($http->request->get('fono'));
            $email = strtolower($http->request->get('email'));
            $email_recepcion = strtolower($http->request->get('email_recepcion'));
            $tango = strtolower($http->request->get('tango'));
            $red = strtolower($http->request->get('red'));
            $nnoc = strtolower($http->request->get('nnoc'));

            //vaida correo email
            if ($email != ""){
                (new Model\Varios)->checkEmailUser($email,$id_user);
            }

            if (!Strings::is_email($email_recepcion) and $email_recepcion != "") {
                throw new ModelsException('El email no tiene un formato válido.');
            }

            # Actualiza usuario
            $this->db->update('users',array(
              'name' => $name,
              'email' => $email,
              'fono' => $fono,
              'fecha_nacimiento' => $fecha_nacimiento,
              'user_tango' => $tango,
              'user_red' => $red,
              'user_nnoc' => $nnoc,
              'email_recepcion' => $email_recepcion
            ),"id_user='$id_user'",'LIMIT 1');

            //
        } catch(ModelsException $e) {
            return array('success' => 0, 'message' => $e->getMessage());
        }
    }
    public function updateAsistenciaEjecutivo(){

        try {
            global $http;
            $id = $http->request->get('id');
            $llegada = $http->request->get('llegada');
            $salida = $http->request->get('salida');

            # Actualiza usuario
            $this->db->update('tblturnos',array(
              'inicio' => $llegada,
              'fin' => $salida
            ),"id='$id'",'LIMIT 1');


        } catch(ModelsException $e) {
            return array('success' => 0, 'message' => $e->getMessage());
        }
    }
    public function getTurnoSemanaCompleta(){
        global $http;

        $fecha=$http->request->get('fecha_turno_s');

        $semana = Strings::getPrimerUltimoDiaSemana($fecha);

        $html_semana = "Semana: ".$semana['semana']."  -  Año: ".$semana['ano']."  -  Primer día: ".$semana['PrimerDia']."  -  Ultimo día: ".$semana['UltimoDia'];



        $sql_query="SELECT t.id,t.rut,u.id_user,u.name,servicio FROM tblturnos t inner join users u on t.rut=u.rut_personal  where u.estado=1 and fecha between '".$semana['PrimerDia']."' and '".$semana['UltimoDia']."' group by t.rut,u.id_user,u.name,servicio order by servicio,fecha,hora_ingreso,hora_salida,u.name";

        $consultaturno=$this->db->query_select($sql_query);

        if ($consultaturno===false){
            return array('success' => 0, 'semana' => $html_semana,'message' => "datos erroneos");
        }else{
            $json = array(
            "aaData"=>array(
            )
            );
            foreach ($consultaturno as $key => $value) {
                $actual =strtotime($semana['PrimerDia']);
                $sem=array('','','','','','','');
                for ($i=0; $i<=6; $i++){
                    if ($i != 0 ) $actual = strtotime("+1 day", $actual);
                    $sql="Select id_tblausencias,tipo_ausencia From tblausencias Where rut='".$value['rut']."' And desde<='".date('Y-m-d',$actual)."' And hasta>='".date('Y-m-d',$actual)."'";
                    $ausencia = $this->db->query_select($sql);
                    if (false != $ausencia ){
                        $sem[$i] = "<div class='text-orange'>".$ausencia[0]['tipo_ausencia']."</div>";
                    }else {
                        $sql_turno = "Select servicio,hora_ingreso,hora_salida from tblturnos where rut='".$value['rut']."' and fecha='".date('Y-m-d',$actual)."'";
                        $turno = $this->db->query_select($sql_turno);
                        if (false != $turno){
                            if ($value['servicio'] == $turno[0]['servicio']){
                                if ($turno[0]['hora_ingreso'] == "00:00:00"){
                                    $sem[$i] = "<div class='text-green'>LIBRE</div>";
                                }else{
                                    $sem[$i] = $turno[0]['hora_ingreso']." - ".$turno[0]['hora_salida'];
                                }
                            }else{
                                $sem[$i] = "<div class='text-red'>S/T</div>";
                            }
                        }else{
                            $sem[$i] = "<div class='text-red'>S/T</div>";
                        }

                    }
                }
                $json['aaData'][]=array($value['name'],$value['servicio'],$sem[0],$sem[1],$sem[2],$sem[3],$sem[4],$sem[5],$sem[6]);
            }
            $jsonencoded = json_encode($json,JSON_UNESCAPED_UNICODE);
            $fh = fopen(API_INTERFACE . "views/app/temp/result_cons2_".$this->user['id_user'].".dbj", 'w');
            fwrite($fh, $jsonencoded);
            fclose($fh);
            return array('success' => 1,'semana' => $html_semana, 'message' => "result_cons2_".$this->user['id_user'].".dbj" );
        }
    }
    public function getEjecutivosFull(string $filtro=''){
        if ($filtro != ""){
            $filtro = ' and '.$filtro;
        }
        $sql="select s.name supervisor,u.name,u.fecha_nacimiento,u.user_tango,u.user_red,u.user_nnoc,u.cargo,u.email,u.email_recepcion,u.fono from (users u left join users s on u.id_super=s.id_user ) where u.estado = 1 and u.perfil like '%HD%' $filtro order by supervisor, u.name";
        return $this->db->query_select($sql);
    }
    public function SendMailTurnoEjecutivo(){
        try {
            global $config;
            $sql="select t.rut,u.name,u.id_user,u.email_recepcion from tblturnos t inner join users u on t.rut=u.rut_personal where  t.informado=0 group by t.rut order by t.rut,t.fecha";
            $user_mail = $this->db->query_select($sql);
            if (false != $user_mail){

                foreach ($user_mail as $key => $value_mail) {

                    #registra notificacion de turnos
                    $this->db->insert('tblnotificaciones_emergentes', array(
                        'id_user' => $value_mail['id_user'],
                        'modulo' => 'turnos',
                        'titulo' => 'sistema_name',
                        'mensaje' => "tienes un nuevo turno cargado..."
                    ));

                    if (Strings::is_email($value_mail['email_recepcion'])) {
                        $email = $value_mail['email_recepcion'];
                        $email = $this->db->scape($email);

                        $sql_turno = "select fecha,servicio,hora_ingreso,hora_salida,hora_turnos from tblturnos where rut='".$value_mail['rut']."' and informado=0 order by rut,fecha";
                        $turno = $this->db->query_select($sql_turno);
                        if (false != $turno){
                            # Construir mensaje y enviar mensaje
                            $HTML = '
                                    <table border="0" cellpadding="0" cellspacing="0" style="font:normal 12px Arial, Helvetica, sans-serif;width:490px; color:#333333;">
                                    <tr>
                                    <td style="background-color:#090;text-align:center;padding-top:10px;padding-bottom:10px;font-size:18px; color:#fff;"><strong>Carga de Turno</strong></td>
                                    </tr>
                                    </table>
                                    <br />
                                    <br />
                                    Hola <b>'. $value_mail['name'] .'</b>, se ha cargado un nuevo turno en tu perfil...
                					<br />
                                    <br />
                                    <table border="0" cellpadding="0" cellspacing="0" style="font:normal 12px Arial, Helvetica, sans-serif;width:490px; color:#333333;">
                                    <thead>
                                    <th with="100">Fecha</th>
                                    <th with="200">Servicio</th>
                                    <th with="100">Ingreso</th>
                                    <th with="100">Salida</th>
                                    </thead>
                                    <tbody>';
                                    foreach ($turno as $key => $value_turno) {
                                        $HTML .='
                                            <tr>
                                                <td align="center">'.$value_turno["fecha"].'</td>
                                                <td align="center">'.$value_turno["servicio"].'</td>';
                                        if ($value_turno["hora_ingreso"] == "00:00:00"){
                                            $HTML .='<td align="center" colspan="2" style="background-color:#090;color:#fff;" >LIBRE</td>';
                                        }else{
                                            $HTML .='<td align="center">'.$value_turno["hora_ingreso"].'</td>
                                                    <td align="center">'.$value_turno["hora_salida"].'</td>';
                                        }
                                        $HTML .='
                                            </tr>
                                        ';
                                    }
                            $HTML .='
                                    </tbody>
                                    </table>
                                    <br />
                					si quieres ver más ingresa a <a href="'. $config['site']['url'] .'" target="_blank">Sistema '.$config['site']['name'].'</a>.
                                    <p>
                                    <strong>Importante:</strong>
                                    <br>&bull; Este mail es generado de manera automatica, por favor no responda a este mensaje.<br>

                                    ';

                                    # Enviar el correo electrónico
                            $dest = array();
                      			$dest[$email] = $value_mail['name'];
                      			$email = Emails::send_mail($dest,Emails::plantilla($HTML),'Nuevo Turno cargado');
                        }

                        $this->db->query_select("update tblturnos set informado=1 where rut='".$value_mail['rut']."' and informado=0");
                    }
                }
            }
        } catch(ModelsException $e) {
            return array('success' => 0, 'message' => $e->getMessage());
        }
    }
    public function GetAllTurnoDiaResumen($fecha){
        $plataforma = $this->getAllTurnosDia($fecha);
        $this->db->query_select('truncate tmpasistenciaplataforma');
        foreach ($plataforma as $key => $value) {
            $asistencia = ($value['asistencia'] == '')?'PRESENTE':$value['asistencia'];
            $this->db->query_select("insert into tmpasistenciaplataforma(ejecutivo,asistencia) value('".$value['name']."','".$asistencia."')");
        }
        return $this->db->query_select('select asistencia,count(*) cuenta from tmpasistenciaplataforma group by asistencia order by asistencia');
    }
    public function getTurnoEntreFechas($desde,$hasta){
        return $this->db->query_select('select * from tblturnos where fecha between "'.$desde.'" and "'.$hasta.'"');
    }
    public function exportar_excel_turno_plataforma_entre_fechas(){
        global $config,$http;

        $desde=$http->query->get('desde');
        $hasta=$http->query->get('hasta');
        $t = $this->getTurnoEntreFechas($fecha);

        if ( $t != false ){
            $objPHPExcel = new PHPExcel();
            //Informacion del excel
            $objPHPExcel->getProperties() ->setCreator("Hector Gutierrez")
                                        ->setLastModifiedBy("HG")
                                        ->setTitle("Turnos_usuarios");
            //encabezado
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'ID');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Rut');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'fecha');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'Hora_Ingreso');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'Hora_Salida');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'Servicio');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'Semana');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'Horas_Turno');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'Min_Colacion');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', 'Hora_Colacion');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1', 'Break_1');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L1', 'Break_2');



            $fila = 2;
            foreach ($t as $value => $data) {
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$fila, $data['n_semana']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$fila, $data['rut']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$fila, $data['name']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$fila, $data['servicio']);

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$fila, $data['hora_ingreso']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$fila, $data['hora_salida']);

                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$fila, $data['hora_turnos']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$fila, $data['tiempocolacion']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$fila, $data['horario_colacion']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$fila, $data['break_1']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$fila, $data['break_2']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$fila, $data['asistencia']);
                $fila++;
            }

            //autisize para las columna
            foreach(range('A','L') as $columnID)
            {
                $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
            }

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->setTitle('turnos_plataforma');

            // Redirect output to a client’s web browser (Excel2007)
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="turnos_plataforma.xlsx"');
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
            $this->functions->redir($config['site']['url'] . 'rrhh/revisar_turnos');
        }
    }

    public function getCargaEjecutivoEstado(){
        global $http;

        $estado = $http->request->get('estado');
        $fecha=date("Y-m-d");



        if ($estado == 'TODOS'){
            $result = $result = $this->db->query_select("Select ejecutivo,asistencia from tmpasistenciaplataforma order by ejecutivo");
        }else{
            $result = $result = $this->db->query_select("Select ejecutivo,asistencia from tmpasistenciaplataforma where asistencia='".$estado."' order by ejecutivo");
        }
        $count = 1; $tope = 21;$html="";
        foreach ($result as $key => $value) {
            if ( $count == 1 ){
                $html.="<div class='col-lg-4'>
                    <table class='table table-bordered'>
                        <thead>
                            <th>Ejecutivo</th>
                            <th>Asistencia</th>
                        </thead>
                        <tbody>";
            }
            $html.="<tr>
                        <td>".strtoupper($value['ejecutivo'])."</td>
                        <td>";
                            if (substr($value['asistencia'],0,5) == "Falta"){
                                $html.="<span class='label label-danger'>";
                            }elseif ($value['asistencia'] == "C/TURNO"){
                                $html.="<span class='label label-success'>";
                            }elseif ($value['asistencia'] == "LIBRE" || $value['asistencia'] == "S/TURNO"){
                                $html.="<span class='label label-primary'>";
                            }else{
                                $html.="<span class='label label-warning'>";
                            }
                            $value['asistencia']? $html.=$value['asistencia']:$html.="C/TURNO";
                $html.="</td>
                    </tr>";

            $count++;
            if ($count == $tope){
                    $html.="</tbody>
                    </table>
                </div>";
                $count = 1;
            }
        }

        if ($count < $tope){
                $html.="</tbody>
                </table>
            </div>";
        }

        return array("html" => $html);
    }
    public function getAllAsistenciaMensualDB($fecha_ini,$fecha_fin){
        $mesano = date('Y-m',strtotime($fecha_ini));
        return $this->db->query_select("select t.rut,digitoVerificador(t.rut) dv,u.name,'".$mesano."'as mesano,
            (select count(tl.rut) from tblturnos tl where tl.rut=t.rut and tl.fecha between '".$fecha_ini."' and '".$fecha_fin."' And tl.hora_ingreso<>'00:00:00') dias_laborables,
            (select count(tl.rut) from tblturnos tl where tl.rut=t.rut and tl.fecha between '".$fecha_ini."' and '".$fecha_fin."' And tl.hora_ingreso='00:00:00') dias_libres,
            (select count(dt.rut) from tblturnos dt where dt.rut=t.rut and dt.fecha between '".$fecha_ini."' and '".$fecha_fin."' And dt.inicio<>'00:00:00') dias_trabajados,
            (select count(da.rut) from tblturnos da where da.rut=t.rut and da.fecha between '".$fecha_ini."' and '".$fecha_fin."' And da.inicio='00:00:00') dias_ausentes
            from tblturnos t inner join users u on t.rut=u.rut_personal where t.fecha between '".$fecha_ini."' and '".$fecha_fin."' group by rut order by u.name");
    }
    public function getAllAsistenciaMensual(){
        global $http;

        $mesano=$http->request->get('mesano');


        $fecha_ini=$mesano.'-01';
        $aux = date('Y-m-d', strtotime("$fecha_ini + 1 month"));
        $fecha_fin = date('Y-m-d', strtotime("$aux - 1 day"));

        $consultaturno=$this->getAllAsistenciaMensualDB($fecha_ini,$fecha_fin);

        if ($consultaturno == false){
            return array('success' => 0, 'message' => "datos erroneos");
        }else{
            $json = array(
            "aaData"=>array(
            )
            );
            foreach ($consultaturno as $key => $value) {

                $html = '<a class="btn btn-success" title="Subir Libro Asistencia" data-toggle="tooltip" onclick=\'subirLibroasistencia("'.$value['rut'].'")\'>
                            <i class="fa fa-arrow-up"></i>
                        </a>
                        <a class="btn btn-success" title="Editar Asistencia" data-toggle="tooltip" onclick=\'editarAsistenciaMes("'.$value['rut'].'","'.$value['name'].'","'.$value['mesano'].'")\'>
                            <i class="fa fa-edit"></i>
                        </a>';

                $json['aaData'][]=array($value['rut'].'-'.$value['dv'],$value['name'],$value['dias_laborables'],$value['dias_libres'],$html,$value['dias_trabajados'],$value['dias_ausentes']);
            }

            $jsonencoded = json_encode($json,JSON_UNESCAPED_UNICODE);
            $fh = fopen(API_INTERFACE . "views/app/temp/result_cons2_".$this->user['id_user'].".dbj", 'w');
            fwrite($fh, $jsonencoded);
            fclose($fh);
            return array('success' => 1, 'message' => "result_cons2_".$this->user['id_user'].".dbj" );
        }
    }
    public function getAllAsistenciaMensualEjecutivoDB($rut,$fecha_ini,$fecha_fin){
        return $this->db->query_select("select id,fecha,DATE_FORMAT(fecha, '%d-%m-%Y') fecha_format,inicio,fin,hora_ingreso,hora_salida from tblturnos where rut='".$rut."' and fecha between '".$fecha_ini."' and '".$fecha_fin."' order by fecha");
    }
    public function getAllAsistenciaMensualEjecutivo(){
        global $http;

        $mesano=$http->request->get('mes');
        $rut=$http->request->get('rut');

        $fecha_ini=$mesano.'-01';
        $aux = date('Y-m-d', strtotime("$fecha_ini + 1 month"));
        $fecha_fin = date('Y-m-d', strtotime("$aux - 1 day"));

        $consultaturno=$this->getAllAsistenciaMensualEjecutivoDB($rut,$fecha_ini,$fecha_fin);

        if ($consultaturno == false){
            return array('success' => 0, 'message' => "datos erroneos");
        }else{
            $json = array(
            "aaData"=>array(
            )
            );
            foreach ($consultaturno as $key => $value) {

                $fecha = $value ['fecha'];
                $result = $this->db->query_select("select if((Select tipo_ausencia From tblausencias a  Where a.rut='".$rut."' And a.desde<='$fecha' And a.hasta>='$fecha' limit 1) is null,if(hora_turnos IS NULL,'S/TURNO',if(hora_turnos=0,'LIBRE','C/TURNO')),(Select tipo_ausencia From tblausencias a  Where a.rut='".$rut."' And a.desde<='$fecha' And a.hasta>='$fecha' limit 1)) asistencia
                from (tblturnos t) where t.rut='".$rut."' and fecha='$fecha'");
                $falta = 0;
                if ($result[0][0] == 'LIBRE' || $result[0][0] == 'S/TURNO' ){
                    $html = "<div class='text-primary'>".$result[0][0]."</div>";
                    $falta = 1;
                }elseif (substr($result[0][0],1,5) == 'Falta'){
                    $html = "<div class='text-green'>".$result[0][0]."</div>";
                    $falta = 1;
                }elseif ($result[0][0] == 'C/TURNO'){
                    $html = "<div class='text-green'>".$result[0][0]."</div>";
                }else{
                    $html = "<div class='text-orange'>".$result[0][0]."</div>";
                    $falta = 1;
                }

                if($result[0][0] =='C/TURNO' || $result[0][0] == 'LIBRE' ){
                    $html1 ='<input size="5" type="time" name="llegada-'.$value['id'].'" value="'.$value['inicio'].'" id="llegada-'.$value['id'].'" onchange=\'updateAsistenciaEjecutivo("'.$value['id'].'")\'>';
                    $html2 ='<input size="5" type="time" name="salida-'.$value['id'].'" value="'.$value['fin'].'" id="salida-'.$value['id'].'" onchange=\'updateAsistenciaEjecutivo("'.$value['id'].'")\'>';
                } else {
                    $html1 ='<input size="5" type="time" name="llegada-'.$value['id'].'" value="00:00:00" id="llegada-'.$value['id'].'" disabled>';
                    $html2 ='<input size="5" type="time" name="salida-'.$value['id'].'" value="00:00:00" id="salida-'.$value['id'].'" disabled>';
                }

                $html3 = "<input size='5' type='type' name='hora_ingreso_".$value['id']."' id='hora_ingreso_".$value['id']."' value='".$value['hora_ingreso']."' disabled>";
                $html4 = "<input size='5' type='type' name='hora_salida_".$value['id']."' id='hora_salida_".$value['id']."' value='".$value['hora_salida']."' disabled>";

                $html5 = '<a class="btn btn-success" title="Copiar Turno día" data-toggle="tooltip" onclick=\'copyTurnoDiaEjecutivo("'.$value['id'].'")\'>
                    <i class="fa fa-arrow-left"></i>
                </a>';

                $json['aaData'][]=array($value['fecha_format'],$html1,$html2,$html,$html3,$html4,$html5);
            }

            $jsonencoded = json_encode($json,JSON_UNESCAPED_UNICODE);
            $fh = fopen(API_INTERFACE . "views/app/temp/result_cons2_asistencia".$this->user['id_user'].".dbj", 'w');
            fwrite($fh, $jsonencoded);
            fclose($fh);
            return array('success' => 1, 'message' => "result_cons2_asistencia".$this->user['id_user'].".dbj" );
        }
    }

    public function __construct(IRouter $router = null) {
        parent::__construct($router);
        $this->startDBConexion();
        $this->user=(new Model\Users)->getOwnerUser();
    }
    public function __destruct() {
        parent::__destruct();
        $this->endDBConexion();
    }

}
