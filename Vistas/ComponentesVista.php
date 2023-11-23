<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php";

  /* CHECK CONTROLER */
  if (isset($_SESSION['chekonn']))
    unset($_SESSION['chekonn']);
  else
    header("Location:../Controladores/ComponentesControlador.php"); ?>

  <link rel="stylesheet" href="../css/views/components.css">
  <link href='../Tema/Button/on.css' rel='stylesheet' type='text/css'>
  <title>AutoCon - Componentes</title>
</head>

<body>
  <?php include "../Tema/Menu.php";
  $listaComponentes = $_SESSION['listaComponentes'] ?>

  <!-- ********** HERO ********** -->
  <div class="hero-area bg-img background-overlay mb-4" style="background-image: url(../img/blog-img/componentes.jpg)">
    <h1>Componentes de repuesto</h1>
  </div>

  <!-- ********** BODY ********** -->
  <div class="components" id="1">
    <!-- Admin Controller -->
    <?php if (isset($_SESSION['rol'])) {
      if ($_SESSION['rol'] == 'Admin') { ?>
        <div class="switch-role">
          <label class="switch">
            <input class="switch-input" type="checkbox" />
            <span onclick="window.location='../Controladores/ComponentesControlador.php?Adm2=1#1'" class="switch-label"
              data-on="Adm" data-off="Usr"></span>
            <span onclick="window.location='../Controladores/ComponentesControlador.php?Adm2=1#1'"
              class="switch-handle"></span>
          </label>
        </div>
      <?php }
    }

    /* Error Message */
    if (isset($_SESSION['mensajeBD'])) { ?>
      <div class="pb-3">
        <?php echo " <h5 class='alert'> " . $_SESSION['mensajeBD'];
        unset($_SESSION['mensajeBD']); ?>
      </div>
    <?php } ?>

    <!-- ========== Components ========== -->
    <div class="row component-panel">
      <?php $cont = "";

      foreach ($listaComponentes as $nombre => $num) {
        foreach ($num as $tipo => $num2) {

          if ($cont != $nombre) { ?>
            <div class="col-12 col-md-6 col-lg-4">
              <div class="single-blog-post post-style-3">

                <div class="single-component pt-1 m-0">
                  <h4>
                    <?php echo $nombre ?>
                  </h4>
                  <!-- CARD -->
                  <div class="inside-component" style="background-image: linear-gradient(rgba(0, 0, 0, 0.427),rgba(0, 0, 0, 0.9)) ,
                  url(../img/componentes/<?php echo $listaComponentes[$nombre][$tipo]['ruta'] ?>);">

                    <!-- Content display -->
                    <div class="component-content">
                      <form action="../Controladores/ComponentesControlador.php?comprar=1&nombre=<?php echo $nombre ?>#1"
                        method="post">

                        <?php
                        $check = false;

                        foreach ($listaComponentes[$nombre] as $tipo => $num) { ?>
                          <h6>
                            <?php if ($listaComponentes[$nombre][$tipo]['cantidad'] > 0) { ?>
                              <input type=radio name='tipo'
                                value="<?php echo $tipo ?>-<?php echo $listaComponentes[$nombre][$tipo]['precioR'] ?>">
                              <?php $check = true;
                            }
                            echo $tipo;

                            if ($listaComponentes[$nombre][$tipo]['cantidad'] == 0) { ?>-
                              <s>No disponible</s>

                            <?php } elseif ($listaComponentes[$nombre][$tipo]['descuento'] == 0) { ?>
                              por <i class="price">
                                <?php echo $listaComponentes[$nombre][$tipo]['precio'] ?> €
                              </i>
                            <?php } else { ?>
                              por <s>
                                <?php echo $listaComponentes[$nombre][$tipo]['precioO'] ?> €
                              </s>
                              <i class="discount">
                                <?php echo $listaComponentes[$nombre][$tipo]['precioR'] ?> €
                              </i>
                            <?php } ?>
                          </h6>
                        <?php } ?>
                    </div>

                    <!-- Button -->
                    <div class="button">
                      <?php if ($check) { ?>
                        <button type="submit" name="submit" value="Submit" class="btn world-btn">
                          Comprar
                        </button>
                      <?php } ?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php }
          $cont = $nombre;
        }
      } ?>
    </div>
  </div>

  <?php include "../Tema/Scripts.php" ?>
</body>

</html>