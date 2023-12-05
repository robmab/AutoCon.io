<?php
session_start();
include '../ConexiónBD.php';

//Collect variables - Registration - Login
if (isset($_REQUEST["email"])) {
  $email = ucwords($_REQUEST["email"]);
  if (isset($_REQUEST["pass"]))
    $password = $_REQUEST["pass"];

  //User verification in the database.
  $sql = "SELECT count(*) FROM usuarios";
  $memory = $connection->query($sql);

  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $num = $info[0];
    $num = (int) $num;
  }

  $cont = 0;
  $user_list = array();
  $email_list = array();

  for ($cont2 = 0; $cont < $num; $cont2++) {
    $sql = "SELECT nombreUsuario,correo  FROM usuarios WHERE ID='" . $cont2 . "'";
    $memory2 = $connection->query($sql);

    if ($memory2 && $memory2->num_rows > 0) {
      $info = $memory2->fetch_array();
      $user_list[$cont] = $info['nombreUsuario'];
      $email_list[$cont] = $info['correo'];
      $cont++;
    }
  }

  // SQL INJECTION BY FILTER 
  $counter = 1;
  foreach ($user_list as $usu) {
    if ($usu == $email) {
      $sql = "SELECT * FROM usuarios WHERE nombreUsuario='" . $email . "'";
      $memory2 = $connection->query($sql);
      if ($memory2 && $memory2->num_rows > 0) {
        $info = $memory2->fetch_array();
        $_SESSION['user'] = $info['nombreUsuario'];
        $email = $info['nombreUsuario'];
      }
      $counter = 0;
    }
  }

  foreach ($email_list as $em) {
    if ($em == $email) {
      $sql = "SELECT * FROM usuarios WHERE correo='" . $email . "'";
      $memory2 = $connection->query($sql);
      if ($memory2 && $memory2->num_rows > 0) {
        $info = $memory2->fetch_array();
        $_SESSION['user'] = $info['nombreUsuario'];
        $email = $info['nombreUsuario'];
      }
      $counter = 0;
    }
  }

  if ($counter == 1) {
    echo $email;
    $_SESSION['mensajeBD'] = 'El usuario ' . $email . ' no esta registrado.';
    unset($_SESSION['user']);
    $counter2 = 0;
    header("Location:../Vistas/LoginVista.php");
    exit;
  }

  //Password verification
  $sql = "SELECT contraseña FROM usuarios WHERE nombreUsuario='" . $email . "' OR correo='" . $email . "'  ";
  $memory = $connection->query($sql);
  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $decode_password = base64_decode($info['contraseña']);

    if ($decode_password != $password) {
      $_SESSION['mensajeBD'] = 'La contraseña no coincide';
      unset($_SESSION['user']);
      $counter2 = 0;
      header("Location:../Vistas/LoginVista.php");
      exit;
    }
  }

  //Role in session
  $sql = "SELECT rol FROM usuarios WHERE nombreUsuario='" . $email . "' OR correo='" . $email . "'  ";
  $memory = $connection->query($sql);
  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $_SESSION['rol'] = $info['rol'];
  }

  echo $_REQUEST['compraV'];
  if (isset($_REQUEST['compraV'])) {
    header("Location:VehiculosControlador.php");
    exit;
  } else {
    header("Location:../Vistas/index.php");
    exit;
  }
}

?>