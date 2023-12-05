<?php
session_start();
include '../ConexiónBD.php';

//Collect variables | Register - Login
if (isset($_SESSION["nombre"])) {
  $name = $_SESSION["nombre"];
  $name = ucwords($name);
  unset($_SESSION['nombre']);

  if (isset($_SESSION["apellidos"])) {
    $lastname = $_SESSION["apellidos"];
    $lastname = ucwords($lastname);
    unset($_SESSION['apellidos']);
  }

  if (isset($_SESSION["nombreUs"])) {
    $username = $_SESSION["nombreUs"];
    $username = ucwords($username);
    unset($_SESSION['nombreUs']);
  }

  if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    $email = ucwords($email);
    unset($_SESSION['email']);
  }

  if (isset($_SESSION["direccion"])) {
    $address = $_SESSION["direccion"];
    $address = ucwords($address);
    unset($_SESSION['direccion']);
  }

  if (isset($_SESSION["contraseña"])) {
    $password = $_SESSION["contraseña"];
    unset($_SESSION['contraseña']);
  }

  if (isset($_SESSION["fechaNac"])) {
    $born_date = $_SESSION["fechaNac"];
    unset($_SESSION['fechaNac']);
  }

  if (isset($_SESSION["nif"])) {
    $nif = $_SESSION["nif"];
    $nif = strtoupper($nif);
    unset($_SESSION['nif']);
  }

  if (isset($_SESSION["provincia"])) {
    $province = $_SESSION["provincia"];
    $province = ucwords($province);
    unset($_SESSION['provincia']);
  }

  if (isset($_SESSION["poblacion"])) {
    $population = $_SESSION["poblacion"];
    $population = ucwords($population);
    unset($_SESSION['poblacion']);
  }

  if (isset($_SESSION["codigoP"])) {
    $zip_code = $_SESSION["codigoP"];
    $zip_code = ucwords($zip_code);
    unset($_SESSION['codigoP']);
  }

  if (isset($_SESSION["movil"])) {
    $mobile = $_SESSION["movil"];
    $mobile = ucwords($mobile);
    unset($_SESSION['movil']);
  }

  //Insert in Database
  $sql = "INSERT INTO usuarios(nombre,nif,domicilio,fechaNacimiento,contraseña,rol,apellidos,nombreUsuario,correo,provincia,población,codigoPostal,numeroMovil)   VALUES('" . $name . "','" . $nif . "','" . $address . "','" . $born_date . "','" . $password . "','Usuario','" . $lastname . "','" . $username . "','" . $email . "','" . $province . "','" . $population . "','" . $zip_code . "','" . $mobile . "')";
  $check = $connection->query($sql);

  if ($connection->affected_rows > 0) {
    $_SESSION['mensajeBD'] = "Usuario " . $username . " creado.";
    $_SESSION['user'] = $username;
    $_SESSION['rol'] = 'Usuario';
    header("Location:../Vistas/Index.php");
    exit;
  } else {
    $_SESSION['mensajeBD'] = "Este usuario ya existe";
    header("Location:../Vistas/RegistroVista.php");
    exit;
  }
}

?>