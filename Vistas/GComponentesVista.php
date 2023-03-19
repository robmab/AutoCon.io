<!DOCTYPE html>
<html lang="en">
    <head>
        <link href='../Tema/Tabla/tabla.css' rel='stylesheet' type='text/css'>
        <?php
        include "../Tema/CSS.php";
        if (isset($_SESSION["chekon"])) {
            unset($_SESSION["chekon"]);
        } else {
            header("Location:../Controladores/GComponentesControlador.php");
        }

        if (isset($_SESSION["rol"])) {
            if ($_SESSION["rol"] != "Admin") {
                header("Location:Index.php");
            }
        } else {
            header("Location:Index.php");
        }
        ?>
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Title  -->
        <title>Gestión de Componentes - AutoCon</title>
        <!-- Favicon  -->
        <link rel="stylesheet" href="../Tema/Button/Cancelar.css">
    </head>
    <body>
        <?php include "../Tema/Menu.php";
//Evita pasar antes por la vista
?>
        <!-- ***** Header Area End ***** -->
        <!-- ********** Hero Area Start ********** -->
        <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(../img/blog-img/Gcomponentes.jpg);"></div>
        <!-- ********** Hero Area End ********** -->
        <?php  ?>
        <section class="contact-area section-padding-100">
            <div class="container">
                <div class="row justify-content-center" id="1">
                    <div class="col-12 col-md-10 col-lg-8">
                        <center>  <?php if (isset($_SESSION["mensajeBD"])) {
                            echo " <h5 style='color:red;'> " .
                                $_SESSION["mensajeBD"] .
                                "</h5> ";
                            unset($_SESSION["mensajeBD"]);
                        } ?>
                        </center>
                    </div>
                    <!-- Contact Form Area -->
                    <div class="contact-form">
                        <center>
                            <h3 >Componentes comprados</h3>
                        </center>
                        <br><br>
                        <!-- Datos -->
                        <table>
                            <thead>
                                <tr>
                                    <th style="color: transparent">______________</th>
                                    <th>Numero Componente</th>
                                    <th>Fecha</th>
                                    <th>Componente</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Nombre de Usuario</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>DNI</th>
                                    <th>Estado</th>
                                    <th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (
                                    $_SESSION["datosGComponentes"]
                                    as $num
                                ) { ?> 
                                <tr>
                                    <td><img height="200%" width="200%" src="../img/componentes/<?php echo $num[
                                        "ruta"
                                    ]; ?>"></td>
                                    <td><?php echo "#" . $num["n"]; ?></td>
                                    <td><?php echo $num["fecha"]; ?></td>
                                    <td><?php echo $num["nombreC"] .
                                        " - " .
                                        $num["tipo"]; ?></td>
                                    <td><?php echo "x" .
                                        $num["cantidad"]; ?></td>
                                    <td><?php echo $num["precio"] .
                                        " €"; ?></td>
                                    <td><?php echo $num[
                                        "nombreUsuario"
                                    ]; ?></td>
                                    <td><?php echo $num["nombre"]; ?></td>
                                    <td><?php echo $num["apellidos"]; ?></td>
                                    <td><?php echo $num["correo"]; ?></td>
                                    <td><?php echo $num["numeroMovil"]; ?></td>
                                    <td><?php echo $num["nif"]; ?></td>
                                    <td>
                                        <?php if (
                                            $num["finalizado"] == "Si"
                                        ) { ?>    
                                        <p style="color: greenyellow">Comprado</p>
                                        <?php } elseif (
                                            $num["finalizado"] == "No"
                                        ) { ?>  
                                        <p style="color: #E1B42B">En pedido</p>
                                        <?php } ?>  
                                    </td>
                                    <td><?php if (
                                        $num["finalizado"] != "Si"
                                    ) { ?>
                                        <a href="../Controladores/GComponentesControlador.php?comprar=1&usuario=<?php echo $num[
                                            "idU"
                                        ]; ?>&componente=<?php echo $num[
    "idC"
]; ?>#1" style="color: <?php if (
    $num["finalizado"] == "No"
) { ?>#E1B42B     <?php } else { ?>deeppink   <?php } ?>  " > &ltPasar a comprado&gt</a>
                                        <?php } ?>
                                    </td>
                                    <td><?php if (
                                        $num["finalizado"] != "Si"
                                    ) { ?><a href="../Controladores/GComponentesControlador.php?cancelar=1&usuario=<?php echo $num[
    "idU"
]; ?>&componente=<?php echo $num["idC"]; ?>&n=<?php echo $num[
    "n"
]; ?>#1" style="color:red">Cancelar</a><?php } ?></td>
                                </tr>
                                <?php } ?>                  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <?php include "../Tema/Scripts.php"; ?>
    </body>
</html>