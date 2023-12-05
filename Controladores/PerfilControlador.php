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
    $nombreUs = $_SESSION["nombreUs"];
    $nombreUs = ucwords($nombreUs);
    unset($_SESSION['nombreUs']);

    $sql = "UPDATE usuarios SET nombreUsuario='" . $nombreUs . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $check = $connection->query($sql);
    if ($_SESSION['user'] == $nombreUs) {
    } elseif ($connection->affected_rows > 0) {
      $_SESSION['user'] = $nombreUs;
      $cont = 0;
    } else {
      $_SESSION['mensajeBD'] = 'El usuario ' . $nombreUs . ' ya existe, prueba con otro.';
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
    $bornDate = $_SESSION["fechaNac"];
    unset($_SESSION['fechaNac']);

    $sql = "UPDATE usuarios SET fechaNacimiento='" . $bornDate . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
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
    $zipCode = $_SESSION["codigoP"];
    unset($_SESSION['codigoP']);

    $sql = "UPDATE usuarios SET codigoPostal='" . $zipCode . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
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
    $currentPassword = $_SESSION['contraseñaActual'];
    unset($_SESSION['contraseñaActual']);

    if ($password != $currentPassword) {
      $_SESSION['errC'] = 'No coincide la contraseña actual';
      header('Location:../Vistas/PerfilVista.php?editar=1');
      exit;
    }

    if (isset($_SESSION['contraseñaNueva']) && ($_SESSION['contraseñaNueva'] != '')) {
      if (isset($_SESSION['contraseñaNueva2']) && ($_SESSION['contraseñaNueva2'] != '')) {
        $newPassword = $_SESSION['contraseñaNueva'];
        unset($_SESSION['contraseñaNueva']);
        unset($_SESSION['contraseñaNueva2']);
        $newPassword = base64_encode($newPassword);

        $sql = "UPDATE usuarios SET contraseña='" . $newPassword . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
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
$userData = array();
$sql = "SELECT * FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'   ";
$memory2 = $connection->query($sql);

if ($memory2 && $memory2->num_rows > 0) {
  $info = $memory2->fetch_array();
  $userData['nombreUsuario'] = $info['nombreUsuario'];
  $userData['correo'] = $info['correo'];
  $userData['apellidos'] = $info['apellidos'];
  $userData['contraseña'] = $info['contraseña'];
  $userData['fechaNacimiento'] = $info['fechaNacimiento'];
  $userData['domicilio'] = $info['domicilio'];
  $userData['nif'] = $info['nif'];
  $userData['nombre'] = $info['nombre'];
  $userData['codigoPostal'] = $info['codigoPostal'];
  $userData['poblacion'] = $info['población'];
  $userData['provincia'] = $info['provincia'];
  $userData['numeroMovil'] = $info['numeroMovil'];
  $userData['codigoPostal'] = $info['codigoPostal'];
}

$_SESSION['datosUsu'] = $userData;

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
  $cardData['numero1'] = substr($info['numero'], -16, 4);
  $cardData['numero2'] = substr($info['numero'], -12, 4);
  $cardData['numero3'] = substr($info['numero'], -8, 4);
  $cardData['numero4'] = substr($info['numero'], -4, 4);
  $cardData['titular'] = $info['titular'];
  $cardData['tipo'] = $info['tipo'];
  $cardData['ccv'] = $info['ccv'];
  $cardData['fechaM'] = $info['fechaM'];
  $cardData['fechaA'] = $info['fechaA'];
  $_SESSION['datosTar'] = $cardData;
  $_SESSION['tarjeta'] = 1;
}

header("Location:../Vistas/PerfilVista.php");
exit;

?>