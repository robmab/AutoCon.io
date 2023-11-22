<!DOCTYPE html>
<html lang="en">

<head>
  <link href='../Tema/Tabla/tabla.css' rel='stylesheet' type='text/css'>

  <?php include "../Tema/CSS.php";

  if (isset($_SESSION['chekon']))
    unset($_SESSION['chekon']);
  else
    header("Location:../Controladores/GVehiculosControlador.php");

  if (isset($_SESSION['rol'])) {
    if ($_SESSION['rol'] != 'Admin')
      header("Location:Index.php");
  } ?>

  <title>AutoCon - Gestión de Vehículos</title>
  <link rel="stylesheet" href="../Tema/Button/Cancelar.css">
</head>

<body>
  <?php include "../Tema/Menu.php" ?>

  <!-- HERO -->
  <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/gvehiculos.jpg)">
    <h1>Vehículos alquilados/reservados</h1>
  </div>

  <section >
    <div class="col-12 col-md-10 col-lg-8">
      <?php if (isset($_SESSION['mensajeBD'])) {
        echo " <h5 class='alert'> " . $_SESSION['mensajeBD'] . "</h5> ";
        unset($_SESSION['mensajeBD']);
      } ?>
    </div>

    <!-- Contact Form Area -->
    <div class="table">
      <table class="m-0">
        <thead>
          <tr>
            <th class="transparent">______________</th>
            <th>Número Vehículo</th>
            <th>Fecha</th>
            <th>Modelo</th>
            <th>Precio</th>
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
          <?php foreach ($_SESSION['datosGVehiculos'] as $num) { ?>
            <tr>
              <td>
                <img height="200%" width="200%" src="../img/bmw<?php echo $num['img'] ?>">
              </td>
              <td>#
                <?php echo $num['n'] ?>
              </td>
              <td>
                <?php echo $num['fecha'] ?>
              </td>
              <td>
                <?php echo $num['modelo'] ?>
              </td>
              <td>
                <?php echo $num['precio'] ?> €
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
                <?php if ($num['reservado'] == "Comprado") { ?>
                  <p class="buyed">Comprado</p>
                <?php } elseif ($num['reservado'] == "Si") { ?>
                  <p class="reserved">Reservado</p>
                <?php } else { ?>
                  <p class="rented">Alquilado por
                    <?php echo $num['precioAlquiler'] ?> € al mes
                  </p>
                <?php } ?>
              </td>
              <td>
                <?php if ($num['reservado'] != "Comprado") { ?>
                  <a href="../Controladores/GVehiculosControlador.php?<?php if ($num['alquilado'] == "Si") {
                    echo "alquilar=1&";
                  }
                  ?>comprar=1&usuario=<?php echo $num['idU']
                    ?>&vehiculo=<?php echo $num['idV'] ?>&n=<?php echo $num['n']
                       ?>&precio=<?php echo $num['precio']
                       ?>#1" class="<?php if ($num['reservado'] == "Si") {
                       ?>reserved <?php } else {
                       ?>rented   <?php } ?>  ">
                    &ltPasar a comprado&gt</a>
                <?php } ?>
              </td>
              <td>
                <?php if ($num['reservado'] != "Comprado") { ?>
                  <a href="../Controladores/GVehiculosControlador.php?cancelar=1&usuario=<?php echo $num['idU']
                    ?>&vehiculo=<?php echo $num['idV']
                    ?>&n=<?php echo $num['n']
                    ?>#1" class="delete">Cancelar</a>
                <?php } ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </section>

  <?php include "../Tema/Scripts.php" ?>
</body>

</html>