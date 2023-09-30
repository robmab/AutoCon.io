<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php"; ?>
  <!-- Title  -->
  <title>Home - AutoCon</title>
</head>

<body>
  <?php include "../Tema/Menu.php"; ?>

  <div style="position:absolute ; z-index: 10; display: flex; justify-content: center;
        top:20%; right:0;left:0; width:70em; margin: auto;display:flex;align-items: center;
        flex-direction: column; ">
    <p style="font-size: 45px; display: block; color:#629CFC;line-height: 0.25em;
                 text-shadow: 3px 3px 3px black;  margin-bottom: 0.75em;">BMW</p>

    <div style="width: 18em; border-bottom: 2px solid #9fb6dc""  ></div>
    <h1 style="font-size: 65px; color: white; text-shadow: 3px 3px 3px black">
      AUTOCON
    </h1>


  </div>

  <!-- ********** Hero Area Start ********** -->
  <div class="hero-area" style="height: 100vh">


    <!-- Hero Slides Area -->
    <div class="hero-slides owl-carousel">

      <!-- Single Slide -->
      <div class="single-hero-slide bg-img background-overlay"
        style="background-image: url(../img/blog-img/bg2.jpg); height: 100vh">
      </div>
      <div class="single-hero-slide bg-img background-overlay"
        style="background-image: url(../img/blog-img/bg3.jpg); height: 100vh">
      </div>
      <!-- Single Slide -->
      <div class="single-hero-slide bg-img background-overlay"
        style="background-image: url(../img/blog-img/bg1.jpg); height: 100vh">
      </div>
    </div>


    <!-- Hero Post Slide -->
    <div class="hero-post-area">
      <div class="container">

        <div class="row">
          <div class="col-12">
            <div class="hero-post-slide" style="padding-bottom: 5em;">
              <!-- Single Slide -->
              <div class="single-slide d-flex align-items-center">
                <div class="post-number">
                  <p>1 </p>
                </div>
                <div class="post-title">
                  <a href="../Controladores/VehiculosControlador.php">Descubre nuestros vehículos.</a>
                </div>
              </div>
              <!-- Single Slide -->
              <div class="single-slide d-flex align-items-center">
                <div class="post-number">
                  <p>2</p>
                </div>
                <div class="post-title">
                  <a href="../Controladores/ComponentesControlador.php">¿Necesitas piezas de repuesto?
                    Descúbrelas ahora mismo.</a>
                </div>
              </div>

              <div class="single-slide d-flex align-items-center">
                <div class="post-number">
                  <p>3</p>
                </div>
                <div class="post-title">
                  <a href="ReparacionVista.php">Repara y deja como nuevo tu vehículo con nuestros
                    servicios.</a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ********** Hero Area End ********** -->

  <div class="main-content-wrapper section-padding-100 pt-5 mt-0" style="height: 95vh;
              background-image: url('../img/blog-img/bmw.jpg'); display: flex;
              align-items:center; flex-direction: column;">
    <p class="pt-0 mt-0" style="font-size: 35px; color:black; text-shadow: 2px 2px 2px white;
                                font-weight: 600;">¡Localízanos!</p>
    <div style="height: 5%; width: 50%; border-bottom: 1px solid black; margin-bottom: 2em;"></div>

    <div style="display: flex; justify-content: center; padding: 0 10em; margin: 0; width: 100%; ">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3099.970879513495!2d-1.8841090845740516!3d39.01597777955259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd665ef7be827c67%3A0x7bc569d31447a077!2sAv.%20Gregorio%20Arcos%2C%2041%2C%2002007%20Albacete!5e0!3m2!1ses!2ses!4v1575763094365!5m2!1ses!2ses"
        frameborder="0" style="border:0;width: 100%;height: 280%;box-shadow: 0 0 15px 2px rgba(0, 0, 0, 0.723);"
        allowfullscreen=""></iframe>
    </div>



    <center>
      <?php if (isset($_SESSION['mensajeBD'])) {

        echo " <h6 style='color:red;'> " . $_SESSION['mensajeBD'] . "";
        unset($_SESSION['mensajeBD']);
      }
      ; ?>
      </h6>
    </center>

  </div>



  <?php include "../Tema/Scripts.php"; ?>

</body>

<!--scaffolding-->

</html>