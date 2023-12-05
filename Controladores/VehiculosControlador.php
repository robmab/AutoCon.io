<?php
session_start();
include '../ConexiónBD.php';

$_SESSION['check'] = 1;
if (isset($_REQUEST['model'])) {
  $sql = "SELECT * FROM vehiculos WHERE modelo='" . $_REQUEST['model'] . "'";
  $memory = $connection->query($sql);
  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $available = $info['disponibles'];
  }
  if (isset($_REQUEST['a'])) {
    $available = $available + 1;
    $sql = "UPDATE vehiculos SET disponibles='" . $available . "' WHERE modelo='" . $_REQUEST['model'] . "'";
    $check = $connection->query($sql);
  }
  if (isset($_REQUEST['q'])) {
    $available = $available - 1;
    $sql = "UPDATE vehiculos SET disponibles='" . $available . "' WHERE modelo='" . $_REQUEST['model'] . "'";
    $check = $connection->query($sql);
  }
  $model = $_REQUEST['model'];
}

//Collect car data
$sql = "SELECT count(*) FROM vehiculos";
$memory = $connection->query($sql);

if ($memory->num_rows > 0) {
  $info = $memory->fetch_array();
  $num = $info[0];
  $num = (int) $num;
}
$cont = 0;
$vehicle_list = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
  $sql = "SELECT *  FROM vehiculos WHERE ID='" . $cont2 . "'";
  $memory2 = $connection->query($sql);
  if ($memory2 && $memory2->num_rows > 0) {
    $info = $memory2->fetch_array();
    $vehicle_list[$info['modelo']]['vendidos'] = $info['vendidos'];
    $vehicle_list[$info['modelo']]['disponibles'] = $info['disponibles'];
    $vehicle_list[$info['modelo']]['rebaja'] = $info['rebaja'];
    $vehicle_list[$info['modelo']]['img'] = $info['img'];
    $vehicle_list[$info['modelo']]['alquilados'] = $info['alquilados'];
    $vehicle_list[$info['modelo']]['ruta'] = $info['ruta'];

    $discountM = (($info['rebaja'] / 100) - 1) * -1;
    $vehicle_list[$info['modelo']]['precioRebajado'] = $info['precio'] * $discountM;
    $vehicle_list[$info['modelo']]['precio'] = $info['precio'] * 1;

    //Rebate calculation of existing
    $current_date = date("Y\-m\-d");
    $sql2 = "SELECT count(*) FROM eventos_descuentos";
    $memory3 = $connection->query($sql2);

    if ($memory3->num_rows > 0) {
      $info2 = $memory3->fetch_array();
      $num1 = $info2[0];
      $num1 = (int) $num1;
    }
    $cont0 = 0;

    for ($counter = 0; $cont0 < $num1; $counter++) {
      $sql = "SELECT *  FROM eventos_descuentos WHERE id='" . $counter . "'";
      $memory2 = $connection->query($sql);
      if ($memory2 && $memory2->num_rows > 0) {
        $info2 = $memory2->fetch_array();
        if ($info2['fecha_in'] <= $current_date) {
          if ($info2['fecha_fin'] >= $current_date) {
            $multipler = $vehicle_list[$info['modelo']]['rebaja'] / 100;
            $multipler = ($multipler - 1) * -1;
            $multipler2 = $info2['porciento'] * $multipler;
            $vehicle_list[$info['modelo']]['rebaja'] = $vehicle_list[$info['modelo']]['rebaja'] + $multipler2;

            $percent = (($info2['porciento'] / 100) - 1) * -1;
            $vehicle_list[$info['modelo']]['precioRebajado'] = $vehicle_list[$info['modelo']]['precioRebajado'] * $percent;
            $vehicle_list[$info['modelo']]['precioRebajado'] = round($vehicle_list[$info['modelo']]['precioRebajado'], 2);
          }
        }
        $cont0++;
      }
    }
    $vehicle_list[$info['modelo']]['precioAlquiler'] = $info['precioAlquiler'] * 1;
    $cont++;
  }
}

$_SESSION['listaVeh'] = $vehicle_list;
header("Location:../Vistas/VehiculosVista.php#$model");
exit;

?>