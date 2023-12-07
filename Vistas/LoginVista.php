<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php" ?>
  <link rel="stylesheet" href="../css/views/login.css">
  <title>AutoCon - Login</title>
</head>

<body>
  <?php include "../Tema/Menu.php" ?>

  <!-- HERO -->
  <div class="hero-area bg-img background-overlay" style="background-image:url(../img/blog-img/login.jpg);
      height:150px" ?></div>

  <!-- BODY -->
  <section class="login contact-area section-padding-100">
    <div class=" container">
      <div class=" row justify-content-center">

        <!-- Contact Form Area -->
        <div class="col-12 col-md-10 col-lg-8">
          <div class="contact-form">
            <h1>Iniciar Sesión</h1>
            <!-- Contact Form -->
            <form action="../Controladores/LoginControlador.php<?php if (isset($_SESSION['mensajeBD'])) {
              if ($_SESSION['mensajeBD'] == 'Tienes que registrarte antes de poder comprar o alquilar un vehículo.') {
                echo "?buyV=1";
              }
            } ?>" method="post">

              <div class="row">

                <!-- ERROR MESSAGE -->
                <?php if (isset($_SESSION['mensajeBD'])) {
                  echo "<p class='alert'> " . $_SESSION['mensajeBD'] . "</p> ";
                  unset($_SESSION['mensajeBD']);
                } ?>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="text" name="email" id="email" required autocomplete="new-password" value="">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Nombre de usuario o dirección</label>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="password" name="pass" id="pass" required autocomplete="new-password" value="">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Contraseña</label>
                  </div>

                </div>
                <a href="RegistroVista.php">
                  <p>¡Regístrate si aún no lo estás!</p>
                </a>
              </div>

              <!-- BUTTON -->
              <div class="but col-12">
                <button type="submit" class="btn world-btn">Entrar</button>
              </div> 
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include "../Tema/Scripts.php" ?>
</body>

</html>