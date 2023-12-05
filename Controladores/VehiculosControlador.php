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
$vehicleList = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
  $sql = "SELECT *  FROM vehiculos WHERE ID='" . $cont2 . "'";
  $memory2 = $connection->query($sql);
  if ($memory2 && $memory2->num_rows > 0) {
    $info = $memory2->fetch_array();
    $vehicleList[$info['modelo']]['vendidos'] = $info['vendidos'];
    $vehicleList[$info['modelo']]['disponibles'] = $info['disponibles'];
    $vehicleList[$info['modelo']]['rebaja'] = $info['rebaja'];
    $vehicleList[$info['modelo']]['img'] = $info['img'];
    $vehicleList[$info['modelo']]['alquilados'] = $info['alquilados'];
    $vehicleList[$info['modelo']]['ruta'] = $info['ruta'];

    $discountM = (($info['rebaja'] / 100) - 1) * -1;
    $vehicleList[$info['modelo']]['precioRebajado'] = $info['precio'] * $discountM;
    $vehicleList[$info['modelo']]['precio'] = $info['precio'] * 1;

    //Rebate calculation of existing
    $currentDate = date("Y\-m\-d");
    $sql2 = "SELECT count(*) FROM eventos_descuentos";
    $memi2 = $connection->query($sql2);

    if ($memi2->num_rows > 0) {
      $info2 = $memi2->fetch_array();
      $num0 = $info2[0];
      $num0 = (int) $num0;
    }
    $cont0 = 0;

    for ($cont20 = 0; $cont0 < $num0; $cont20++) {
      $sql = "SELECT *  FROM eventos_descuentos WHERE id='" . $cont20 . "'";
      $memory2 = $connection->query($sql);
      if ($memory2 && $memory2->num_rows > 0) {
        $info2 = $memory2->fetch_array();
        if ($info2['fecha_in'] <= $currentDate) {
          if ($info2['fecha_fin'] >= $currentDate) {
            $multipler = $vehicleList[$info['modelo']]['rebaja'] / 100;
            $multipler = ($multipler - 1) * -1;
            $multipler2 = $info2['porciento'] * $multipler;
            $vehicleList[$info['modelo']]['rebaja'] = $vehicleList[$info['modelo']]['rebaja'] + $multipler2;

            $percent = (($info2['porciento'] / 100) - 1) * -1;
            $vehicleList[$info['modelo']]['precioRebajado'] = $vehicleList[$info['modelo']]['precioRebajado'] * $percent;
            $vehicleList[$info['modelo']]['precioRebajado'] = round($vehicleList[$info['modelo']]['precioRebajado'], 2);
          }
        }
        $cont0++;
      }
    }
    $vehicleList[$info['modelo']]['precioAlquiler'] = $info['precioAlquiler'] * 1;
    $cont++;
  }
}

$_SESSION['listaVeh'] = $vehicleList;
header("Location:../Vistas/VehiculosVista.php#$model");
exit;

?>