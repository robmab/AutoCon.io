<?php
session_start();
include '../ConexiónBD.php';

$_SESSION['chekon'] = 1;
//Buy/cancel
if (isset($_REQUEST['user'])) {
  if (isset($_REQUEST['buy'])) {
    $sql = "UPDATE vehiculos_usuarios SET reservado='Comprado' WHERE usuario='" . $_REQUEST['user'] . "' AND vehiculo='" . $_REQUEST['vehicle'] . "' AND n='" . $_REQUEST['n'] . "'";
    $check = $connection->query($sql);

    $sql = "UPDATE vehiculos_usuarios SET precio='" . $_REQUEST['price'] . "' WHERE usuario='" . $_REQUEST['user'] . "' AND vehiculo='" . $_REQUEST['vehicle'] . "' AND n='" . $_REQUEST['n'] . "'";
    $check = $connection->query($sql);

    $sql = "UPDATE vehiculos_usuarios SET alquilado='No' WHERE usuario='" . $_REQUEST['user'] . "' AND vehiculo='" . $_REQUEST['vehicle'] . "' AND n='" . $_REQUEST['n'] . "'";
    $check = $connection->query($sql);

    $sql = "SELECT * FROM vehiculos WHERE id='" . $_REQUEST['vehicle'] . "' ";
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

    if (isset($_REQUEST['rent'])) {
      $sql = "UPDATE vehiculos SET alquilados='" . $rented . "' WHERE modelo='" . $model . "'";
      $check = $connection->query($sql);
    }
  }

  if (isset($_REQUEST['cancel'])) {
    $sql = "DELETE FROM vehiculos_usuarios WHERE usuario='" . $_REQUEST['user'] . "' AND vehiculo='" . $_REQUEST['vehicle'] . "' AND  n='" . $_REQUEST['n'] . "' ";
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
$vehicle_date = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
  $sql = "SELECT *  FROM vehiculos_usuarios WHERE id='" . $cont2 . "'";
  $memory2 = $connection->query($sql);
  if ($memory2 && $memory2->num_rows > 0) {
    $info = $memory2->fetch_array();
    $user = $info['usuario'];
    $vehicle_date[$cont]['idU'] = $info['usuario'];
    $vehicle = $info['vehiculo'];
    $vehicle_date[$cont]['idV'] = $info['vehiculo'];
    $leased = $info['alquilado'];
    $reserved = $info['reservado'];

    $date = date("d-m-Y", strtotime($info['fecha']));
    $vehicle_date[$cont]['fecha'] = $date;
    $vehicle_date[$cont]['n'] = $info['n'];
    $vehicle_date[$cont]['precio'] = $info['precio'] * 1;

    $sql = "SELECT * FROM usuarios WHERE id='" . $user . "' ";
    $memory = $connection->query($sql);

    if ($memory->num_rows > 0) {
      $info = $memory->fetch_array();
      $vehicle_date[$cont]['nombreUsuario'] = $info['nombreUsuario'];
      $vehicle_date[$cont]['correo'] = $info['correo'];
      $vehicle_date[$cont]['numeroMovil'] = $info['numeroMovil'];
      $vehicle_date[$cont]['nombre'] = $info['nombre'];
      $vehicle_date[$cont]['apellidos'] = $info['apellidos'];
      $vehicle_date[$cont]['nif'] = $info['nif'];
    }
    $sql = "SELECT * FROM vehiculos WHERE id='" . $vehicle . "' ";
    $memory = $connection->query($sql);

    if ($memory->num_rows > 0) {
      $info = $memory->fetch_array();
      $vehicle_date[$cont]['modelo'] = $info['modelo'];
      $vehicle_date[$cont]['precioAlquiler'] = $info['precioAlquiler'];
      $vehicle_date[$cont]['img'] = $info['img'];
      $price = $info['precio'];
      $discount = $info['rebaja'];

      if ($leased == 'Si') {
        $discount = (($discount / 100) - 1) * -1;
        $price = $price * $discount;
        $vehicle_date[$cont]['precio'] = $price;
      }
    }
    $vehicle_date[$cont]['alquilado'] = $leased;
    $vehicle_date[$cont]['reservado'] = $reserved;

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

$vehicle_date = array_sort($vehicle_date, 'reservado', SORT_DESC);
$_SESSION['$vehicleDate'] = $vehicle_date;
header("Location:../Vistas/GVehiculosVista.php");
exit;

?>