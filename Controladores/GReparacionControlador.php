<?php
session_start();
include '../ConexiónBD.php';

$_SESSION['chekon'] = 1;

//Buy/cancel
if (isset($_REQUEST['n'])) {
  if (isset($_REQUEST['editar'])) {
    $sql = "UPDATE reparacion SET precio='" . $_REQUEST['precioE'] . "' WHERE  n='" . $_REQUEST['n'] . "'  ";
    $check = $connection->query($sql);
  }

  if (isset($_REQUEST['aceptar'])) {
    $sql = "UPDATE reparacion SET aceptado='Si' WHERE  n='" . $_REQUEST['n'] . "'  ";
    $check = $connection->query($sql);

    //Rebate calculation of existing
    $current_date = date("Y\-m\-d");
    $sql2 = "SELECT count(*) FROM eventos_descuentos";
    $memory2 = $connection->query($sql2);

    if ($memory2->num_rows > 0) {
      $info2 = $memory2->fetch_array();
      $num2 = $info2[0];
      $num2 = (int) $num2;
    }
    $counter = 0;

    for ($counter2 = 0; $counter < $num2; $counter2++) {
      $sql = "SELECT *  FROM eventos_descuentos WHERE id='" . $counter2 . "'";
      $memory = $connection->query($sql);
      if ($memory && $memory->num_rows > 0) {
        $info2 = $memory->fetch_array();
        if ($info2['fecha_in'] <= $current_date) {
          if ($info2['fecha_fin'] >= $current_date) {
            $percent = $info2['porciento'];
            $percent = $percent / 100;
            $percent = $percent - 1;
            $percent = $percent * -1;

            $_REQUEST['precio'] = $_REQUEST['precio'] * $percent;
            $_REQUEST['precio'] = round($_REQUEST['precio'], 2);
            $_SESSION['rebaja'] = $info2['porciento'];

            $count = 0;
          }
        }
        $counter++;
      }
    }
    if (!isset($count)) {
      unset($count);
      if (isset($_SESSION['rebaja'])) {
        unset($_SESSION['rebaja']);
      }
    }
    $sql = "UPDATE reparacion SET precio='" . $_REQUEST['precio'] . "' WHERE  n='" . $_REQUEST['n'] . "'  ";
    $check = $connection->query($sql);
  }

  if (isset($_REQUEST['finalizar'])) {
    $sql = "UPDATE reparacion SET aceptado='Finalizado' WHERE n='" . $_REQUEST['n'] . "'";
    $check = $connection->query($sql);
  }

  if (isset($_REQUEST['cancelar'])) {
    $sql = "DELETE FROM reparacion WHERE n='" . $_REQUEST['n'] . "' ";
    $check = $connection->query($sql);
  }
}

//Collect services in array
$sql = "SELECT count(*) FROM reparacion";
$memi = $connection->query($sql);

if ($memi->num_rows > 0) {
  $info = $memi->fetch_array();
  $num = $info[0];
  $num = (int) $num;
}
$cont = 0;
$services_date = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
  $sql = "SELECT *  FROM reparacion WHERE id='" . $cont2 . "'";
  $memory = $connection->query($sql);

  if ($memory && $memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $usuario = $info['usuario'];
    $services_date[$cont]['idU'] = $info['usuario'];

    $fecha = date("d-m-Y", strtotime($info['fecha']));
    $services_date[$cont]['fecha'] = $fecha;
    $services_date[$cont]['n'] = $info['n'];
    $services_date[$cont]['aceptado'] = $info['aceptado'];
    $services_date[$cont]['precio'] = $info['precio'] * 1;
    $services_date[$cont]['servicio'] = $info['servicio'];

    $sql = "SELECT * FROM usuarios WHERE id='" . $usuario . "' ";
    $memi = $connection->query($sql);

    if ($memi->num_rows > 0) {
      $info = $memi->fetch_array();
      $services_date[$cont]['nombreUsuario'] = $info['nombreUsuario'];
      $services_date[$cont]['correo'] = $info['correo'];
      $services_date[$cont]['numeroMovil'] = $info['numeroMovil'];
      $services_date[$cont]['nombre'] = $info['nombre'];
      $services_date[$cont]['apellidos'] = $info['apellidos'];
      $services_date[$cont]['nif'] = $info['nif'];
    }
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

$services_date = array_sort($services_date, 'servicio', SORT_ASC);
$services_date = array_sort($services_date, 'aceptado', SORT_ASC);

//Rebate calculation of existing
$current_date = date("Y\-m\-d");
$sql2 = "SELECT count(*) FROM eventos_descuentos";
$memory2 = $connection->query($sql2);

if ($memory2->num_rows > 0) {
  $info2 = $memory2->fetch_array();
  $num2 = $info2[0];
  $num2 = (int) $num2;
}
$counter = 0;

for ($counter2 = 0; $counter < $num2; $counter2++) {
  $sql = "SELECT *  FROM eventos_descuentos WHERE id='" . $counter2 . "'";
  $memory = $connection->query($sql);

  if ($memory && $memory->num_rows > 0) {
    $info2 = $memory->fetch_array();
    if ($info2['fecha_in'] <= $current_date) {
      if ($info2['fecha_fin'] >= $current_date) {
        $_SESSION['rebaja'] = $info2['porciento'];
        $count = 0;
      }
    }
    $counter++;
  }
}

if (!isset($count)) {
  unset($count);
  if (isset($_SESSION['rebaja'])) {
    unset($_SESSION['rebaja']);
  }
}

$_SESSION['datosGReparacion'] = $services_date;
header("Location:../Vistas/GReparacionVista.php");
exit;

?>