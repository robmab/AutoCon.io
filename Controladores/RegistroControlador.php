<?php
session_start();
include '../ConexiónBD.php';

//Recoger variables // Registro - Login
if (isset($_SESSION["nombre"])) {
  $name = $_SESSION["nombre"];
  $name = ucwords($name);
  unset($_SESSION['nombre']);

  if (isset($_SESSION["apellidos"])) {
    $lastName = $_SESSION["apellidos"];
    $lastName = ucwords($lastName);
    unset($_SESSION['apellidos']);
  }

  if (isset($_SESSION["nombreUs"])) {
    $userName = $_SESSION["nombreUs"];
    $userName = ucwords($userName);
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
    $bornDate = $_SESSION["fechaNac"];
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
    $zipCode = $_SESSION["codigoP"];
    $zipCode = ucwords($zipCode);
    unset($_SESSION['codigoP']);
  }

  if (isset($_SESSION["movil"])) {
    $mobile = $_SESSION["movil"];
    $mobile = ucwords($mobile);
    unset($_SESSION['movil']);
  }

  //Insertar en la Base de Datos
  $sql = "INSERT INTO usuarios(nombre,nif,domicilio,fechaNacimiento,contraseña,rol,apellidos,nombreUsuario,correo,provincia,población,codigoPostal,numeroMovil)   VALUES('" . $name . "','" . $nif . "','" . $address . "','" . $bornDate . "','" . $password . "','Usuario','" . $lastName . "','" . $userName . "','" . $email . "','" . $province . "','" . $population . "','" . $zipCode . "','" . $mobile . "')";
  $check = $connection->query($sql);

  if ($connection->affected_rows > 0) {
    $_SESSION['mensajeBD'] = "Usuario " . $userName . " creado.";
    $_SESSION['user'] = $userName;
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