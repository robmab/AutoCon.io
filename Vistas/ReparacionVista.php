<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../Tema/CSS.php"?>
        <link href='../Tema/Button/CSS.css' rel='stylesheet' type='text/css'>
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Title  -->
        <title>Reparación - AutoCon</title>
        <!-- Favicon  -->
    </head>
    <body>
        <?php  include "../Tema/Menu.php"  ;
            $listaComponentes= $_SESSION['listaComponentes'];
            ?>
        <!-- ***** Header Area End ***** -->
        <!-- ********** Hero Area Start ********** -->
        <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(../img/blog-img/reparacion.png);"></div>
        <!-- ********** Hero Area End ********** -->
        <div class="world-catagory-area mt-50" id="1">
        <div class="container">
            <center>
                <h1>Reparación</h1>
                <br>
            </center>
            <div class="row justify-content-center">
                <!-- Contact Form Area -->
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="contact-form">
                        <center>  <?php   if (isset($_SESSION['mensajeBD'])){
                            ?> <br><br>  <?php
                            echo  " <h5 style='color:red;'> ". $_SESSION['mensajeBD'].""  ;
                            unset($_SESSION['mensajeBD']);
                            }   ;  ?></b> </center>
                        <!-- ========== Single Blog Post ========== -->     
                        <div class="col-12 ">
                            <!-- Single Blog Post -->
                            <div  class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.1s">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="../img/reparacion/1.jpg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <br>
                                    <div class="container">
                                        <a href="../Controladores/ReparacionControlador.php?valor=sustituir#1" class="button turquoise"><span>➣</span>Sustituir piezas defectuosas</a>
                                    </div>
                                    <!-- Post Meta -->
                                </div>
                            </div>
                            <!-- Single Blog Post -->
                            <div id="2" class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="../img/reparacion/2.jpg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <br>
                                    <div class="container">
                                        <a href="../Controladores/ReparacionControlador.php?valor=neumatico#1" class="button turquoise"><span>➣</span>Cambio de neumáticos</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Blog Post -->
                            <div id="3" class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.3s">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="../img/reparacion/3.jpg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <br>
                                    <div class="container">
                                        <a href="../Controladores/ReparacionControlador.php?valor=llanta#1" class="button turquoise"><span>➣</span>Revisión de llantas</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Blog Post -->
                            <div id="4" class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.3s">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="../img/reparacion/4.jpg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <br>
                                    <div class="container">
                                        <a href="../Controladores/ReparacionControlador.php?valor=aceite#1" class="button turquoise"><span>➣</span>Aceite y Líquidos</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Blog Post -->
                            <div id="5" class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.3s">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="../img/reparacion/5.jpg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <br>
                                    <div class="container">
                                        <a href="../Controladores/ReparacionControlador.php?valor=pintura#1" class="button turquoise"><span>➣</span>Renovación de pinturas y arañazos</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Blog Post -->
                            <div id="6" class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.3s">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="../img/reparacion/7.jpg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <br>
                                    <div class="container">
                                        <a href="../Controladores/ReparacionControlador.php?valor=carroceria#1" class="button turquoise"><span>➣</span>Reparación carrocería</a>
                                    </div>
                                </div>
                            </div>
                            <div id="7" class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.3s">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="../img/reparacion/6.jpg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <br>
                                    <div class="container">
                                        <a href="../Controladores/ReparacionControlador.php?valor=bateria#1" class="button turquoise"><span>➣</span>Baterías y arranque</a>
                                    </div>
                                </div>
                            </div>
                            <div id="8" class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.3s">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="../img/reparacion/8.jpg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <br>
                                    <div class="container">
                                        <a href="../Controladores/ReparacionControlador.php?valor=bombilla#1" class="button turquoise"><span>➣</span>Bombillas</a>
                                    </div>
                                </div>
                            </div>
                            <div id="9" class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.3s">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="../img/reparacion/9.jpg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <br>
                                    <div class="container">
                                        <a href="../Controladores/ReparacionControlador.php?valor=parabrisas#1" class="button turquoise"><span>➣</span>Limpia parabrisas y escobillas</a>
                                    </div>
                                </div>
                            </div>
                            <div id="10" class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.3s">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="../img/reparacion/10.jpg" alt="">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <br>
                                    <div class="container">
                                        <a href="../Controladores/ReparacionControlador.php?valor=limpieza#1" class="button turquoise"><span>➣</span>Limpieza</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>     <br>   <br>    <br>     
        <!-- Google Maps: If you want to google map, just uncomment below codes -->
        <!--
            <div class="map-area">
                <div id="googleMap" class="googleMap"></div>
            </div>
            -->
        <?php include "../Tema/Scripts.php"  ?>
    </body>
</html>