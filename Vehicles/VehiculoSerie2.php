<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php" ?>
  <link rel="stylesheet" href="../css/views/vehiclesViews.css">
  <title>AutoCon - Serie 2</title>
</head>

<body>
  <?php include "../Tema/Menu.php" ?>

  <div class="individualVehicle">
    <!-- ********** HERO ********** -->
    <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/enchufable.jpg)">
      <div class="container h-100">
        <div class="row h-100 align-items-end justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="single-blog-title text-center pb-5">
              <?php
              $ModeloVeh = 'BMW Serie 2 Active Tourer Híbrido Enchufable';
              $_SESSION['ModeloVeh'] = $ModeloVeh;
              if ($_SESSION['listaVeh'][$ModeloVeh]['rebaja'] > 0) { ?>
                <div class="post-cta p-0 m-0"><a>
                    <?php echo $_SESSION['listaVeh'][$ModeloVeh]['rebaja'] ?>%
                    Descuento
                  </a></div>
                <?php ;
              } ?>
              <h3>BMW Serie 2 Active Tourer Híbrido Enchufable</h3>
              <h5>Electrizante</h5>
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
            <div class="single-blog-content ">
              <!-- Post Content -->
              <div class="post-content">
                <h6>Como la vida en la gran ciudad. El BMW 225xe iPerformance Active Tourer rebosa energía.
                  Acelera tu vida diaria y tus ideas de 0 a 100 en 6,7 segundos. Un placer de conducir que
                  también disfrutarás en trayectos largos. Exactamente lo que esperas de un BMW.</h6>
                <h6>Lleno de energía: el BMW 225xe iPerformance Active Tourer combina su demostrada
                  flexibilidad y extraordinarios valores de consumo con el dinamismo de conducción de BMW.
                  Gracias a la tecnología BMW eDrive de BMW EfficientDynamics, ofrece una autonomía de
                  hasta 45 kilómetros en el modo totalmente eléctrico, sin generar emisiones y
                  prácticamente en silencio. Perfecto para desplazarse por la ciudad.</h6>

                <blockquote>
                  <h6>BMW 225xe: </h6>
                  <h6>Consumo Promedio (combinado) según WLTP1: 1,7-3,2 l/100km</h6>
                  <h6>Emisiones CO2 (combinado) según WLTP1: 38-72 g/km</h6>
                  <h6>Emisiones CO2 según NEDC2: 42 - 47 g/km</h6>
                  <h6>Autonomía eléctrica en km (promedio): 42 - 49 km</h6>
                </blockquote>

                <div class="post-a-comment-area2">
                  <!-- Contact Form -->
                  <form action="../Controladores/VehiculoCompra.php?comprar=1" method="post">
                    <div class="row">
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn world-btn">Reservalo en tienda por
                        <?php echo $_SESSION['listaVeh'][$ModeloVeh]['precioRebajado'] ?>
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
                        <?php echo $_SESSION['listaVeh'][$ModeloVeh]['precioAlquiler'] ?> € al
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
                <h5 class="title">Moldea la ciudad de forma sostenible</h5>
                <div class="widget-content">
                  <p>Su origen se reconoce a la primera. La fuente de esta propulsión también es evidente
                    a primera vista. Las características varillas azules de la parrilla delantera y los
                    cubos de las ruedas del BMW 225xe iPerformance Active Tourer son sinónimo de
                    potencia e innovación. Gracias a la gran parrilla y a la amplia toma de aire
                    continua, el BMW 225xe iPerformance Active Tourer crea también un efecto más
                    deportivo y dinámico. Típico de BMW, pero exclusivo y diferente.</p>
                </div>
              </div>
              <!-- Widget Area -->
              <div class="sidebar-widget-area">
                <h5 class="title">“Además de la extraordinaria eficiencia y la idoneidad para la vida
                  diaria, BMW eDrive también cumple el máximo estándar de dinamismo de conducción y
                  calidad de BMW”.</h5>
                <div class="widget-content">
                  <p>Stefan Juraschek, director de Propulsión eléctrica de BMW Group.</p>
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