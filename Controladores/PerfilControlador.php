<?php
session_start();
include '../ConexiónBD.php';

//Evitar pasar por la vista antes que el controlador
$_SESSION['checkon'] = 1;

//EDICIÓN DE DATOS - P3
$cont = 1;
if (isset($_REQUEST['edicion'])) {
  if (isset($_SESSION['email']) && ($_SESSION['email'] != '')) {
    $correo = $_SESSION["email"];
    unset($_SESSION['email']);
    $correo = ucwords($correo);
    $sql = "SELECT correo FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "'  ";
    $memi = $conexion->query($sql);
    if ($memi->num_rows > 0) {
      $info = $memi->fetch_array();
      $correo2 = $info['correo'];
    }
    $sql = "UPDATE usuarios SET correo='" . $correo . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $comprobar = $conexion->query($sql);

    if (($conexion->affected_rows <= 0) && ($correo2 != $correo)) {
      $_SESSION['mensajeBD'] = 'El correo ' . $correo . ' ya existe.';
      header('Location:../Vistas/PerfilVista.php?editar=1');
      exit;
    }
  }

  if (isset($_SESSION['nombreUs']) && ($_SESSION['nombreUs'] != '')) {
    $nombreUs = $_SESSION["nombreUs"];
    $nombreUs = ucwords($nombreUs);
    unset($_SESSION['nombreUs']);

    $sql = "UPDATE usuarios SET nombreUsuario='" . $nombreUs . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $comprobar = $conexion->query($sql);
    if ($_SESSION['user'] == $nombreUs) {
    } elseif ($conexion->affected_rows > 0) {
      $_SESSION['user'] = $nombreUs;
      $cont = 0;
    } else {
      $_SESSION['mensajeBD'] = 'El usuario ' . $nombreUs . ' ya existe, prueba con otro.';
      header('Location:../Vistas/PerfilVista.php?editar=1');
      exit;
    }
  }

  if (isset($_SESSION['nombre']) && ($_SESSION['nombre'] != '')) {
    $nombre = $_SESSION["nombre"];
    $nombre = ucwords($nombre);
    unset($_SESSION['nombre']);

    $sql = "UPDATE usuarios SET nombre='" . $nombre . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $comprobar = $conexion->query($sql);
    if ($conexion->affected_rows > 0)
      $cont = 0;
  }

  if (isset($_SESSION['apellidos']) && ($_SESSION['apellidos'] != '')) {
    $apellidos = $_SESSION["apellidos"];
    $apellidos = ucwords($apellidos);
    unset($_SESSION['apellidos']);

    $sql = "UPDATE usuarios SET apellidos='" . $apellidos . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $comprobar = $conexion->query($sql);
    if ($conexion->affected_rows > 0)
      $cont = 0;
  }

  if (isset($_SESSION['direccion']) && ($_SESSION['direccion'] != '')) {
    $direccion = $_SESSION["direccion"];
    $direccion = ucwords($direccion);
    unset($_SESSION['direccion']);

    $sql = "UPDATE usuarios SET domicilio='" . $direccion . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $comprobar = $conexion->query($sql);

    if ($conexion->affected_rows > 0)
      $cont = 0;
  }

  if (isset($_SESSION['nif']) && ($_SESSION['nif'] != '')) {
    $nif = $_SESSION["nif"];
    unset($_SESSION['nif']);
    $nif = ucwords($nif);

    $sql = "SELECT nif FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "'  ";
    $memi = $conexion->query($sql);
    if ($memi->num_rows > 0) {
      $info = $memi->fetch_array();
      $dni2 = $info['nif'];
    }

    $sql = "UPDATE usuarios SET nif='" . $nif . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $comprobar = $conexion->query($sql);

    if ($conexion->affected_rows > 0) {
      $cont = 0;
    } elseif ($nif == $dni2) {
    } else {
      $_SESSION['mensajeBD'] = 'El DNI ' . $nif . ' ya esta registrado.';
      header('Location:../Vistas/PerfilVista.php?editar=1');
      exit;
    }
  }

  if (isset($_SESSION['fechaNac']) && ($_SESSION['fechaNac'] != '')) {
    $fechaNac = $_SESSION["fechaNac"];
    unset($_SESSION['fechaNac']);

    $sql = "UPDATE usuarios SET fechaNacimiento='" . $fechaNac . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $comprobar = $conexion->query($sql);

    if ($conexion->affected_rows > 0)
      $cont = 0;
  }

  if (isset($_SESSION['provincia']) && ($_SESSION['provincia'] != '')) {
    $provincia = $_SESSION["provincia"];
    unset($_SESSION['provincia']);

    $sql = "UPDATE usuarios SET provincia='" . $provincia . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $comprobar = $conexion->query($sql);

    if ($conexion->affected_rows > 0)
      $cont = 0;
  }

  if (isset($_SESSION['poblacion']) && ($_SESSION['poblacion'] != '')) {
    $poblacion = $_SESSION["poblacion"];
    unset($_SESSION['poblacion']);

    $sql = "UPDATE usuarios SET población='" . $poblacion . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $comprobar = $conexion->query($sql);

    if ($conexion->affected_rows > 0)
      $cont = 0;
  }

  if (isset($_SESSION['codigoP']) && ($_SESSION['codigoP'] != '')) {
    $codigoP = $_SESSION["codigoP"];
    unset($_SESSION['codigoP']);

    $sql = "UPDATE usuarios SET codigoPostal='" . $codigoP . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $comprobar = $conexion->query($sql);

    if ($conexion->affected_rows > 0)
      $cont = 0;
  }

  if (isset($_SESSION['movil']) && ($_SESSION['movil'] != '')) {
    $movil = $_SESSION["movil"];
    unset($_SESSION['movil']);

    $sql = "UPDATE usuarios SET numeroMovil='" . $movil . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
    $comprobar = $conexion->query($sql);

    if ($conexion->affected_rows > 0)
      $cont = 0;
  }
  if (isset($_SESSION['contraseñaActual']) && ($_SESSION['contraseñaActual'] != '')) {

    //Comprobrobar contraseña actual
    $contraseña = base64_decode($_SESSION['datosUsu']['contraseña']);
    $contraseñaActual = $_SESSION['contraseñaActual'];
    unset($_SESSION['contraseñaActual']);

    if ($contraseña != $contraseñaActual) {
      $_SESSION['errC'] = 'No coincide la contraseña actual';
      header('Location:../Vistas/PerfilVista.php?editar=1');
      exit;
    }

    if (isset($_SESSION['contraseñaNueva']) && ($_SESSION['contraseñaNueva'] != '')) {
      if (isset($_SESSION['contraseñaNueva2']) && ($_SESSION['contraseñaNueva2'] != '')) {
        $contraseñaNueva = $_SESSION['contraseñaNueva'];
        unset($_SESSION['contraseñaNueva']);
        unset($_SESSION['contraseñaNueva2']);
        $contraseñaNueva = base64_encode($contraseñaNueva);

        $sql = "UPDATE usuarios SET contraseña='" . $contraseñaNueva . "' WHERE nombreusuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'";
        $comprobar = $conexion->query($sql);

        if ($conexion->affected_rows > 0)
          $cont = 0;
      }
    }
  }

  //Comprobación de si se han editado los datos.
  if ($cont == 0) {
    $_SESSION['mensajeConf'] = 'Se han editado los datos correctamente.';
    header('Location:PerfilControlador.php');
    exit;
  } else {
    header('Location:../Vistas/PerfilVista.php');
    exit;
  }
}

//Paso a sección de editar perfil
if (isset($_REQUEST['editar'])) {
  header("Location:../Vistas/PerfilVista.php?editar=1");
  exit;
}

//Recoger datos usuario
$datosUsu = array();
$sql = "SELECT * FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' OR correo='" . $_SESSION['user'] . "'   ";
$mem = $conexion->query($sql);

if ($mem && $mem->num_rows > 0) {
  $info = $mem->fetch_array();
  $datosUsu['nombreUsuario'] = $info['nombreUsuario'];
  $datosUsu['correo'] = $info['correo'];
  $datosUsu['apellidos'] = $info['apellidos'];
  $datosUsu['contraseña'] = $info['contraseña'];
  $datosUsu['fechaNacimiento'] = $info['fechaNacimiento'];
  $datosUsu['domicilio'] = $info['domicilio'];
  $datosUsu['nif'] = $info['nif'];
  $datosUsu['nombre'] = $info['nombre'];
  $datosUsu['codigoPostal'] = $info['codigoPostal'];
  $datosUsu['poblacion'] = $info['población'];
  $datosUsu['provincia'] = $info['provincia'];
  $datosUsu['numeroMovil'] = $info['numeroMovil'];
  $datosUsu['codigoPostal'] = $info['codigoPostal'];
}

$_SESSION['datosUsu'] = $datosUsu;

//Comprobación datos facturación
$sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
$memi = $conexion->query($sql);

if ($memi->num_rows > 0) {
  $info = $memi->fetch_array();
  $usuario = $info['id'];
}

$sql = "SELECT * FROM usuarios_facturacion WHERE usuario='" . $usuario . "'";
$memi = $conexion->query($sql);

if ($memi->num_rows > 0) {
  $info = $memi->fetch_array();
  $datosTar['numero1'] = substr($info['numero'], -16, 4);
  $datosTar['numero2'] = substr($info['numero'], -12, 4);
  $datosTar['numero3'] = substr($info['numero'], -8, 4);
  $datosTar['numero4'] = substr($info['numero'], -4, 4);
  $datosTar['titular'] = $info['titular'];
  $datosTar['tipo'] = $info['tipo'];
  $datosTar['ccv'] = $info['ccv'];
  $datosTar['fechaM'] = $info['fechaM'];
  $datosTar['fechaA'] = $info['fechaA'];
  $_SESSION['datosTar'] = $datosTar;
  $_SESSION['tarjeta'] = 1;
}

header("Location:../Vistas/PerfilVista.php");
exit;

?>