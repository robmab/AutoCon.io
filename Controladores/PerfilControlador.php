<?php
session_start();
include '../ConexiónBD.php';

//Avoid passing through the view before the controller
$_SESSION['checkon'] = 1;

//DATA EDITING - P3
$cont = 1;
if (isset($_REQUEST['edicion'])) {
  if (isset($_SESSION['email']) && ($_SESSION['email'] != '')) {
    $email = $_SESSION["email"];
    unset($_SESSION['email']);
    $email = ucwords($email);
    $sql = "SELECT correo FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "'  ";
    $memory = $connection->query($sql);
    if ($memory->num_rows > 0) {
      $info = $memory->fetch_array();
      $email2 = $info['correo'];
    }
    $sql = "UPDATE usuarios SET correo='" . $email . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $check = $connection->query($sql);

    if (($connection->affected_rows <= 0) && ($email2 != $email)) {
      $_SESSION['mensajeBD'] = 'El correo ' . $email . ' ya existe.';
      header('Location:../Vistas/PerfilVista.php?editar=1');
      exit;
    }
  }

  if (isset($_SESSION['nombreUs']) && ($_SESSION['nombreUs'] != '')) {
    $user_name = $_SESSION["nombreUs"];
    $user_name = ucwords($user_name);
    unset($_SESSION['nombreUs']);

    $sql = "UPDATE usuarios SET nombreUsuario='" . $user_name . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $check = $connection->query($sql);
    if ($_SESSION['user'] == $user_name) {
    } elseif ($connection->affected_rows > 0) {
      $_SESSION['user'] = $user_name;
      $cont = 0;
    } else {
      $_SESSION['mensajeBD'] = 'El usuario ' . $user_name . ' ya existe, prueba con otro.';
      header('Location:../Vistas/PerfilVista.php?editar=1');
      exit;
    }
  }

  if (isset($_SESSION['nombre']) && ($_SESSION['nombre'] != '')) {
    $name = $_SESSION["nombre"];
    $name = ucwords($name);
    unset($_SESSION['nombre']);

    $sql = "UPDATE usuarios SET nombre='" . $name . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $check = $connection->query($sql);
    if ($connection->affected_rows > 0)
      $cont = 0;
  }

  if (isset($_SESSION['apellidos']) && ($_SESSION['apellidos'] != '')) {
    $lastname = $_SESSION["apellidos"];
    $lastname = ucwords($lastname);
    unset($_SESSION['apellidos']);

    $sql = "UPDATE usuarios SET apellidos='" . $lastname . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $check = $connection->query($sql);
    if ($connection->affected_rows > 0)
      $cont = 0;
  }

  if (isset($_SESSION['direccion']) && ($_SESSION['direccion'] != '')) {
    $address = $_SESSION["direccion"];
    $address = ucwords($address);
    unset($_SESSION['direccion']);

    $sql = "UPDATE usuarios SET domicilio='" . $address . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $check = $connection->query($sql);

    if ($connection->affected_rows > 0)
      $cont = 0;
  }

  if (isset($_SESSION['nif']) && ($_SESSION['nif'] != '')) {
    $nif = $_SESSION["nif"];
    unset($_SESSION['nif']);
    $nif = ucwords($nif);

    $sql = "SELECT nif FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "'  ";
    $memory = $connection->query($sql);
    if ($memory->num_rows > 0) {
      $info = $memory->fetch_array();
      $dni2 = $info['nif'];
    }

    $sql = "UPDATE usuarios SET nif='" . $nif . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $check = $connection->query($sql);

    if ($connection->affected_rows > 0) {
      $cont = 0;
    } elseif ($nif == $dni2) {
    } else {
      $_SESSION['mensajeBD'] = 'El DNI ' . $nif . ' ya esta registrado.';
      header('Location:../Vistas/PerfilVista.php?editar=1');
      exit;
    }
  }

  if (isset($_SESSION['fechaNac']) && ($_SESSION['fechaNac'] != '')) {
    $born_date = $_SESSION["fechaNac"];
    unset($_SESSION['fechaNac']);

    $sql = "UPDATE usuarios SET fechaNacimiento='" . $born_date . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $check = $connection->query($sql);

    if ($connection->affected_rows > 0)
      $cont = 0;
  }

  if (isset($_SESSION['provincia']) && ($_SESSION['provincia'] != '')) {
    $province = $_SESSION["provincia"];
    unset($_SESSION['provincia']);

    $sql = "UPDATE usuarios SET provincia='" . $province . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $check = $connection->query($sql);

    if ($connection->affected_rows > 0)
      $cont = 0;
  }

  if (isset($_SESSION['poblacion']) && ($_SESSION['poblacion'] != '')) {
    $population = $_SESSION["poblacion"];
    unset($_SESSION['poblacion']);

    $sql = "UPDATE usuarios SET población='" . $population . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $check = $connection->query($sql);

    if ($connection->affected_rows > 0)
      $cont = 0;
  }

  if (isset($_SESSION['codigoP']) && ($_SESSION['codigoP'] != '')) {
    $zip_code = $_SESSION["codigoP"];
    unset($_SESSION['codigoP']);

    $sql = "UPDATE usuarios SET codigoPostal='" . $zip_code . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $check = $connection->query($sql);

    if ($connection->affected_rows > 0)
      $cont = 0;
  }

  if (isset($_SESSION['movil']) && ($_SESSION['movil'] != '')) {
    $mobile = $_SESSION["movil"];
    unset($_SESSION['movil']);

    $sql = "UPDATE usuarios SET numeroMovil='" . $mobile . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $check = $connection->query($sql);

    if ($connection->affected_rows > 0)
      $cont = 0;
  }
  if (isset($_SESSION['contraseñaActual']) && ($_SESSION['contraseñaActual'] != '')) {

    //Check current password
    $password = base64_decode($_SESSION['datosUsu']['contraseña']);
    $current_password = $_SESSION['contraseñaActual'];
    unset($_SESSION['contraseñaActual']);

    if ($password != $current_password) {
      $_SESSION['errC'] = 'No coincide la contraseña actual';
      header('Location:../Vistas/PerfilVista.php?editar=1');
      exit;
    }

    if (isset($_SESSION['contraseñaNueva']) && ($_SESSION['contraseñaNueva'] != '')) {
      if (isset($_SESSION['contraseñaNueva2']) && ($_SESSION['contraseñaNueva2'] != '')) {
        $new_password = $_SESSION['contraseñaNueva'];
        unset($_SESSION['contraseñaNueva']);
        unset($_SESSION['contraseñaNueva2']);
        $new_password = base64_encode($new_password);

        $sql = "UPDATE usuarios SET contraseña='" . $new_password . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
        $check = $connection->query($sql);

        if ($connection->affected_rows > 0)
          $cont = 0;
      }
    }
  }

  //Checking whether the data have been edited
  if ($cont == 0) {
    $_SESSION['mensajeConf'] = 'Se han editado los datos correctamente.';
    header('Location:PerfilControlador.php');
    exit;
  } else {
    header('Location:../Vistas/PerfilVista.php');
    exit;
  }
}

//Go to edit profile section
if (isset($_REQUEST['editar'])) {
  header("Location:../Vistas/PerfilVista.php?editar=1");
  exit;
}

//Collect user data
$user_data = array();
$sql = "SELECT * FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'   ";
$memory2 = $connection->query($sql);

if ($memory2 && $memory2->num_rows > 0) {
  $info = $memory2->fetch_array();
  $user_data['nombreUsuario'] = $info['nombreUsuario'];
  $user_data['correo'] = $info['correo'];
  $user_data['apellidos'] = $info['apellidos'];
  $user_data['contraseña'] = $info['contraseña'];
  $user_data['fechaNacimiento'] = $info['fechaNacimiento'];
  $user_data['domicilio'] = $info['domicilio'];
  $user_data['nif'] = $info['nif'];
  $user_data['nombre'] = $info['nombre'];
  $user_data['codigoPostal'] = $info['codigoPostal'];
  $user_data['poblacion'] = $info['población'];
  $user_data['provincia'] = $info['provincia'];
  $user_data['numeroMovil'] = $info['numeroMovil'];
  $user_data['codigoPostal'] = $info['codigoPostal'];
}

$_SESSION['datosUsu'] = $user_data;

//Billing data check
$sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
$memory = $connection->query($sql);

if ($memory->num_rows > 0) {
  $info = $memory->fetch_array();
  $user = $info['id'];
}

$sql = "SELECT * FROM usuarios_facturacion WHERE usuario='" . $user . "'";
$memory = $connection->query($sql);

if ($memory->num_rows > 0) {
  $info = $memory->fetch_array();
  $card_data['numero1'] = substr($info['numero'], -16, 4);
  $card_data['numero2'] = substr($info['numero'], -12, 4);
  $card_data['numero3'] = substr($info['numero'], -8, 4);
  $card_data['numero4'] = substr($info['numero'], -4, 4);
  $card_data['titular'] = $info['titular'];
  $card_data['tipo'] = $info['tipo'];
  $card_data['ccv'] = $info['ccv'];
  $card_data['fechaM'] = $info['fechaM'];
  $card_data['fechaA'] = $info['fechaA'];
  $_SESSION['datosTar'] = $card_data;
  $_SESSION['tarjeta'] = 1;
}

header("Location:../Vistas/PerfilVista.php");
exit;

?>