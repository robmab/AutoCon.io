<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../Tema/CSS.php"?>
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Title  -->
        <title>Serie 2GT - AutoCon</title>
        <!-- Favicon  -->
    </head>
    <body>
        <?php  include "../Tema/Menu.php"  ;
            ?>
        <!-- ***** Header Area End ***** -->
        <!-- ********** Hero Area Start ********** -->
        <div class="hero-area height-600 bg-img background-overlay" style="background-image: url(../img/blog-img/grantourer.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="single-blog-title text-center">
                            <!-- Catagory -->
                            <?php 
                                $ModeloVeh= 'BMW Serie 2 Gran Tourer'  ;
                                $_SESSION['ModeloVeh'] = $ModeloVeh ;
                                if ($_SESSION['listaVeh'][$ModeloVeh]['rebaja']>0){ ?>
                            <div class="post-cta"><a><?php  echo $_SESSION['listaVeh'][$ModeloVeh]['rebaja']  ?>% Descuento</a></div>
                            <?php ;}  ?>
                            <h3>BMW Serie 2 Gran Tourer</h3>
                            <br>
                            <h5 style="color: white">Pasión por la gran ciudad</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ********** Hero Area End ********** -->
        <div class="main-content-wrapper section-padding-100">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- ============= Post Content Area ============= -->
                    <div class="col-12 col-lg-8">
                        <div class="single-blog-content mb-100">
                            <!-- Post Meta -->
                            <!-- Post Content -->
                            <div class="post-content">
                                <h6>Saca el máximo partido a la vida con el BMW Serie 2 Gran Tourer. Ofrece abundante espacio, especialmente útil en la ciudad,y Gracias a los potentes motores BMW TwinPower Turbo de 3 o 4 cilindros, también ofrece siempre un rendimiento decididamente deportivo. Para disfrutar del placer de conducir más allá de los límites de la ciudad.</h6>
                                <blockquote class="mb-30">
                                    <h6>BMW 220i: </h6>
                                    <h6>Consumo Promedio (combinado) según WLTP1: 6,6–8,0 l/100km</h6>
                                    <h6>Emisiones CO2 (combinado) según WLTP1: 154 - 181 g/km</h6>
                                    <h6>Emisiones CO2 según NEDC2: 128 - 134 g/km</h6>
                                </blockquote>
                                <!-- Post Tags -->
                                <!-- Post Meta -->
                                <div class="post-a-comment-area mt-70">
                                    <!-- Contact Form -->
                                    <form action="../Controladores/VehiculoCompra.php?comprar=1" method="post">
                                        <div class="row">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn world-btn">Reservalo en tienda por <?php echo $_SESSION['listaVeh'][$ModeloVeh]['precioRebajado']  ?>  €</button>
                                        </div>
                                    </form>
                                    <!-- Contact Form -->
                                    <form action="../Controladores/VehiculoCompra.php?alquilar=1" method="post">
                                        <div class="row">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn world-btn">O Alquilalo por <?php echo $_SESSION['listaVeh'][$ModeloVeh]['precioAlquiler']  ?>  € al mes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ========== Sidebar Area ========== -->
                    <div class="col-12 col-md-8 col-lg-4">
                        <div class="post-sidebar-area mb-100">
                            <!-- Widget Area -->
                            <div class="sidebar-widget-area">
                                <h5 class="title">En la ciudad no se habla de otra cosa</h5>
                                <div class="widget-content">
                                    <p>Un verdadero cosmopolita: el  BMW Serie 2 Gran Tourer es dinámico, seguro de sí mismo, versátil y moderno. Las carreteras se convierten en avenidas que recorre con aire de deportividad. Este efecto se consigue gracias al carismático frontal con una amplia parrilla doble y tomas de aire continuas, junto con una gran distancia entre ejes y voladizos cortos. Combinado con puertas de gran tamaño, el techo elevado promete espacio y confort. Un vehículo con una presencia segura que sorprende a primera vista.</p>
                                </div>
                            </div>
                            <!-- Widget Area -->
                            <div class="sidebar-widget-area">
                                <h5 class="title">Características</h5>
                                <div class="widget-content">
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="../img/blog-img/t1.PNG" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5 class="mb-0">Notificación de hora de salida</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="../img/blog-img/t2.PNG" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5 class="mb-0">Telefonía con carga inalámbrica</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="../img/blog-img/t3.PNG" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5 class="mb-0">BMW Head-Up Display</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="../img/blog-img/t4.PNG" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5 class="mb-0">Control de crucero activo</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="../img/blog-img/t5.PNG" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5 class="mb-0">Navegación puerta a puerta</h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Widget Area -->
                            <!-- Widget Area -->
                        </div>
                    </div>
                </div>
                <!-- ============== Related Post ============== -->
                <div class="row">
                    <div class="col-12 col-lg-8">
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Google Maps: If you want to google map, just uncomment below codes -->
        <!--
            <div class="map-area">
                <div id="googleMap" class="googleMap"></div>
            </div>
            -->
        <?php include "../Tema/Scripts.php"  ?>
    </body>
</html>