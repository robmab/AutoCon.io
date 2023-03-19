<!DOCTYPE html>
<html lang="en">
    <head>
        <link href='../Tema/Tabla/tabla.css' rel='stylesheet' type='text/css'>
        <?php include "../Tema/CSS.php"  ;
            if(isset($_SESSION['chekon'])){
               unset($_SESSION['chekon']);
               
            }else{
               header("Location:../Controladores/UsuariosControlador.php");
            }
             if (isset($_SESSION['rol'])){
                    if($_SESSION['rol']!='Admin'){
                        
                        header("Location:Index.php"); 
                    }
            }else{
                    
              header("Location:Index.php");
 
            };?>
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Title  -->
        <title>Usuarios - AutoCon</title>
        <!-- Favicon  -->
        <link rel="stylesheet" href="../Tema/Button/Cancelar.css">
    </head>
    <body>
        <?php  include "../Tema/Menu.php"  ;
            //Evita pasar antes por la vista
            ?>
        <!-- ***** Header Area End ***** -->
        <!-- ********** Hero Area Start ********** -->
        <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(../img/blog-img/usuarios.jpg);"></div>
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
                    <div class="contact-form">
                        <center>
                            <h3>Usuarios Registrados</h3>
                        </center>
                        <br><br>
                        <!-- Datos -->
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>DNI</th>
                                    <th>Nombre de Usuario</th>
                                    <th>Correo</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Número de móvil</th>
                                    <th>Provincia</th>
                                    <th>Población</th>
                                    <th>Código postal</th>
                                    <th>Domicilio</th>
                                    <th>Rol</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  foreach ($_SESSION['datosUsuarios'] as $nombreUsuario => $num){  ?> 
                                <tr>
                                    <td><?php echo $num['nombre']?></td>
                                    <td><?php echo $num['apellidos']?></td>
                                    <td><?php echo $num['nif']?></td>
                                    <td><?php echo $nombreUsuario?></td>
                                    <td><?php echo $num['correo']?></td>
                                    <td><?php echo $num['fechaNacimiento']?></td>
                                    <td><?php echo $num['numeroMovil']?></td>
                                    <td><?php echo $num['provincia']?></td>
                                    <td><?php echo $num['población']?></td>
                                    <td><?php echo $num['codigoPostal']?></td>
                                    <td><?php echo $num['domicilio']?></td>
                                    <td><?php echo $num['rol']?></td>
                                    <td>
                                        <?php if($num['rol'] == 'Usuario'){  ?> 
                                        <a href="../Controladores/UsuariosControlador.php?nU=<?php echo $nombreUsuario  ?>&adm=1#1" style="color: #E2B842">Cambiar a Administrador</a><?php }else{  ?>
                                        <a href="../Controladores/UsuariosControlador.php?nU=<?php echo $nombreUsuario  ?>&user=1#1" style="color: #E2B842">Cambiar a Usuario</a> <?php  } ?>
                                    </td>
                                    <td><a href="../Controladores/UsuariosControlador.php?nU=<?php echo $nombreUsuario  ?>&eliminar=1#1" style="color:red">Eliminar</a></td>
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