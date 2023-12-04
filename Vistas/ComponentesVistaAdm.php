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
  <link href='../Tema/Button/on.css' rel='stylesheet' type='text/css'>
  <title>AutoCon - Componentes Adm</title>
</head>

<body>
  <?php include "../Tema/Menu.php";
  $componentList = $_SESSION['listaComponentes'] ?>

  <!-- ********** HERO ********** -->
  <div class="hero-area bg-img background-overlay mb-4" style="background-image: url(../img/blog-img/componentes.jpg)">
    <h1">Componentes de repuesto</h1>
  </div>

  <!-- ********** BODY ********** -->
  <div id="1" class="components">

    <!-- Admin Controller -->
    <?php if (isset($_SESSION['rol'])) {
      if ($_SESSION['rol'] == 'Admin') { ?>
        <div class="switch-role">
          <label class="switch">
            <input class="switch-input" type="checkbox" checked="" />
            <span onclick="window.location='../Controladores/ComponentesControlador.php#1'" class="switch-label"
              data-on="Adm" data-off="Usr"></span>
            <span onclick="window.location='../Controladores/ComponentesControlador.php#1'" class="switch-handle"></span>
          </label>
        </div>
      <?php }
    } ?>

    <?php
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

      foreach ($componentList as $name => $num) {
        foreach ($num as $type => $num2) {

          if ($cont != $name) { ?>
            <div class="col-12 col-md-6 col-lg-4">
              <div class="single-blog-post post-style-3 ">

                <div class="single-component pt-1 m-0">
                  <h4>
                    <?php echo $name ?>
                  </h4>
                  <!-- CARD -->
                  <div class="inside-component" style="background-image: linear-gradient(rgba(0, 0, 0, 0.427),rgba(0, 0, 0, 0.9)) ,
                    url(../img/componentes/<?php echo $componentList[$name][$type]['ruta'] ?>)">

                    <!-- Content display -->
                    <div class="component-content">
                      <div>

                        <?php
                        $check = false;

                        foreach ($componentList[$name] as $type => $num) { ?>
                          <h6 style="line-height: 5px;">
                            <?php echo $type;

                            if ($componentList[$name][$type]['cantidad'] == 0) { ?>
                              <s>- No disponible</s>
                              <button
                                onclick="window.location='../Controladores/ComponentesControlador.php?Adm=1&a=1&nom=<?php echo $name ?>&tip=<?php echo $type ?>'">
                                <div class="add-icon"></div>
                                <div class="btn-txt">+</div>
                              </button>

                            <?php } elseif ($componentList[$name][$type]['cantidad'] > 0) { ?>
                              - <i class="available">
                                <?php echo $componentList[$name][$type]['cantidad'] ?> disponibles
                              </i>
                              <button
                                onclick="window.location='../Controladores/ComponentesControlador.php?Adm=1&a=1&nom=<?php echo $name ?>&tip=<?php echo $type ?>'">
                                <div class="add-icon"></div>
                                <div class="btn-txt">+</div>
                              </button>
                              <button
                                onclick="window.location='../Controladores/ComponentesControlador.php?Adm=1&q=1&nom=<?php echo $name ?>&tip=<?php echo $type ?>'">
                                <div class="btn-txt">-</div>
                              </button>
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
                      </div>
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