<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php" ?>
  <link rel="stylesheet" href="../css/views/vehiclesViews.css">
  <title>AutoCon - Serie 2C</title>
</head>

<body>
  <?php include "../Tema/Menu.php" ?>

  <div class="individualVehicle">
    <!-- ********** HERO ********** -->
    <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/3w.jpg)">
      <div class="container h-100">
        <div class="row h-100 align-items-end justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="single-blog-title text-center pb-5">
              <?php
              $vehicleModel = 'BMW Serie 2 Cabrio';
              $_SESSION['ModeloVeh'] = $vehicleModel;
              if ($_SESSION['listaVeh'][$vehicleModel]['rebaja'] > 0) { ?>
                <div class="post-cta p-0 m-0"><a>
                    <?php echo $_SESSION['listaVeh'][$vehicleModel]['rebaja'] ?>%
                    Descuento
                  </a></div>
                <?php ;
              } ?>
              <h3>BMW Serie 2 Cabrio</h3>
              <h5>Definición de libertad</h5>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ********** BODY ********** -->
    <div class="main-content-wrapper">
      <div class="container">
        <div class="row justify-content-center">
          <!-- ============= Post Content Area ============= -->
          <div class="col-12 col-lg-8">
            <div class="single-blog-content">
              <!-- Post Meta -->
              <!-- Post Content -->
              <div class="post-content">
                <h6>Un aspecto atractivo y un carácter libre. El BMW Serie 2 Cabrio es una demostración de
                  libertad deportiva y elegancia. La combinación de diseño dinámico, motores potentes y
                  equipamiento exclusivo en el interior de su nuevo diseño abre nuevos horizontes para el
                  placer de conducir sin límites. El cabrio más deportivo de su categoría no deja lugar a
                  dudas del atractivo de la independencia.</h6>
                <h6>Las características deportivas del BMW Serie 2 Cabrio le confieren un aspecto llamativo
                  y actual.</h6>

                <blockquote class="mb-30">
                  <h6>BMW 230i Cabrio: </h6>
                  <h6>Consumo Promedio (combinado) según WLTP1: 7,7–8,3 l/100km</h6>
                  <h6>Emisiones CO2 (combinado) según WLTP1: 176 - 189 g/km</h6>
                  <h6>Emisiones CO2 según NEDC2: 141 - 144 g/km.</h6>
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
                <h5 class="title">Una declaración de intenciones</h5>
                <div class="widget-content">
                  <p>La primera impresión es de libertad y empuje. El diseño único del BMW Serie 2 Cabrio
                    irradia ligereza y elegancia, poder e inspiración. Con la capota abierta, el frontal
                    perfilado aún más deportivo y la línea de cintura atlética despierta miradas de
                    admiración. En posición cerrada, la experiencia de conducción es igual de
                    fascinante: el elegante interior inspira con su diseño dinámico, equipamiento
                    exclusivo y mejor confort acústico.</p>
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
                      <img src="../img/blog-img/cabrio1.PNG" alt="">
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                      <a href="#" class="headline">
                        <h5 class="mb-0">Suspensión M adaptativa</h5>
                      </a>
                    </div>
                  </div>
                  <!-- Single Blog Post -->
                  <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                      <img src="../img/blog-img/cabrio2.PNG" alt="">
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                      <a href="#" class="headline">
                        <h5 class="mb-0">Dirección deportiva variable</h5>
                      </a>
                    </div>
                  </div>
                  <!-- Single Blog Post -->
                  <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                      <img src="../img/blog-img/cabrio3.PNG" alt="">
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                      <a href="#" class="headline">
                        <h5 class="mb-0">Sistema Launch Control</h5>
                      </a>
                    </div>
                  </div>
                  <!-- Single Blog Post -->
                  <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                      <img src="../img/blog-img/cabrio4.PNG" alt="">
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                      <a href="#" class="headline">
                        <h5 class="mb-0">Motor de gasolina de cuatro cilindros TwinPower Turbo</h5>
                      </a>
                    </div>
                  </div>
                  <!-- Single Blog Post -->
                  <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                      <img src="../img/blog-img/cabrio5.PNG" alt="">
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                      <a href="#" class="headline">
                        <h5 class="mb-0">Cambio deportivo Steptronic </h5>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

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