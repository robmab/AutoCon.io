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

  if (isset($_REQUEST['eliminar']) and $_REQUEST['nU'] != "Rob") {
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
$userDate = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
  $sql = "SELECT *  FROM usuarios WHERE id='" . $cont2 . "'";
  $memory2 = $connection->query($sql);

  if ($memory2 && $memory2->num_rows > 0) {
    $info = $memory2->fetch_array();
    $userDate[$info['nombreUsuario']]['nombre'] = $info['nombre'];
    $userDate[$info['nombreUsuario']]['nif'] = $info['nif'];
    $userDate[$info['nombreUsuario']]['domicilio'] = $info['domicilio'];
    $info['fechaNacimiento'] = date("d-m-Y", strtotime($info['fechaNacimiento']));
    $userDate[$info['nombreUsuario']]['fechaNacimiento'] = $info['fechaNacimiento'];
    $userDate[$info['nombreUsuario']]['rol'] = $info['rol'];
    $userDate[$info['nombreUsuario']]['apellidos'] = $info['apellidos'];
    $userDate[$info['nombreUsuario']]['codigoPostal'] = $info['codigoPostal'];
    $userDate[$info['nombreUsuario']]['correo'] = $info['correo'];
    $userDate[$info['nombreUsuario']]['provincia'] = $info['provincia'];
    $userDate[$info['nombreUsuario']]['población'] = $info['población'];
    $userDate[$info['nombreUsuario']]['numeroMovil'] = $info['numeroMovil'];
    $userDate[$info['nombreUsuario']]['id'] = $info['id'];

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

$userDate = array_sort($userDate, 'nombre', SORT_ASC);
$_SESSION['datosUsuarios'] = $userDate;
header("Location:../Vistas/UsuariosVista.php");
exit;

?>