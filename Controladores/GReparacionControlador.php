<?php

session_start();
include "../ConexiónBD.php";

$_SESSION["chekon"] = 1;

//Comprar/cancelar

if (isset($_REQUEST["n"])) {
    if (isset($_REQUEST["editar"])) {
        $sql =
            "UPDATE reparacion SET precio='" .
            $_REQUEST["precioE"] .
            "' WHERE  n='" .
            $_REQUEST["n"] .
            "'  ";
        $comprobar = $conexion->query($sql);
    }

    if (isset($_REQUEST["aceptar"])) {
        $sql =
            "UPDATE reparacion SET aceptado='Si' WHERE  n='" .
            $_REQUEST["n"] .
            "'  ";
        $comprobar = $conexion->query($sql);

        //Calculo de rebaja de existir

        $fechaActual = date("Y\-m\-d");

        $sql2 = "SELECT count(*) FROM eventos_descuentos";
        $memi2 = $conexion->query($sql2);

        if ($memi2->num_rows > 0) {
            $info2 = $memi2->fetch_array();
            $num0 = $info2[0];
            $num0 = (int) $num0;
        }

        $cont0 = 0;

        for ($cont20 = 0; $cont0 < $num0; $cont20++) {
            $sql =
                "SELECT *  FROM eventos_descuentos WHERE id='" . $cont20 . "'";

            $mem = $conexion->query($sql);

            if ($mem && $mem->num_rows > 0) {
                $info2 = $mem->fetch_array();

                if ($info2["fecha_in"] <= $fechaActual) {
                    if ($info2["fecha_fin"] >= $fechaActual) {
                        $porciento = $info2["porciento"];
                        $porciento = $porciento / 100;
                        $porciento = $porciento - 1;
                        $porciento = $porciento * -1;

                        $_REQUEST["precio"] = $_REQUEST["precio"] * $porciento;
                        $_REQUEST["precio"] = round($_REQUEST["precio"], 2);

                        $_SESSION["rebaja"] = $info2["porciento"];

                        $count = 0;
                    }
                }

                $cont0++;
            }
        }

        if (isset($count)) {
        } else {
            unset($count);

            if (isset($_SESSION["rebaja"])) {
                unset($_SESSION["rebaja"]);
            }
        }

        //__________________________________________________________

        $sql =
            "UPDATE reparacion SET precio='" .
            $_REQUEST["precio"] .
            "' WHERE  n='" .
            $_REQUEST["n"] .
            "'  ";
        $comprobar = $conexion->query($sql);
    }

    if (isset($_REQUEST["finalizar"])) {
        $sql =
            "UPDATE reparacion SET aceptado='Finalizado' WHERE n='" .
            $_REQUEST["n"] .
            "'";
        $comprobar = $conexion->query($sql);
    }

    if (isset($_REQUEST["cancelar"])) {
        $sql = "DELETE FROM reparacion WHERE n='" . $_REQUEST["n"] . "' ";
        $comprobar = $conexion->query($sql);
    }
}

//__________________//_________________________________________//_____________________________________
//________________________________//____________________________//____________________________________
//________________________________//________________________________//________________________________
//______________//______________________//____________________________________________________________

//Recoger servicios en array

$sql = "SELECT count(*) FROM reparacion";
$memi = $conexion->query($sql);

if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $num = $info[0];
    $num = (int) $num;
}

$cont = 0;
$datosGReparacion = [];

for ($cont2 = 0; $cont < $num; $cont2++) {
    $sql = "SELECT *  FROM reparacion WHERE id='" . $cont2 . "'";

    $mem = $conexion->query($sql);

    if ($mem && $mem->num_rows > 0) {
        $info = $mem->fetch_array();

        $usuario = $info["usuario"];
        $datosGReparacion[$cont]["idU"] = $info["usuario"];

        $fecha = date("d-m-Y", strtotime($info["fecha"]));
        $datosGReparacion[$cont]["fecha"] = $fecha;
        $datosGReparacion[$cont]["n"] = $info["n"];
        $datosGReparacion[$cont]["aceptado"] = $info["aceptado"];
        $datosGReparacion[$cont]["precio"] = $info["precio"] * 1;
        $datosGReparacion[$cont]["servicio"] = $info["servicio"];

        $sql = "SELECT * FROM usuarios WHERE id='" . $usuario . "' ";
        $memi = $conexion->query($sql);

        if ($memi->num_rows > 0) {
            $info = $memi->fetch_array();

            $datosGReparacion[$cont]["nombreUsuario"] = $info["nombreUsuario"];
            $datosGReparacion[$cont]["correo"] = $info["correo"];
            $datosGReparacion[$cont]["numeroMovil"] = $info["numeroMovil"];
            $datosGReparacion[$cont]["nombre"] = $info["nombre"];
            $datosGReparacion[$cont]["apellidos"] = $info["apellidos"];
            $datosGReparacion[$cont]["nif"] = $info["nif"];
        }

        $cont++;
    }
}

//_______________________________________________________
//Ordenado por estado.
//_______________________________________________________

function array_sort($array, $on, $order = SORT_ASC)
{
    $new_array = [];
    $sortable_array = [];

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}
$datosGReparacion = array_sort($datosGReparacion, "servicio", SORT_ASC);
$datosGReparacion = array_sort($datosGReparacion, "aceptado", SORT_ASC);

//Calculo de rebaja de existir

$fechaActual = date("Y\-m\-d");

$sql2 = "SELECT count(*) FROM eventos_descuentos";
$memi2 = $conexion->query($sql2);

if ($memi2->num_rows > 0) {
    $info2 = $memi2->fetch_array();
    $num0 = $info2[0];
    $num0 = (int) $num0;
}

$cont0 = 0;

for ($cont20 = 0; $cont0 < $num0; $cont20++) {
    $sql = "SELECT *  FROM eventos_descuentos WHERE id='" . $cont20 . "'";

    $mem = $conexion->query($sql);

    if ($mem && $mem->num_rows > 0) {
        $info2 = $mem->fetch_array();

        if ($info2["fecha_in"] <= $fechaActual) {
            if ($info2["fecha_fin"] >= $fechaActual) {
                $_SESSION["rebaja"] = $info2["porciento"];

                $count = 0;
            }
        }

        $cont0++;
    }
}

if (isset($count)) {
} else {
    unset($count);

    if (isset($_SESSION["rebaja"])) {
        unset($_SESSION["rebaja"]);
    }
}

//__________________________________________________________

$_SESSION["datosGReparacion"] = $datosGReparacion;

header("Location:../Vistas/GReparacionVista.php");
exit();

?>
