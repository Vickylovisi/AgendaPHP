<?php
require 'conector.php';

$con = new ConectorBD();

if ($con->initConexion('agenda_db')=='OK'){
  $user1['email']="'Victoria@gmail.com'";
  $user1['nombre']="'Victoria Lovisi'";
  $user1['password']="'".password_hash('123',PASSWORD_DEFAULT)."'";
  $user1['fec_nacimiento']="'1979/11/08'";

    if ($con->insertData('usuarios', $user1)) {
      echo "Se han registrado los datos correctamente";
    }else echo "Se ha producido un error en la actualización";

    $user2['email']="'tania@gmail.com'";
    $user2['nombre']="'Tania Alum'";
    $user2['password']="'".password_hash('1234',PASSWORD_DEFAULT)."'";
    $user2['fec_nacimiento']="'2004/05/12'";

    if ($con->insertData('usuarios', $user2)) {
      echo "Se han registrado los datos correctamente";
    }else echo "Se ha producido un error en la actualización";

    $user3['email']="'diego@gmail.com'";
    $user3['nombre']="'Diego Puntu'";
    $user3['password']="'".password_hash('12345',PASSWORD_DEFAULT)."'";
    $user3['fec_nacimiento']="'1981/02/18'";

    if ($con->insertData('usuarios', $user3)) {
      echo "Se han registrado los datos correctamente";
    }else echo "Se ha producido un error en la actualización";


    $con->cerrarConexion();
}else {
    echo "Se presentó un error en la conexión";
}












 ?>
