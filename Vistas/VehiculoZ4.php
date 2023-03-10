<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../Tema/CSS.php"?>
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Z4 - AutoCon</title>

    <!-- Favicon  -->
   

</head>

<body>
   <?php  include "../Tema/Menu.php"  ;
       

   ?>
    <!-- ***** Header Area End ***** -->

    <!-- ********** Hero Area Start ********** -->
        <div class="hero-area height-600 bg-img background-overlay" style="background-image: url(../img/blog-img/z4.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="single-blog-title text-center">
                        <!-- Catagory -->
                        
                      <?php 
                      $ModeloVeh= 'Nuevo BMW Z4'  ;
                      $_SESSION['ModeloVeh'] = $ModeloVeh ;
                      if ($_SESSION['listaVeh'][$ModeloVeh]['rebaja']>0){ ?>
                        <div class="post-cta"><a><?php  echo $_SESSION['listaVeh'][$ModeloVeh]['rebaja']  ?>% Descuento</a></div> <?php ;}  ?>
                        <h3>Nuevo BMW Z4</h3>
                        <br><h5 style="color: white">Muéstrate</h5>
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
                            <h6>Cuando el techo de este descapotable se abre, ya no hay límites para el placer de conducir en el nuevo BMW Z4. Un roadster que no podría ser mejor: abierto, deportivo y sin concesiones. Un nuevo biplaza con un elevado dinamismo de conducción y un diseño avanzado, cuyo único objetivo es la libertad entre la carretera y el cielo abierto.</h6>
                            <h6>Los 250 kW (340 CV) del motor de gasolina de 6 cilindros BMW M TwinPower Turbo aceleran el BMW Z4 Roadster de 0 a 100 km/h en 4,5 segundos cargados de adrenalina. No hay ninguna otra forma más deportiva de conseguir la sensación de libertad perfecta.</h6>
                            <blockquote class="mb-30">
                                <h6>BMW Z4 Roadster M40i: </h6>

                                <h6>Consumo Promedio (combinado) según WLTP1: 8,2–8,5 l/100km</h6>

                                <h6>Emisiones CO2 (combinado) según WLTP1: 186 - 194 g/km</h6>

                                <h6>Emisiones CO2 según NEDC2: 168 - 168 g/km</h6>
                              
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
                            <h5 class="title">Exhibe tu estilo con este Cabrio</h5>
                            <div class="widget-content">
                                <p>Un placer de conducir a cielo abierto que te sorprenderá aún más con cada detalle. El exterior muestra el estilo individual del BMW Z4 Roadster en su forma más pura: clara, moderna y emocional.</p>
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
                                        <img src="../img/blog-img/z41.PNG" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="headline">
                                            <h5 class="mb-0">Shadow Line de brillo intenso BMW Individual</h5>
                                        </a>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="../img/blog-img/z42.PNG" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="headline">
                                            <h5 class="mb-0">Luz ambiente</h5>
                                        </a>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="../img/blog-img/z43.PNG" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="headline">
                                            <h5 class="mb-0">Cambio deportivo Steptronic</h5>
                                        </a>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="../img/blog-img/z44.PNG" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="headline">
                                            <h5 class="mb-0">Motor de gasolina de 6 cilindros BMW TwinPower Turbo</h5>
                                        </a>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="../img/blog-img/z45.PNG" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="headline">
                                            <h5 class="mb-0">BMW Intelligent Personal Assistant</h5>
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