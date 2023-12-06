<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php";

  /* CHECK CONTROLER */
  if (isset($_SESSION['chekonn']))
    unset($_SESSION['chekonn']);
  else
    header("Locaid=tion:../Controladores/ComponentesControlador.php"); ?>

  <link rel="stylesheet" href="../css/views/components.css">
  <link href='../Tema/Button/on.css' rel='stylesheet' type='text/css'>
  <title>AutoCon - Componentes</title>
</head>

<body>
  <?php include "../Tema/Menu.php";
  $component_list = $_SESSION['listaComponentes'] ?>

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

      foreach ($component_list as $name => $num) {
        foreach ($num as $type => $num2) {

          if ($cont != $name) { ?>
            <div class="col-12 col-md-6 col-lg-4">
              <div class="single-blog-post post-style-3">

                <div class="single-component pt-1 m-0">
                  <h4>
                    <?php echo $name ?>
                  </h4>
                  <!-- CARD -->
                  <div class="inside-component" style="background-image: linear-gradient(rgba(0, 0, 0, 0.427),rgba(0, 0, 0, 0.9)) ,
                  url(../img/componentes/<?php echo $component_list[$name][$type]['ruta'] ?>);">

                    <!-- Content display -->
                    <div class="component-content">
                      <form action="../Controladores/ComponentesControlador.php?buy=1&name=<?php echo $name ?>#1"
                        method="post">

                        <?php
                        $check = false;

                        foreach ($component_list[$name] as $type => $num) { ?>
                          <h6>
                            <?php if ($component_list[$name][$type]['cantidad'] > 0) { ?>
                              <input type=radio name='type'
                                value="<?php echo $type ?>-<?php echo $component_list[$name][$type]['precioR'] ?>">
                              <?php $check = true;
                            }
                            echo $type;

                            if ($component_list[$name][$type]['cantidad'] == 0) { ?>-
                              <s>No disponible</s>

                            <?php } elseif ($component_list[$name][$type]['descuento'] == 0) { ?>
                              por <i class="price">
                                <?php echo $component_list[$name][$type]['precio'] ?> €
                              </i>
                            <?php } else { ?>
                              por <s>
                                <?php echo $component_list[$name][$type]['precioO'] ?> €
                              </s>
                              <i class="discount">
                                <?php echo $component_list[$name][$type]['precioR'] ?> €
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
          $cont = $name;
        }
      } ?>
    </div>
  </div>

  <?php include "../Tema/Scripts.php" ?>
</body>

</html>