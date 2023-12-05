<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php" ?>
  <link rel="stylesheet" href="../css/views/vehiclesViews.css">
  <title>AutoCon - X4/title>
</head>

<body>
  <?php include "../Tema/Menu.php"; ?>

  <div class="individualVehicle">
    <!-- ********** HERO ********** -->
    <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/x4.jpg);">
      <div class="container h-100">
        <div class="row h-100 align-items-end justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="single-blog-title text-center pb-5">
              <?php
              $vehicle_model = 'BMW X4';
              $_SESSION['ModeloVeh'] = $vehicle_model;
              if ($_SESSION['listaVeh'][$vehicle_model]['rebaja'] > 0) { ?>
                <div class="post-cta p-0 m-0"><a>
                    <?php echo $_SESSION['listaVeh'][$vehicle_model]['rebaja'] ?>%
                    Descuento
                  </a></div>
                <?php ;
              } ?>
              <h3>BMW X4</h3>
              <h5>¿Que quieres hacer hoy?</h5>
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
                <h6>No importa qué desafíos puedan surgir por el camino, el BMW X4 se anticipa. Su diseño
                  avanzado y los contornos de Coupé revelan al instante su sed de acción. </h6>
                <h6>Y gracias al excelente dinamismo de conducción, la innovadora construcción ligera con un
                  centro de gravedad bajo y el nivel de prestaciones aún más elevado, solo hay un
                  objetivo: disfrutar al máximo del placer de conducir.</h6>

                <blockquote>
                  <h6>BMW X4 M40i (3):</h6>
                  <h6>Consumo Promedio (combinado) según WLTP1: 9,1–10,0 l/100km</h6>
                  <h6>Emisiones CO2 (combinado) según WLTP1: 208 - 228 g/km</h6>
                  <h6>Emisiones CO2 según NEDC2: 178 - 186 g/km</h6>
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
            <div class="post-sidebar-area ">
              <!-- Widget Area -->
              <div class="sidebar-widget-area">
                <h5 class="title">El BMW X4 combina la robustez de un vehículo X con la fuerza atlética de
                  un deportivo.</h5>
                <div class="widget-content">
                  <p>Adrian van Hooydonk, jefe de Diseño de BMW Group.</p>
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
                      <img src="../img/blog-img/x41.PNG" alt="">
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                      <a href="#" class="headline">
                        <h5 class="mb-0">Driving Assistant</h5>
                      </a>
                    </div>
                  </div>
                  <!-- Single Blog Post -->
                  <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                      <img src="../img/blog-img/x42.PNG" alt="">
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                      <a href="#" class="headline">
                        <h5 class="mb-0">Concepto de funcionamiento intuitivo</h5>
                      </a>
                    </div>
                  </div>
                  <!-- Single Blog Post -->
                  <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                      <img src="../img/blog-img/x43.PNG" alt="">
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                      <a href="#" class="headline">
                        <h5 class="mb-0">Cuadro de instrumentos</h5>
                      </a>
                    </div>
                  </div>
                  <!-- Single Blog Post -->
                  <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                      <img src="../img/blog-img/x44.PNG" alt="">
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
                      <img src="../img/blog-img/x45.PNG" alt="">
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