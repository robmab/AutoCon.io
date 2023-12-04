<?php
session_start();

$_SESSION['checkon'] = 1;
//Recoger variables y guardarlas en sesion.
if (isset($_REQUEST["nombre"])) {
  $name = $_REQUEST["nombre"];
  $name = ucwords($name);
  $_SESSION['nombre'] = $name;
}

if (isset($_REQUEST["apellidos"])) {
  $lastName = $_REQUEST["apellidos"];
  $lastName = ucwords($lastName);
  $_SESSION['apellidos'] = $lastName;
}

if (isset($_REQUEST["nombreUs"])) {
  $userName = $_REQUEST["nombreUs"];
  $userName = ucwords($userName);
  $_SESSION['nombreUs'] = $userName;
}

if (isset($_REQUEST["email"])) {
  $email = $_REQUEST["email"];
  $email = ucwords($email);
  $_SESSION['email'] = $email;
}

if (isset($_REQUEST["direccion"])) {
  $address = $_REQUEST["direccion"];
  $address = ucwords($address);
  $_SESSION['direccion'] = $address;
}

if (isset($_REQUEST['edicion'])) {
  if (isset($_REQUEST["contraseñaActual"])) {
    $currentPassword = $_REQUEST["contraseñaActual"];
    $_SESSION['contraseñaActual'] = $currentPassword;
  }
  if (isset($_REQUEST["contraseñaNueva"])) {
    $newPassword = $_REQUEST["contraseñaNueva"];
    $_SESSION['contraseñaNueva'] = $newPassword;
  }
  if (isset($_REQUEST["contraseñaNueva2"])) {
    $newPassword2 = $_REQUEST["contraseñaNueva2"];
    $_SESSION['contraseñaNueva2'] = $newPassword2;
  }
} else {
  if (isset($_REQUEST["contraseña"])) {
    $password = $_REQUEST["contraseña"];
    $password = base64_encode($password);
    $_SESSION['contraseña'] = $password;
  }
}

if (isset($_REQUEST["fechaNac"])) {
  $bornDate = $_REQUEST["fechaNac"];
  $_SESSION['fechaNac'] = $bornDate;
}

if (isset($_REQUEST["nif"])) {
  $nif = $_REQUEST["nif"];
  $nif = strtoupper($nif);
  $_SESSION['nif'] = $nif;
}

if (isset($_REQUEST["provincia"])) {
  $province = $_REQUEST["provincia"];
  $province = ucwords($province);
  $_SESSION['provincia'] = $province;
}

if (isset($_REQUEST["poblacion"])) {
  $populate = $_REQUEST["poblacion"];
  $populate = ucwords($populate);
  $_SESSION['poblacion'] = $populate;
}

if (isset($_REQUEST["codigoP"])) {
  $zipCode = $_REQUEST["codigoP"];
  $zipCode = ucwords($zipCode);
  $_SESSION['codigoP'] = $zipCode;
}

if (isset($_REQUEST["movil"])) {
  $mobile = $_REQUEST["movil"];
  $mobile = ucwords($mobile);
  $_SESSION['movil'] = $mobile;
}

//Funcion validar codigo postal
function validaPostal($cadena)
{
  //Comrpobamos que realmente se ha añadido el formato correcto
  if (!preg_match('/^[0-9]{5}$/i', $cadena)) {
    $_SESSION['mensajeBD'] = "Código postal inválido";
    if (isset($_REQUEST['edicion'])) {
      header("Location:../Vistas/PerfilVista.php?editar=1#1");
      exit;
    } else {
      header("Location:../Vistas/RegistroVista.php#1");
      exit;
    }
  }
}

//Funcion para validad edad
function time_date($date1)
{
  $date2 = date("Y-m-d");
  $date1 = new DateTime($date1);
  $date2 = new DateTime($date2);
  $interval = $date1->diff($date2);
  $myage = $interval->y;

  if ($myage < 18) {
    $_SESSION['mensajeBD'] = "Debes tener al menos 18 años.";
    if (isset($_REQUEST['edicion'])) {
      header("Location:../Vistas/PerfilVista.php?editar=1#1");
      exit;
    } else {
      header("Location:../Vistas/RegistroVista.php#1");
      exit;
    }
  }
}

//Funcion de validar telefono

function validate_phone_number($phone)
{
  $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
  $phone_to_check = str_replace("-", "", $filtered_phone_number);

  if (strlen($phone_to_check) < 9 || strlen($phone_to_check) > 9) {
    $_SESSION['mensajeBD'] = "El número de móvil o telefono es inválido";
    if (isset($_REQUEST['edicion'])) {
      header("Location:../Vistas/PerfilVista.php?editar=1#1");
      exit;
    } else {
      header("Location:../Vistas/RegistroVista.php#1");
      exit;
    }
  } else {
    if (isset($_REQUEST['edicion'])) {
      header("Location:PerfilControlador.php?edicion=1");
      exit;
    } else {
      header("Location:RegistroControlador.php");
    }
    exit;
  }
}

//funcion de edad
validaPostal($zipCode);
time_date($bornDate);
validate_phone_number($mobile);

?>