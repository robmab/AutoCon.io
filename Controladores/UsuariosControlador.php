<?php
session_start();
include '../ConexiónBD.php';

$_SESSION['chekon'] = 1;

//Modification of users
if (isset($_REQUEST['nU'])) {
  if (isset($_REQUEST['adm'])) {
    $sql = "UPDATE usuarios SET rol='Admin' WHERE nombreUsuario='" . $_REQUEST['nU'] . "'";
    $check = $connection->query($sql);
  }
  if (isset($_REQUEST['user']) and $_REQUEST['nU'] != "Rob") {
    $sql = "UPDATE usuarios SET rol='Usuario' WHERE nombreUsuario='" . $_REQUEST['nU'] . "'";
    $check = $connection->query($sql);
  }

  if (isset($_REQUEST['delete']) and $_REQUEST['nU'] != "Rob") {
    $sql = "DELETE FROM componente_usuario WHERE usuario='" . $_REQUEST['id'] . "' ";
    $check = $connection->query($sql);
    $sql = "DELETE FROM vehiculos_usuarios WHERE usuario='" . $_REQUEST['id'] . "' ";
    $check = $connection->query($sql);
    $sql = "DELETE FROM reparacion WHERE usuario='" . $_REQUEST['id'] . "' ";
    $check = $connection->query($sql);
    $sql = "DELETE FROM usuarios_facturacion WHERE usuario='" . $_REQUEST['id'] . "' ";
    $check = $connection->query($sql);
    $sql = "DELETE FROM usuarios WHERE nombreUsuario='" . $_REQUEST['nU'] . "' ";
    $check = $connection->query($sql);
  }
}

//Collect users in array
$sql = "SELECT count(*) FROM usuarios";
$memory = $connection->query($sql);

if ($memory->num_rows > 0) {
  $info = $memory->fetch_array();
  $num = $info[0];
  $num = (int) $num;
}
$cont = 0;
$user_date = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
  $sql = "SELECT *  FROM usuarios WHERE id='" . $cont2 . "'";
  $memory2 = $connection->query($sql);

  if ($memory2 && $memory2->num_rows > 0) {
    $info = $memory2->fetch_array();
    $user_date[$info['nombreUsuario']]['nombre'] = $info['nombre'];
    $user_date[$info['nombreUsuario']]['nif'] = $info['nif'];
    $user_date[$info['nombreUsuario']]['domicilio'] = $info['domicilio'];
    $info['fechaNacimiento'] = date("d-m-Y", strtotime($info['fechaNacimiento']));
    $user_date[$info['nombreUsuario']]['fechaNacimiento'] = $info['fechaNacimiento'];
    $user_date[$info['nombreUsuario']]['rol'] = $info['rol'];
    $user_date[$info['nombreUsuario']]['apellidos'] = $info['apellidos'];
    $user_date[$info['nombreUsuario']]['codigoPostal'] = $info['codigoPostal'];
    $user_date[$info['nombreUsuario']]['correo'] = $info['correo'];
    $user_date[$info['nombreUsuario']]['provincia'] = $info['provincia'];
    $user_date[$info['nombreUsuario']]['población'] = $info['población'];
    $user_date[$info['nombreUsuario']]['numeroMovil'] = $info['numeroMovil'];
    $user_date[$info['nombreUsuario']]['id'] = $info['id'];

    $cont++;
  }
}

//Sorted by name
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

$user_date = array_sort($user_date, 'nombre', SORT_ASC);
$_SESSION['datosUsuarios'] = $user_date;
header("Location:../Vistas/UsuariosVista.php");
exit;

?>