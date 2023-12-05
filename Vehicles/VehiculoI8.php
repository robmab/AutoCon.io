<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php" ?>

  <link rel="stylesheet" href="../css/views/vehiclesViews.css">
  <title>AutoCon - I8</title>
</head>

<body>
  <?php include "../Tema/Menu.php" ?>

  <!-- ********** HERO ********** -->

  <div class="individualVehicle">
    <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/i8.jpg)">
      <div class="container h-100">
        <div class="row h-100 align-items-end justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="single-blog-title text-center pb-5">
              <?php
              $vehicle_model = 'Nuevo BMW i8 Coupé';
              $_SESSION['ModeloVeh'] = $vehicle_model;
              if ($_SESSION['listaVeh'][$vehicle_model]['rebaja'] > 0) { ?>
                <div class="post-cta p-0 m-0"><a>
                    <?php echo $_SESSION['listaVeh'][$vehicle_model]['rebaja'] ?>%
                    Descuento
                  </a></div>
                <?php ;
              } ?>
              <h3>Nuevo BMW i8 Coupé</h3>
              <h5>Visión de una nueva generación.</h5>
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
                <h6>El futuro ya está aquí: nuevo BMW i8 Coupé. Energético, fascinante y listo para
                  una movilidad redefinida; para disfrutar al máximo del placer de conducir en la
                  carretera.</h6>
                <h6>No solo la adrenalina se dispara al instante con su icónico diseño, sino también
                  el velocímetro con el innovador motor de este híbrido enchufable que genera 374
                  CV y 570 Nm. Además, el nuevo BMW i8 Coupé acelera de 0 a 100 km en tan solo 4,4
                  segundos. La vía más rápida hacia la nueva era.</h6>

                <blockquote>
                  <h6>BMW i8 Coupé: </h6>
                  <h6>Consumo Promedio (combinado) según WLTP1: 2,1-2,2 l/100km</h6>
                  <h6>Emisiones CO2 (combinado) según WLTP1: 48-49 g/km</h6>
                  <h6>Emisiones CO2 según NEDC2: 42 - 42 g/km</h6>
                  <h6>Autonomía eléctrica en km (promedio): 52 - 53 km</h6>
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
                        <?php echo $_SESSION['listaVeh'][$vehicle_model]['precioAlquiler'] ?> €
                        al mes
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
                <h5 class="title">Un vistazo al futuro</h5>
                <div class="widget-content">
                  <p>El BMW i8 Coupé es futurista hasta en el mínimo detalle. Su diseño transmite
                    máximo dinamismo. El detalle más llamativo: las originales puertas de ala de
                    gaviota, hechas de fibra de carbono ligero, que permiten una cómoda
                    apertura. El atlético frontal sigue mostrando el carácter único del vehículo
                    y exhibe con orgullo la parrilla doble BMW, flanqueada por faros LED
                    integrales y el sistema Air Curtain rediseñado.</p>
                </div>
              </div>
              <!-- Widget Area -->
              <div class="sidebar-widget-area">
                <h5 class="title">«El BMW i8 Coupé ya es el deportivo híbrido más vendido del mundo,
                  y creo que también tendremos mucho éxito con este vehículo».</h5>
                <div class="widget-content">
                  <p>KLAUS FRÖHLICH, MIEMBRO DEL CONSEJO DE ADMINISTRACIÓN DE BMW AG</p>
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