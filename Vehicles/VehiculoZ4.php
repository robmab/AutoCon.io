<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php" ?>
  <link rel="stylesheet" href="../css/views/vehiclesViews.css">
  <title>AutoCon - Z4</title>
</head>

<body>
  <?php include "../Tema/Menu.php" ?>

  <div class="individualVehicle">
    <!-- ********** HERO ********** -->
    <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/z4.jpg)">
      <div class="container h-100">
        <div class="row h-100 align-items-end justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="single-blog-title text-center pb-5">
              <?php
              $vehicle_model = 'Nuevo BMW Z4';
              $_SESSION['ModeloVeh'] = $vehicle_model;
              if ($_SESSION['listaVeh'][$vehicle_model]['rebaja'] > 0) { ?>
                <div class="post-cta p-0 m-0"><a>
                    <?php echo $_SESSION['listaVeh'][$vehicle_model]['rebaja'] ?>%
                    Descuento
                  </a></div>
                <?php ;
              } ?>
              <h3>Nuevo BMW Z4</h3>
              <h5>Muéstrate</h5>
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
              <!-- Post Content -->
              <div class="post-content">
                <h6>Cuando el techo de este descapotable se abre, ya no hay límites para el placer de
                  conducir en el nuevo BMW Z4. Un roadster que no podría ser mejor: abierto, deportivo y
                  sin concesiones. Un nuevo biplaza con un elevado dinamismo de conducción y un diseño
                  avanzado, cuyo único objetivo es la libertad entre la carretera y el cielo abierto.</h6>
                <h6>Los 250 kW (340 CV) del motor de gasolina de 6 cilindros BMW M TwinPower Turbo aceleran
                  el BMW Z4 Roadster de 0 a 100 km/h en 4,5 segundos cargados de adrenalina. No hay
                  ninguna otra forma más deportiva de conseguir la sensación de libertad perfecta.</h6>

                <blockquote>
                  <h6>BMW Z4 Roadster M40i: </h6>
                  <h6>Consumo Promedio (combinado) según WLTP1: 8,2–8,5 l/100km</h6>
                  <h6>Emisiones CO2 (combinado) según WLTP1: 186 - 194 g/km</h6>
                  <h6>Emisiones CO2 según NEDC2: 168 - 168 g/km</h6>
                </blockquote>

                <div class="post-a-comment-area2">
                  <!-- Contact Form -->
                  <form action="../Controladores/VehiculoCompra.php?comprar=1" method="post">
                    <div class="row">
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn world-btn">Reservalo en tienda por
                        <?php echo $_SESSION['listaVeh'][$vehicle_model]['precioRebajado'] ?>
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
                        <?php echo $_SESSION['listaVeh'][$vehicle_model]['precioAlquiler'] ?> € al
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
                <h5 class="title">Exhibe tu estilo con este Cabrio</h5>
                <div class="widget-content">
                  <p>Un placer de conducir a cielo abierto que te sorprenderá aún más con cada detalle. El
                    exterior muestra el estilo individual del BMW Z4 Roadster en su forma más pura:
                    clara, moderna y emocional.</p>
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