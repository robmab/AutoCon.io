<?php
session_start();
include '../ConexiónBD.php';

$_SESSION['chekonn'] = 1;

if (isset($_REQUEST['nom'])) {
  $sql = "SELECT * FROM componentes WHERE nombre='" . $_REQUEST['nom'] . "' AND tipo='" . $_REQUEST['tip'] . "'";
  $memory = $connection->query($sql);
  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $quantity = $info['cantidad'];
  }
  if (isset($_REQUEST['a'])) {
    $quantity = $quantity + 1;
    $sql = "UPDATE componentes SET cantidad='" . $quantity . "' WHERE nombre='" . $_REQUEST['nom'] . "' AND tipo='" . $_REQUEST['tip'] . "'";
    $check = $connection->query($sql);
  }
  if (isset($_REQUEST['q'])) {
    $quantity = $quantity - 1;
    $sql = "UPDATE componentes SET cantidad='" . $quantity . "' WHERE nombre='" . $_REQUEST['nom'] . "' AND tipo='" . $_REQUEST['tip'] . "'";
    $check = $connection->query($sql);
  }

  $nom = $_REQUEST['nom'];
}

//Collecting variables and inserting data into the database

if (isset($_REQUEST['comprar'])) {
  if ($_REQUEST['tipo']) {
    $type = $_REQUEST['tipo'];
    $portions = explode("-", $type);
    $type = $portions[0];
    $price2 = $portions[1];
  } else {
    //Component Control 
    $_SESSION['mensajeBD'] = "Debes seleccionar un componente primero.";
    header("Location:ComponentesControlador.php");
    exit;
  }

  //Control Login
  if (!isset($_SESSION['user'])) {
    $_SESSION['mensajeBD'] = "Necesitas estar logeado para comprar un componente.";
    header("Location:../Vistas/LoginVista.php");
    exit;
  }

  //Check if the user has billing data
  $sql = "SELECT id FROM usuarios WHERE nombreUsuario='" . $_SESSION['user'] . "' or correo='" . $_SESSION['user'] . "'";
  $memory = $connection->query($sql);

  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $user = $info['id'];
  }

  $sql = "SELECT * FROM usuarios_facturacion WHERE usuario='" . $user . "'";
  $memory = $connection->query($sql);

  if ($memory->num_rows <= 0) {
    $_SESSION['mensajeBD'] = "Necesitas asociar los datos de tu tarjeta a tu cuenta para asignar el pago";
    header("Location:../Vistas/FacturacionVista.php?checkF=1");
    exit;
  }

  if ($_REQUEST['nombre'])
    $name = $_REQUEST['nombre'];

  //Database entry
  $sql = "SELECT * FROM componentes WHERE nombre='" . $name . "'  AND tipo='" . $type . "'";
  $memory = $connection->query($sql);
  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $component = $info['id'];
  }

  //Check if you already had this product
  $sql = "SELECT * FROM componente_usuario WHERE usuario='" . $user . "'  AND componente='" . $component . "' AND finalizado='No'";
  $memory = $connection->query($sql);
  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $quantity = $info['cantidad'];
    $end = $info['finalizado'];
    $price1 = $info['precio'];
  } else
    $quantity = 0;

  //Insertion of the component and message
  if ($quantity > 0) {
    $quantity = $quantity + 1;
    $sql = "UPDATE  componente_usuario SET cantidad='" . $quantity . "' WHERE usuario='" . $user . "'  AND componente='" . $component . "' AND finalizado='No' ";
    $check = $connection->query($sql);
    $price1 = $price1 + $price2;

    $sql = "UPDATE  componente_usuario SET precio='" . $price1 . "' WHERE usuario='" . $user . "'  AND componente='" . $component . "' AND finalizado='No' ";
    $check = $connection->query($sql);
  } else {
    $n = rand(1000000000, 9999999999);
    $cont1 = 0;

    while ($cont1 == 0) {
      $sql = "SELECT * FROM componente_usuario WHERE n='" . $n . "'";
      $memory = $connection->query($sql);
      if ($memory->num_rows > 0)
        $n = rand(1000000000, 9999999999);
      else
        $cont1 = 1;
    }

    $quantity = $quantity + 1;
    $sql = "INSERT INTO componente_usuario(usuario,cantidad,componente,precio,n)   VALUES(" . $user . "," . $quantity . "," . $component . "," . $price2 . ",'" . $n . "')";
    $check = $connection->query($sql);
  }

  //Update availability
  $sql = "SELECT cantidad FROM componentes WHERE id='" . $component . "'    ";
  $memory = $connection->query($sql);
  if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $quantity2 = $info['cantidad'];
    $quantity2 = $quantity2 - 1;
  }

  $sql = "UPDATE  componentes SET cantidad='" . $quantity2 . "' WHERE id='" . $component . "' ";
  $check = $connection->query($sql);

  $_SESSION['mensajeBD2'] = "Componente " . $name . " - " . $type . " comprado con éxito.";
  header("Location:SeguimientoControlador.php#2");
  exit;
}

//Collect components in array of objects
$sql = "SELECT count(*) FROM componentes";
$memory = $connection->query($sql);

if ($memory->num_rows > 0) {
  $info = $memory->fetch_array();
  $num = $info[0];
  $num = (int) $num;
}

$cont2 = 0;
$componentList = array();

for ($cont2 = 0; $cont2 < $num; $cont2++) {
  $sql = "SELECT *  FROM componentes WHERE ID='" . $cont2 . "'";
  $mem = $connection->query($sql);
  if ($mem && $mem->num_rows > 0) {
    $info = $mem->fetch_array();
    $componentList[$info['nombre']][$info['tipo']]['cantidad'] = $info['cantidad'];
    $componentList[$info['nombre']][$info['tipo']]['ruta'] = $info['ruta'];
    $componentList[$info['nombre']][$info['tipo']]['descuento'] = $info['descuento'];
    $componentList[$info['nombre']][$info['tipo']]['precioO'] = $info['precio'] * 1;
    $componentList[$info['nombre']][$info['tipo']]['precio'] = $info['precio'] * 1;
    $priceR = ((($info['descuento'] / 100) - 1) * -1) * $info['precio'];

    //Rebate calculation of existing
    $fechaActual = date("Y\-m\-d");
    $sql2 = "SELECT count(*) FROM eventos_descuentos";
    $memi2 = $connection->query($sql2);
    if ($memi2->num_rows > 0) {
      $info2 = $memi2->fetch_array();
      $num0 = $info2[0];
      $num0 = (int) $num0;
    }
    $cont = 0;

    for ($counter = 0; $cont < $num0; $counter++) {
      $sql = "SELECT *  FROM eventos_descuentos WHERE id='" . $counter . "'";
      $mem = $connection->query($sql);
      if ($mem && $mem->num_rows > 0) {
        $info2 = $mem->fetch_array();
        if ($info2['fecha_in'] <= $fechaActual) {
          if ($info2['fecha_fin'] >= $fechaActual) {
            $multiplier = $componentList[$info['nombre']][$info['tipo']]['descuento'] / 100;
            $multiplier = ($multiplier - 1) * -1;
            $multiplier2 = $info2['porciento'] * $multiplier;
            $componentList[$info['nombre']][$info['tipo']]['descuento'] = $componentList[$info['nombre']][$info['tipo']]['descuento'] + $multiplier2;
            $percent = (($info2['porciento'] / 100) - 1) * -1;
            $componentList[$info['nombre']][$info['tipo']]['precio'] = $componentList[$info['nombre']][$info['tipo']]['precio'] * $percent;
            $priceR = round(($priceR * $percent), 2);
          }
        }
        $cont++;
      }
    }
    $componentList[$info['nombre']][$info['tipo']]['precioR'] = $priceR;
    $componentList[$info['nombre']][$info['tipo']]['precioR'] = round($componentList[$info['nombre']][$info['tipo']]['precioR'], 2);

    $cont2++;
  }
}

$_SESSION['listaComponentes'] = $componentList;

if (isset($_REQUEST['Adm']))
  header("Location:../Vistas/ComponentesVistaAdm.php#$nom");
elseif (isset($_REQUEST['Adm2']))
  header("Location:../Vistas/ComponentesVistaAdm.php");
else
  header("Location:../Vistas/ComponentesVista.php");

exit;
?>