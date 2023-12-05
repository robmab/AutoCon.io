<?php
session_start();
include '../ConexiónBD.php';

//User logged in control
if (!isset($_SESSION['user'])) {
  $_SESSION['mensajeBD'] = 'Tienes que registrarte antes de poder comprar o alquilar un vehículo.';
  header("Location:../Vistas/LoginVista.php");
  exit;
}

$n = rand(1000000000, 9999999999);
$counter = 0;
while ($counter == 0) {
  $sql = "SELECT * FROM vehiculos_usuarios WHERE n='" . $n . "'";
  $memory = $connection->query($sql);
  if ($memory->num_rows > 0)
    $n = rand(1000000000, 9999999999);
  else
    $counter = 1;
}

//Buy-to-let control
if (isset($_REQUEST['comprar'])) {
  $sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
  $memory = $connection->query($sql);
  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $user = $info['id'];
  }

  $sql = "SELECT * FROM vehiculos WHERE modelo='" . $_SESSION['ModeloVeh'] . "'";
  $memory = $connection->query($sql);
  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $vehicle = $info['id'];
    $available = $info['disponibles'];
    $model = $info['modelo'];
  }

  $sql = "SELECT * FROM vehiculos_usuarios WHERE vehiculo='" . $vehicle . "' and alquilado='Si'";
  $memory = $connection->query($sql);

  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $_SESSION['mensajeBD'] = 'Ya has alquilado este vehículo.';
    header("Location:VehiculosControlador.php#1");
    exit;
  }
  $sql = "SELECT * FROM vehiculos_usuarios WHERE vehiculo='" . $vehicle . "' and alquilado='No' and reservado='Si'";
  $memory = $connection->query($sql);

  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $_SESSION['mensajeBD'] = 'No puedes reservar un coche que ya has reservado.';
    header("Location:VehiculosControlador.php#1");
    exit;
  }

  $sql = "INSERT INTO vehiculos_usuarios(usuario,vehiculo,reservado,alquilado,precio,n)   VALUES('" . $user . "','" . $vehicle . "','Si','No','" . $_SESSION['listaVeh'][$_SESSION['ModeloVeh']]['precioRebajado'] . "','" . $n . "')";
  $check = $connection->query($sql);

  if ($connection->affected_rows > 0) {

    //Subtract available vehicles
    $available = $available - 1;
    $sql = "UPDATE vehiculos SET disponibles='" . $available . "' WHERE modelo='" . $model . "'";
    $check = $connection->query($sql);

    $_SESSION['mensajeBD1'] = 'Tu vehículo se ha reservado correctamente. Pasate por la tienda mas cercana para terminar el pago y llevarte tu coche.';
    header("Location:SeguimientoControlador.php#1");
    exit;
  }

} elseif (isset($_REQUEST['alquilar'])) {
  $sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
  $memory = $connection->query($sql);

  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $user = $info['id'];
  }

  //Check if the user has billing data
  $sql = "SELECT * FROM usuarios_facturacion WHERE usuario='" . $user . "'";
  $memory = $connection->query($sql);
  if ($memory->num_rows <= 0) {
    $_SESSION['mensajeBD'] = "Necesitas asociar los datos de tu tarjeta a tu cuenta para asignar el pago";
    header("Location:../Vistas/FacturacionVista.php?checkF=1");
    exit;
  }

  $sql = "SELECT * FROM vehiculos WHERE modelo='" . $_SESSION['ModeloVeh'] . "'";
  $memory = $connection->query($sql);
  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $vehicle = $info['id'];
    $rented = $info['alquilados'];
    $model = $info['modelo'];
    $available = $info['disponibles'];
  }
  $sql = "SELECT * FROM vehiculos_usuarios WHERE vehiculo='" . $vehicle . "' and alquilado='Si'";
  $memory = $connection->query($sql);

  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $_SESSION['mensajeBD'] = 'Ya has alquilado este vehículo.';
    header("Location:VehiculosControlador.php#1");
    exit;
  }

  $sql = "SELECT * FROM vehiculos_usuarios WHERE vehiculo='" . $vehicle . "' and alquilado='No' and reservado='Si'";
  $memory = $connection->query($sql);

  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $_SESSION['mensajeBD'] = 'No puedes reservar un coche que ya has reservado.';
    header("Location:VehiculosControlador.php#1");
    exit;
  }
  $sql = "INSERT INTO vehiculos_usuarios(usuario,vehiculo,reservado,alquilado,precio,n)   VALUES('" . $user . "','" . $vehicle . "','No','Si','" . $_SESSION['listaVeh'][$_SESSION['ModeloVeh']]['precioAlquiler'] . "','" . $n . "')";
  $check = $connection->query($sql);

  if ($connection->affected_rows > 0) {
    $rented = $rented + 1;
    $sql = "UPDATE vehiculos SET alquilados='" . $rented . "' WHERE modelo='" . $model . "'";
    $check = $connection->query($sql);
    $available = $available - 1;
    $sql = "UPDATE vehiculos SET disponibles='" . $available . "' WHERE modelo='" . $model . "'";
    $check = $connection->query($sql);

    $_SESSION['mensajeBD1'] = 'Pásate cuando quieras por tienda para recoger tu vehículo y empezar a usarlo.';
    header("Location:SeguimientoControlador.php#1");
    exit;
  }
}

?>