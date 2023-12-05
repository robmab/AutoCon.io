<?php
session_start();

$_SESSION['checkon'] = 1;

//Collect variables and save them in session
if (isset($_REQUEST["nombre"])) {
  $name = $_REQUEST["nombre"];
  $name = ucwords($name);
  $_SESSION['nombre'] = $name;
}

if (isset($_REQUEST["apellidos"])) {
  $lastname = $_REQUEST["apellidos"];
  $lastname = ucwords($lastname);
  $_SESSION['apellidos'] = $lastname;
}

if (isset($_REQUEST["nombreUs"])) {
  $username = $_REQUEST["nombreUs"];
  $username = ucwords($username);
  $_SESSION['nombreUs'] = $username;
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
    $current_password = $_REQUEST["contraseñaActual"];
    $_SESSION['contraseñaActual'] = $current_password;
  }
  if (isset($_REQUEST["contraseñaNueva"])) {
    $new_password = $_REQUEST["contraseñaNueva"];
    $_SESSION['contraseñaNueva'] = $new_password;
  }
  if (isset($_REQUEST["contraseñaNueva2"])) {
    $new_password2 = $_REQUEST["contraseñaNueva2"];
    $_SESSION['contraseñaNueva2'] = $new_password2;
  }
} else {
  if (isset($_REQUEST["contraseña"])) {
    $password = $_REQUEST["contraseña"];
    $password = base64_encode($password);
    $_SESSION['contraseña'] = $password;
  }
}

if (isset($_REQUEST["fechaNac"])) {
  $born_date = $_REQUEST["fechaNac"];
  $_SESSION['fechaNac'] = $born_date;
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
  $zip_code = $_REQUEST["codigoP"];
  $zip_code = ucwords($zip_code);
  $_SESSION['codigoP'] = $zip_code;
}

if (isset($_REQUEST["movil"])) {
  $mobile = $_REQUEST["movil"];
  $mobile = ucwords($mobile);
  $_SESSION['movil'] = $mobile;
}

//Validate zip code function
function validaPostal($cadena)
{
  //We check that the correct format has actually been added
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

//Age validation function
function time_date($date1)
{
  $date2 = date("Y-m-d");
  $date1 = new DateTime($date1);
  $date2 = new DateTime($date2);
  $interval = $date1->diff($date2);
  $my_age = $interval->y;

  if ($my_age < 18) {
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

//Phone validation function
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

//Age function
validaPostal($zip_code);
time_date($born_date);
validate_phone_number($mobile);

?>