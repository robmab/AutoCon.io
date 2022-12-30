<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../Tema/CSS.php"?>
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Login - AutoCon</title>

    <!-- Favicon  -->
   

</head>

<body>
   <?php  include "../Tema/Menu.php"  ?>
    <!-- ***** Header Area End ***** -->

    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(../img/blog-img/login.jpg);"></div>
    <!-- ********** Hero Area End ********** -->

    <section class="contact-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                
            
                 
                      
                <!-- Contact Form Area -->
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="contact-form">
              
                 
                        <h5>Logeate</h5>
                        <!-- Contact Form -->
                        <form action="../Controladores/LoginControlador.php<?php  if(isset($_SESSION['mensajeBD']))   { if ($_SESSION['mensajeBD']=='Tienes que registrarte antes de poder comprar o alquilar un vehículo.'){
                            echo "?compraV=1" ;
                            
                        };} ;   ?>" method="post">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text" name="email" id="email" required autocomplete = "new-password" value="">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Nombre de usuario o dirección</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="password" name="pass" id="pass" required autocomplete = "new-password" value="">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Contraseña</label>
                                    </div>
                                    
                                   
                                </div>
                                <center> <a href="RegistroVista.php"><p style='color:blue'>¡Regístrate si aún no lo estás!</p></a>   </center>
                                </div>
                            
                                                                       <center>  <?php   if (isset($_SESSION['mensajeBD'])){
                    
                    echo  " <p style='color:red;'> ". $_SESSION['mensajeBD']."</p> "  ;
                    unset($_SESSION['mensajeBD']);
                    }   ;  ?>
                       </center>  
                            <div class="col-12">
                                    <center><button type="submit" class="btn world-btn">Entrar</button></center>
                                </div>
                                
           
                       </div>   
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps: If you want to google map, just uncomment below codes -->
    <!--
    <div class="map-area">
        <div id="googleMap" class="googleMap"></div>
    </div>
    -->

 <?php include "../Tema/Scripts.php"  ?>

</body>

</html>