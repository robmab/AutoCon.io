<?php

session_start();
include '../ConexiónBD.php';

$_SESSION['chekon'] = 1;
if (isset($_REQUEST['añadir'])) {
    //Comprobar que la fecha inicial no sea mayor que la final  
    if ($_REQUEST['fechaI'] > $_REQUEST['fechaF']) {

        $_SESSION['mensajeBD'] = 'La fecha inicial no puede ser mayor que la final.';
        header("Location:../Vistas/EventosVista.php#1");
        exit;
    }

    //Añadir Evento
    $name = $_REQUEST['nombre'];
    $banner = $_REQUEST['banner'];
    $sql = "INSERT INTO eventos_descuentos(nombre,fecha_in,fecha_fin,porciento,banner)   VALUES('" . $name . "','" . $_REQUEST['fechaI'] . "','" . $_REQUEST['fechaF'] . "','" . $_REQUEST['porciento'] . "','" . $banner . "')";
    $check = $connection->query($sql);

    if (!($connection->affected_rows > 0)) {
        $_SESSION['mensajeBD'] = 'No puedes crear un evento durante las mismas fechas que otro que tengas creado.';
        header("Location:../Vistas/EventosVista.php#1");
        exit;
    }
}

if (isset($_REQUEST['editar'])) {
    $sql = "UPDATE eventos_descuentos SET banner='" . $_REQUEST['banner'] . "' WHERE  fecha_in='" . $_REQUEST['fi'] . "'   AND fecha_fin='" . $_REQUEST['ff'] . "'  ";
    $check = $connection->query($sql);
}


if (isset($_REQUEST['eliminar'])) {
    $sql = "DELETE FROM eventos_descuentos WHERE fecha_in='" . $_REQUEST['fi'] . "'   AND fecha_fin='" . $_REQUEST['ff'] . "' ";
    $check = $connection->query($sql);
}

//Recoger eventos en array
$sql = "SELECT count(*) FROM eventos_descuentos";
$memory = $connection->query($sql);

if ($memory->num_rows > 0) {
    $info = $memory->fetch_array();
    $num = $info[0];
    $num = (int) $num;
}

$cont = 0;
$eventDate = array();

for ($cont2 = 0; $cont < $num; $cont2++) {
    $sql = "SELECT *  FROM eventos_descuentos WHERE id='" . $cont2 . "'";
    $memory2 = $connection->query($sql);

    if ($memory2 && $memory2->num_rows > 0) {
        $info = $memory2->fetch_array();
        $dateI = date("d-m-Y", strtotime($info['fecha_in']));
        $eventDate[$cont]['fechaI'] = $dateI;
        $eventDate[$cont]['fechaII'] = $info['fecha_in'];

        $dateF = date("d-m-Y", strtotime($info['fecha_fin']));
        $eventDate[$cont]['fechaF'] = $dateF;
        $eventDate[$cont]['fechaFF'] = $info['fecha_fin'];
        $eventDate[$cont]['nombre'] = $info['nombre'];
        $eventDate[$cont]['porciento'] = $info['porciento'];
        $eventDate[$cont]['banner'] = $info['banner'];

        $cont++;
    }
}

//Ordenado por estado. 

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

$eventDate = array_sort($eventDate, 'fechaI', SORT_DESC);
$_SESSION['datosEventos'] = $eventDate;

header("Location:../Vistas/EventosVista.php");
exit;

?>