<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php" ?>
  <link rel="stylesheet" href="../css/views/vehiclesViews.css">
  <title>AutoCon - Serie 6GT</title>
</head>

<body>
  <?php include "../Tema/Menu.php" ?>

  <div class="individualVehicle">
    <!-- ********** HERO ********** -->
    <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/gt.jpg)">
      <div class="container h-100">
        <div class="row h-100 align-items-end justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="single-blog-title text-center pb-5">
              <?php
              $vehicleModel = 'BMW Serie 6 Gran Turismo';
              $_SESSION['ModeloVeh'] = $vehicleModel;
              if ($_SESSION['listaVeh'][$vehicleModel]['rebaja'] > 0) { ?>
                <div class="post-cta p-0 m-0"><a>
                    <?php echo $_SESSION['listaVeh'][$vehicleModel]['rebaja'] ?>%
                    Descuento
                  </a></div>
                <?php ;
              } ?>
              <h3>BMW Serie 6 Gran Turismo</h3>
              <h5>Autosuficiente para conductores solitarios</h5>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ********** BODY  ********** -->
    <div class="main-content-wrapper">
      <div class="container">
        <div class="row justify-content-center">
          <!-- ============= Post Content Area ============= -->
          <div class="col-12 col-lg-8">
            <div class="single-blog-content">
              <!-- Post Content -->
              <div class="post-content">
                <h6>El BMW Serie 6 Gran Turismo impresiona con su estilo único y su interior exclusivo y de
                  amplias proporciones. Sus excelentes características de conducción garantizan un
                  dinamismo deportivo y el máximo confort de marcha en los viajes largos. Este vehículo es
                  una declaración de intenciones en cuanto a diseño moderno y placer de conducir en el
                  viaje.
                </h6>

                <blockquote>
                  <h6>BMW 640i xDrive Gran Turismo: </h6>
                  <h6>Consumo de combustible en l/100 km (promedio): 8,1–8,2</h6>
                  <h6>Emisiones de CO2 en g/km (promedio): 184–187</h6>
                </blockquote>

                <div class="post-a-comment-area2">
                  <!-- Contact Form -->
                  <form action="../Controladores/VehiculoCompra.php?comprar=1" method="post">
                    <div class="row">
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn world-btn">Reservalo en tienda por
                        <?php echo $_SESSION['listaVeh'][$vehicleModel]['precioRebajado'] ?>
                        €
                      </button>
                    </div>
                  </form>
                  <!-- Contact Form -->
                  <form action="../Controladores/VehiculoCompra.php?alquilar=1" method="post">
                    <div class="row">
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn world-btn">O Alquilalo por
                        <?php echo $_SESSION['listaVeh'][$vehicleModel]['precioAlquiler'] ?> € al
                        mes
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- ========== Sidebar Area ========== -->
          <div class="col-12 col-md-8 col-lg-4">
            <div class="post-sidebar-area">
              <!-- Widget Area -->
              <div class="sidebar-widget-area">
                <h5 class="title">El BMW Serie 6 Gran Turismo está dirigido a clientes exigentes que valoran
                  la individualidad, la estética y el confort de marcha excepcional.</h5>
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

  <?php include "../Tema/Scripts.php" ?>
</body>

</html>