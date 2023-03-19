<?php

session_start();
include "../ConexiónBD.php";

$_SESSION["chekon"] = 1;

//Comprar/cancelar

if (isset($_REQUEST["usuario"])) {
    if (isset($_REQUEST["comprar"])) {
        $sql =
            "UPDATE vehiculos_usuarios SET reservado='Comprado' WHERE usuario='" .
            $_REQUEST["usuario"] .
            "' AND vehiculo='" .
            $_REQUEST["vehiculo"] .
            "' AND n='" .
            $_REQUEST["n"] .
            "'";
        $comprobar = $conexion->query($sql);

        $sql =
            "UPDATE vehiculos_usuarios SET precio='" .
            $_REQUEST["precio"] .
            "' WHERE usuario='" .
            $_REQUEST["usuario"] .
            "' AND vehiculo='" .
            $_REQUEST["vehiculo"] .
            "' AND n='" .
            $_REQUEST["n"] .
            "'";
        $comprobar = $conexion->query($sql);

        $sql =
            "UPDATE vehiculos_usuarios SET alquilado='No' WHERE usuario='" .
            $_REQUEST["usuario"] .
            "' AND vehiculo='" .
            $_REQUEST["vehiculo"] .
            "' AND n='" .
            $_REQUEST["n"] .
            "'";
        $comprobar = $conexion->query($sql);

        $sql =
            "SELECT * FROM vehiculos WHERE id='" . $_REQUEST["vehiculo"] . "' ";
        $memi = $conexion->query($sql);

        if ($memi->num_rows > 0) {
            $info = $memi->fetch_array();

            $modelo = $info["modelo"];
            $vendidos = $info["vendidos"];
            $vendidos = $vendidos + 1;
            $alquilados = $info["alquilados"];
            $alquilados = $alquilados - 1;
        }

        $sql =
            "UPDATE vehiculos SET vendidos='" .
            $vendidos .
            "' WHERE modelo='" .
            $modelo .
            "'";
        $comprobar = $conexion->query($sql);

        if (isset($_REQUEST["alquilar"])) {
            $sql =
                "UPDATE vehiculos SET alquilados='" .
                $alquilados .
                "' WHERE modelo='" .
                $modelo .
                "'";
            $comprobar = $conexion->query($sql);
        }
    }

    if (isset($_REQUEST["cancelar"])) {
        $sql =
            "DELETE FROM vehiculos_usuarios WHERE usuario='" .
            $_REQUEST["usuario"] .
            "' AND vehiculo='" .
            $_REQUEST["vehiculo"] .
            "' AND  n='" .
            $_REQUEST["n"] .
            "' ";
        $comprobar = $conexion->query($sql);
    }
}

//__________________//_________________________________________//_____________________________________
//________________________________//____________________________//____________________________________
//________________________________//________________________________//________________________________
//______________//______________________//____________________________________________________________

//Recoger vehiculos en array

$sql = "SELECT count(*) FROM vehiculos_usuarios";
$memi = $conexion->query($sql);

if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $num = $info[0];
    $num = (int) $num;
}

$cont = 0;
$datosGVehiculos = [];

for ($cont2 = 0; $cont < $num; $cont2++) {
    $sql = "SELECT *  FROM vehiculos_usuarios WHERE id='" . $cont2 . "'";

    $mem = $conexion->query($sql);

    if ($mem && $mem->num_rows > 0) {
        $info = $mem->fetch_array();

        $usuario = $info["usuario"];
        $datosGVehiculos[$cont]["idU"] = $info["usuario"];
        $vehiculo = $info["vehiculo"];
        $datosGVehiculos[$cont]["idV"] = $info["vehiculo"];

        $alquilado = $info["alquilado"];
        $reservado = $info["reservado"];

        $fecha = date("d-m-Y", strtotime($info["fecha"]));
        $datosGVehiculos[$cont]["fecha"] = $fecha;
        $datosGVehiculos[$cont]["n"] = $info["n"];

        $datosGVehiculos[$cont]["precio"] = $info["precio"] * 1;

        $sql = "SELECT * FROM usuarios WHERE id='" . $usuario . "' ";
        $memi = $conexion->query($sql);

        if ($memi->num_rows > 0) {
            $info = $memi->fetch_array();

            $datosGVehiculos[$cont]["nombreUsuario"] = $info["nombreUsuario"];
            $datosGVehiculos[$cont]["correo"] = $info["correo"];
            $datosGVehiculos[$cont]["numeroMovil"] = $info["numeroMovil"];
            $datosGVehiculos[$cont]["nombre"] = $info["nombre"];
            $datosGVehiculos[$cont]["apellidos"] = $info["apellidos"];
            $datosGVehiculos[$cont]["nif"] = $info["nif"];
        }

        $sql = "SELECT * FROM vehiculos WHERE id='" . $vehiculo . "' ";
        $memi = $conexion->query($sql);

        if ($memi->num_rows > 0) {
            $info = $memi->fetch_array();

            $datosGVehiculos[$cont]["modelo"] = $info["modelo"];
            $datosGVehiculos[$cont]["precioAlquiler"] = $info["precioAlquiler"];
            $datosGVehiculos[$cont]["img"] = $info["img"];
            $precio = $info["precio"];

            $rebaja = $info["rebaja"];

            if ($alquilado == "Si") {
                $rebaja = $rebaja / 100;
                $rebaja = $rebaja - 1;
                $rebaja = $rebaja * -1;

                $precio = $precio * $rebaja;

                $datosGVehiculos[$cont]["precio"] = $precio;
            }
        }

        $datosGVehiculos[$cont]["alquilado"] = $alquilado;
        $datosGVehiculos[$cont]["reservado"] = $reservado;

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

$datosGVehiculos = array_sort($datosGVehiculos, "reservado", SORT_DESC);

$_SESSION["datosGVehiculos"] = $datosGVehiculos;

header("Location:../Vistas/GVehiculosVista.php");
exit();

?>
