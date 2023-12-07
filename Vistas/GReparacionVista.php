<!DOCTYPE html>
<html lang="en">

<head>
  <link href='../Tema/Tabla/tabla.css' rel='stylesheet' type='text/css'>
  <?php include "../Tema/CSS.php";

  if (isset($_SESSION['chekon']))
    unset($_SESSION['chekon']);
  else
    header("Location:../Controladores/GReparacionControlador.php");

  if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] != 'Admin')
      header("Location:Index.php");
  } ?>

  <title>AutoCon - Servicios solicitados</title>
  <link rel="stylesheet" href="../Tema/Button/Cancelar.css">
</head>

<body>
  <?php include "../Tema/Menu.php" ?>

  <!-- HERO -->
  <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/greparar.jpg)">
    <h1>Servicios Solicitados</h1>
  </div>

  <section>
    <div class="col-12 col-md-10 col-lg-8">
      <?php if (isset($_SESSION['mensajeBD'])) {
        echo " <h5 class='alert'> " . $_SESSION['mensajeBD'] . "</h5> ";
        unset($_SESSION['mensajeBD']);
      } ?>
    </div>

    <!-- Contact Form Area -->
    <div class="table">
      <table style="margin: 0;">
        <thead>
          <tr>
            <th class="transparent">___</th>
            <th>Numero Servicio</th>
            <th>Fecha</th>
            <th>Servicio</th>
            <th>Precio(€)</th>
            <th>Nombre de Usuario</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>DNI</th>
            <th>Estado</th>
            <th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($_SESSION['servicesDate'] as $num) {
            if ($num['aceptado'] != "Finalizado") { ?>
              <tr>
                <td>
                  <img class="services-img" src="../img/reparacion/<?php if ($num['servicio'] == 'sustituir') {
                    echo "1.jpg";
                  } elseif ($num['servicio'] == 'neumatico') {
                    echo "2.jpg";
                  } elseif ($num['servicio'] == 'llanta') {
                    echo "3.jpg";
                  } elseif ($num['servicio'] == 'aceite') {
                    echo "4.jpg";
                  } elseif ($num['servicio'] == 'pintura') {
                    echo "5.jpg";
                  } elseif ($num['servicio'] == 'carroceria') {
                    echo "7.jpg";
                  } elseif ($num['servicio'] == 'bateria') {
                    echo "6.jpg";
                  } elseif ($num['servicio'] == 'bombilla') {
                    echo "8.jpg";
                  } elseif ($num['servicio'] == 'parabrisas') {
                    echo "9.jpg";
                  } elseif ($num['servicio'] == 'limpieza') {
                    echo "10.jpg";
                  } ?>">
                </td>
                <td>
                  <?php echo "#" . $num['n'] ?>
                </td>
                <td>
                  <?php echo $num['fecha'] ?>
                </td>
                <td>
                  <?php if ($num['servicio'] == 'sustituir') {
                    echo "Sustituir piezas defectuosas";
                  } ?>
                  <?php if ($num['servicio'] == 'neumatico') {
                    echo "Cambio de Neumáticos";
                  } ?>
                  <?php if ($num['servicio'] == 'llanta') {
                    echo "Revisión de llantas";
                  } ?>
                  <?php if ($num['servicio'] == 'aceite') {
                    echo "Aceite y Liquidos";
                  } ?>
                  <?php if ($num['servicio'] == 'pintura') {
                    echo "Renovación de pinturas y arañazos";
                  } ?>
                  <?php if ($num['servicio'] == 'carroceria') {
                    echo "Reparación carrocería";
                  } ?>
                  <?php if ($num['servicio'] == 'bateria') {
                    echo "Baterías y Arranque";
                  } ?>
                  <?php if ($num['servicio'] == 'bombilla') {
                    echo "Bombillas";
                  } ?>
                  <?php if ($num['servicio'] == 'parabrisas') {
                    echo "Limpia-parabrisas y escobillas";
                  } ?>
                  <?php if ($num['servicio'] == 'limpieza') {
                    echo "Limpieza";
                  } ?>
                </td>
                <p class="delete">
                  <td>
                    <?php if ($num['aceptado'] == "Si") { ?>

                      <form method="post"
                        action="../Controladores/GReparacionControlador.php?edit=1&n=<?php echo $num['n'] ?>#1">
                        <input class="services" name="priceE" type="number" required step="0.01"
                          value="<?php echo $num['precio'] ?>" />

                        <?php if (isset($_SESSION['rebaja'])) { ?>
                          <p class="delete">
                            <?php echo $_SESSION['rebaja'] . "% D." ?>
                          </p>
                        <?php } ?>
                        <button type="submit" class="btn">Editar</button>
                      </form>

                    <?php } elseif ($num['aceptado'] != "Espera") {
                      echo $num['precio'] . " €";
                    } ?>
                  </td>
                  <td>
                    <?php echo $num['nombreUsuario'] ?>
                  </td>
                  <td>
                    <?php echo $num['nombre'] ?>
                  </td>
                  <td>
                    <?php echo $num['apellidos'] ?>
                  </td>
                  <td>
                    <?php echo $num['correo'] ?>
                  </td>
                  <td>
                    <?php echo $num['numeroMovil'] ?>
                  </td>
                  <td>
                    <?php echo $num['nif'] ?>
                  </td>
                  <td>
                    <?php if ($num['aceptado'] == "Si") { ?>
                      <p class="accepted">Aceptado</p>
                    <?php } elseif ($num['aceptado'] == "Espera") { ?>
                      <p class="standby">En espera</p>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if ($num['aceptado'] == "Espera") { ?>

                      <form method="post"
                        action="../Controladores/GReparacionControlador.php?accept=1&n=<?php echo $num['n'] ?>#1">
                        <div class="align">
                          <input class="services" name="price" type="number" required step="0.01" />
                          <button type="submit" class="btn ">Aplicar Precio €</button>
                        </div>
                      </form>

                    <?php } elseif ($num['aceptado'] == "Si") { ?>
                      <a href="../Controladores/GReparacionControlador.php?end=1&n=<?php echo
                        $num['n'] ?>#1" class="accepted text-center"> &ltFinalizar&gt
                      </a>
                    <?php } ?>
                  </td>

                  <td>
                    <?php if ($num['aceptado'] != "Finalizado") { ?>
                      <a href="../Controladores/GReparacionControlador.php?cancel=1&n=<?php echo $num['n'] ?>#1"
                        class="delete">Cancelar</a>
                    <?php } ?>
                  </td>
              </tr>
            <?php }
          }

          foreach ($_SESSION['servicesDate'] as $num) {
            if ($num['aceptado'] == "Finalizado") { ?>
              <tr>
                <td>
                  <img class="services-img" height="200%" width="200%" src="../img/reparacion/<?php if ($num['servicio'] == 'sustituir') {
                    echo "1.jpg";
                  } elseif ($num['servicio'] == 'neumatico') {
                    echo "2.jpg";
                  } elseif ($num['servicio'] == 'llanta') {
                    echo "3.jpg";
                  } elseif ($num['servicio'] == 'aceite') {
                    echo "4.jpg";
                  } elseif ($num['servicio'] == 'pintura') {
                    echo "5.jpg";
                  } elseif ($num['servicio'] == 'carroceria') {
                    echo "7.jpg";
                  } elseif ($num['servicio'] == 'bateria') {
                    echo "6.jpg";
                  } elseif ($num['servicio'] == 'bombilla') {
                    echo "8.jpg";
                  } elseif ($num['servicio'] == 'parabrisas') {
                    echo "9.jpg";
                  } elseif ($num['servicio'] == 'limpieza') {
                    echo "10.jpg";
                  } ?>">
                </td>
                <td>
                  <?php echo "#" . $num['n'] ?>
                </td>
                <td>
                  <?php echo $num['fecha'] ?>
                </td>
                <td>
                  <?php if ($num['servicio'] == 'sustituir') {
                    echo "Sustituir piezas defectuosas";
                  } ?>
                  <?php if ($num['servicio'] == 'neumatico') {
                    echo "Cambio de Neumáticos";
                  } ?>
                  <?php if ($num['servicio'] == 'llanta') {
                    echo "Revisión de llantas";
                  } ?>
                  <?php if ($num['servicio'] == 'aceite') {
                    echo "Aceite y Liquidos";
                  } ?>
                  <?php if ($num['servicio'] == 'pintura') {
                    echo "Renovación de pinturas y arañazos";
                  } ?>
                  <?php if ($num['servicio'] == 'carroceria') {
                    echo "Reparación carrocería";
                  } ?>
                  <?php if ($num['servicio'] == 'bateria') {
                    echo "Baterías y Arranque";
                  } ?>
                  <?php if ($num['servicio'] == 'bombilla') {
                    echo "Bombillas";
                  } ?>
                  <?php if ($num['servicio'] == 'parabrisas') {
                    echo "Limpia-parabrisas y escobillas";
                  } ?>
                  <?php if ($num['servicio'] == 'limpieza') {
                    echo "Limpieza";
                  } ?>
                </td>
                <td>
                  <?php echo $num['precio'] . " €"; ?>
                </td>
                <td>
                  <?php echo $num['nombreUsuario'] ?>
                </td>
                <td>
                  <?php echo $num['nombre'] ?>
                </td>
                <td>
                  <?php echo $num['apellidos'] ?>
                </td>
                <td>
                  <?php echo $num['correo'] ?>
                </td>
                <td>
                  <?php echo $num['numeroMovil'] ?>
                </td>
                <td>
                  <?php echo $num['nif'] ?>
                </td>
                <td>
                  <?php if ($num['aceptado'] == "Finalizado") { ?>
                    <p class="ended">Finalizado</p>
                  <?php } ?>
                </td>
                <td></td>
                <td></td>
              </tr>
            <?php }
          } ?>
        </tbody>
      </table>
    </div>
  </section>

  <?php include "../Tema/Scripts.php" ?>
</body>

</html>