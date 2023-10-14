<?php
session_start();

//Recoger variables y guardarlas en sesion.
if (isset($_REQUEST["tarjeta"])) {
  $tarjeta = $_REQUEST["tarjeta"];
  $tarjeta = ucwords($tarjeta);
  $_SESSION['tarjetaF'] = $tarjeta;
  $type = $tarjeta;
}

if (isset($_REQUEST["numero"])) {
  $numero = $_REQUEST["numero"];
  $numero = ucwords($numero);
  $_SESSION['numeroF'] = $numero;
  $cc_num = $numero;
}

if (isset($_REQUEST["titular"])) {
  $titular = $_REQUEST["titular"];
  $titular = ucwords($titular);
  $_SESSION['titularF'] = $titular;
}

if (isset($_REQUEST["mes"])) {
  $mes = $_REQUEST["mes"];
  $mes = ucwords($mes);
  $_SESSION['mesF'] = $mes;
}

if (isset($_REQUEST["año"])) {
  $año = $_REQUEST["año"];
  $año = ucwords($año);
  $_SESSION['añoF'] = $año;
}

if (isset($_REQUEST["ccv"])) {
  $ccv = $_REQUEST["ccv"];
  $ccv = ucwords($ccv);
  $_SESSION['ccvF'] = $ccv;
}

//Funcion de validar tarjeta
function validateCCMaster($cc_num, $type)
{
  if ($type == "Mastercard")
    $denum = "Master Card";

  if ($type == "Mastercard") {
    $pattern = "/^([51|52|53|54|55]{2})([0-9]{14})$/"; //Mastercard
    if (preg_match($pattern, $cc_num))
      $verified = true;
    else
      $verified = false;
  }

  if ($verified == false) {
    //Do something here in case the validation fails
    $_SESSION['mensajeBD'] = "Esta tarjeta Mastercard es inválida";
    header("Location:../Vistas/FacturacionVista.php");
    exit;
  } else { //if it will pass...do something
    header("Location:FacturacionControlador.php");
    exit;
  }
}
function validateCCVisa($cc_num, $type)
{
  if ($type == "Visa") {
    $denum = "Visa";
  }

  if ($type == "Visa") {
    $pattern = "/^([4]{1})([0-9]{12,15})$/"; //Visa
    if (preg_match($pattern, $cc_num))
      $verified = true;
    else
      $verified = false;
  }

  if ($verified == false) {
    //Do something here in case the validation fails
    $_SESSION['mensajeBD'] = "Esta tarjeta Visa es inválida";
    header("Location:../Vistas/FacturacionVista.php");
    exit;
  } else { //if it will pass...do something
    header("Location:FacturacionControlador.php");
    exit;
  }
}

if ($tarjeta == "Mastercard")
  validateCCMaster($numero, $tarjeta);
elseif ($tarjeta == "Visa")
  validateCCVisa($numero, $tarjeta);

?>