<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php";

  /* Check Controler  */
  if (isset($_SESSION['check']))
    unset($_SESSION['check']);
  else
    header("Location:../Controladores/VehiculosControlador.php") ?>

    <link href='../Tema/Button/+-.css' rel='stylesheet' type='text/css'>
    <title>Vehículos - AutoCon</title>
  </head>

  <body>
  <?php include "../Tema/Menu.php" ?>

  <!-- HERO -->
  <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/vehiculos.jpg); 
      display: flex; justify-content: center; align-items: end; height:180px">
    <h1 style="color:rgb(242, 242, 242); text-shadow: 3px 3px 1px black;">Vehículos BMW</h1>
  </div>

  <!-- CONTENT -->
  <div class="world-catagory-area " id="1" style="display: flex; flex-direction: column; 
  align-items: center;margin: 0 2em 2em;">

    <!-- Error Message -->
    <?php if (isset($_SESSION['mensajeBD'])) {
      echo "<h5 style='color:red;text-align:center;padding-top:1em'>" . $_SESSION['mensajeBD'] . "</h5>";
      unset($_SESSION['mensajeBD']);
    } ?>

    <div class="tab-content" id="myTabContent2">
      <div class="tab-panel fade show active" id="world-tab-10" role="tabpanel" aria-labelledby="tab10">
        <div class="row">

          <?php foreach ($_SESSION['listaVeh'] as $vehiculo => $num) { ?>
            <div class="col-12 col-md-6">

              <div id="<?php echo $vehiculo ?>" class="single-blog-post">

                <!-- Post Thumbnail -->
                <div class="post-thumbnail">
                  <img <?php
                  if ($_SESSION['listaVeh'][$vehiculo]['disponibles'] > 0) {
                    ?> onclick="window.location='Vehiculo<?php echo $_SESSION['listaVeh'][$vehiculo]['ruta'] ?>.php'" <?php
                  } ?> src="../img/bmw<?php if ($_SESSION['listaVeh'][$vehiculo]['disponibles'] == 0)
                      echo "Off";
                    echo $_SESSION['listaVeh'][$vehiculo]['img'] ?>" alt="" style="<?php if ($_SESSION['listaVeh'][$vehiculo]['disponibles'] == 0)
                        echo "cursor: auto;" ?>">

                    <!-- Offer -->
                  <?php if ($_SESSION['listaVeh'][$vehiculo]['rebaja'] > 0) { ?>
                    <div class="post-cta">
                      <?php if ($_SESSION['listaVeh'][$vehiculo]['disponibles'] > 0) { ?>
                        <a style="font-size: 20px;" href="Vehiculo<?php echo $_SESSION['listaVeh'][$vehiculo]['ruta'] ?>.php">
                          <?php echo $_SESSION['listaVeh'][$vehiculo]['rebaja'] . "% Descuento" ?>
                        </a>
                      <?php } else { ?>
                        <div style="background-color: rgba(255,255,255,0.5);
                           padding:0 0.5em">
                          <p style="color: red; text-shadow: 1px 1px 1px black;
                        font-size: 20px; line-height: 20px;">NO DISPONIBLE</p>
                        </div>
                      <?php } ?>
                    </div>
                  <?php } ?>
                </div>

                <!-- Post Content -->
                <div class="post-content">
                  <?php if ($_SESSION['listaVeh'][$vehiculo]['disponibles'] > 0) { ?>
                    <a href="Vehiculo<?php echo $_SESSION['listaVeh'][$vehiculo]['ruta'] ?>.php" class="headline">
                      <h3 style="font-weight: 400;">
                        <?php echo $vehiculo ?>
                      </h3>
                    </a>
                  <?php } else { ?>
                    <h3>
                      <?php echo $vehiculo ?>
                    </h3>
                  <?php } ?>

                  <p style="line-height: 10px; margin: 0.5em 0; padding: 0; display:inline;
                  font-size: 20px;">
                    <?php echo "Precio: " . $_SESSION['listaVeh'][$vehiculo]['precioRebajado'] . "€"; ?>
                  </p>
                  <?php if ($_SESSION['listaVeh'][$vehiculo]['precioRebajado'] != $_SESSION['listaVeh'][$vehiculo]['precio']) {
                    echo " | <p style='font-size: 20px;display:inline;text-decoration:line-through'>" .
                      $_SESSION['listaVeh'][$vehiculo]['precio'] .
                      "€</p>";
                  } ?>

                  <!-- Post Meta -->
                  <div class="post-meta mb-0 pb-0">
                    <?php if ($_SESSION['listaVeh'][$vehiculo]['disponibles'] > 0 and isset($_SESSION['rol']) and $_SESSION['rol'] == 'Admin') { ?>
                      <div class="single-vehicle-stats">
                        <p style="color: cadetblue;font-size: 15px">
                          <?php echo $_SESSION['listaVeh'][$vehiculo]['disponibles'] ?> disponibles
                        </p>
                        <p style="color: #E1B42B;font-size: 15px">
                          <?php echo $_SESSION['listaVeh'][$vehiculo]['alquilados'] ?> alquilados
                        </p>
                        <p style="color: cornflowerblue;font-size: 15px">
                          <?php echo $_SESSION['listaVeh'][$vehiculo]['vendidos'] ?> vendidos
                        </p>
                      </div>
                      <button
                        onclick="window.location='../Controladores/VehiculosControlador.php?a=1&model=<?php echo $vehiculo ?>'"
                        class="icon-btn add-btn">
                        <div class="add-icon"></div>
                        <div class="btn-txt">Añadir</div>
                      </button>
                      <button
                        onclick="window.location='../Controladores/VehiculosControlador.php?q=1&model=<?php echo $vehiculo ?>'"
                        class="icon-btn add-btn">
                        <div class="btn-txt">Quitar</div>
                      </button>

                    <?php } elseif ($_SESSION['listaVeh'][$vehiculo]['disponibles'] == 0) {

                      if (isset($_SESSION['rol']) and $_SESSION['rol'] == 'Admin') { ?>
                        <div class="single-vehicle-stats">
                          <p style="color: #E1B42B;font-size: 15px">
                            <?php echo $_SESSION['listaVeh'][$vehiculo]['alquilados'] ?> alquilados
                          </p>
                          <p style="color: cornflowerblue;font-size: 15px">
                            <?php echo $_SESSION['listaVeh'][$vehiculo]['vendidos'] ?> vendidos
                          </p>
                        </div>
                      <?php }
                      if (isset($_SESSION['rol']) and $_SESSION['rol'] == 'Admin') { ?>
                        <button
                          onclick="window.location='../Controladores/VehiculosControlador.php?a=1&model=<?php echo $vehiculo ?>'"
                          class="icon-btn add-btn">
                          <div class="add-icon"></div>
                          <div class="btn-txt">Añadir</div>
                        </button>
                        <?php if ($_SESSION['listaVeh'][$vehiculo]['disponibles'] > 0) { ?><button
                            onclick="window.location='../Controladores/VehiculosControlador.php?q=1&model=<?php echo $vehiculo ?>'"
                            class="icon-btn add-btn">
                            <div class="btn-txt">Quitar</div>
                          </button>
                        <?php }
                      }
                    } ?>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php include "../Tema/Scripts.php" ?>
</body>

</html>