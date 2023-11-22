<!DOCTYPE html>
<html lang="en">

<head>
  <link href='../Tema/Tabla/tabla.css' rel='stylesheet' type='text/css'>
  <?php include "../Tema/CSS.php";

  if (isset($_SESSION['chekon']))
    unset($_SESSION['chekon']);
  else
    header("Location:../Controladores/EventosControlador.php");

  if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] != 'Admin')
      header("Location:Index.php");
  } ?>

  <title>AutoCon - Gestión de Eventos</title>
  <link rel="stylesheet" href="../Tema/Button/Cancelar.css">
</head>

<body>
  <?php include "../Tema/Menu.php" ?>

  <!-- HERO -->
  <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/eventos.jpg)">
    <h1>Gestionar Eventos de Descuento</h1>
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
      <!-- Datos -->
      <table>
        <thead>
          <tr>
            <th>Nombre Evento</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>% Descuento</th>
            <th class="text-center">
              Banner
            </th>
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($_SESSION['datosEventos'] as $num) { ?>
            <tr>
              <td>
                <?php echo $num['nombre'] ?>
              </td>
              <td>
                <?php echo $num['fechaI'] ?>
              </td>
              <td>
                <?php echo $num['fechaF'] ?>
              </td>
              <td>
                <?php echo $num['porciento'] . " %" ?>
              </td>

              <form method="post"
                action="../Controladores/EventosControlador.php?editar=1&fi=<?php echo $num['fechaII'] ?>&ff=<?php echo $num['fechaFF'] ?>#1">
                <td>
                  <input name="banner" type="text" class="banner" required="" value="<?php echo $num['banner'] ?>" />
                </td>
                <td>
                  <button type="submit" class="btn ">Editar</button>
                </td>
              </form>
              <td>
                <a href="../Controladores/EventosControlador.php?eliminar=1&fi=<?php echo $num['fechaII']
                  ?>&ff=<?php echo $num['fechaFF']
                  ?>#1" class="delete">Cancelar</a>
              </td>
            </tr>
          <?php } ?>

          <tr>
            <td colspan="7"></td>
          </tr>
          <tr>
            <form method="post" action="../Controladores/EventosControlador.php?añadir=1#1">
              <td><input class="banner" name="nombre" type="text" required="" /></td>
              <td><input class="fecha" name="fechaI" type="date" required="" /></td>
              <td><input class="fecha" name="fechaF" type="date" required="" /></td>
              <td><input class="porciento" name="porciento" type="number" step="0.01" required="" min="0.01" /></td>
              <td><input name="banner" type="text" class="banner" required="" /></td>
              <td>
                <button type="submit" class="btn ">Añadir</button>
              </td>
              <td></td>
            </form>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <?php include "../Tema/Scripts.php" ?>
</body>

</html>