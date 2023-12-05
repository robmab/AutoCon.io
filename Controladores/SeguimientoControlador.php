<?php
session_start();
include '../ConexiónBD.php';

$_SESSION['chekon'] = 1;

//Cancel vehicle
if (isset($_REQUEST['vehiculo'])) {
  $sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
  $memory = $connection->query($sql);
  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $user = $info['id'];
  }

  $sql = "SELECT id FROM vehiculos WHERE modelo='" . $_REQUEST['vehiculo'] . "'";
  $memory = $connection->query($sql);
  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $veh = $info['id'];
  }

  $sql = "DELETE FROM vehiculos_usuarios WHERE n='" . $_REQUEST['n'] . "' ";
  $check = $connection->query($sql);
  $sql = "SELECT * FROM vehiculos WHERE modelo='" . $_REQUEST['vehiculo'] . "'";
  $memory = $connection->query($sql);
  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $rented = $info['alquilados'];
    $model = $info['modelo'];
    $available = $info['disponibles'];
  }

  $available = $available + 1;
  $sql = "UPDATE vehiculos SET disponibles='" . $available . "' WHERE modelo='" . $model . "'";
  $check = $connection->query($sql);

  if (isset($_REQUEST['R'])) {
    $_SESSION['mensajeBD1'] = 'Reserva cancelada con exito.';
  } elseif (isset($_REQUEST['A'])) {
    $rented = $rented - 1;
    $sql = "UPDATE vehiculos SET alquilados='" . $rented . "' WHERE modelo='" . $model . "'";
    $check = $connection->query($sql);
    $_SESSION['mensajeBD1'] = 'Alquiler cancelado con exito. Devuelve el vehículo en un plazo de 1 semana.';
  }
}

//Cancel component
if (isset($_REQUEST['nombre'])) {
  $sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
  $memory = $connection->query($sql);

  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $user = $info['id'];
  }
  $name = $_REQUEST['nombre'];
  $type = $_REQUEST['tipo'];
  $sql = "SELECT id FROM componentes WHERE nombre='" . $name . "' AND tipo='" . $type . "'";
  $memory = $connection->query($sql);

  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $componente = $info['id'];
  }

  if (isset($_REQUEST['unico'])) {
    $sql = "DELETE FROM componente_usuario WHERE n='" . $_REQUEST['n'] . "' ";
    $check = $connection->query($sql);
    $sql = "SELECT * FROM componentes WHERE nombre='" . $name . "' AND tipo='" . $type . "'";
    $memory = $connection->query($sql);

    if ($memory->num_rows > 0) {
      $info = $memory->fetch_array();
      $quantity = $info['cantidad'];
    }
    $quantity = $quantity + 1;
    $sql = "UPDATE componentes SET cantidad='" . $quantity . "' WHERE nombre='" . $name . "' AND tipo='" . $type . "'";
    $check = $connection->query($sql);
    $_SESSION['mensajeBD2'] = $name . ' de tipo ' . $type . ' cancelado.';
  } elseif (isset($_REQUEST['uno'])) {
    $sql = "SELECT * FROM componente_usuario WHERE n='" . $_REQUEST['n'] . "' ";
    $memory = $connection->query($sql);
    if ($memory->num_rows > 0) {
      $info = $memory->fetch_array();
      $quantity = $info['cantidad'];
      $price = $info['precio'];
    }

    $quantity2 = $quantity - 1;
    $price = $price / $quantity;
    $price = $price * $quantity2;

    $sql = "UPDATE componente_usuario SET cantidad='" . $quantity2 . "' WHERE n='" . $_REQUEST['n'] . "' ";
    $check = $connection->query($sql);

    $sql = "UPDATE componente_usuario SET precio='" . $price . "' WHERE n='" . $_REQUEST['n'] . "' ";
    $check = $connection->query($sql);

    $sql = "SELECT * FROM componentes WHERE nombre='" . $name . "' AND tipo='" . $type . "'";
    $memory = $connection->query($sql);

    if ($memory->num_rows > 0) {
      $info = $memory->fetch_array();
      $quantity = $info['cantidad'];
    }

    $quantity = $quantity + 1;
    $sql = "UPDATE componentes SET cantidad='" . $quantity . "' WHERE nombre='" . $name . "' AND tipo='" . $type . "'";
    $check = $connection->query($sql);
    $_SESSION['mensajeBD2'] = '1 ' . $name . " de tipo " . $type . " cancelado.";

  } elseif (isset($_REQUEST['todos'])) {
    $sql = "DELETE FROM componente_usuario WHERE n='" . $_REQUEST['n'] . "' ";
    $check = $connection->query($sql);

    $sql = "SELECT * FROM componentes WHERE nombre='" . $name . "' AND tipo='" . $type . "'";
    $memory = $connection->query($sql);

    if ($memory->num_rows > 0) {
      $info = $memory->fetch_array();
      $quantity = $info['cantidad'];
    }
    $quantity = $quantity + $_REQUEST['cantidad'];

    $sql = "UPDATE componentes SET cantidad='" . $quantity . "' WHERE nombre='" . $name . "' AND tipo='" . $type . "'";
    $check = $connection->query($sql);
    $_SESSION['mensajeBD2'] = $_REQUEST['cantidad'] . ' ' . $name . ' de tipo ' . $type . ' cancelados.';
  }
}

//Cancel repair
if (isset($_REQUEST['servicio'])) {
  $service = $_REQUEST['servicio'];
  $date = $_REQUEST['fecha'];
  $sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
  $memory = $connection->query($sql);

  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $user = $info['id'];
  }
  $sql = "DELETE FROM reparacion WHERE n='" . $_REQUEST['n'] . "' ";
  $check = $connection->query($sql);
  $_SESSION['mensajeBD3'] = "El servicio de " . $service . " del " . $date . " ha sido cancelado.";
}

function array_sort($array, $on, $order = SORT_ASC)
{
  $new_array = array();
  $sortable_array = array();

  if (count($array) > 0) {
    foreach ($array as $k => $v) {
      if (is_array($v)) {
        foreach ($v as $k2 => $v2) {
          if ($k2 == $on)
            $sortable_array[$k] = $v2;
        }
      } else
        $sortable_array[$k] = $v;

    }
    switch ($order) {
      case SORT_ASC:
        asort($sortable_array);
        break;
      case SORT_DESC:
        arsort($sortable_array);
        break;
    }
    foreach ($sortable_array as $k => $v)
      $new_array[$k] = $array[$k];
  }
  return $new_array;
}

//Get user id
$sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
$memory = $connection->query($sql);

if ($memory->num_rows > 0) {
  $info = $memory->fetch_array();
  $user = $info['id'];
}

//Collect data, if available, on rented or reserved vehicles
$sql = "SELECT count(*) FROM vehiculos_usuarios";
$memory = $connection->query($sql);

if ($memory->num_rows > 0) {
  $info = $memory->fetch_array();
  $num = $info[0];
  $num = (int) $num;
}

$cont = 0;
$vehicleDate = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
  $sql = "SELECT *  FROM vehiculos_usuarios WHERE id='" . $cont2 . "'";
  $memory2 = $connection->query($sql);

  if ($memory2 && $memory2->num_rows > 0) {
    $info = $memory2->fetch_array();
    if ($info['usuario'] == $user) {
      $leased = $info['alquilado'];
      $reserved = $info['reservado'];
      $vehicleDate[$cont]['precio'] = $info['precio'] * 1;
      $n = $info['n'];
      $date = $info['fecha'];

      $sql = "SELECT *  FROM vehiculos WHERE id='" . $info['vehiculo'] . "'";
      $memory2 = $connection->query($sql);

      if ($memory2 && $memory2->num_rows > 0) {
        $info = $memory2->fetch_array();
        $vehicleDate[$cont]['img'] = $info['img'];
        $vehicleDate[$cont]['vehiculo'] = $info['modelo'];
      }
      if ($leased == 'Si') {
        $vehicleDate[$cont]['alquilado'] = 'Si';
        $vehicleDate[$cont]['reservado'] = 'No';
      }
      if ($reserved == 'Si' or $reserved == 'Comprado') {
        $vehicleDate[$cont]['reservado'] = $reserved;
      }
      $vehicleDate[$cont]['n'] = $n;
      $vehicleDate[$cont]['fecha'] = $date;
    }
    $cont++;
  }
}
$vehicleDate = array_sort($vehicleDate, 'reservado', SORT_DESC);

//Collect Components
$sql = "SELECT count(*) FROM componente_usuario";
$memory = $connection->query($sql);

if ($memory->num_rows > 0) {

  $info = $memory->fetch_array();
  $num = $info[0];
  $num = (int) $num;
}
$cont = 0;
$componentDate = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
  $sql = "SELECT *  FROM componente_usuario WHERE id='" . $cont2 . "'";
  $memory2 = $connection->query($sql);

  if ($memory2 && $memory2->num_rows > 0) {
    $info = $memory2->fetch_array();
    if ($info['usuario'] == $user) {
      $quantity = $info['cantidad'];
      $finalizado = $info['finalizado'];
      $price = $info['precio'];
      $date = $info['fecha'];
      $n = $info['n'];
      $sql = "SELECT *  FROM componentes WHERE id='" . $info['componente'] . "'";
      $memory2 = $connection->query($sql);
      if ($memory2 && $memory2->num_rows > 0) {
        $info = $memory2->fetch_array();
        $componentDate[$cont]['ruta'] = $info['ruta'];
        $componentDate[$cont]['nombre'] = $info['nombre'];
        $componentDate[$cont]['tipo'] = $info['tipo'];
        $componentDate[$cont]['cantidad'] = $quantity;
        $componentDate[$cont]['finalizado'] = $finalizado;
        $componentDate[$cont]['precio'] = $price * 1;
        $componentDate[$cont]['fecha'] = $date;
        $componentDate[$cont]['n'] = $n;
      }
    }
    $cont++;
  }
}
$componentDate = array_sort($componentDate, 'finalizado', SORT_ASC);

//Collect repair data
$sql = "SELECT count(*) FROM reparacion";
$memory = $connection->query($sql);
if ($memory->num_rows > 0) {
  $info = $memory->fetch_array();
  $num = $info[0];
  $num = (int) $num;
}
$cont = 0;
$repairDate = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
  $sql = "SELECT *  FROM reparacion WHERE id='" . $cont2 . "'";
  $memory2 = $connection->query($sql);

  if ($memory2 && $memory2->num_rows > 0) {
    $info = $memory2->fetch_array();
    if ($info['usuario'] == $user) {
      $repairDate[$cont]['servicio'] = $info['servicio'];
      $date = date("d-m-Y", strtotime($info['fecha']));
      $repairDate[$cont]['fecha'] = $date;
      $repairDate[$cont]['aceptado'] = $info['aceptado'];
      $repairDate[$cont]['precio'] = $info['precio'] * 1;
      $repairDate[$cont]['n'] = $info['n'];
    }
    $cont++;
  }
}
$repairDate = array_sort($repairDate, 'aceptado', SORT_DESC);

//Only save to variable in case the array is not empty

if ($vehicleDate != array())
  $_SESSION['datosVehiculos'] = $vehicleDate;

if ($componentDate != array())
  $_SESSION['datosComponentes'] = $componentDate;

if ($repairDate != array())
  $_SESSION['datosReparacion'] = $repairDate;

//Collect Component data if available
header('Location:../Vistas/SeguimientoVista.php');
exit;

?>