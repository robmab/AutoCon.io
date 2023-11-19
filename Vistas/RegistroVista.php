<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../Tema/CSS.php" ?>
  <title>Registro - AutoCon</title>
</head>

<body>
  <?php include "../Tema/Menu.php"; ?>

  <!-- ********** Hero Area ********** -->
  <div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/registro.jpg); 
      display: flex; justify-content: center; align-items: end; height:180px">
    <h1 style="color:rgb(242, 242, 242); text-shadow: 3px 3px 1px black; text-align: center; ">
      Registro
    </h1>
  </div>

  <section class="contact-area ">
    <div class="container register">
      <div class="row justify-content-center">
        <!-- Contact Form Area -->
        <div class="col-12 col-md-10 col-lg-8">
          <div class="contact-form" style="display: flex; justify-content: center;">
            <?php if (isset($_SESSION['mensajeBD'])) {
              echo " <p style='color:red;'> " . $_SESSION['mensajeBD'] . "</p> ";
              unset($_SESSION['mensajeBD']);
            } ?>

            <!-- Contact Form -->
            <form action="../Controladores/ValidarNumero.php" method="post" onsubmit="return dobValidate('dn')">
              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="text" name="nombreUs" id="nombreUs" required autocomplete="off" minlength='3'>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Nombre de Usuario</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="email" name="email" id="email" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Email</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="text" name="nombre" id="nombre" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Nombre</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="text" name="apellidos" id="apellidos" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Apellidos</label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="group">
                    <input type="text" name="direccion" id="direccion" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Dirección</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="text" name="nif" id="nif" required autocomplete="off" maxlength="9">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>DNI</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="date" name="fechaNac" id="fechaNac" autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label style="font-size: 14px; color: #8D8D8D;">Fecha de Nacimiento </label>
                  </div>
                </div>

                <div class="col-12 col-md-6" style="padding-top: -1.1em; margin-top: -0.4em;">
                  <div class="group">
                    <p style="color:#006EEC; font-size: 14px; padding-bottom:0.1em; margin:0;
                      ">Provincia </p>
                    <select style="color:black; font-size: 14px" name="provincia" id="provincia">
                      <option selected="true" disabled="disabled">-</option>
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
                    <span class="highlight"></span>
                    <span class="bar"></span>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="text" name="poblacion" id="poblacion" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Población</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="number" name="codigoP" id="codigoP" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Código postal</label>
                  </div>
                </div>

                <div class="col-12 col-md-6" style="margin-bottom: 2em;">
                  <div class="group">
                    <input type="number" name="movil" id="movil" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Número de móvil o telefono</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="password" name="contraseña" id="contraseña" required autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Contraseña</label>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="group">
                    <input type="password" name="contraseña2" id="contraseña2" required oninput="check(this)"
                      autocomplete="off">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Repite contraseña</label>
                  </div>
                </div>
              </div>

              <div class="col-12" style="display: flex; justify-content: center;">
                <button type="submit" class="btn world-btn">Registro</button>
              </div>
          </div>
        </div>

      </div>
      </form>
    </div>
  </section>

  <?php include "../Tema/Scripts.php"; ?>
  
  <script>
    function check(inpu) {
      if (inpu.value != document.getElementById('contraseña').value)
        inpu.setCustomValidity('Las contraseñas no coinciden.');
      else
        inpu.setCustomValidity('');
    }

    function dobValidate(dni) {
      var dni = document.getElementById('nif').value;
      numero = dni.substr(0, dni.length - 1);
      let = dni.substr(dni.length - 1, 1);
      numero = numero % 23;
      letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
      letra = letra.substring(numero, numero + 1);
      if (letra != let) {
        alert("Dni inválido");
        return false;
      }
    }
  </script>
</body>

</html>