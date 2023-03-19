<?php

session_start();
include "../ConexiónBD.php";

$_SESSION["chekonn"] = 1;

if (isset($_REQUEST["nom"])) {
    $sql =
        "SELECT * FROM componentes WHERE nombre='" .
        $_REQUEST["nom"] .
        "' AND tipo='" .
        $_REQUEST["tip"] .
        "'";
    $memi = $conexion->query($sql);

    if ($memi->num_rows > 0) {
        $info = $memi->fetch_array();
        $cantidad = $info["cantidad"];
    }

    if (isset($_REQUEST["a"])) {
        $cantidad = $cantidad + 1;

        $sql =
            "UPDATE componentes SET cantidad='" .
            $cantidad .
            "' WHERE nombre='" .
            $_REQUEST["nom"] .
            "' AND tipo='" .
            $_REQUEST["tip"] .
            "'";
        $comprobar = $conexion->query($sql);
    }

    if (isset($_REQUEST["q"])) {
        $cantidad = $cantidad - 1;

        $sql =
            "UPDATE componentes SET cantidad='" .
            $cantidad .
            "' WHERE nombre='" .
            $_REQUEST["nom"] .
            "' AND tipo='" .
            $_REQUEST["tip"] .
            "'";
        $comprobar = $conexion->query($sql);
    }

    $nom = $_REQUEST["nom"];
}

//___________________/_______________/__/_______________/__/_______________/
//___________________/_______________/__/_______________/__/_______________///___________________/_______________/__/_______________/__/_______________/
//___________________/_______________/__/_______________/__/_______________///___________________/_______________/__/_______________/__/_______________/
//___________________/_______________/__/_______________/__/_______________///___________________/_______________/__/_______________/__/_______________/
//___________________/_______________/__/_______________/__/_______________///___________________/_______________/__/_______________/__/_______________/

//Recogida variables e insertar datos en la base de datos.

if (isset($_REQUEST["comprar"])) {
    if ($_REQUEST["tipo"]) {
        $tipo = $_REQUEST["tipo"];
        $porciones = explode("-", $tipo);
        $tipo = $porciones[0];
        $precioC = $porciones[1];
    } else {
        //Control de componente

        $_SESSION["mensajeBD"] = "Debes seleccionar un componente primero.";
        header("Location:ComponentesControlador.php");
        exit();
    }

    //control login
    if (isset($_SESSION["user"])) {
    } else {
        $_SESSION["mensajeBD"] =
            "Necesitas estar logeado para comprar un componente.";
        header("Location:../Vistas/LoginVista.php");
        exit();
    }

    //comprobar si tiene datos de facturacion el usuario

    $sql =
        "SELECT id FROM usuarios WHERE nombreUsuario='" .
        $_SESSION["user"] .
        "' or correo='" .
        $_SESSION["user"] .
        "'";
    $memi = $conexion->query($sql);

    if ($memi->num_rows > 0) {
        $info = $memi->fetch_array();

        $usuario = $info["id"];
    }

    $sql =
        "SELECT * FROM usuarios_facturacion WHERE usuario='" . $usuario . "'";
    $memi = $conexion->query($sql);

    if ($memi->num_rows > 0) {
    } else {
        $_SESSION["mensajeBD"] =
            "Necesitas asociar los datos de tu tarjeta a tu cuenta para asignar el pago";
        header("Location:../Vistas/FacturacionVista.php?checkF=1");
        exit();
    }

    //_____________________________________

    if ($_REQUEST["nombre"]) {
        $nombre = $_REQUEST["nombre"];
    }

    //Ingreso en la base de datos.

    $sql =
        "SELECT * FROM componentes WHERE nombre='" .
        $nombre .
        "'  AND tipo='" .
        $tipo .
        "'";
    $memi = $conexion->query($sql);
    if ($memi->num_rows > 0) {
        $info = $memi->fetch_array();
        $componente = $info["id"];
    }

    //Comprobar si ya tenia ese producto.

    $sql =
        "SELECT * FROM componente_usuario WHERE usuario='" .
        $usuario .
        "'  AND componente='" .
        $componente .
        "' AND finalizado='No'";
    $memi = $conexion->query($sql);
    if ($memi->num_rows > 0) {
        $info = $memi->fetch_array();
        $cantidad = $info["cantidad"];
        $finalizado = $info["finalizado"];
        $precio = $info["precio"];
    } else {
        $cantidad = 0;
    }

    //Inserción del componente y mensaje

    if ($cantidad > 0) {
        $cantidad = $cantidad + 1;

        $sql =
            "UPDATE  componente_usuario SET cantidad='" .
            $cantidad .
            "' WHERE usuario='" .
            $usuario .
            "'  AND componente='" .
            $componente .
            "' AND finalizado='No' ";
        $comprobar = $conexion->query($sql);

        $precio = $precio + $precioC;

        $sql =
            "UPDATE  componente_usuario SET precio='" .
            $precio .
            "' WHERE usuario='" .
            $usuario .
            "'  AND componente='" .
            $componente .
            "' AND finalizado='No' ";
        $comprobar = $conexion->query($sql);
    } else {
        $n = rand(1000000000, 9999999999);
        $contad = 0;
        while ($contad == 0) {
            $sql = "SELECT * FROM componente_usuario WHERE n='" . $n . "'";
            $memi = $conexion->query($sql);
            if ($memi->num_rows > 0) {
                $n = rand(1000000000, 9999999999);
            } else {
                $contad = 1;
            }
        }

        $cantidad = $cantidad + 1;
        $sql =
            "INSERT INTO componente_usuario(usuario,cantidad,componente,precio,n)   VALUES(" .
            $usuario .
            "," .
            $cantidad .
            "," .
            $componente .
            "," .
            $precioC .
            ",'" .
            $n .
            "')";
        $comprobar = $conexion->query($sql);
    }

    //Actualizar disponibilidad -->

    $sql =
        "SELECT cantidad FROM componentes WHERE id='" . $componente . "'    ";
    $memi = $conexion->query($sql);
    if ($memi->num_rows > 0) {
        $info = $memi->fetch_array();
        $cantidadC = $info["cantidad"];
        $cantidadC = $cantidadC - 1;
    }

    $sql =
        "UPDATE  componentes SET cantidad='" .
        $cantidadC .
        "' WHERE id='" .
        $componente .
        "' ";
    $comprobar = $conexion->query($sql);

    //----------------------------

    $_SESSION["mensajeBD"] =
        "Componente " . $nombre . " - " . $tipo . " comprado con éxito.";
    header("Location:ComponentesControlador.php");
    exit();

    //______________________________
}

//Recoger componentes en array de objetos

$sql = "SELECT count(*) FROM componentes";
$memi = $conexion->query($sql);

if ($memi->num_rows > 0) {
    $info = $memi->fetch_array();
    $num = $info[0];
    $num = (int) $num;
}

$cont = 0;
$listaComponentes = [];

for ($cont2 = 0; $cont < $num; $cont2++) {
    $sql = "SELECT *  FROM componentes WHERE ID='" . $cont2 . "'";

    $mem = $conexion->query($sql);

    if ($mem && $mem->num_rows > 0) {
        $info = $mem->fetch_array();

        $listaComponentes[$info["nombre"]][$info["tipo"]]["cantidad"] =
            $info["cantidad"];
        $listaComponentes[$info["nombre"]][$info["tipo"]]["ruta"] =
            $info["ruta"];

        $listaComponentes[$info["nombre"]][$info["tipo"]]["descuento"] =
            $info["descuento"];

        $listaComponentes[$info["nombre"]][$info["tipo"]]["precioO"] =
            $info["precio"] * 1;
        $listaComponentes[$info["nombre"]][$info["tipo"]]["precio"] =
            $info["precio"] * 1;

        $precioR = $info["descuento"] / 100;
        $precioR = $precioR - 1;
        $precioR = $precioR * -1;
        $precioR = $precioR * $info["precio"];

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
                            $listaComponentes[$info["nombre"]][$info["tipo"]][
                                "descuento"
                            ] / 100;
                        $multiplicador = $multiplicador - 1;
                        $multiplicador = $multiplicador * -1;

                        $multiplicador2 = $info2["porciento"] * $multiplicador;
                        $listaComponentes[$info["nombre"]][$info["tipo"]][
                            "descuento"
                        ] =
                            $listaComponentes[$info["nombre"]][$info["tipo"]][
                                "descuento"
                            ] + $multiplicador2;

                        $porciento = $info2["porciento"];
                        $porciento = $porciento / 100;
                        $porciento = $porciento - 1;
                        $porciento = $porciento * -1;

                        $listaComponentes[$info["nombre"]][$info["tipo"]][
                            "precio"
                        ] =
                            $listaComponentes[$info["nombre"]][$info["tipo"]][
                                "precio"
                            ] * $porciento;

                        $precioR = $precioR * $porciento;

                        $precioR = round($precioR, 2);
                    }
                }

                $cont0++;
            }
        }

        //__________________________________________________________

        $listaComponentes[$info["nombre"]][$info["tipo"]]["precioR"] = $precioR;
        $listaComponentes[$info["nombre"]][$info["tipo"]]["precioR"] = round(
            $listaComponentes[$info["nombre"]][$info["tipo"]]["precioR"],
            2
        );

        $cont++;
    }
}

$_SESSION["listaComponentes"] = $listaComponentes;

if (isset($_REQUEST["Adm"])) {
    header("Location:../Vistas/ComponentesVistaAdm.php#$nom");
} elseif (isset($_REQUEST["Adm2"])) {
    header("Location:../Vistas/ComponentesVistaAdm.php");
} else {
    header("Location:../Vistas/ComponentesVista.php");
}
exit();

//_____________________________________________________________________________
?>



 ?>