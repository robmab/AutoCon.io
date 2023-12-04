<?php
session_start();
include '../ConexiónBD.php';

//Recoger variables // Registro - Login
if (isset($_REQUEST["email"])) {
  $email = ucwords($_REQUEST["email"]);
  if (isset($_REQUEST["pass"]))
    $password = $_REQUEST["pass"];

  //Comprobación de Usuario en la base de datos.
  $sql = "SELECT count(*) FROM usuarios";
  $memory = $connection->query($sql);

  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $num = $info[0];
    $num = (int) $num;
  }

  $cont = 0;
  $userList = array();
  $emailList = array();

  for ($cont2 = 0; $cont < $num; $cont2++) {
    $sql = "SELECT nombreUsuario,correo  FROM usuarios WHERE ID='" . $cont2 . "'";
    $memory2 = $connection->query($sql);

    if ($memory2 && $memory2->num_rows > 0) {
      $info = $memory2->fetch_array();
      $userList[$cont] = $info['nombreUsuario'];
      $emailList[$cont] = $info['correo'];
      $cont++;
    }
  }

  /* SQL INYECTION POR FILTRO */
  $counter = 1;

  foreach ($userList as $usu) {
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

  foreach ($emailList as $em) {
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

  //Comprobación Contraseña
  $sql = "SELECT contraseña FROM usuarios WHERE nombreUsuario='" . $email . "' OR correo='" . $email . "'  ";
  $memory = $connection->query($sql);
  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $decodePassword = base64_decode($info['contraseña']);

    if ($decodePassword != $password) {
      $_SESSION['mensajeBD'] = 'La contraseña no coincide';
      unset($_SESSION['user']);
      $counter2 = 0;
      header("Location:../Vistas/LoginVista.php");
      exit;
    }
  }

  //Rol en sesión
  $sql = "SELECT rol FROM usuarios WHERE nombreUsuario='" . $email . "' OR correo='" . $email . "'  ";
  $memory = $connection->query($sql);
  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $_SESSION['rol'] = $info['rol'];
  }

  // unset ( $_SESSION['user']);
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