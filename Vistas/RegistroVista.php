<!DOCTYPE html>
<html lang="en">

<head>
  
    <?php  include"../Tema/CSS.php"; ?>
    <!-- Title  -->
    <title>Registro - AutoCon</title>



</head>

<body>
 
    <?php include "../Tema/Menu.php" ;  ?>

    

   
   
        
        
        
        
        
    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(../img/blog-img/registro.jpg);"></div>
    <!-- ********** Hero Area End ********** -->

    <section class="contact-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Contact Form Area -->
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="contact-form">
                        <h5>Introduce tus datos</h5>
                        
                         
                                                                       <center>  <?php   if (isset($_SESSION['mensajeBD'])){
                    
                    echo  " <p style='color:red;'> ". $_SESSION['mensajeBD']."</p> "  ;
                    unset($_SESSION['mensajeBD']);
                    }   ;  ?>
                       </center>  
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
                                  <p style="color: #6c757d"  ><font size="2px">  Email </font></p>

                                   <div class="group">
                                       <input type="email" name="email" id="email" required autocomplete="off">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                       
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
                                           <input type="text" name="nif" id="nif" required autocomplete="off" maxlength="9" >
                                          <span class="highlight"></span>
                                          <span class="bar"></span>
                                          <label>DNI</label>
                                      </div>
                                            </div>
                                
                                     
                      <script>


    function dobValidate(dni) {

     var dni = document.getElementById('nif').value;
          numero = dni.substr(0,dni.length-1);
  let = dni.substr(dni.length-1,1);
  numero = numero % 23;
  letra='TRWAGMYFPDXBNJZSQVHLCKET';
  letra=letra.substring(numero,numero+1);
  if (letra!=let) {
   
     
     alert("Dni inválido");
     return false;
    
   
  } 


   
    
  
    }



</script>
                           
                                        <div class="col-12 col-md-6">
                                            <p><font size="2px">Fecha de nacimiento</font></p>  
                                       <div class="group">
                                           
                                        <input type="date" name="fechaNac" id="fechaNac" required autocomplete="off">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        
                                    </div>
                                 </div>
                                
                                                                          <div class="col-12 col-md-6"> 
                                     <div class="group">
                                         <input type="text" name="provincia" id="provincia" required autocomplete="off" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Provincia</label>
                                    </div>
                                          </div>
                                
                                                                                         <div class="col-12 col-md-6"> 
                                     <div class="group">
                                         <input type="text" name="poblacion" id="poblacion" required autocomplete="off" >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Población</label>
                                    </div>
                                          </div>
                                
                                                                                         <div class="col-12 col-md-6"> 
                                     <div class="group">
                                         <input type="number" name="codigoP" id="codigoP" required autocomplete="off"  >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Código postal</label>
                                    </div>
                                          </div>
                       
                                                                           <div class="col-12 col-md-6"> 
                                     <div class="group">
                                         <input type="number" name="movil" id="movil" required autocomplete="off"   >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Número de móvil o telefono</label>
                                    </div>
                                          </div>
                         <div class="col-12 ">
                                       <div class="group">
                                           
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
                                           <input type="password" name="contraseña2" id="contraseña2" required  oninput="check(this)" autocomplete="off">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Repite contraseña</label>
                                    </div>
                                 </div>
                                                                              
                                          </div>
                                   
  <script language='javascript' type='text/javascript'>
    function check(inpu) {
        if (inpu.value != document.getElementById('contraseña').value) {
            inpu.setCustomValidity('Las contraseñas no coinciden.');
        } else {
            
            inpu.setCustomValidity('');
        }
    }
</script>            
                                
                                   
                            <div class="col-12">
                                    <center><button type="submit" class="btn world-btn">Registro</button></center>
                                </div>
                           
                                </div>
                       </div>   
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps: If you want to google map, just uncomment below codes -->
    <!--
    <div class="map-area">
        <div id="googleMap" class="googleMap"></div>
    </div>
    -->
        
        
        
        
     
        
    
    
    
    
    
<?php include "../Tema/Scripts.php" ; ?>

</body>

</html>