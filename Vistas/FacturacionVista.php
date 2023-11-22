<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php"; ?>
  <title>AutoCon - Facturación</title>
</head>

<body onload='document.form1.numero.focus()'>
  <?php include "../Tema/Menu.php"; ?>

  <!-- HERO -->
  <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/facturacion.jpg)">
    <h1>Datos Facturación</h1>
  </div>

  <section class="contact-area ">
    <div class="container">
      <div class="row justify-content-center">
        <!-- Contact Form Area -->
        <div class="col-12 col-md-10 col-lg-8">
          <div class="contact-form">
            <h5 class="text-center">Pon los datos de tu tarjeta
              <img src="../img/core-img/visa.png" width="20%" height="20%">
              <img src="../img/core-img/mastercard.png" width="20%" height="20%">
            </h5>

            <?php if (isset($_SESSION['mensajeBD'])) {
              echo " <p class='alert'> " . $_SESSION['mensajeBD'] . "</p> ";
              unset($_SESSION['mensajeBD']);
            } ?>

            <!-- Contact Form -->
            <form name="form1" action="../Controladores/ValidarTarjeta.php" method="post">
              <div class="row">

                <div class="col-12" col-md-6">
                  <div class="group">
                    <select name="tarjeta">
                      <option value="visa">Visa</option>
                      <option value="mastercard">MasterCard</option>
                    </select>
                  </div>
                </div>

                <div class="col-12">
                  <div class="group">
                    <input type="text" name="numero" id="numero" required maxlength="16" minlength="16">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Número de tarjeta</label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="group">
                    <input type="text" name="titular" id="titular" required autocomplete="off" maxlength="50">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Titular</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="number" name="mes" id="mes" required autocomplete="off" min="1" max="12">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Mes</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="text" name="año" id="año" required autocomplete="off" maxlength="2" minlength="2">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Año</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="text" name="ccv" id="ccv" required autocomplete="off" minlength="3" maxlength="">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>CCV</label>
                  </div>
                </div>
                
                <div class="col-12 align-x w-100">
                    <button type="submit" name="submit" value="Submit" class="btn world-btn">
                      Registrar tarjeta
                    </button>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include "../Tema/Scripts.php"; ?>
</body>

</html>