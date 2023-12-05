<?php
session_start();
include '../ConexiónBD.php';

$_SESSION['chekon'] = 1;

//Modification of suppliers
if (isset($_REQUEST['proveedor'])) {
  if (isset($_REQUEST['cambiar'])) {
    if ($_REQUEST['cambiar'] == 1) {
      $sql = "UPDATE proveedores SET disponibilidad='No' WHERE nombre='" . $_REQUEST['proveedor'] . "'";
      $check = $connection->query($sql);
    }
    if ($_REQUEST['cambiar'] == 2) {
      $sql = "UPDATE proveedores SET disponibilidad='Si' WHERE nombre='" . $_REQUEST['proveedor'] . "'";
      $check = $connection->query($sql);
    }
  }
}

//Pick up suppliers in array
$sql = "SELECT count(*) FROM proveedores";
$memory = $connection->query($sql);

if ($memory->num_rows > 0) {
  $info = $memory->fetch_array();
  $num = $info[0];
  $num = (int) $num;
}
$cont = 0;
$providers_data = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
  $sql = "SELECT *  FROM proveedores WHERE id='" . $cont2 . "'";
  $memory2 = $connection->query($sql);

  if ($memory2 && $memory2->num_rows > 0) {
    $info = $memory2->fetch_array();
    $providers_data[$info['nombre']]['disponibilidad'] = $info['disponibilidad'];
    $providers_data[$info['nombre']]['numero'] = $info['numero'];
    $providers_data[$info['nombre']]['correo'] = $info['correo'];
    $providers_data[$info['nombre']]['logo'] = $info['logo'];

    $cont++;
  }
}

//Sorted by name and availability
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

ksort($providers_data);
$providers_data = array_sort($providers_data, 'disponibilidad', SORT_DESC);

$_SESSION['datosProveedores'] = $providers_data;
header("Location:../Vistas/ProveedoresVista.php");
exit;

?>