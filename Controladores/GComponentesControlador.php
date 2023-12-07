<?php
session_start();
include '../ConexiónBD.php';

$_SESSION['chekon'] = 1;

//Buy/cancel
if (isset($_REQUEST['user'])) {

  if (isset($_REQUEST['buy'])) {
    $sql = "UPDATE componente_usuario SET finalizado='Si' WHERE usuario='" . $_REQUEST['user'] . "' AND componente='" . $_REQUEST['component'] . "'";
    $check = $connection->query($sql);
  }

  if (isset($_REQUEST['cancel'])) {
    $sql = "DELETE FROM componente_usuario WHERE usuario='" . $_REQUEST['user'] . "' AND componente='" . $_REQUEST['component'] . "' AND n='" . $_REQUEST['n'] . "' ";
    $check = $connection->query($sql);
  }
}

//Pick up vehicles in array
$sql = "SELECT count(*) FROM componente_usuario";
$memory = $connection->query($sql);

if ($memory->num_rows > 0) {
  $info = $memory->fetch_array();
  $num = $info[0];
  $num = (int) $num;
}

$cont = 0;
$component_date = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
  $sql = "SELECT *  FROM componente_usuario WHERE id='" . $cont2 . "'";
  $memory2 = $connection->query($sql);
  if ($memory2 && $memory2->num_rows > 0) {
    $info = $memory2->fetch_array();
    $user = $info['usuario'];
    $component_date[$cont]['idU'] = $info['usuario'];
    $component = $info['componente'];
    $component_date[$cont]['idC'] = $info['componente'];

    $date = date("d-m-Y", strtotime($info['fecha']));
    $component_date[$cont]['fecha'] = $date;
    $component_date[$cont]['n'] = $info['n'];
    $component_date[$cont]['precio'] = $info['precio'] * 1;
    $component_date[$cont]['cantidad'] = $info['cantidad'];
    $component_date[$cont]['finalizado'] = $info['finalizado'];

    $sql = "SELECT * FROM usuarios WHERE id='" . $user . "' ";
    $memory = $connection->query($sql);

    if ($memory->num_rows > 0) {
      $info = $memory->fetch_array();
      $component_date[$cont]['nombreUsuario'] = $info['nombreUsuario'];
      $component_date[$cont]['correo'] = $info['correo'];
      $component_date[$cont]['numeroMovil'] = $info['numeroMovil'];
      $component_date[$cont]['nombre'] = $info['nombre'];
      $component_date[$cont]['apellidos'] = $info['apellidos'];
      $component_date[$cont]['nif'] = $info['nif'];
    }

    $sql = "SELECT * FROM componentes WHERE id='" . $component . "' ";
    $memory = $connection->query($sql);

    if ($memory->num_rows > 0) {
      $info = $memory->fetch_array();
      $component_date[$cont]['nombreC'] = $info['nombre'];
      $component_date[$cont]['tipo'] = $info['tipo'];
      $component_date[$cont]['ruta'] = $info['ruta'];
    }
    $cont++;
  }
}


//Ordenado por estado
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

$component_date = array_sort($component_date, 'finalizado', SORT_ASC);
$_SESSION['datosGComponentes'] = $component_date;
header("Location:../Vistas/GComponentesVista.php");
exit;

?>