<?php

?>
<!-- Preloader Start -->
<div id="preloader">
  <div class="preload-content">
    <div id="world-load"></div>
  </div>
</div>
<!-- Preloader End -->

<!-- ***** Header Area Start ***** -->
<header class="header-area">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg">
          <!-- Logo -->
          <a class="navbar-brand" href="Index.php"><img src="../img/core-img/logo.png" alt="Logo"></a>
          <!-- Navbar Toggler -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav"
            aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span
              class="navbar-toggler-icon"></span></button>
          <!-- Navbar -->
          <div class="collapse navbar-collapse" id="worldNav">
            <ul class="navbar-nav ml-auto">
              <?php if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol'] == "Admin") { ?>
                  <li class="nav-item">
                    <a style="color: #999999;border: solid;font-size: 17px;border-color: #999999" class="nav-link"
                      href="PanelDeControl.php">Panel de Control</a>
                  </li>

                <?php }
              } ?>


              <li class="nav-item">
                <a style="font-size: 17px" class="nav-link" href="Index.php">Home</a>
              </li>

              <li class="nav-item">
                <a style="font-size: 17px" class="nav-link"
                  href="../Controladores/VehiculosControlador.php">Vehículos</a>
              </li>

              <li class="nav-item">
                <a style="font-size: 17px" class="nav-link"
                  href="../Controladores/ComponentesControlador.php">Componentes</a>
              </li>

              <li class="nav-item">
                <a style="font-size: 17px" class="nav-link" href="ReparacionVista.php">Servicios</a>
              </li>

              <?php if (isset($_SESSION["user"])) { ?>
                <li class="nav-item dropdown">
                  <a style="font-size: 17px" class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['user'] ?>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                    <a style="font-size: 17px" class="dropdown-item"
                      href="../Controladores/PerfilControlador.php">Perfil</a>
                    <a style="font-size: 17px" class="dropdown-item"
                      href="../Controladores/SeguimientoControlador.php">Seguimientos</a>
                    <a style="font-size: 17px" class="dropdown-item"
                      href="../Controladores/CerrarSesionControlador.php">Cerrar Sesion</a>

                  </div>
                </li>



              <?php } else { ?>

                <li class="nav-item">
                  <a style="font-size: 17px" class="nav-link" href="LoginVista.php">Iniciar Sesión</a>
                </li>

              <?php } ?>

            </ul>
            <!-- Search Form  -->
            <!--                            <div id="search-wrapper">
                                <form action="#">
                                    <input type="text" id="search" placeholder="Busca algo...">
                                    <div id="close-icon"></div>
                                    <input class="d-none" type="submit" value="">
                                </form>
                            </div>
                            <div >-->
            <?php


            if (isset($_SESSION['user'])) {

              if ($_SESSION['rol'] == "Admin") {
                ?>
                <p><a style="color: #007bff">
                    <?php echo "Administrador</a> ha iniciado sesión</p> ";

              } elseif ($_SESSION['rol'] == "Usuario") {
                ?>
                    <p><a style="color: greenyellow">
                        <?php
                        echo "Usuario</a> ha iniciado sesión</p> ";
              }

            }
            ;

            ?>
          </div>

      </div>

      </nav>

    </div>

  </div>
  </div>
  <?php include "../Tema/Banner.php"; ?>

</header>


<!-- ***** Header Area End ***** -->
