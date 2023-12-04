<?php
session_start();
include '../ConexiónBD.php';

//Controlador para eliminar tarjeta
if (isset($_REQUEST['eliminar'])) {
  $sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
  $memory = $connection->query($sql);

  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $user = $info['id'];
  }

  $sql = "DELETE FROM usuarios_facturacion WHERE usuario='" . $user . "'";
  $check = $connection->query($sql);
  header("Location:PerfilControlador.php");
  exit;
}

// Recoger variables            
if (isset($_SESSION["tarjetaF"])) {
  $card = $_SESSION["tarjetaF"];
  $card = ucwords($card);
  unset($_SESSION["tarjetaF"]);
}

if (isset($_SESSION["numeroF"])) {
  $number = $_SESSION["numeroF"];
  $number = ucwords($number);
  unset($_SESSION["numeroF"]);
}

if (isset($_SESSION["titularF"])) {
  $headline = $_SESSION["titularF"];
  $headline = ucwords($headline);
  unset($_SESSION["titularF"]);
}

if (isset($_SESSION["mesF"])) {
  $month = $_SESSION["mesF"];
  $month = ucwords($month);
  unset($_SESSION["mesF"]);
}

if (isset($_SESSION["añoF"])) {
  $year = $_SESSION["añoF"];
  $year = ucwords($year);
  unset($_SESSION["añoF"]);
}

if (isset($_SESSION["ccvF"])) {
  $ccv = $_SESSION["ccvF"];
  $ccv = ucwords($ccv);
  unset($_SESSION["ccvF"]);
}

//Insertar datos
$sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
$memory = $connection->query($sql);

if ($memory->num_rows > 0) {
  $info = $memory->fetch_array();
  $user = $info['id'];
}

$sql = "INSERT INTO usuarios_facturacion(usuario,numero,tipo,titular,ccv,fechaM,fechaA)   VALUES('" . $user . "','" . $number . "','" . $card . "','" . $headline . "','" . $ccv . "','" . $month . "','" . $year . "')";
$check = $connection->query($sql);

if ($connection->affected_rows > 0) {
  if (isset($_SESSION['checkF'])) {
    unset($_SESSION['checkF']);
    header("Location:VehiculoCompra.php?alquilar=1");
    exit;
  } else {
    header("Location:PerfilControlador.php");
    exit;
  }
}

?>