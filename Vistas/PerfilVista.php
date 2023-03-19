<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include "../Tema/CSS.php";
        if (isset($_SESSION["checkon"])) {
            unset($_SESSION["checkon"]);
        } else {
            header("Location:../Controladores/PerfilControlador.php");
        }
        ?>
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Title  -->
        <title>Perfil - AutoCon</title>
        <!-- Favicon  -->
    </head>
    <body>
        <?php include "../Tema/Menu.php";
//Evita pasar antes por la vista
?>
        <!-- ***** Header Area End ***** -->
        <!-- ********** Hero Area Start ********** -->
        <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(../img/blog-img/perfil.jpg);"></div>
        <!-- ********** Hero Area End ********** -->
        <?php
        //Sección editar//
        $datosUsu = $_SESSION["datosUsu"];

        if (isset($_SESSION["datosTar"])) {
            $datosTar = $_SESSION["datosTar"];
        }

        if (isset($_REQUEST["editar"])) { ?>
        <section class="contact-area section-padding-100">
            <div class="container">
                <center>
                    <h1>Editar datos personales</h1>
                    <br>
                </center>
                <div class="row justify-content-center">
                    <!-- Contact Form Area -->
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="contact-form">
                            <center>
                                <i>
                                    <p>Los datos en blanco no serán modificados</p>
                                </i>
                            </center>
                            <br>
                            <!-- Datos -->
                            <form action="../Controladores/ValidarNumero.php?edicion=1#1" method="post" onsubmit="return dobValidate('dn')">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="nombreUs" id="nombreUs"  autocomplete="off" value="<?php echo $datosUsu[
                                                "nombreUsuario"
                                            ]; ?>">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Nombre de Usuario</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <p style="color: blue"  ><font size="2px">  Correo </font></p>
                                        <div class="group">
                                            <input type="email" name="email" id="email"  autocomplete="off" value="<?php echo $datosUsu[
                                                "correo"
                                            ]; ?>">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="nombre" id="nombre"  autocomplete="off" value="<?php echo $datosUsu[
                                                "nombre"
                                            ]; ?>">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Nombre</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="apellidos" id="apellidos"  autocomplete="off" value="<?php echo $datosUsu[
                                                "apellidos"
                                            ]; ?>">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Apellidos</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="group">
                                            <input type="text" name="direccion" id="direccion"  autocomplete="off" value="<?php echo $datosUsu[
                                                "domicilio"
                                            ]; ?>">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Dirección</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="nif" id="nif"  autocomplete="off" maxlength="9" minlength="9" value="<?php echo $datosUsu[
                                                "nif"
                                            ]; ?>">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>DNI </label>
                                        </div>
                                        <script>                                      
                                            function dobValidate(dni) {
                                            
                                             var dni = document.getElementById('nif').value;
                                                  numero = dni.substr(0,dni.length-1);
                                            let = dni.substr(dni.length-1,1);
                                            numero = numero % 23;
                                            letra='TRWAGMYFPDXBNJZSQVHLCKET';
                                            letra=letra.substring(numero,numero+1);
                                            if (letra!=let) {
                                            
                                             
                                             alert("Dni inválido");
                                             return false;
                                            
                                            
                                            } 
                                            
                                            }
                                            
                                            
                                            
                                        </script>  
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <p style="color: blue"  ><font size="2px">  Fecha de Nacimiento </font></p>
                                        <p><?php echo $datosUsu[
                                            "fechaNacimiento"
                                        ]; ?></p>
                                        <div class="group">
                                            <input type="date" name="fechaNac" id="fechaNac"  autocomplete="off">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="provincia" id="provincia"  autocomplete="off"  value="<?php echo $datosUsu[
                                                "provincia"
                                            ]; ?>">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Provincia </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="poblacion" id="poblacion"  autocomplete="off"  value="<?php echo $datosUsu[
                                                "poblacion"
                                            ]; ?>">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Población </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="codigoP" id="codigoP"  autocomplete="off"  value="<?php echo $datosUsu[
                                                "codigoPostal"
                                            ]; ?>">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Código Postal </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="text" name="movil" id="movil"  autocomplete="off"  value="<?php echo $datosUsu[
                                                "numeroMovil"
                                            ]; ?>">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Numero teléfono </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <b>
                                            <center><br></center>
                                        </b>
                                        <br>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="password" name="contraseñaActual" id="contraseñaActual" autocomplete="off">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Contraseña actual</label>
                                            <center>  <?php if (
                                                isset($_SESSION["errC"])
                                            ) {
                                                echo " <p style='color:red;'> " .
                                                    $_SESSION["errC"] .
                                                    "</p> ";
                                                unset($_SESSION["errC"]);
                                            } ?>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="password" name="contraseñaNueva" id="contraseñaNueva"  autocomplete="off">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Nueva contraseña</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="group">
                                            <input type="password" name="contraseñaNueva2" id="contraseñaNueva2"  oninput="check(this)" autocomplete="off">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Repite contraseña</label>
                                        </div>
                                    </div>
                                </div>
                                <script language='javascript' type='text/javascript'>
                                    function check(inpu) {
                                        if (inpu.value != document.getElementById('contraseñaNueva').value) {
                                            inpu.setCustomValidity('Las contraseñas no coinciden.');
                                        } else {
                                            
                                            inpu.setCustomValidity('');
                                        }
                                    }
                                </script>            
                                <center>  <?php if (
                                    isset($_SESSION["mensajeBD"])
                                ) {
                                    echo " <p style='color:red;'> " .
                                        $_SESSION["mensajeBD"] .
                                        "</p> ";
                                    unset($_SESSION["mensajeBD"]);
                                } ?>
                                </center>
                                <div class="col-12">
                                    <center><button type="submit" class="btn world-btn">Editar</button></center>
                                </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
            </div>
            </div>
        </section>
        <?php
            //____________________________________________________________

            //Vista de datos personales del Perfil.

            } else { ?>
        <section class="contact-area section-padding-100">
            <center>
                <h1>Datos personales</h1>
                <br>
            </center>
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Contact Form Area -->
                    <div class="col-12 col-md-10 col-lg-8" id="1">
                        <div class="contact-form">
                            <center>  <?php if (isset($_SESSION["mensajeBD"])) {
                                echo " <h6 style='color:red;'> " .
                                    $_SESSION["mensajeBD"] .
                                    "</h6> ";
                                unset($_SESSION["mensajeBD"]);
                            } ?>
                            </center>
                            <!-- Datos -->
                            <form action="../Controladores/PerfilControlador.php?editar=1" method="post">
                                <center>  <?php if (
                                    isset($_SESSION["mensajeConf"])
                                ) {
                                    echo "<p style='color:red;'>" .
                                        $_SESSION["mensajeConf"] .
                                        "</p> ";
                                    unset($_SESSION["mensajeConf"]);
                                } ?>
                                </center>
                                <center>
                                    <table>
                                        <tr >
                                            <td> <b> Nombre de Usuario:  </b> </td>
                                            <td> <?php echo $datosUsu[
                                                "nombreUsuario"
                                            ]; ?> </td>
                                        </tr>
                                        <tr >
                                            <td> <b> Correo:             </b> </td>
                                            <td> <?php echo $datosUsu[
                                                "correo"
                                            ]; ?> </td>
                                        </tr>
                                        <tr >
                                            <td><b> Nombre:            </b> </td>
                                            <td> <?php echo $datosUsu[
                                                "nombre"
                                            ]; ?> </td>
                                        </tr>
                                        <tr >
                                            <td> <b> Apellidos:         </b> </td>
                                            <td> <?php echo $datosUsu[
                                                "apellidos"
                                            ]; ?> </td>
                                        </tr>
                                        <tr >
                                            <td> <b> Fecha de Nacimiento: </b>. </td>
                                            <td> <?php echo $datosUsu[
                                                "fechaNacimiento"
                                            ]; ?> </td>
                                        </tr>
                                        <tr >
                                            <td><b> DNI:                </b> </td>
                                            <td> <?php echo $datosUsu[
                                                "nif"
                                            ]; ?> </td>
                                        </tr>
                                        <tr >
                                            <td>    <b> Domicilio:          </b> </td>
                                            <td> <?php echo $datosUsu[
                                                "domicilio"
                                            ]; ?> </td>
                                        </tr>
                                        <tr >
                                            <td>    <b> Código Postal:          </b> </td>
                                            <td> <?php echo $datosUsu[
                                                "codigoPostal"
                                            ]; ?> </td>
                                        </tr>
                                        <tr >
                                            <td>    <b> Teléfono:          </b> </td>
                                            <td> <?php echo $datosUsu[
                                                "numeroMovil"
                                            ]; ?> </td>
                                        </tr>
                                        <tr >
                                            <td>    <b> Provincia:          </b> </td>
                                            <td> <?php echo $datosUsu[
                                                "provincia"
                                            ]; ?> </td>
                                        </tr>
                                        <tr >
                                            <td>    <b> Población:          </b> </td>
                                            <td> <?php echo $datosUsu[
                                                "poblacion"
                                            ]; ?> </td>
                                        </tr>
                                    </table>
                                </center>
                                <div class="col-12">
                                    <center><button type="submit" class="btn world-btn">Editar</button></center>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php // datos de tarjeta de existir, de no opcion de añadirla.

                    if (isset($_SESSION["tarjeta"])) {
                        unset($_SESSION["tarjeta"]); ?>
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="contact-form">
                            <center>  <?php if (isset($_SESSION["mensajeBD"])) {
                                echo " <p style='color:red;'> " .
                                    $_SESSION["mensajeBD"] .
                                    "</p> ";
                                unset($_SESSION["mensajeBD"]);
                            } ?>
                            </center>
                            <center>
                                <h5> 
                                    <?php if ($datosTar["tipo"] == "Visa") { ?>
                                    <img src="../img/core-img/visa.png" width="20%" height="20%">   <?php } else { ?>
                                    <img src="../img/core-img/mastercard.png" width="20%" height="20%">
                                    <?php } ?>
                                </h5>
                            </center>
                            <!-- Datos -->
                            <form action="../Controladores/FacturacionControlador.php?eliminar=1" method="post">
                                <center>  <?php if (
                                    isset($_SESSION["mensajeConf"])
                                ) {
                                    echo "<p style='color:red;'>" .
                                        $_SESSION["mensajeConf"] .
                                        "</p> ";
                                    unset($_SESSION["mensajeConf"]);
                                } ?>
                                </center>
                                <center>
                                    <table>
                                        <tr >
                                            <td> <b> Número:  </b> </td>
                                            <td>. <?php echo $datosTar[
                                                "numero1"
                                            ]; ?> - <?php echo $datosTar[
     "numero2"
 ]; ?> - <?php echo $datosTar["numero3"]; ?> - <?php echo $datosTar[
     "numero4"
 ]; ?> </td>
                                        </tr>
                                        <tr >
                                            <td> <b> Titular:             </b> </td>
                                            <td> <?php echo $datosTar[
                                                "titular"
                                            ]; ?> </td>
                                        </tr>
                                        <tr >
                                            <td><b> Fecha:            </b> </td>
                                            <td> <?php echo $datosTar[
                                                "fechaM"
                                            ]; ?> - <?php echo $datosTar[
     "fechaA"
 ]; ?> </td>
                                        </tr>
                                    </table>
                                </center>
                                <div class="col-12">
                                    <br>
                                    <center><button type="submit" class="btn world-btnrojo3">Eliminar método de pago</button></center>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    } else {
                        
                        //Botono para añadir datos de facturacion
                        ?>
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="contact-form">
                            <center>  <?php if (isset($_SESSION["mensajeBD"])) {
                                echo " <p style='color:red;'> " .
                                    $_SESSION["mensajeBD"] .
                                    "</p> ";
                                unset($_SESSION["mensajeBD"]);
                            } ?>
                            </center>
                            <center>
                                <h5><img src="../img/core-img/visa.png" width="20%" height="20%"><img src="../img/core-img/mastercard.png" width="20%" height="20%"></h5>
                            </center>
                            <!-- Datos -->
                            <form action="FacturacionVista.php" method="post">
                                <center>  <?php if (
                                    isset($_SESSION["mensajeConf"])
                                ) {
                                    echo "<p style='color:red;'>" .
                                        $_SESSION["mensajeConf"] .
                                        "</p> ";
                                    unset($_SESSION["mensajeConf"]);
                                } ?>
                                </center>
                                <center>
                                    <i>
                                        <p>Aún no tienes ningun método de pago</p>
                                    </i>
                                </center>
                                <div class="col-12">
                                    <center><button type="submit" class="btn world-btn">+ Añadir método de pago</button></center>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    } ?>
                </div>
            </div>
        </section>
        <?php }

//_______________________________________________________________________
?>
        <!-- Google Maps: If you want to google map, just uncomment below codes -->
        <!--    
            <div class="map-area">
                <div id="googleMap" class="googleMap"></div>
            </div>
            -->
        <?php include "../Tema/Scripts.php"; ?>
    </body>
</html>