<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php";
  if (isset($_SESSION['checkon']))
    unset($_SESSION['checkon']);
  else
    header("Location:../Controladores/PerfilControlador.php");
  ?>
  <link rel="stylesheet" href="../css/views/profile.css">
  <title>AutoCon - Perfil</title>
</head>

<body>
  <?php include "../Tema/Menu.php";

  $user_data = $_SESSION['datosUsu'];
  if (isset($_SESSION['datosTar']))
    $card_date = $_SESSION['datosTar'];

  if (isset($_REQUEST['editar'])) { ?>

    <!-----  | EDIT PROFILE |  ----->

  <!------ HERO ------>
    <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/perfil.jpg)">
      <h1>
        Editar datos personales
      </h1>
    </div>

    <section class="profile edit contact-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-8">
            <div class="contact-form">

              <p class='msg'><i>Los datos en blanco no serán modificados</i></p>
              <!-- Data -->
              <form action="../Controladores/ValidarNumero.php?edite=1#1" method="post"
                onsubmit="return dobValidate('dn')">
                <div class="row">

                  <div class="col-12 col-md-6">
                    <div class="group">
                      <input type="text" name="nombreUs" id="nombreUs" autocomplete="off"
                        value="<?php echo $user_data['nombreUsuario'] ?>">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Nombre de Usuario</label>
                    </div>
                  </div>

                  <div class="col-12 col-md-6">
                    <div class="group">
                      <input type="email" name="email" id="email" autocomplete="off"
                        value="<?php echo $user_data['correo'] ?>">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Correo</label>
                    </div>
                  </div>

                  <div class="col-12 col-md-6">
                    <div class="group">
                      <input type="text" name="nombre" id="nombre" autocomplete="off"
                        value="<?php echo $user_data['nombre'] ?>">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Nombre</label>
                    </div>

                  </div>
                  <div class="col-12 col-md-6">
                    <div class="group">
                      <input type="text" name="apellidos" id="apellidos" autocomplete="off"
                        value="<?php echo $user_data['apellidos'] ?>">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Apellidos</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="group">
                      <input type="text" name="direccion" id="direccion" autocomplete="off"
                        value="<?php echo $user_data['domicilio'] ?>">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Dirección</label>
                    </div>
                  </div>

                  <div class="col-12 col-md-6">
                    <div class="group">
                      <input type="text" name="nif" id="nif" autocomplete="off" maxlength="9" minlength="9"
                        value="<?php echo $user_data['nif'] ?>">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>DNI </label>
                    </div>
                  </div>

                  <div class="col-12 col-md-6">
                    <div class="group">
                      <input type="date" name="fechaNac" id="fechaNac" autocomplete="off"
                        value="<?php echo $user_data['fechaNacimiento'] ?>">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Fecha de Nacimiento </label>
                    </div>
                  </div>

                  <div class="col-12 col-md-6 select">
                    <div class="group">
                      <p>Provincia</p>
                      <select name="provincia" id="provincia">
                        <option selected="true" disabled="disabled">
                          <?php echo $user_data['provincia'] ?>
                        </option>
                        <option value='alava'>Álava</option>
                        <option value='albacete'>Albacete</option>
                        <option value='alicante'>Alicante/Alacant</option>
                        <option value='almeria'>Almería</option>
                        <option value='asturias'>Asturias</option>
                        <option value='avila'>Ávila</option>
                        <option value='badajoz'>Badajoz</option>
                        <option value='barcelona'>Barcelona</option>
                        <option value='burgos'>Burgos</option>
                        <option value='caceres'>Cáceres</option>
                        <option value='cadiz'>Cádiz</option>
                        <option value='cantabria'>Cantabria</option>
                        <option value='castellon'>Castellón/Castelló</option>
                        <option value='ceuta'>Ceuta</option>
                        <option value='ciudadreal'>Ciudad Real</option>
                        <option value='cordoba'>Córdoba</option>
                        <option value='cuenca'>Cuenca</option>
                        <option value='girona'>Girona</option>
                        <option value='laspalmas'>Las Palmas</option>
                        <option value='granada'>Granada</option>
                        <option value='guadalajara'>Guadalajara</option>
                        <option value='guipuzcoa'>Guipúzcoa</option>
                        <option value='huelva'>Huelva</option>
                        <option value='huesca'>Huesca</option>
                        <option value='illesbalears'>Illes Balears</option>
                        <option value='jaen'>Jaén</option>
                        <option value='acoruña'>A Coruña</option>
                        <option value='larioja'>La Rioja</option>
                        <option value='leon'>León</option>
                        <option value='lleida'>Lleida</option>
                        <option value='lugo'>Lugo</option>
                        <option value='madrid'>Madrid</option>
                        <option value='malaga'>Málaga</option>
                        <option value='melilla'>Melilla</option>
                        <option value='murcia'>Murcia</option>
                        <option value='navarra'>Navarra</option>
                        <option value='ourense'>Ourense</option>
                        <option value='palencia'>Palencia</option>
                        <option value='pontevedra'>Pontevedra</option>
                        <option value='salamanca'>Salamanca</option>
                        <option value='segovia'>Segovia</option>
                        <option value='sevilla'>Sevilla</option>
                        <option value='soria'>Soria</option>
                        <option value='tarragona'>Tarragona</option>
                        <option value='santacruztenerife'>Santa Cruz de Tenerife</option>
                        <option value='teruel'>Teruel</option>
                        <option value='toledo'>Toledo</option>
                        <option value='valencia'>Valencia/Valéncia</option>
                        <option value='valladolid'>Valladolid</option>
                        <option value='vizcaya'>Vizcaya</option>
                        <option value='zamora'>Zamora</option>
                        <option value='zaragoza'>Zaragoza</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-12 col-md-6">
                    <div class="group">
                      <input type="text" name="poblacion" id="poblacion" autocomplete="off"
                        value="<?php echo $user_data['poblacion'] ?>">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Población </label>
                    </div>
                  </div>

                  <div class="col-12 col-md-6">
                    <div class="group">
                      <input type="text" name="codigoP" id="codigoP" autocomplete="off"
                        value="<?php echo $user_data['codigoPostal'] ?>">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Código Postal </label>
                    </div>
                  </div>

                  <div class="col-12 col-md-6 tlf">
                    <div class="group">
                      <input type="text" name="movil" id="movil" autocomplete="off"
                        value="<?php echo $user_data['numeroMovil'] ?>">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Numero teléfono </label>
                    </div>
                  </div>

                  <div class="col-12 col-md-6">
                    <div class="group">
                      <input type="password" name="contraseñaActual" id="contraseñaActual" autocomplete="off">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Contraseña actual</label>
                      <?php if (isset($_SESSION['errC'])) {
                        echo " <p class='alert'> " . $_SESSION['errC'] . "</p> ";
                        unset($_SESSION['errC']);
                      } ?>
                    </div>
                  </div>

                  <div class="col-12 col-md-6">
                    <div class="group">
                      <input type="password" name="contraseñaNueva" id="contraseñaNueva" autocomplete="off">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Nueva contraseña</label>
                    </div>
                  </div>

                  <div class="col-12 col-md-6">
                    <div class="group" id="1">
                      <input type="password" name="contraseñaNueva2" id="contraseñaNueva2" oninput="check(this)"
                        autocomplete="off">
                      <span class="highlight"></span>
                      <span class="bar"></span>
                      <label>Repite contraseña</label>
                    </div>
                  </div>
                </div>

                <?php if (isset($_SESSION['mensajeBD'])) {
                  echo " <p class='alert'> " . $_SESSION['mensajeBD'] . "</p> ";
                  unset($_SESSION['mensajeBD']);
                } ?>

                <div class="col-12 but">
                  <button type="submit" class="btn world-btn">Editar</button>
                </div>
            </div>
          </div>
        </div>
        </form>
      </div>
    </section>

  <?php } else { ?>

    <!------ | PROFILE VIEW | ------>

    <!---- HERO ---->
    <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/perfil.jpg)">
      <h1>Datos Personales</h1>
    </div>

    <section class="profile view contact-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-8" id="1">
            <div class="contact-form view">

              <?php if (isset($_SESSION['mensajeBD'])) {
                echo " <h6 class='alert'> " . $_SESSION['mensajeBD'] . "</h6> ";
                unset($_SESSION['mensajeBD']);
              } ?>

              <!------- USER DATA ------->
            <form action="../Controladores/PerfilControlador.php?editar=1" method="post">

              <?php if (isset($_SESSION['mensajeConf'])) {
                echo "<p class='alert'>" . $_SESSION['mensajeConf'] . "</p> ";
                unset($_SESSION['mensajeConf']);
              } ?>

              <table>
                <tr>
                  <td> <b> Nombre Usuario: </b> </td>
                  <td>
                    <?php echo $user_data['nombreUsuario'] ?>
                  </td>
                </tr>
                <tr>
                  <td> <b> Correo: </b> </td>
                  <td>
                    <?php echo $user_data['correo'] ?>
                  </td>
                </tr>
                <tr>
                  <td><b> Nombre: </b> </td>
                  <td>
                    <?php echo $user_data['nombre'] ?>
                  </td>
                </tr>
                <tr>
                  <td> <b> Apellidos: </b> </td>
                  <td>
                    <?php echo $user_data['apellidos'] ?>
                  </td>
                </tr>
                <tr>
                  <td> <b> Fecha Nacimiento: </b> </td>
                  <td>
                    <?php echo $user_data['fechaNacimiento'] ?>
                  </td>
                </tr>
                <tr>
                  <td><b> DNI: </b> </td>
                  <td>
                    <?php echo $user_data['nif'] ?>
                  </td>
                </tr>
                <tr>
                  <td> <b> Domicilio: </b> </td>
                  <td>
                    <?php echo $user_data['domicilio'] ?>
                  </td>
                </tr>
                <tr>
                  <td> <b> Código Postal: </b> </td>
                  <td>
                    <?php echo $user_data['codigoPostal'] ?>
                  </td>
                </tr>
                <tr>
                  <td> <b> Teléfono: </b> </td>
                  <td>
                    <?php echo $user_data['numeroMovil'] ?>
                  </td>
                </tr>
                <tr>
                  <td> <b> Provincia: </b> </td>
                  <td>
                    <?php echo $user_data['provincia'] ?>
                  </td>
                </tr>
                <tr>
                  <td> <b> Población: </b> </td>
                  <td>
                    <?php echo $user_data['poblacion'] ?>
                  </td>
                </tr>
              </table>

              <div class="col-12 but">
                <button type="submit" class="btn world-btn">Editar</button>
              </div>

            </form>
          </div>
        </div>

        <!------- CARD DATA -------->
          <?php if (isset($_SESSION['tarjeta'])) {
            unset($_SESSION['tarjeta']); ?>

            <!-- Payment method -->
            <div class="col-12 col-md-10 col-lg-8">
              <div class="contact-form card">

                <?php if (isset($_SESSION['mensajeBD'])) {
                  echo " <p class='alert'> " . $_SESSION['mensajeBD'] . "</p> ";
                  unset($_SESSION['mensajeBD']);
                } ?>

                <h5>
                  <?php
                  if ($card_date['tipo'] == "Visa") { ?>
                    <img src="../img/core-img/visa.png" width="20%" height="20%">
                  <?php } else { ?>
                    <img src="../img/core-img/mastercard.png" width="20%" height="20%">
                  <?php } ?>
                </h5>

                <!-- Data -->
                <form action="../Controladores/FacturacionControlador.php?eliminar=1" method="post">
                  <?php if (isset($_SESSION['mensajeConf'])) {
                    echo "<p class='alert'>" . $_SESSION['mensajeConf'] . "</p> ";
                    unset($_SESSION['mensajeConf']);
                  } ?>

                  <table>
                    <tr>
                      <td> <b> Número: </b> </td>
                      <td>
                        <?php echo $card_date['numero1'] ?> -
                        <?php echo $card_date['numero2'] ?> -
                        <?php echo $card_date['numero3'] ?> -
                        <?php echo $card_date['numero4'] ?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b> Titular: </b>
                      </td>
                      <td>
                        <?php echo $card_date['titular'] ?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b> Fecha: </b>
                      </td>
                      <td>
                        <?php echo $card_date['fechaM'] ?> -
                        <?php echo $card_date['fechaA'] ?>
                      </td>
                    </tr>
                  </table>

                  <div class="col-12 but">
                    <button type="submit" class="btn world-btnrojo3">
                      Eliminar método depago
                    </button>
                  </div>

                </form>
              </div>
            </div>

          <?php } else { ?>
            <!-- Add payment method -->
            <div class="col-12 col-md-10 col-lg-8 add">
              <div class="contact-form">
                <?php if (isset($_SESSION['mensajeBD'])) {
                  echo " <p class='alert'> " . $_SESSION['mensajeBD'] . "</p> ";
                  unset($_SESSION['mensajeBD']);
                } ?>
                <h5>
                  <img src="../img/core-img/visa.png" width="20%" height="20%">
                  <img src="../img/core-img/mastercard.png" width="20%" height="20%">
                </h5>

                <!-- Data -->
                <form action="FacturacionVista.php" method="post">
                  <?php if (isset($_SESSION['mensajeConf'])) {
                    echo "<p class='alert'>" . $_SESSION['mensajeConf'] . "</p> ";
                    unset($_SESSION['mensajeConf']);
                  } ?>

                  <i>
                    <p>Aún no tienes ningun método de pago</p>
                  </i>

                  <div class="col-12 but">
                    <button type="submit" class="btn world-btn">+ Añadir método de pago</button>
                  </div>

                </form>
              </div>
            </div>
          <?php } ?>
          <!------- CARD DATA END-------->

        </div>
      </div>
    </section>
  <?php }
  include "../Tema/Scripts.php" ?>

  <script>
    function check(inpu) {
      if (inpu.value != document.getElementById('contraseñaNueva').value)
        inpu.setCustomValidity('Las contraseñas no coinciden.');
      else
        inpu.setCustomValidity('');
    }

    function dobValidate(dni) {
      var dni = document.getElementById('nif').value;
      number = dni.substr(0, dni.length - 1);
      let = dni.substr(dni.length - 1, 1);
      number = number % 23;
      letter = 'TRWAGMYFPDXBNJZSQVHLCKET';
      letter = letter.substring(number, number + 1);
      if (letter != let) {
        alert("Invalid DNI");
        return false;
      }
    }
  </script>
</body>

</html>