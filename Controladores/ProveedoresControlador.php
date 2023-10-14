<?php
session_start();
include '../ConexiónBD.php';

$_SESSION['chekon'] = 1;

//Modificación de proveedores
if (isset($_REQUEST['proveedor'])) {
  if (isset($_REQUEST['cambiar'])) {
    if ($_REQUEST['cambiar'] == 1) {
      $sql = "UPDATE proveedores SET disponibilidad='No' WHERE nombre='" . $_REQUEST['proveedor'] . "'";
      $comprobar = $conexion->query($sql);
    }
    if ($_REQUEST['cambiar'] == 2) {
      $sql = "UPDATE proveedores SET disponibilidad='Si' WHERE nombre='" . $_REQUEST['proveedor'] . "'";
      $comprobar = $conexion->query($sql);
    }
  }
}

//Recoger proveedores en array
$sql = "SELECT count(*) FROM proveedores";
$memi = $conexion->query($sql);

if ($memi->num_rows > 0) {
  $info = $memi->fetch_array();
  $num = $info[0];
  $num = (int) $num;
}
$cont = 0;
$datosProveedores = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
  $sql = "SELECT *  FROM proveedores WHERE id='" . $cont2 . "'";
  $mem = $conexion->query($sql);

  if ($mem && $mem->num_rows > 0) {
    $info = $mem->fetch_array();
    $datosProveedores[$info['nombre']]['disponibilidad'] = $info['disponibilidad'];
    $datosProveedores[$info['nombre']]['numero'] = $info['numero'];
    $datosProveedores[$info['nombre']]['correo'] = $info['correo'];
    $datosProveedores[$info['nombre']]['logo'] = $info['logo'];

    $cont++;
  }
}

//Ordenado por nombre y disponibilidad 
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

ksort($datosProveedores);
$datosProveedores = array_sort($datosProveedores, 'disponibilidad', SORT_DESC);

$_SESSION['datosProveedores'] = $datosProveedores;
header("Location:../Vistas/ProveedoresVista.php");
exit;

?>