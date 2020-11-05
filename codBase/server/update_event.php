<?php

require 'conector.php';
session_start();

$conexion=new ConectorBD();
$response['conexion']=$conexion->initConexion('agenda_db');
if ($response['conexion']!='OK') {
  $response['msg']= "Error en la conexion con la base de datos";
}
else {
  $tablas='evento';
  $condicion='id="'.$_POST['id'].'"';
  $data['`start`']="'".$_POST['start_date']."'";
  $data['`startTime`']="'".$_POST['start_hour']."'";
  $data['`endTime`']="'".$_POST['end_hour']."'";
  $data['`end`']="'".$_POST['end_date']."'";
  if($conexion->actualizarRegistro($tablas,$data,$condicion)){
    $response['msg']="OK";
  }
  else {
    $response['msg']="No se ha podido actualizar el evento";
  }
  $conexion->cerrarConexion();
  echo json_encode($response);
}


 ?>
