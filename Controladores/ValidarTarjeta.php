<?php
session_start();

//Collect variables and save them in session
if (isset($_REQUEST["tarjeta"])) {
  $card = $_REQUEST["tarjeta"];
  $card = ucwords($card);
  $_SESSION['tarjetaF'] = $card;
  $type = $card;
}

if (isset($_REQUEST["numero"])) {
  $number = $_REQUEST["numero"];
  $number = ucwords($number);
  $_SESSION['numeroF'] = $number;
  $cc_num = $number;
}

if (isset($_REQUEST["titular"])) {
  $owner = $_REQUEST["titular"];
  $owner = ucwords($owner);
  $_SESSION['titularF'] = $owner;
}

if (isset($_REQUEST["mes"])) {
  $month = $_REQUEST["mes"];
  $month = ucwords($month);
  $_SESSION['mesF'] = $month;
}

if (isset($_REQUEST["año"])) {
  $year = $_REQUEST["año"];
  $year = ucwords($year);
  $_SESSION['añoF'] = $year;
}

if (isset($_REQUEST["ccv"])) {
  $ccv = $_REQUEST["ccv"];
  $ccv = ucwords($ccv);
  $_SESSION['ccvF'] = $ccv;
}

//Card validation function
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

if ($card == "Mastercard")
  validateCCMaster($number, $card);
elseif ($card == "Visa")
  validateCCVisa($number, $card);

?>