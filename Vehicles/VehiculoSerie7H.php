<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php" ?>
  <link rel="stylesheet" href="../css/views/vehiclesViews.css">
  <title>AutoCon - Serie 7H</title>
</head>

<body>
  <?php include "../Tema/Menu.php" ?>

  <div class="individualVehicle">
    <!-- ********** HERO ********** -->
    <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/7h.jpg);">
      <div class="container h-100">
        <div class="row h-100 align-items-end justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="single-blog-title text-center pb-5">
              <?php
              $ModeloVeh = 'BMW Serie 7 Híbrido Enchufable';
              $_SESSION['ModeloVeh'] = $ModeloVeh;
              if ($_SESSION['listaVeh'][$ModeloVeh]['rebaja'] > 0) { ?>
                <div class="post-cta p-0 m-0"><a>
                    <?php echo $_SESSION['listaVeh'][$ModeloVeh]['rebaja'] ?>%
                    Descuento
                  </a></div>
                <?php ;
              } ?>
              <h3>BMW Serie 7 Híbrido Enchufable</h3>
              <h5>Lidera el camino</h5>
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
                <h6>Domina cada situación, disfruta de cada momento. El BMW Serie 7 ofrece una presencia
                  decidida, unas prestaciones excepcionales y la máxima comodidad. Como BMW 750Li, con un
                  motor de gasolina de 8 cilindros BMW TwinPower Turbo de nuevo desarrollo y sistema
                  xDrive de serie, está claramente diseñado para asumir una posición de liderazgo.</h6>
                <h6>El lenguaje emotivo de su elegante diseño y la atmósfera especial de bienestar del
                  interior, gracias a los exclusivos detalles, las posibilidades de diseño individuales y
                  las innovaciones técnicas, lo convierten en el paradigma de la clase de lujo de BMW. La
                  elegancia se une a la exclusividad. Y el lujo se encuentra con el rendimiento.</h6>

                <blockquote>
                  <h6>BMW 750Li xDrive: </h6>
                  <h6>Consumo Promedio (combinado) según WLTP1: 10,6–11,1 l/100km</h6>
                  <h6>Emisiones CO2 (combinado) según WLTP1: 241 - 254 g/km</h6>
                  <h6>Emisiones CO2 según NEDC2: 218 - 218 g/km</h6>
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
            <div class="post-sidebar-area">
              <!-- Widget Area -->
              <div class="sidebar-widget-area">
                <h5 class="title">Haciendo del mundo tu hogar</h5>
                <div class="widget-content">
                  <p>Asegúrate de llegar a tu destino mientras conduces: gracias a los innovadores
                    servicios digitales del BMW Serie 7. BMW Connected Navigation ofrece muchas opciones
                    para que el viaje resulte aún más cómodo y personalizado. BMW Connected garantiza
                    una conexión perfecta entre tu smartphone y el vehículo, lo que permite planificar e
                    interactuar con más rapidez. Además, podrás comunicarte con tu BMW de forma natural
                    a través del Asistente Personal, que incluye procesamiento de voz fuera del
                    vehículo, y controlar varias funciones fácilmente a través de la aplicación BMW
                    Connected. BMW Serie 7: un nuevo tipo de movilidad. Una nueva forma de sentirse en
                    casa.</p>
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
                      <img src="../img/blog-img/7h1.PNG" alt="">
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                      <a href="#" class="headline">
                        <h5 class="mb-0">Luz láser BMW</h5>
                      </a>
                    </div>
                  </div>
                  <!-- Single Blog Post -->
                  <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                      <img src="../img/blog-img/7h2.PNG" alt="">
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                      <a href="#" class="headline">
                        <h5 class="mb-0">Air Breather</h5>
                      </a>
                    </div>
                  </div>
                  <!-- Single Blog Post -->
                  <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                      <img src="../img/blog-img/7h3.PNG" alt="">
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                      <a href="#" class="headline">
                        <h5 class="mb-0">Detalles de luz ambiente</h5>
                      </a>
                    </div>
                  </div>
                  <!-- Single Blog Post -->
                  <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                      <img src="../img/blog-img/7h4.PNG" alt="">
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                      <a href="#" class="headline">
                        <h5 class="mb-0">BMW Operating System 7.0</h5>
                      </a>
                    </div>
                  </div>
                  <!-- Single Blog Post -->
                  <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                    <!-- Post Thumbnail -->
                    <div class="post-thumbnail">
                      <img src="../img/blog-img/7h5.PNG" alt="">
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                      <a href="#" class="headline">
                        <h5 class="mb-0">BMW Live Cockpit Professional</h5>
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