<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../Tema/CSS.php"?>
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Title  -->
        <title>Serie 5 Berlina - AutoCon</title>
        <!-- Favicon  -->
    </head>
    <body>
        <?php  include "../Tema/Menu.php"  ;
            ?>
        <!-- ***** Header Area End ***** -->
        <!-- ********** Hero Area Start ********** -->
        <div class="hero-area height-600 bg-img background-overlay" style="background-image: url(../img/blog-img/berlina.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="single-blog-title text-center">
                            <!-- Catagory -->
                            <?php 
                                $ModeloVeh= 'Nuevo BMW Serie 5 Berlina'  ;
                                $_SESSION['ModeloVeh'] = $ModeloVeh ;
                                if ($_SESSION['listaVeh'][$ModeloVeh]['rebaja']>0){ ?>
                            <div class="post-cta"><a><?php  echo $_SESSION['listaVeh'][$ModeloVeh]['rebaja']  ?>% Descuento</a></div>
                            <?php ;}  ?>
                            <h3>Nuevo BMW Serie 5 Berlina</h3>
                            <br>
                            <h5 style="color: white">Imponente en cualquier situación</h5>
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
                                <h6>Su declaración de intenciones: marcar la pauta. El BMW Serie 5 es la berlina ejecutiva moderna por excelencia. Gracias a su dinamismo y elegancia, responde a las expectativas relativas a un vehículo de su categoría hoy en día: dinamismo y máximo placer de conducir con tecnología avanzada.</h6>
                                <h6>Potentes motores BMW TwinPower Turbo, construcción ligera inteligente, dirección activa integral para una maniobrabilidad y una agilidad de primera categoría, así como el modo adaptativo: el BMW Serie 5 está pensado para ofrecer la experiencia de conducción más dinámica. Este vehículo va siempre por delante de la competencia.</h6>
                                <blockquote class="mb-30">
                                    <h6>BMW 520d: </h6>
                                    <h6>Consumo Promedio (combinado) según WLTP1: 5,4–6,1 l/100km</h6>
                                    <h6>Emisiones CO2 (combinado) según WLTP1: 142 - 160 g/km</h6>
                                    <h6>Emisiones CO2 según NEDC2: 115 - 119 g/km</h6>
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
                                <h5 class="title">Perfecto para los grandes negocios</h5>
                                <div class="widget-content">
                                    <p>Para triunfar en cualquier situación, hay que contar con un equipo de primera categoría. Los numerosos servicios digitales y de asistencia al conductor del BMW Serie 5 garantizan la mejor conectividad posible con el mundo exterior, mientras su manejo intuitivo permite la máxima comodidad, seguridad y productividad.</p>
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
                                            <img src="../img/blog-img/be1.PNG" alt="">
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
                                            <img src="../img/blog-img/be2.PNG" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5 class="mb-0">Punto de acceso WiFi</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="../img/blog-img/be3.PNG" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5 class="mb-0">Aparcamiento remoto</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="../img/blog-img/be4.PNG" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5 class="mb-0">Park Assistant Plus con 3D</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="../img/blog-img/be5.PNG" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5 class="mb-0">Llamada en caso de accidente</h5>
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