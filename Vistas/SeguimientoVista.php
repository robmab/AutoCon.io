<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php";
  if (isset($_SESSION['chekon'])) {
    unset($_SESSION['chekon']);
  } else
    header("Location:../Controladores/SeguimientoControlador.php") ?>

    <title>AutoCon - Seguimientos</title>
    <link rel="stylesheet" href="../css/views/follow.css">
    <link rel="stylesheet" href="../Tema/Button/Cancelar.css">
  </head>

  <body>
  <?php include "../Tema/Menu.php" ?>

  <!-- ********** Hero Area ********** -->
  <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/seguimiento.jpg)">
    <h1>
      Seguimientos
    </h1>
  </div>
  <?php $counter = 0 ?>

  <section class="contact-area follow">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">

        </div>
        <?php if (isset($_SESSION['datosVehiculos'])) { ?>

          <!-- Contact Form Area -->
          <div class="col-12 col-md-10 col-lg-8 vehicles" id="1">
            <div class="contact-form">
              <div class="title-name">
                <h3>Vehículos</h3>
                <p>_______________________________________________________</p>
              </div>

              <?php
              if (isset($_SESSION['mensajeBD1'])) {
                echo " <h6 class='alert'> " . $_SESSION['mensajeBD1'] . "</h6> ";
                unset($_SESSION['mensajeBD1']);
              } ?>

              <!-- VEHICLES -->
              <table>
                <?php foreach ($_SESSION['datosVehiculos'] as $vehiculo => $num) {
                  foreach ($num as $date => $value) { ?>
                    <?php if ($date == 'img') { ?>
                      <tr>
                        <td>
                          <img src="../img/bmw<?php echo $value ?>" height="70%" width="70%">
                        <?php }

                    if ($date == 'vehiculo') { ?>
                          <p class="name">
                            <?php echo $value ?>
                          </p>
                        </td>
                      <?php }

                    if ($date == 'reservado') {
                      if ($value == 'Si') { ?>
                          <td class="reserved">
                            <h6>
                              <?php echo "Reservado" ?>
                            </h6>
                            <h6>
                              <?php echo " por €" . $num['precio'] . " " ?>
                            </h6>
                            <a href="../Controladores/SeguimientoControlador.php?R=1&vehicle=<?php echo $num['vehiculo']
                              ?>& n=<?php echo $num['n'] ?>#1">
                              Cancelar X
                            </a>
                          </td>

                        <?php } elseif ($value == 'Comprado') { ?>
                          <td class="buyed">
                            <h6>
                              <?php echo "Comprado" ?>
                            </h6>
                            <h6>
                              <?php echo "por " . $num['precio'] . " €" ?>
                            </h6>
                          <?php } ?>
                        </td>
                      <?php } ?>

                      <?php if ($date == 'alquilado') { ?>
                        <td class="rented">
                          <h6>
                            <?php echo "Alquilado" ?>
                          </h6>
                          <h6>
                            <?php echo " por ";
                            echo $num['precio'] . " € al mes." ?>
                          </h6>
                          <a href="../Controladores/SeguimientoControlador.php?A=1&vehicle=<?php echo $num['vehiculo']
                            ?>& n=<?php echo $num['n'] ?>#1"">
                            Cancelar X
                          </a>

                        </td>
                      <?php } ?>

                      <?php if ($date == 'n') { ?>
                        <td>
                          <i>
                            <?php echo $num['fecha'] ?>
                          </i>
                          <h6>#
                            <?php echo $num['n'] ?>
                          </h6>
                        </td>
                      </tr>
                    <?php }
                  }
                } ?>
              </table>

            </div>
          </div>

          <?php
          $counter = 1;
          unset($_SESSION['datosVehiculos']);
        } ?>

        <?php
        if (isset($_SESSION['datosComponentes'])) {
          ?>
          <div class=" col-12 col-md-10 col-lg-8 components" id="2">
                      <div class="contact-form">
                        <div class="title-name">
                          <h3>Componentes</h3>
                          <p>_______________________________________________________</p>
                        </div>

                        <?php if (isset($_SESSION['mensajeBD2'])) {
                          echo " <h6 class='alert'> " . $_SESSION['mensajeBD2'] . "</h6> ";
                          unset($_SESSION['mensajeBD2']);
                        } ?>

                        <!-- Data -->
                        <table>
                          <?php

                          foreach ($_SESSION['datosComponentes'] as $componente => $num) {
                            foreach ($num as $date => $value) { ?>
                              <?php if ($date == 'ruta') { ?>
                                <tr>
                                  <td class="name"> <img src="../img/componentes/<?php echo $value; ?>" height="40%"
                                      width="40%">
                                  <?php }
                              if ($date == 'nombre') { ?>
                                    <p>
                                      <?php echo $value . " - ";
                              } ?>
                                    <?php if ($date == 'tipo') {
                                      echo $value ?>
                                    </p>
                                  </td>
                                <?php }
                                    if ($date == 'cantidad' and $num['finalizado'] == 'No') { ?>
                                  <td class="quantity">
                                    <h6>
                                      <?php echo "Cantidad x" . $value ?>
                                    </h6>
                                    <h6>
                                      <?php echo $num['precio'] ?> €
                                    </h6>
                                    <?php if ($value > 1) { ?>
                                      <a href="../Controladores/SeguimientoControlador.php?one=1&name=<?php echo $num['nombre']
                                        ?>&type=<?php echo $num['tipo'] ?>& n=<?php echo $num['n'] ?>#2">
                                        Cancelar 1
                                      </a>
                                      <a> | </a>
                                      <a href="../Controladores/SeguimientoControlador.php?all=1&name=<?php echo $num['nombre'] ?>&type=<?php echo $num['tipo']
                                           ?>&amount=<?php echo $num['cantidad'] ?>& n=<?php echo $num['n'] ?>#2">
                                        CancelarTodos
                                      </a>
                                      <p>____________________________</p>
                                    </td>
                                  <?php } else { ?>
                                    <a href="../Controladores/SeguimientoControlador.php?unique=1&name=<?php echo $num['nombre']
                                      ?>&type=<?php echo $num['tipo'] ?>& n=<?php echo $num['n'] ?>#2">
                                      Cancelar X
                                    </a>
                                    <p>____________________________</p>
                          </td>
                        <?php }
                                    } ?>

                      <?php if ($date == 'cantidad' and $num['finalizado'] == 'Si') { ?>
                        <td class="quantity-x">
                          <h6>Cantidad x
                            <?php echo $num['cantidad'] ?>
                          </h6>
                          <h6>
                            <?php echo $num['precio'] ?> €
                          </h6>
                          <h6 class="a">Comprado</h6>
                          <p>____________________________</p>
                        </td>
                      <?php }
                      if ($date == 'fecha') { ?>
                        <td>
                          <i>
                            <?php echo $num['fecha'] ?>
                          </i>
                          <h6>#
                            <?php echo $num['n'] ?>
                          </h6>
                        </td>
                      </tr>
                    <?php }
                            }
                          } ?>
              </table>
            </div>
          </div>

          <?php
          $counter = 1;
          unset($_SESSION['datosComponentes']);
        }

        if (isset($_SESSION['datosReparacion'])) { ?>

          <div class="col-12 col-md-10 col-lg-8 services" id="3">
            <div class="contact-form">
              <div class="title-name">
                <h3>Servicios</h3>
                <p>_______________________________________________________</p>
              </div>

              <?php if (isset($_SESSION['mensajeBD3'])) {
                echo " <h6 class='alert'> " . $_SESSION['mensajeBD3'] . "</h6> ";
                unset($_SESSION['mensajeBD3']);
              } ?>

              <!-- Data -->
              <table>
                <?php foreach ($_SESSION['datosReparacion'] as $servicio => $num) {
                  foreach ($num as $date => $value) {
                    if ($num['aceptado'] != 'Finalizado') {
                      if ($date == 'servicio') { ?>
                        <tr>
                          <td class="img">
                            <?php if ($value == 'sustituir') { ?>
                              <img src="../img/reparacion/1.jpg" height="60%" width="60%">
                              <a>_____________________ </a>
                              <h6>Sustituir piezas defectuosas</h6>
                            <?php }
                            if ($value == 'neumatico') { ?>
                              <img src="../img/reparacion/2.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                              <h6>Cambio de Neumáticos</h6>
                            <?php }
                            if ($value == 'llanta') { ?>
                              <img src="../img/reparacion/3.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                              <h6>Revisión de llantas</h6>
                            <?php }
                            if ($value == 'aceite') { ?>
                              <img src="../img/reparacion/4.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                              <h6>Aceite y Liquidos</h6>
                            <?php }
                            if ($value == 'pintura') { ?>
                              <img src="../img/reparacion/5.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                              <h6>Renovación de pinturas y arañazos</h6>
                            <?php } ?>
                            <?php if ($value == 'carroceria') { ?><img src="../img/reparacion/7.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                              <h6>Reparación carrocería</h6>
                            <?php }
                            if ($value == 'bateria') { ?>
                              <img src="../img/reparacion/6.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                            </td>

                            <td class="name">
                              <h6>Baterías y Arranque</h6>
                            <?php }
                            if ($value == 'bombilla') { ?>
                              <img src="../img/reparacion/8.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                            </td>
                            <td class="name">
                              <h6>Bombillas</h6>
                            <?php }
                            if ($value == 'parabrisas') { ?>
                              <img src="../img/reparacion/9.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                            </td>
                            <td class="name">
                              <h6>Limpia-parabrisas y escobillas</h6>
                            <?php }
                            if ($value == 'limpieza') { ?>
                              <img src="../img/reparacion/10.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                            </td>
                            <td class="name">
                              <h6>Limpieza</h6>
                            <?php }
                      }

                      if ($date == 'fecha') { ?>
                            <p>
                              <?php echo $value ?>
                            </p>
                            <a>___________________________</a>
                          </td>
                          <td class="name">
                            <p>______</p>
                          </td>
                        <?php }

                      if ($date == 'aceptado') { ?>
                          <td class="check">
                            <?php if ($num['aceptado'] == 'Si') { ?>
                              <p>________________</p>
                              <h6 class="name">Aceptado</h6>

                            <?php } elseif ($num['aceptado'] == 'Espera') { ?>
                              <p>________________</p>
                              <h6>
                                <?php echo $value ?>
                              </h6>
                            <?php }
                      } ?>

                          <?php if ($date == 'precio') { ?>
                            <h6>
                              <?php if ($value > 0) {
                                echo $value ?> €
                              <?php } ?>
                            </h6>

                            <?php if ($num['aceptado'] != 'Finalizado') { ?>
                              <a href="../Controladores/SeguimientoControlador.php?date=<?php echo $num['fecha']
                                ?>&service=<?php echo $num['servicio'] ?>&n=<?php echo $num['n'] ?>#3">
                                Cancelar X
                              </a>
                              <p>________________</p>
                            <?php } ?>
                          </td>
                          <td>
                            <h6>#
                              <?php echo $num['n'] ?>
                            </h6>
                          </td>
                        </tr>
                      <?php }
                    }
                  }
                }

                //Finished
                foreach ($_SESSION['datosReparacion'] as $servicio => $num) {
                  foreach ($num as $date => $value) {
                    if ($num['aceptado'] == 'Finalizado') {
                      if ($date == 'servicio') { ?>
                        <tr class="finished">
                          <td>
                            <?php if ($value == 'sustituir') { ?>
                              <img src="../img/reparacion/1.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                            </td>
                            <td>
                              <h6>Sustituir piezas defectuosas</h6>
                            <?php }
                            if ($value == 'neumatico') { ?>
                              <img src="../img/reparacion/2.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                            </td>
                            <td>
                              <h6>Cambio de Neumáticos</h6>
                            <?php }
                            if ($value == 'llanta') { ?>
                              <img src="../img/reparacion/3.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                            </td>
                            <td>
                              <h6>Revisión de llantas</h6>
                            <?php }
                            if ($value == 'aceite') { ?>
                              <img src="../img/reparacion/4.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                            </td>
                            <td>
                              <h6>Aceite y Liquidos</h6>
                            <?php }
                            if ($value == 'pintura') { ?>
                              <img src="../img/reparacion/5.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                            </td>
                            <td>
                              <h6>Renovación de pinturas y arañazos</h6>
                            <?php }
                            if ($value == 'carroceria') { ?><img src="../img/reparacion/7.jpg" height="60%"
                                width="60%">
                              <a>_____________________</a>
                            </td>
                            <td>
                              <h6>Reparación carrocería</h6>
                            <?php }
                            if ($value == 'bateria') { ?><img src="../img/reparacion/6.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                            </td>
                            <td>
                              <h6>Baterías y Arranque</h6>
                            <?php }
                            if ($value == 'bombilla') { ?>
                              <img src="../img/reparacion/8.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                            </td>
                            <td>
                              <h6>Bombillas</h6>
                            <?php }
                            if ($value == 'parabrisas') { ?>
                              <img src="../img/reparacion/9.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                            </td>
                            <td>
                              <h6>Limpia-parabrisas y escobillas</h6>
                            <?php }
                            if ($value == 'limpieza') { ?>
                              <img src="../img/reparacion/10.jpg" height="60%" width="60%">
                              <a>_____________________</a>
                            </td>
                            <td>
                              <h6>Limpieza</h6>
                            <?php }
                      } ?>

                          <?php if ($date == 'fecha') { ?>
                            <p>
                              <?php echo $value ?>
                            </p>
                            <a>___________________________</a>
                          </td>
                        <?php } ?>

                        <?php if ($date == 'aceptado') { ?>
                          <td class="value">
                            <p class="a">________________</p>
                            <?php if ($num['aceptado'] == 'Si') { ?>
                              <p class="b">Aceptado</p>
                            <?php } elseif ($num['aceptado'] == 'Finalizado') { ?>
                              <h6 class="a">Finalizado</h6>
                            <?php }
                        } ?>

                          <?php if ($date == 'precio') { ?>
                            <h6>
                              <?php if ($value > 0) {
                                echo $value ?> €
                              <?php } ?>
                            </h6>
                            <p class="a">________________</p>

                            <?php if ($num['aceptado'] != 'Finalizado') { ?>
                              <a href="../Controladores/SeguimientoControlador.php?date=<?php echo $num['fecha']
                                ?>&service=<?php echo $num['servicio'] ?>">
                                Cancelar X
                              </a>
                            <?php } ?>
                          </td>
                          <td>
                            <h6>#
                              <?php echo $num['n'] ?>
                            </h6>
                          </td>
                        </tr>
                      <?php }
                    }
                  }
                } ?>
              </table>
            </div>
          </div>
          <?php
          $counter = 1;
          unset($_SESSION['datosReparacion']);
        } ?>

        <?php if ($counter == 0) { ?>
          <div class="col-12 col-md-10 col-lg-8">
            <div class="contact-form">

              <?php if (isset($_SESSION['mensajeBD1'])) {
                echo " <h6 class='alert'> " . $_SESSION['mensajeBD1'] . "</h6> ";
                unset($_SESSION['mensajeBD1']);
              } ?>

              <?php if (isset($_SESSION['mensajeBD2'])) {
                echo " <h6 class='alert'> " . $_SESSION['mensajeBD2'] . "</h6> ";
                unset($_SESSION['mensajeBD2']);
              } ?>

              <?php if (isset($_SESSION['mensajeBD3'])) {
                echo " <h6 class='alert'> " . $_SESSION['mensajeBD3'] . "</h6> ";
                unset($_SESSION['mensajeBD3']);
              } ?>

              <h5>
                Aún no has realizado ninguna compra o solicitado algún servicio.
              </h5>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <?php include "../Tema/Scripts.php" ?>
</body>

</html>