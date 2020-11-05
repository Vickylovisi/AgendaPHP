<?php

require 'conector.php';
session_start();

$con = new ConectorBD();
if ($con->initConexion('agenda_db')=='OK'){

    $resul=$con->obtenerEventos($_SESSION['id']);
    $rows = array();
	while($r = mysqli_fetch_assoc($resul)) {
	    $rows[] = $r;
	}
	$php_response=array("msg"=>"OK","evento"=>$rows);
	echo json_encode($php_response);

    $con->cerrarConexion();
}else {
    echo "Se presentó un error en la conexión";
}




 ?>
