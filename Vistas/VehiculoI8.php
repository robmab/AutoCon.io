<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../Tema/CSS.php"?>
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>I8 - AutoCon</title>

    <!-- Favicon  -->
   

</head>

<body>
   <?php  include "../Tema/Menu.php"  ;
       

   ?>
    <!-- ***** Header Area End ***** -->

    <!-- ********** Hero Area Start ********** -->
        <div class="hero-area height-600 bg-img background-overlay" style="background-image: url(../img/blog-img/i8.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="single-blog-title text-center">
                        <!-- Catagory -->
                        
                      <?php 
                      $ModeloVeh= 'Nuevo BMW i8 Coupé'  ;
                      $_SESSION['ModeloVeh'] = $ModeloVeh ;
                      if ($_SESSION['listaVeh'][$ModeloVeh]['rebaja']>0){ ?>
                        <div class="post-cta"><a><?php  echo $_SESSION['listaVeh'][$ModeloVeh]['rebaja']  ?>% Descuento</a></div> <?php ;}  ?>
                        <h3>Nuevo BMW i8 Coupé</h3>
                        <br><h5 style="color: white">Visión de una nueva generación.</h5>
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
                            <h6>El futuro ya está aquí: nuevo BMW i8 Coupé. Energético, fascinante y listo para una movilidad redefinida; para disfrutar al máximo del placer de conducir en la carretera.</h6>
                            <h6>No solo la adrenalina se dispara al instante con su icónico diseño, sino también el velocímetro con el innovador motor de este híbrido enchufable que genera 374 CV y 570 Nm. Además, el nuevo BMW i8 Coupé acelera de 0 a 100 km en tan solo 4,4 segundos. La vía más rápida hacia la nueva era.</h6>
                            <blockquote class="mb-30">
                                <h6>BMW i8 Coupé: </h6>

                                <h6>Consumo Promedio (combinado) según WLTP1: 2,1-2,2 l/100km</h6>

                                <h6>Emisiones CO2 (combinado) según WLTP1: 48-49 g/km</h6>

<h6>Emisiones CO2 según NEDC2: 42 - 42 g/km</h6>
<h6>Autonomía eléctrica en km (promedio): 52 - 53 km</h6>
                              
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
                            <h5 class="title">Un vistazo al futuro</h5>
                            <div class="widget-content">
                                <p>El BMW i8 Coupé es futurista hasta en el mínimo detalle. Su diseño transmite máximo dinamismo. El detalle más llamativo: las originales puertas de ala de gaviota, hechas de fibra de carbono ligero, que permiten una cómoda apertura. El atlético frontal sigue mostrando el carácter único del vehículo y exhibe con orgullo la parrilla doble BMW, flanqueada por faros LED integrales y el sistema Air Curtain rediseñado.</p>
                            </div>
                        </div>
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">«El BMW i8 Coupé ya es el deportivo híbrido más vendido del mundo, y creo que también tendremos mucho éxito con este vehículo».</h5>
                            <div class="widget-content"><p>KLAUS FRÖHLICH, MIEMBRO DEL CONSEJO DE ADMINISTRACIÓN DE BMW AG</p></div>

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