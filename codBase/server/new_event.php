<?php

require 'conector.php';
session_start();

$conexion=new ConectorBD();
$response['conexion']=$conexion->initConexion('agenda_db');
if ($response['conexion']!='OK') {
  $response['msg']= "Eror en la conexion con la base de datos";
}
else {
  $data['`title`']="'".$_POST['titulo']."'";
  $data['`start`']="'".$_POST['start_date']."'";
  $data['`startTime`']="'".$_POST['start_hour']."'";
  $data['`endTime`']="'".$_POST['end_hour']."'";
  $data['`end`']="'".$_POST['end_date']."'";
  if($_POST['allDay']=='true'){
      $data['`allDay`']="'1'";
  }
  else {
      $data['`allday`']="'0'";
  }

  $data['`usuario_id`']="'".$_SESSION['id']."'";


  if ($conexion->insertData('`evento`', $data)) {
    $response['msg']= 'OK';
  }else {
    $response['msg']= 'No se pudo realizar la insercion de los datos';

  }
}
$conexion->cerrarConexion();
echo json_encode($response);

 ?>
