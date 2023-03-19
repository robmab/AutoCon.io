<!DOCTYPE html>
<html lang="en">
    <head>
        <link href='../Tema/Tabla/tabla.css' rel='stylesheet' type='text/css'>
        <link href='../Tema/Button/on.css' rel='stylesheet' type='text/css'>
        <?php include "../Tema/CSS.php"  ;
            if(isset($_SESSION['chekon'])){
               unset($_SESSION['chekon']);    
            }else{
               header("Location:../Controladores/ProveedoresControlador.php");
            };
             if (isset($_SESSION['rol'])){

                    if($_SESSION['rol']!='Admin'){
                        header("Location:Index.php");   
                    }
            }else{    
              header("Location:Index.php");
            };?>
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Title  -->
        <title>Proveedores - AutoCon</title>
        <!-- Favicon  -->
        <link rel="stylesheet" href="../Tema/Button/Cancelar.css">
    </head>
    <body>
        <?php  include "../Tema/Menu.php"  ;
            //Evita pasar antes por la vista
            ?>
        <!-- ***** Header Area End ***** -->
        <!-- ********** Hero Area Start ********** -->
        <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(../img/blog-img/proveedor.jpg);"></div>
        <!-- ********** Hero Area End ********** -->
        <?php  
            ?>
        <section class="contact-area section-padding-100">
            <div class="container">
                <div class="row justify-content-center" id="1">
                    <div class="col-12 col-md-10 col-lg-8">
                        <center>  <?php   if (isset($_SESSION['mensajeBD'])){
                            echo  " <h5 style='color:red;'> ". $_SESSION['mensajeBD']."</h5> "  ;
                            unset($_SESSION['mensajeBD']);
                            }   ;  ?>
                        </center>
                    </div>
                    <!-- Contact Form Area -->
                    <div  class="contact-form">
                        <center>
                            <h3>Proveedores disponibles</h3>
                        </center>
                        <br><br>
                        <!-- Datos -->
                        <table >
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Número</th>
                                    <th>Correo</th>
                                    <th>Disponibilidad</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  foreach ($_SESSION['datosProveedores'] as $nombre => $num){  ?> 
                                <tr >
                                    <td ><img  src="../img/proveedores/<?php echo $num['logo']  ?>"></td>
                                    <td><?php echo $nombre ?></td>
                                    <td><?php echo $num['numero']?></td>
                                    <td><?php echo $num['correo']?></td>
                                    <td > <label class="switch">
                                        <input  class="switch-input" type="checkbox" <?php if($num['disponibilidad']=='Si'){  ?>checked <?php } ?> />
                                        <span onclick="window.location='../Controladores/ProveedoresControlador.php?proveedor=<?php
                                            echo $nombre  ?>&cambiar=<?php if($num['disponibilidad']=='Si'){  ?>1<?php }else{
                                            ?>2<?php  } ?>#1'"  class="switch-label" data-on="Si" data-off="No"></span>
                                        <span onclick="window.location='../Controladores/ProveedoresControlador.php?proveedor=<?php 
                                            echo $nombre  ?>&cambiar=<?php if($num['disponibilidad']=='Si'){  ?>1<?php }else{
                                            ?>2<?php  } ?>#1'"  class="switch-handle"></span> 
                                        </label>
                                    </td>
                                </tr>
                                <?php  } ?>                  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <?php include "../Tema/Scripts.php"  ?>
    </body>
</html>