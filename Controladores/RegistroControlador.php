<?php
session_start();
include '../ConexiónBD.php';

//Collect variables | Register - Login
if (isset($_SESSION["name"])) {
  $name = $_SESSION["name"];
  $name = ucwords($name);
  unset($_SESSION['name']);

  if (isset($_SESSION["lastname"])) {
    $lastname = $_SESSION["lastname"];
    $lastname = ucwords($lastname);
    unset($_SESSION['lastname']);
  }

  if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $username = ucwords($username);
    unset($_SESSION['nombreUs']);
  }

  if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    $email = ucwords($email);
    unset($_SESSION['email']);
  }

  if (isset($_SESSION["address"])) {
    $address = $_SESSION["address"];
    $address = ucwords($address);
    unset($_SESSION['address']);
  }

  if (isset($_SESSION["password"])) {
    $password = $_SESSION["password"];
    unset($_SESSION['password']);
  }

  if (isset($_SESSION["bornDate"])) {
    $born_date = $_SESSION["bornDate"];
    unset($_SESSION['bornDate']);
  }

  if (isset($_SESSION["nif"])) {
    $nif = $_SESSION["nif"];
    $nif = strtoupper($nif);
    unset($_SESSION['nif']);
  }

  if (isset($_SESSION["province"])) {
    $province = $_SESSION["province"];
    $province = ucwords($province);
    unset($_SESSION['province']);
  }

  if (isset($_SESSION["population"])) {
    $population = $_SESSION["population"];
    $population = ucwords($population);
    unset($_SESSION['population']);
  }

  if (isset($_SESSION["zipCode"])) {
    $zip_code = $_SESSION["zipCode"];
    $zip_code = ucwords($zip_code);
    unset($_SESSION['zipCode']);
  }

  if (isset($_SESSION["mobile"])) {
    $mobile = $_SESSION["mobile"];
    $mobile = ucwords($mobile);
    unset($_SESSION['mobile']);
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