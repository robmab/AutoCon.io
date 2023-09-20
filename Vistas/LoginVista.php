<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php" ?>
  <title>Login - AutoCon</title>
</head>

<body>
  <?php include "../Tema/Menu.php" ?>

  <!-- ********** Hero Area ********** -->
  <div class="hero-area bg-img background-overlay" style="background-image:url(../img/blog-img/login.jpg);
  height:150px" ?>>
  </div>

  <section class="contact-area section-padding-100" style="padding:0;margin:0;"">
    <div class=" container" " >
      <div class=" row justify-content-center">

    <!-- Contact Form Area -->
    <div class="col-12 col-md-10 col-lg-8">
      <div class="contact-form" style="padding-top:1.5em;display:flex;
      justify-content:center;flex-direction:column;">
        <h1 style=" display: flex; justify-content: center; margin-bottom: 1em;  ">Iniciar Sesión</h1>


        <!-- Contact Form -->
        <form action="../Controladores/LoginControlador.php<?php if (isset($_SESSION['mensajeBD'])) {
          if ($_SESSION['mensajeBD'] == 'Tienes que registrarte antes de poder comprar o alquilar un vehículo.') {
            echo "?compraV=1";
          }
          ;
        }
        ; ?>" method="post">
          <div class="row" style="display: flex; justify-content: center; 
            align-items:center; flex-direction: column; width: 100%; margin: 0;">

            <!-- ERROR MESSAGE -->
            <?php if (isset($_SESSION['mensajeBD'])) {

              echo "<p style='color:red;font-weight:800;'> " . $_SESSION['mensajeBD'] . "</p> ";
              unset($_SESSION['mensajeBD']);
            }
            ; ?>

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
              <p style='color:blue; font-size: 12px;' ;>¡Regístrate si aún no lo estás!</p>
            </a>

          </div>

          <!-- BUTTON -->
          <div class="col-12" style="display: flex; justify-content: center;">
            <button type="submit" class="btn world-btn" style="margin:1em 0 0 0">Entrar</button>
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