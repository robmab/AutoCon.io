<?php
session_start();
include '../ConexiónBD.php';

$_SESSION['chekon'] = 1;
//Cancelar vehiculo
if (isset($_REQUEST['vehiculo'])) {
  $sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
  $memi = $conexion->query($sql);
  if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $usuario = $info['id'];
  }

  $sql = "SELECT id FROM vehiculos WHERE modelo='" . $_REQUEST['vehiculo'] . "'";
  $memi = $conexion->query($sql);
  if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $veh = $info['id'];
  }

  $sql = "DELETE FROM vehiculos_usuarios WHERE n='" . $_REQUEST['n'] . "' ";
  $comprobar = $conexion->query($sql);
  $sql = "SELECT * FROM vehiculos WHERE modelo='" . $_REQUEST['vehiculo'] . "'";
  $memi = $conexion->query($sql);
  if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $alquilados = $info['alquilados'];
    $modelo = $info['modelo'];
    $disponibles = $info['disponibles'];
  }

  $disponibles = $disponibles + 1;
  $sql = "UPDATE vehiculos SET disponibles='" . $disponibles . "' WHERE modelo='" . $modelo . "'";
  $comprobar = $conexion->query($sql);

  if (isset($_REQUEST['R'])) {
    $_SESSION['mensajeBD1'] = 'Reserva cancelada con exito.';
  } elseif (isset($_REQUEST['A'])) {
    $alquilados = $alquilados - 1;
    $sql = "UPDATE vehiculos SET alquilados='" . $alquilados . "' WHERE modelo='" . $modelo . "'";
    $comprobar = $conexion->query($sql);
    $_SESSION['mensajeBD1'] = 'Alquiler cancelado con exito. Devuelve el vehículo en un plazo de 1 semana.';
  }
}

//Cancelar componente
if (isset($_REQUEST['nombre'])) {
  $sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
  $memi = $conexion->query($sql);

  if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $usuario = $info['id'];
  }
  $nombre = $_REQUEST['nombre'];
  $tipo = $_REQUEST['tipo'];
  $sql = "SELECT id FROM componentes WHERE nombre='" . $nombre . "' AND tipo='" . $tipo . "'";
  $memi = $conexion->query($sql);

  if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $componente = $info['id'];
  }

  if (isset($_REQUEST['unico'])) {
    $sql = "DELETE FROM componente_usuario WHERE n='" . $_REQUEST['n'] . "' ";
    $comprobar = $conexion->query($sql);
    $sql = "SELECT * FROM componentes WHERE nombre='" . $nombre . "' AND tipo='" . $tipo . "'";
    $memi = $conexion->query($sql);

    if ($memi->num_rows > 0) {
      $info = $memi->fetch_array();
      $cantidad = $info['cantidad'];
    }
    $cantidad = $cantidad + 1;
    $sql = "UPDATE componentes SET cantidad='" . $cantidad . "' WHERE nombre='" . $nombre . "' AND tipo='" . $tipo . "'";
    $comprobar = $conexion->query($sql);
    $_SESSION['mensajeBD2'] = $nombre . ' de tipo ' . $tipo . ' cancelado.';
  } elseif (isset($_REQUEST['uno'])) {
    $sql = "SELECT * FROM componente_usuario WHERE n='" . $_REQUEST['n'] . "' ";
    $memi = $conexion->query($sql);
    if ($memi->num_rows > 0) {
      $info = $memi->fetch_array();
      $cantidad = $info['cantidad'];
      $precio = $info['precio'];
    }

    $cantidad2 = $cantidad - 1;
    $precio = $precio / $cantidad;
    $precio = $precio * $cantidad2;

    $sql = "UPDATE componente_usuario SET cantidad='" . $cantidad2 . "' WHERE n='" . $_REQUEST['n'] . "' ";
    $comprobar = $conexion->query($sql);

    $sql = "UPDATE componente_usuario SET precio='" . $precio . "' WHERE n='" . $_REQUEST['n'] . "' ";
    $comprobar = $conexion->query($sql);

    $sql = "SELECT * FROM componentes WHERE nombre='" . $nombre . "' AND tipo='" . $tipo . "'";
    $memi = $conexion->query($sql);

    if ($memi->num_rows > 0) {
      $info = $memi->fetch_array();
      $cantidad = $info['cantidad'];
    }

    $cantidad = $cantidad + 1;
    $sql = "UPDATE componentes SET cantidad='" . $cantidad . "' WHERE nombre='" . $nombre . "' AND tipo='" . $tipo . "'";
    $comprobar = $conexion->query($sql);
    $_SESSION['mensajeBD2'] = '1 ' . $nombre . " de tipo " . $tipo . " cancelado.";

  } elseif (isset($_REQUEST['todos'])) {
    $sql = "DELETE FROM componente_usuario WHERE n='" . $_REQUEST['n'] . "' ";
    $comprobar = $conexion->query($sql);

    $sql = "SELECT * FROM componentes WHERE nombre='" . $nombre . "' AND tipo='" . $tipo . "'";
    $memi = $conexion->query($sql);

    if ($memi->num_rows > 0) {
      $info = $memi->fetch_array();
      $cantidad = $info['cantidad'];
    }
    $cantidad = $cantidad + $_REQUEST['cantidad'];

    $sql = "UPDATE componentes SET cantidad='" . $cantidad . "' WHERE nombre='" . $nombre . "' AND tipo='" . $tipo . "'";
    $comprobar = $conexion->query($sql);
    $_SESSION['mensajeBD2'] = $_REQUEST['cantidad'] . ' ' . $nombre . ' de tipo ' . $tipo . ' cancelados.';
  }
}

//Cancelar reparacion
if (isset($_REQUEST['servicio'])) {
  $servicio = $_REQUEST['servicio'];
  $fecha = $_REQUEST['fecha'];
  $sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
  $memi = $conexion->query($sql);

  if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $usuario = $info['id'];
  }
  $sql = "DELETE FROM reparacion WHERE n='" . $_REQUEST['n'] . "' ";
  $comprobar = $conexion->query($sql);
  $_SESSION['mensajeBD3'] = "El servicio de " . $servicio . " del " . $fecha . " ha sido cancelado.";
}

function array_sort($array, $on, $order = SORT_ASC)
{
  $new_array = array();
  $sortable_array = array();

  if (count($array) > 0) {
    foreach ($array as $k => $v) {
      if (is_array($v)) {
        foreach ($v as $k2 => $v2) {
          if ($k2 == $on)
            $sortable_array[$k] = $v2;
        }
      } else
        $sortable_array[$k] = $v;

    }
    switch ($order) {
      case SORT_ASC:
        asort($sortable_array);
        break;
      case SORT_DESC:
        arsort($sortable_array);
        break;
    }
    foreach ($sortable_array as $k => $v)
      $new_array[$k] = $array[$k];
  }
  return $new_array;
}

//Coger id usuario
$sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
$memi = $conexion->query($sql);

if ($memi->num_rows > 0) {
  $info = $memi->fetch_array();
  $usuario = $info['id'];
}

//Recoger datos, si existen, de los vehiculos alquilados o reservados.      
$sql = "SELECT count(*) FROM vehiculos_usuarios";
$memi = $conexion->query($sql);

if ($memi->num_rows > 0) {
  $info = $memi->fetch_array();
  $num = $info[0];
  $num = (int) $num;
}

$cont = 0;
$datosVehiculos = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
  $sql = "SELECT *  FROM vehiculos_usuarios WHERE id='" . $cont2 . "'";
  $mem = $conexion->query($sql);

  if ($mem && $mem->num_rows > 0) {
    $info = $mem->fetch_array();
    if ($info['usuario'] == $usuario) {
      $alquilado = $info['alquilado'];
      $reservado = $info['reservado'];
      $datosVehiculos[$cont]['precio'] = $info['precio'] * 1;
      $n = $info['n'];
      $fecha = $info['fecha'];

      $sql = "SELECT *  FROM vehiculos WHERE id='" . $info['vehiculo'] . "'";
      $mem = $conexion->query($sql);

      if ($mem && $mem->num_rows > 0) {
        $info = $mem->fetch_array();
        $datosVehiculos[$cont]['img'] = $info['img'];
        $datosVehiculos[$cont]['vehiculo'] = $info['modelo'];
      }
      if ($alquilado == 'Si') {
        $datosVehiculos[$cont]['alquilado'] = 'Si';
        $datosVehiculos[$cont]['reservado'] = 'No';
      }
      if ($reservado == 'Si' or $reservado == 'Comprado') {
        $datosVehiculos[$cont]['reservado'] = $reservado;
      }
      $datosVehiculos[$cont]['n'] = $n;
      $datosVehiculos[$cont]['fecha'] = $fecha;
    }
    $cont++;
  }
}
$datosVehiculos = array_sort($datosVehiculos, 'reservado', SORT_DESC);

//Recoger Componentes
$sql = "SELECT count(*) FROM componente_usuario";
$memi = $conexion->query($sql);

if ($memi->num_rows > 0) {

  $info = $memi->fetch_array();
  $num = $info[0];
  $num = (int) $num;
}
$cont = 0;
$datosComponentes = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
  $sql = "SELECT *  FROM componente_usuario WHERE id='" . $cont2 . "'";
  $mem = $conexion->query($sql);

  if ($mem && $mem->num_rows > 0) {
    $info = $mem->fetch_array();
    if ($info['usuario'] == $usuario) {
      $cantidad = $info['cantidad'];
      $finalizado = $info['finalizado'];
      $precio = $info['precio'];
      $fecha = $info['fecha'];
      $n = $info['n'];
      $sql = "SELECT *  FROM componentes WHERE id='" . $info['componente'] . "'";
      $mem = $conexion->query($sql);
      if ($mem && $mem->num_rows > 0) {
        $info = $mem->fetch_array();
        $datosComponentes[$cont]['ruta'] = $info['ruta'];
        $datosComponentes[$cont]['nombre'] = $info['nombre'];
        $datosComponentes[$cont]['tipo'] = $info['tipo'];
        $datosComponentes[$cont]['cantidad'] = $cantidad;
        $datosComponentes[$cont]['finalizado'] = $finalizado;
        $datosComponentes[$cont]['precio'] = $precio * 1;
        $datosComponentes[$cont]['fecha'] = $fecha;
        $datosComponentes[$cont]['n'] = $n;
      }
    }
    $cont++;
  }
}
$datosComponentes = array_sort($datosComponentes, 'finalizado', SORT_ASC);

// Recoger datos de Reparación
$sql = "SELECT count(*) FROM reparacion";
$memi = $conexion->query($sql);
if ($memi->num_rows > 0) {
  $info = $memi->fetch_array();
  $num = $info[0];
  $num = (int) $num;
}
$cont = 0;
$datosReparacion = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
  $sql = "SELECT *  FROM reparacion WHERE id='" . $cont2 . "'";
  $mem = $conexion->query($sql);

  if ($mem && $mem->num_rows > 0) {
    $info = $mem->fetch_array();
    if ($info['usuario'] == $usuario) {
      $datosReparacion[$cont]['servicio'] = $info['servicio'];
      $fecha = date("d-m-Y", strtotime($info['fecha']));
      $datosReparacion[$cont]['fecha'] = $fecha;
      $datosReparacion[$cont]['aceptado'] = $info['aceptado'];
      $datosReparacion[$cont]['precio'] = $info['precio'] * 1;
      $datosReparacion[$cont]['n'] = $info['n'];
    }
    $cont++;
  }
}
$datosReparacion = array_sort($datosReparacion, 'aceptado', SORT_DESC);

//Solo guardar a variable en caso de que el array no este vacio.

if ($datosVehiculos != array())
  $_SESSION['datosVehiculos'] = $datosVehiculos;

if ($datosComponentes != array())
  $_SESSION['datosComponentes'] = $datosComponentes;

if ($datosReparacion != array())
  $_SESSION['datosReparacion'] = $datosReparacion;

//Recoger datos de Componentes si existen 
header('Location:../Vistas/SeguimientoVista.php');
exit;

?>