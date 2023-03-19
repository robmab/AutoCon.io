<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../Tema/CSS.php"?>
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Title  -->
        <title>Serie 6GT - AutoCon</title>
        <!-- Favicon  -->
    </head>
    <body>
        <?php  include "../Tema/Menu.php"  ;
            ?>
        <!-- ***** Header Area End ***** -->
        <!-- ********** Hero Area Start ********** -->
        <div class="hero-area height-600 bg-img background-overlay" style="background-image: url(../img/blog-img/gt.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="single-blog-title text-center">
                            <!-- Catagory -->
                            <?php 
                                $ModeloVeh= 'BMW Serie 6 Gran Turismo'  ;
                                $_SESSION['ModeloVeh'] = $ModeloVeh ;
                                if ($_SESSION['listaVeh'][$ModeloVeh]['rebaja']>0){ ?>
                            <div class="post-cta"><a><?php  echo $_SESSION['listaVeh'][$ModeloVeh]['rebaja']  ?>% Descuento</a></div>
                            <?php ;}  ?>
                            <h3>BMW Serie 6 Gran Turismo</h3>
                            <br>
                            <h5 style="color: white">Autosuficiente para conductores solitarios</h5>
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
                                <h6>El BMW Serie 6 Gran Turismo impresiona con su estilo único y su interior exclusivo y de amplias proporciones. Sus excelentes características de conducción garantizan un dinamismo deportivo y el máximo confort de marcha en los viajes largos. Este vehículo es una declaración de intenciones en cuanto a diseño moderno y placer de conducir en el viaje.</h6>
                                <blockquote class="mb-30">
                                    <h6>BMW 640i xDrive Gran Turismo: </h6>
                                    <h6>Consumo de combustible en l/100 km (promedio): 8,1–8,2</h6>
                                    <h6>Emisiones de CO2 en g/km (promedio): 184–187</h6>
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
                                <h5 class="title">El BMW Serie 6 Gran Turismo está dirigido a clientes exigentes que valoran la individualidad, la estética y el confort de marcha excepcional.</h5>
                                <div class="widget-content">
                                    <p>Adrian van Hooydonk, vicepresidente senior de Diseño de BMW Group</p>
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
                                            <img src="../img/blog-img/gt1.PNG" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5 class="mb-0">Control por gestos BMW</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="../img/blog-img/gt2.PNG" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5 class="mb-0">Control por voz</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="../img/blog-img/gt3.PNG" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5 class="mb-0">Driving Assistant Plus</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="../img/blog-img/gt4.PNG" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5 class="mb-0">Preparación para Apple CarPlay</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="../img/blog-img/gt5.PNG" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5 class="mb-0">Asistente Personal</h5>
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