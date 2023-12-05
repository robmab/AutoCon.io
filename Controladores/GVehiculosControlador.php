<?php
session_start();
include '../ConexiónBD.php';

$_SESSION['chekon'] = 1;
//Buy/cancel
if (isset($_REQUEST['usuario'])) {
  if (isset($_REQUEST['comprar'])) {
    $sql = "UPDATE vehiculos_usuarios SET reservado='Comprado' WHERE usuario='" . $_REQUEST['usuario'] . "' AND vehiculo='" . $_REQUEST['vehiculo'] . "' AND n='" . $_REQUEST['n'] . "'";
    $check = $connection->query($sql);

    $sql = "UPDATE vehiculos_usuarios SET precio='" . $_REQUEST['precio'] . "' WHERE usuario='" . $_REQUEST['usuario'] . "' AND vehiculo='" . $_REQUEST['vehiculo'] . "' AND n='" . $_REQUEST['n'] . "'";
    $check = $connection->query($sql);

    $sql = "UPDATE vehiculos_usuarios SET alquilado='No' WHERE usuario='" . $_REQUEST['usuario'] . "' AND vehiculo='" . $_REQUEST['vehiculo'] . "' AND n='" . $_REQUEST['n'] . "'";
    $check = $connection->query($sql);

    $sql = "SELECT * FROM vehiculos WHERE id='" . $_REQUEST['vehiculo'] . "' ";
    $memory = $connection->query($sql);

    if ($memory->num_rows > 0) {
      $info = $memory->fetch_array();
      $model = $info['modelo'];
      $selled = $info['vendidos'];
      $selled = $selled + 1;
      $rented = $info['alquilados'];
      $rented = $rented - 1;
    }
    $sql = "UPDATE vehiculos SET vendidos='" . $selled . "' WHERE modelo='" . $model . "'";
    $check = $connection->query($sql);

    if (isset($_REQUEST['alquilar'])) {
      $sql = "UPDATE vehiculos SET alquilados='" . $rented . "' WHERE modelo='" . $model . "'";
      $check = $connection->query($sql);
    }
  }

  if (isset($_REQUEST['cancelar'])) {
    $sql = "DELETE FROM vehiculos_usuarios WHERE usuario='" . $_REQUEST['usuario'] . "' AND vehiculo='" . $_REQUEST['vehiculo'] . "' AND  n='" . $_REQUEST['n'] . "' ";
    $check = $connection->query($sql);
  }
}

//Pick up vehicles in array
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
    $user = $info['usuario'];
    $vehicleDate[$cont]['idU'] = $info['usuario'];
    $vehicle = $info['vehiculo'];
    $vehicleDate[$cont]['idV'] = $info['vehiculo'];
    $leased = $info['alquilado'];
    $reserved = $info['reservado'];

    $date = date("d-m-Y", strtotime($info['fecha']));
    $vehicleDate[$cont]['fecha'] = $date;
    $vehicleDate[$cont]['n'] = $info['n'];
    $vehicleDate[$cont]['precio'] = $info['precio'] * 1;

    $sql = "SELECT * FROM usuarios WHERE id='" . $user . "' ";
    $memory = $connection->query($sql);

    if ($memory->num_rows > 0) {
      $info = $memory->fetch_array();
      $vehicleDate[$cont]['nombreUsuario'] = $info['nombreUsuario'];
      $vehicleDate[$cont]['correo'] = $info['correo'];
      $vehicleDate[$cont]['numeroMovil'] = $info['numeroMovil'];
      $vehicleDate[$cont]['nombre'] = $info['nombre'];
      $vehicleDate[$cont]['apellidos'] = $info['apellidos'];
      $vehicleDate[$cont]['nif'] = $info['nif'];
    }
    $sql = "SELECT * FROM vehiculos WHERE id='" . $vehicle . "' ";
    $memory = $connection->query($sql);

    if ($memory->num_rows > 0) {
      $info = $memory->fetch_array();
      $vehicleDate[$cont]['modelo'] = $info['modelo'];
      $vehicleDate[$cont]['precioAlquiler'] = $info['precioAlquiler'];
      $vehicleDate[$cont]['img'] = $info['img'];
      $price = $info['precio'];
      $discount = $info['rebaja'];

      if ($leased == 'Si') {
        $discount = (($discount / 100) - 1) * -1;
        $price = $price * $discount;
        $vehicleDate[$cont]['precio'] = $price;
      }
    }
    $vehicleDate[$cont]['alquilado'] = $leased;
    $vehicleDate[$cont]['reservado'] = $reserved;

    $cont++;
  }
}

//Sorted by state
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

$vehicleDate = array_sort($vehicleDate, 'reservado', SORT_DESC);
$_SESSION['datosGVehiculos'] = $vehicleDate;
header("Location:../Vistas/GVehiculosVista.php");
exit;

?>