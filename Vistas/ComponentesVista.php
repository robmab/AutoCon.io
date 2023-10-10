<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php";

  /* CHECK CONTROLER */
  if (isset($_SESSION['chekonn']))
    unset($_SESSION['chekonn']);
  else
    header("Location:../Controladores/ComponentesControlador.php"); ?>

  <link href='../Tema/Button/on.css' rel='stylesheet' type='text/css'>
  <title>Componentes - AutoCon</title>
</head>

<body>
  <?php include "../Tema/Menu.php";
  $listaComponentes = $_SESSION['listaComponentes'] ?>

  <!-- ********** HERO ********** -->
  <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/componentes.jpg); 
      display: flex; justify-content: center; align-items: end; height:180px; margin-bottom:3em">
    <h1 style="color:rgb(242, 242, 242); text-shadow: 3px 3px 1px black;">Componentes de repuesto</h1>
  </div>



  <!-- ********** BODY ********** -->
  <div id="1" style="margin: 0; padding: 0; display: flex;
  flex-direction: column; align-items: center;">

    <!-- Admin Controller -->
    <?php if (isset($_SESSION['rol'])) {
      if ($_SESSION['rol'] == 'Admin') { ?>
        <div style="display: flex; justify-content: center;">
          <label class="switch">
            <input class="switch-input" type="checkbox" />
            <span onclick="window.location='../Controladores/ComponentesControlador.php?Adm2=1#1'" class="switch-label"
              data-on="Adm" data-off="Usu"></span>
            <span onclick="window.location='../Controladores/ComponentesControlador.php?Adm2=1#1'"
              class="switch-handle"></span>
          </label>
        </div>
      <?php }
    }

    /* Error Message */
    if (isset($_SESSION['mensajeBD'])) { ?>
      <div style="padding-bottom: 0.5em;">
        <?php echo " <h5 style='color:red;'> " . $_SESSION['mensajeBD'];
        unset($_SESSION['mensajeBD']); ?>
      </div>
    <?php } ?>

    <!-- ========== Components ========== -->
    <div class="row justify-content-center" style="display: flex;width: 100%;
    justify-content: center; padding: 0em 1em 2em 1em; ">



      <?php $cont = "";

      foreach ($listaComponentes as $nombre => $num) {
        foreach ($num as $tipo => $num2) {

          if ($cont != $nombre) { ?>
            <div class="col-12 col-md-6 col-lg-4" >
              <div class="single-blog-post post-style-3 " >

              <div class="pt-1 m-0" style="background-color: #131313; width: 100% !important; ">
                      <h4 style="color: white; text-align: center;">
                        <?php echo $nombre ?>
                      </h4>
                <!-- CARD -->
                <div style="display: flex; flex-direction: column; align-items: center;
                background-image: linear-gradient(rgba(0, 0, 0, 0.427),rgba(0, 0, 0, 0.9)) ,
                  url(../img/componentes/<?php echo $listaComponentes[$nombre][$tipo]['ruta'] ?>);
                background-repeat: no-repeat; background-size: cover; padding:1em 2em ; height: 13em;">

                  <div style="margin-bottom: auto; display: flex; flex-direction: column;
                  ">
                    <!-- Title -->
                    
                    </div>


                    <!-- Content display -->
                    <div style="display: flex; align-items: center; justify-content: center; height: 100%; ">
                      <form action="../Controladores/ComponentesControlador.php?comprar=1&nombre=<?php echo $nombre ?>#1"
                        method="post">

                        <?php
                        $check = false;

                        foreach ($listaComponentes[$nombre] as $tipo => $num) { ?>
                          <h6 style="color: white">
                            <?php if ($listaComponentes[$nombre][$tipo]['cantidad'] > 0) { ?>
                              <input style="width: 1.5em;height: 1.5em" type=radio name='tipo'
                                value="<?php echo $tipo ?>-<?php echo $listaComponentes[$nombre][$tipo]['precioR'] ?>">
                              <?php ;
                              $check = true;
                            }
                            echo $tipo ?>

                            <?php
                            if ($listaComponentes[$nombre][$tipo]['cantidad'] == 0) { ?>-
                              No disponible

                              <?php ;
                            } elseif ($listaComponentes[$nombre][$tipo]['descuento'] == 0) { ?>
                              por <i style="color: #3399ff; font-size: 18px; text-shadow: 0.1em 0.1em #000000">
                                <?php echo $listaComponentes[$nombre][$tipo]['precio'] ?>
                                €
                              </i>
                            <?php } else { ?>
                              por <strike>
                                <?php echo $listaComponentes[$nombre][$tipo]['precioO'] ?> €
                              </strike>
                              <i style="color: red; font-size: 22px;text-shadow: 0.1em 0.1em #000000">
                                <?php echo $listaComponentes[$nombre][$tipo]['precioR'] ?>
                                €
                              </i>
                            <?php }
                            ; ?>


                          </h6>

                        <?php }
                        ; ?>

                    </div>

                    <!-- Button -->
                    <div style="margin: auto auto 0;">
                      <?php if ($check) { ?> <button type="submit" name="submit" value="Submit"
                          class="btn world-btn">Comprar</button>
                        <?php ;
                      } ?>
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