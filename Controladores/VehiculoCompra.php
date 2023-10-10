<?php
session_start();
include '../ConexiónBD.php';

//Control de usuario logeado
if (!isset($_SESSION['user'])) {
  $_SESSION['mensajeBD'] = 'Tienes que registrarte antes de poder comprar o alquilar un vehículo.';
  header("Location:../Vistas/LoginVista.php");
  exit;
}

$n = rand(1000000000, 9999999999);
$contad = 0;
while ($contad == 0) {
  $sql = "SELECT * FROM vehiculos_usuarios WHERE n='" . $n . "'";
  $memi = $conexion->query($sql);
  if ($memi->num_rows > 0)
    $n = rand(1000000000, 9999999999);
  else
    $contad = 1;
}

//Control de comprar- alquilar
if (isset($_REQUEST['comprar'])) {
  $sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
  $memi = $conexion->query($sql);
  if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $usuario = $info['id'];
  }

  $sql = "SELECT * FROM vehiculos WHERE modelo='" . $_SESSION['ModeloVeh'] . "'";
  $memi = $conexion->query($sql);
  if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $vehiculo = $info['id'];
    $disponibles = $info['disponibles'];
    $modelo = $info['modelo'];
  }

  $sql = "SELECT * FROM vehiculos_usuarios WHERE vehiculo='" . $vehiculo . "' and alquilado='Si'";
  $memi = $conexion->query($sql);

  if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $_SESSION['mensajeBD'] = 'Ya has alquilado este vehículo.';
    header("Location:VehiculosControlador.php#1");
    exit;
  }
  $sql = "SELECT * FROM vehiculos_usuarios WHERE vehiculo='" . $vehiculo . "' and alquilado='No' and reservado='Si'";
  $memi = $conexion->query($sql);

  if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $_SESSION['mensajeBD'] = 'No puedes reservar un coche que ya has reservado.';
    header("Location:VehiculosControlador.php#1");
    exit;
  }

  $sql = "INSERT INTO vehiculos_usuarios(usuario,vehiculo,reservado,alquilado,precio,n)   VALUES('" . $usuario . "','" . $vehiculo . "','Si','No','" . $_SESSION['listaVeh'][$_SESSION['ModeloVeh']]['precioRebajado'] . "','" . $n . "')";
  $comprobar = $conexion->query($sql);

  if ($conexion->affected_rows > 0) {

    //Restar vehiculos disponibles
    $disponibles = $disponibles - 1;
    $sql = "UPDATE vehiculos SET disponibles='" . $disponibles . "' WHERE modelo='" . $modelo . "'";
    $comprobar = $conexion->query($sql);

    $_SESSION['mensajeBD1'] = 'Tu vehículo se ha reservado correctamente. Pasate por la tienda mas cercana para terminar el pago y llevarte tu coche.';
    header("Location:SeguimientoControlador.php#1");
    exit;
  }

} elseif (isset($_REQUEST['alquilar'])) {
  $sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
  $memi = $conexion->query($sql);

  if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $usuario = $info['id'];
  }

  //Comprobar si tiene datos de facturacion el usuario
  $sql = "SELECT * FROM usuarios_facturacion WHERE usuario='" . $usuario . "'";
  $memi = $conexion->query($sql);
  if ($memi->num_rows <= 0) {
    $_SESSION['mensajeBD'] = "Necesitas asociar los datos de tu tarjeta a tu cuenta para asignar el pago";
    header("Location:../Vistas/FacturacionVista.php?checkF=1");
    exit;
  }

  $sql = "SELECT * FROM vehiculos WHERE modelo='" . $_SESSION['ModeloVeh'] . "'";
  $memi = $conexion->query($sql);
  if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $vehiculo = $info['id'];
    $alquilados = $info['alquilados'];
    $modelo = $info['modelo'];
    $disponibles = $info['disponibles'];
  }
  $sql = "SELECT * FROM vehiculos_usuarios WHERE vehiculo='" . $vehiculo . "' and alquilado='Si'";
  $memi = $conexion->query($sql);

  if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $_SESSION['mensajeBD'] = 'Ya has alquilado este vehículo.';
    header("Location:VehiculosControlador.php#1");
    exit;
  }

  $sql = "SELECT * FROM vehiculos_usuarios WHERE vehiculo='" . $vehiculo . "' and alquilado='No' and reservado='Si'";
  $memi = $conexion->query($sql);

  if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $_SESSION['mensajeBD'] = 'No puedes reservar un coche que ya has reservado.';
    header("Location:VehiculosControlador.php#1");
    exit;
  }
  $sql = "INSERT INTO vehiculos_usuarios(usuario,vehiculo,reservado,alquilado,precio,n)   VALUES('" . $usuario . "','" . $vehiculo . "','No','Si','" . $_SESSION['listaVeh'][$_SESSION['ModeloVeh']]['precioAlquiler'] . "','" . $n . "')";
  $comprobar = $conexion->query($sql);

  if ($conexion->affected_rows > 0) {
    $alquilados = $alquilados + 1;
    $sql = "UPDATE vehiculos SET alquilados='" . $alquilados . "' WHERE modelo='" . $modelo . "'";
    $comprobar = $conexion->query($sql);
    $disponibles = $disponibles - 1;
    $sql = "UPDATE vehiculos SET disponibles='" . $disponibles . "' WHERE modelo='" . $modelo . "'";
    $comprobar = $conexion->query($sql);

    $_SESSION['mensajeBD1'] = 'Pásate cuando quieras por tienda para recoger tu vehículo y empezar a usarlo.';
    header("Location:SeguimientoControlador.php#1");
    exit;
  }
}

?>