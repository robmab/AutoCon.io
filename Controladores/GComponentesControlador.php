<?php
session_start();
include '../ConexiónBD.php';

$_SESSION['chekon'] = 1;

//Buy/cancel
if (isset($_REQUEST['usuario'])) {

  if (isset($_REQUEST['comprar'])) {
    $sql = "UPDATE componente_usuario SET finalizado='Si' WHERE usuario='" . $_REQUEST['usuario'] . "' AND componente='" . $_REQUEST['componente'] . "'";
    $check = $connection->query($sql);
  }

  if (isset($_REQUEST['cancelar'])) {
    $sql = "DELETE FROM componente_usuario WHERE usuario='" . $_REQUEST['usuario'] . "' AND componente='" . $_REQUEST['componente'] . "' AND n='" . $_REQUEST['n'] . "' ";
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
$componentDate = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
  $sql = "SELECT *  FROM componente_usuario WHERE id='" . $cont2 . "'";
  $memory2 = $connection->query($sql);
  if ($memory2 && $memory2->num_rows > 0) {
    $info = $memory2->fetch_array();
    $user = $info['usuario'];
    $componentDate[$cont]['idU'] = $info['usuario'];
    $component = $info['componente'];
    $componentDate[$cont]['idC'] = $info['componente'];

    $date = date("d-m-Y", strtotime($info['fecha']));
    $componentDate[$cont]['fecha'] = $date;
    $componentDate[$cont]['n'] = $info['n'];
    $componentDate[$cont]['precio'] = $info['precio'] * 1;
    $componentDate[$cont]['cantidad'] = $info['cantidad'];
    $componentDate[$cont]['finalizado'] = $info['finalizado'];

    $sql = "SELECT * FROM usuarios WHERE id='" . $user . "' ";
    $memory = $connection->query($sql);

    if ($memory->num_rows > 0) {
      $info = $memory->fetch_array();
      $componentDate[$cont]['nombreUsuario'] = $info['nombreUsuario'];
      $componentDate[$cont]['correo'] = $info['correo'];
      $componentDate[$cont]['numeroMovil'] = $info['numeroMovil'];
      $componentDate[$cont]['nombre'] = $info['nombre'];
      $componentDate[$cont]['apellidos'] = $info['apellidos'];
      $componentDate[$cont]['nif'] = $info['nif'];
    }

    $sql = "SELECT * FROM componentes WHERE id='" . $component . "' ";
    $memory = $connection->query($sql);

    if ($memory->num_rows > 0) {
      $info = $memory->fetch_array();
      $componentDate[$cont]['nombreC'] = $info['nombre'];
      $componentDate[$cont]['tipo'] = $info['tipo'];
      $componentDate[$cont]['ruta'] = $info['ruta'];
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

$componentDate = array_sort($componentDate, 'finalizado', SORT_ASC);
$_SESSION['datosGComponentes'] = $componentDate;
header("Location:../Vistas/GComponentesVista.php");
exit;

?>