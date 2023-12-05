<?php
session_start();
include '../ConexiónBD.php';

//Collect variables
if (isset($_REQUEST["valor"]))
  $value = $_REQUEST["valor"];

//Require you to be logged in

if (!isset($_SESSION['user'])) {
  $_SESSION['mensajeBD'] = 'Necesitas iniciar sesión primero';
  header('Location:../Vistas/LoginVista.php');
  exit;
}
$userL = $_SESSION['user'];

//Function to save code and perform the operation.
function solicitar_servicio()
{
  global $userL, $value, $connection;
  $sql = "SELECT id  FROM usuarios WHERE nombreUsuario='" . $userL . "' OR correo='" . $userL . "' ";
  $memory = $connection->query($sql);

  if ($memory && $memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $user = $info['id'];
  }

  //Check if the same service has been selected before 
  //and validate it only if it is in a completed status
  $n = rand(1000000000, 9999999999);
  $counter = 0;

  while ($counter == 0) {
    $sql = "SELECT * FROM reparacion WHERE n='" . $n . "'";
    $memory2 = $connection->query($sql);
    if ($memory2->num_rows > 0)
      $n = rand(1000000000, 9999999999);
    else
      $counter = 1;
  }

  //Now it will only insert in case that accepted is in finalized or 0,
  //that is to say that this user has never requested a service of this type
  $sql = "SELECT *  FROM reparacion WHERE  servicio='" . $value . "' AND aceptado='Si' AND usuario='" . $user . "' ";
  $memory = $connection->query($sql);

  if ($memory && $memory->num_rows > 0) {
    $_SESSION['mensajeBD'] = 'No puedes solicitar un servicio que ya está en espera de completarse.';
    header('Location:../Vistas/ReparacionVista.php');
    exit;
  }

  $sql = "SELECT *  FROM reparacion WHERE  servicio='" . $value . "' AND aceptado='Espera' AND usuario='" . $user . "' ";
  $memory = $connection->query($sql);

  if ($memory && $memory->num_rows > 0) {
    $_SESSION['mensajeBD'] = 'No puedes solicitar un servicio que ya está en espera de completarse.';
    header('Location:../Vistas/ReparacionVista.php');
    exit;
  }
  $currentDate = date("o\-m\-d");

  $sql = "SELECT *  FROM reparacion WHERE fecha='" . $currentDate . "' AND servicio='" . $value . "' AND aceptado!='Finalizado' AND usuario='" . $user . "' ";
  $memory = $connection->query($sql);
  if ($memory && $memory->num_rows > 0) {
    $_SESSION['mensajeBD'] = 'No puedes solicitar el mismo servicio en el mismo día.';
    header('Location:../Vistas/ReparacionVista.php');
    exit;
  } else {
    $sql = "INSERT INTO reparacion(usuario,servicio,aceptado,n)   VALUES('" . $user . "','" . $value . "','Espera','" . $n . "')";
    $check = $connection->query($sql);

    if ($connection->affected_rows > 0) {
      $_SESSION['mensajeBD3'] = 'Gracias por solicitar nuestros servicios.';
      header('Location:SeguimientoControlador.php#3');
      exit;
    }
  }
}

//Depending on the service chosen, it will be added to the request

if ($value == 'sustituir')
  solicitar_servicio();
elseif ($value == 'neumatico')
  solicitar_servicio();
elseif ($value == 'llanta')
  solicitar_servicio();
elseif ($value == 'aceite')
  solicitar_servicio();
elseif ($value == 'pintura')
  solicitar_servicio();
elseif ($value == 'carroceria')
  solicitar_servicio();
elseif ($value == 'bateria')
  solicitar_servicio();
elseif ($value == 'bombilla')
  solicitar_servicio();
elseif ($value == 'parabrisas')
  solicitar_servicio();
elseif ($value == 'limpieza')
  solicitar_servicio();

?>