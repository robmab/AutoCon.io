<?php

session_start();
include "../ConexiónBD.php";

$_SESSION["check"] = 1;

if (isset($_REQUEST["model"])) {
    $sql = "SELECT * FROM vehiculos WHERE modelo='" . $_REQUEST["model"] . "'";
    $memi = $conexion->query($sql);

    if ($memi->num_rows > 0) {
        $info = $memi->fetch_array();
        $disponibles = $info["disponibles"];
    }

    if (isset($_REQUEST["a"])) {
        $disponibles = $disponibles + 1;

        $sql =
            "UPDATE vehiculos SET disponibles='" .
            $disponibles .
            "' WHERE modelo='" .
            $_REQUEST["model"] .
            "'";
        $comprobar = $conexion->query($sql);
    }

    if (isset($_REQUEST["q"])) {
        $disponibles = $disponibles - 1;

        $sql =
            "UPDATE vehiculos SET disponibles='" .
            $disponibles .
            "' WHERE modelo='" .
            $_REQUEST["model"] .
            "'";
        $comprobar = $conexion->query($sql);
    }

    $model = $_REQUEST["model"];
}

//___________________/_______________/__/_______________/__/_______________/
//___________________/_______________/__/_______________/__/_______________///___________________/_______________/__/_______________/__/_______________/
//___________________/_______________/__/_______________/__/_______________///___________________/_______________/__/_______________/__/_______________/
//___________________/_______________/__/_______________/__/_______________///___________________/_______________/__/_______________/__/_______________/
//___________________/_______________/__/_______________/__/_______________///___________________/_______________/__/_______________/__/_______________/

//Recoger datos de coches

$sql = "SELECT count(*) FROM vehiculos";
$memi = $conexion->query($sql);

if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $num = $info[0];
    $num = (int) $num;
}

$cont = 0;
$listaVeh = [];

for ($cont2 = 0; $cont < $num; $cont2++) {
    $sql = "SELECT *  FROM vehiculos WHERE ID='" . $cont2 . "'";

    $mem = $conexion->query($sql);

    if ($mem && $mem->num_rows > 0) {
        $info = $mem->fetch_array();

        $listaVeh[$info["modelo"]]["vendidos"] = $info["vendidos"];
        $listaVeh[$info["modelo"]]["disponibles"] = $info["disponibles"];
        $listaVeh[$info["modelo"]]["rebaja"] = $info["rebaja"];

        $listaVeh[$info["modelo"]]["img"] = $info["img"];
        $listaVeh[$info["modelo"]]["alquilados"] = $info["alquilados"];
        $listaVeh[$info["modelo"]]["ruta"] = $info["ruta"];

        $rebajaM = $info["rebaja"] / 100;
        $rebajaM = $rebajaM - 1;
        $rebajaM = $rebajaM * -1;

        $listaVeh[$info["modelo"]]["precioRebajado"] =
            $info["precio"] * $rebajaM;

        $listaVeh[$info["modelo"]]["precio"] = $info["precio"] * 1;

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
                        $multiplicador =
                            $listaVeh[$info["modelo"]]["rebaja"] / 100;
                        $multiplicador = $multiplicador - 1;
                        $multiplicador = $multiplicador * -1;

                        $multiplicador2 = $info2["porciento"] * $multiplicador;
                        $listaVeh[$info["modelo"]]["rebaja"] =
                            $listaVeh[$info["modelo"]]["rebaja"] +
                            $multiplicador2;

                        $porciento = $info2["porciento"];
                        $porciento = $porciento / 100;
                        $porciento = $porciento - 1;
                        $porciento = $porciento * -1;

                        $listaVeh[$info["modelo"]]["precioRebajado"] =
                            $listaVeh[$info["modelo"]]["precioRebajado"] *
                            $porciento;
                        $listaVeh[$info["modelo"]]["precioRebajado"] = round(
                            $listaVeh[$info["modelo"]]["precioRebajado"],
                            2
                        );
                    }
                }

                $cont0++;
            }
        }

        //__________________________________________________________

        $listaVeh[$info["modelo"]]["precioAlquiler"] =
            $info["precioAlquiler"] * 1;

        $cont++;
    }
}

$_SESSION["listaVeh"] = $listaVeh;

header("Location:../Vistas/VehiculosVista.php#$model");
exit();
