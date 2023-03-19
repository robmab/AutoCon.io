<?php

if (isset($_SESSION["banner"])) {
} else {
    $fechaActual = date("Y\-m\-d");

    $sql = "SELECT count(*) FROM eventos_descuentos";
    $memi = $conexion->query($sql);

    if ($memi->num_rows > 0) {
        $info = $memi->fetch_array();
        $num = $info[0];
        $num = (int) $num;
    }

    $cont = 0;

    $datosEventos = [];

    for ($cont2 = 0; $cont < $num; $cont2++) {
        $sql = "SELECT *  FROM eventos_descuentos WHERE id='" . $cont2 . "'";

        $mem = $conexion->query($sql);

        if ($mem && $mem->num_rows > 0) {
            $info = $mem->fetch_array();

            if ($info["fecha_in"] <= $fechaActual) {
                if ($info["fecha_fin"] >= $fechaActual) {

                    $nombre = $info["nombre"];
                    $banner = $info["banner"];

                    $fecha_fin = date("d-m-Y", strtotime($info["fecha_fin"]));

                    $fecha_in = date("d-m-Y", strtotime($info["fecha_in"]));

                    $porciento = $info["porciento"];
                    ?>
    <div id="header">
        <h1  id="banner"><?php
        echo $nombre;
        if ($banner != "") { ?> - <?php }
        echo $banner;
        ?> - Del <?php echo $fecha_in; ?> al <?php echo $fecha_fin; ?></h1>
        <h1 style="color: red;font-size: 22px" id="banner"><?php echo $porciento; ?> % de descuento</h1>
        <a href="../Controladores/CerrarBanner.php" id="download">Cerrar</a>
</div>
<p></p>
    
<?php
                }
            }

            $cont++;
        }
    }
} ?>  
