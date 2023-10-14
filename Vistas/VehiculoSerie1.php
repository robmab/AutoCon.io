<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php" ?>
  <title>Serie 1 - AutoCon</title>
</head>

<body>
  <?php include "../Tema/Menu.php" ?>

  <!-- ********** HERO ********** -->
  <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/s1.jpg);
  height: 280px">
    <div class="container h-100">
      <div class="row h-100 align-items-end justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
          <div class="single-blog-title text-center pb-5">
            <?php
            $ModeloVeh = 'BMW Serie 1 cinco puertas';
            $_SESSION['ModeloVeh'] = $ModeloVeh;
            if ($_SESSION['listaVeh'][$ModeloVeh]['rebaja'] > 0) { ?>
              <div class="post-cta p-0 m-0">
                <a>
                  <?php echo $_SESSION['listaVeh'][$ModeloVeh]['rebaja'] ?>%
                  Descuento
                </a>
              </div>
              <?php ;
            } ?>
            <h3>BMW Serie 1 cinco puertas</h3>
            <h5 style="color: white">Imponente en cualquier situación</h5>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ********** BODY ********** -->
  <div class="main-content-wrapper" style="margin: 0.5em 0;">
    <div class="container">
      <div class="row justify-content-center">
        <!-- ============= Post Content Area ============= -->
        <div class="col-12 col-lg-8">
          <div class="single-blog-content ">
            <!-- Post Content -->
            <div class="post-content">
              <h6>El nuevo BMW Serie 1 ha llegado para atraer todas las miradas de admiración. Su
                excepcional diseño lo diferencian de los demás a primera vista. El interior de este
                coche compacto presenta un ambiente moderno que inspira con su calidad premium y su
                concepto de espacio abierto.</h6>
              <h6>Los motores eficientes, la tracción delantera disponible por primera vez en el nuevo BMW
                Serie 1 y las tecnologías de bastidor más novedosas garantizan una experiencia de
                conducción de gran dinamismo y agilidad, mientras innovadoras tecnologías y sistemas de
                asistencia al conductor garantizan que siempre llegues a tu destino con seguridad y
                comodidad.</h6>

              <blockquote>
                <h6>BMW M135i xDrive: </h6>
                <h6>Consumo Promedio (combinado) según WLTP1: 7,9–8,3 l/100km</h6>
                <h6>Emisiones CO2 (combinado) según WLTP1: 179 - 189 g/km</h6>
                <h6>Emisiones CO2 según NEDC2: 155 - 162 g/km</h6>
              </blockquote>

              <div class="post-a-comment-area2" style="display: flex; margin: 0; padding: 0;">
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
              <h5 class="title">Máxima confianza</h5>
              <div class="widget-content">
                <p>Aplomo que se reconoce al instante: el diseño del nuevo BMW Serie 1 crea una poderosa
                  impresión tanto en el interior como en el exterior. Empezando por el frontal
                  dinámico con su gran parrilla doble y el amplio faldón delantero. Los contornos
                  claramente definidos van paralelos a la fluida línea del techo hasta la
                  inconfundible zaga. El carácter premium del nuevo BMW Serie 1 continúa en el
                  interior. Aquí los pasajeros pueden disfrutar de una atmósfera amplia, de unas
                  generosas proporciones y el máximo bienestar. El puesto de conducción impresiona por
                  su equipamiento optimizado ergonómicamente y su orientación al conductor..</p>
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
                    <img src="../img/blog-img/s11.PNG" alt="">
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
                    <img src="../img/blog-img/s12.PNG" alt="">
                  </div>
                  <!-- Post Content -->
                  <div class="post-content">
                    <a href="#" class="headline">
                      <h5 class="mb-0">BMW Digital Key</h5>
                    </a>
                  </div>
                </div>
                <!-- Single Blog Post -->
                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                  <!-- Post Thumbnail -->
                  <div class="post-thumbnail">
                    <img src="../img/blog-img/s13.PNG" alt="">
                  </div>
                  <!-- Post Content -->
                  <div class="post-content">
                    <a href="#" class="headline">
                      <h5 class="mb-0">Telefonía con carga inalámbrica</h5>
                    </a>
                  </div>
                </div>
                <!-- Single Blog Post -->
                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                  <!-- Post Thumbnail -->
                  <div class="post-thumbnail">
                    <img src="../img/blog-img/s14.PNG" alt="">
                  </div>
                  <!-- Post Content -->
                  <div class="post-content">
                    <a href="#" class="headline">
                      <h5 class="mb-0">Asistente de aparcamiento</h5>
                    </a>
                  </div>
                </div>
                <!-- Single Blog Post -->
                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                  <!-- Post Thumbnail -->
                  <div class="post-thumbnail">
                    <img src="../img/blog-img/s15.PNG" alt="">
                  </div>
                  <!-- Post Content -->
                  <div class="post-content">
                    <a href="#" class="headline">
                      <h5 class="mb-0">Punto de Acesso WiFi</h5>
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