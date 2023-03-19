<!DOCTYPE html>
<html lang="en">
    <head>
        <link href='../Tema/Tabla/tabla.css' rel='stylesheet' type='text/css'>
        <?php
        include "../Tema/CSS.php";
        if (isset($_SESSION["chekon"])) {
            unset($_SESSION["chekon"]);
        } else {
            header("Location:../Controladores/EventosControlador.php");
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
        <title>Gestión de Eventos - AutoCon</title>
        <!-- Favicon  -->
        <link rel="stylesheet" href="../Tema/Button/Cancelar.css">
    </head>
    <body>
        <?php include "../Tema/Menu.php";
//Evita pasar antes por la vista
?>
        <!-- ***** Header Area End ***** -->
        <!-- ********** Hero Area Start ********** -->
        <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(../img/blog-img/eventos.jpg);"></div>
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
                            <h3>Gestionar Eventos de Descuento</h3>
                        </center>
                        <br><br>
                        <!-- Datos -->
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre Evento</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>% Descuento</th>
                                    <th>
                                        <center>Banner</center>
                                    </th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (
                                    $_SESSION["datosEventos"]
                                    as $num
                                ) { ?> 
                                <tr>
                                    <td><?php echo $num["nombre"]; ?></td>
                                    <td><?php echo $num["fechaI"]; ?></td>
                                    <td><?php echo $num["fechaF"]; ?></td>
                                    <td><?php echo $num["porciento"] .
                                        " %"; ?></td>
                                    <form method="post" action="../Controladores/EventosControlador.php?editar=1&fi=<?php echo $num[
                                        "fechaII"
                                    ]; ?>&ff=<?php echo $num["fechaFF"]; ?>#1">
                                        <td><input name="banner" type="text" style="width:400px;height:30px" required="" value="<?php echo $num[
                                            "banner"
                                        ]; ?>"/></td>
                                        <td><button type="submit" class="btn ">Editar</button></td>
                                    </form>
                                    <td><a href="../Controladores/EventosControlador.php?eliminar=1&fi=<?php echo $num[
                                        "fechaII"
                                    ]; ?>&ff=<?php echo $num[
    "fechaFF"
]; ?>#1" style="color: red">Cancelar</a></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="7"></td>
                                </tr>
                                <tr>
                                    <form method="post" action="../Controladores/EventosControlador.php?añadir=1#1">
                                        <td><input name="nombre" type="text" style="width:250px;height:30px" required=""/></td>
                                        <td><input name="fechaI" type="date" style="width:160px;height:30px" required=""/></td>
                                        <td><input name="fechaF" type="date" style="width:160px;height:30px" required=""/></td>
                                        <td><input name="porciento" type="number" step="0.01" style="width:60px;height:30px" required="" min="0.01"/></td>
                                        <td><input name="banner" type="text" style="width:400px;height:30px" required=""/></td>
                                        <td>
                                            <center><button type="submit" class="btn ">Añadir</button></center>
                                        </td>
                                        <td></td>
                                    </form>
                                </tr>
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