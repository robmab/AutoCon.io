<!DOCTYPE html>
<html lang="en">

<head>
  
    <?php  include"../Tema/CSS.php"; ?>
    <!-- Title  -->
    <title>Facturación - AutoCon</title>



</head>

<body onload='document.form1.numero.focus()'>
 
    <?php include "../Tema/Menu.php" ;  ?>

    

   
   
        
        
        
        
        
    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(../img/blog-img/facturacion.jpg);"></div>
    <!-- ********** Hero Area End ********** -->

    <section class="contact-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Contact Form Area -->
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="contact-form">
                        <center><h5>Pon los datos de tu tarjeta     <img src="../img/core-img/visa.png" width="20%" height="20%">  <img src="../img/core-img/mastercard.png" width="20%" height="20%"></h5></center>
                        
                         
                                                                       <center>  <?php   if (isset($_SESSION['mensajeBD'])){
                    
                    echo  " <p style='color:red;'> ". $_SESSION['mensajeBD']."</p> "  ;
                    unset($_SESSION['mensajeBD']);
                    }   ;  ?>
                       </center>  
                        <!-- Contact Form -->
                         <form name="form1" action="../Controladores/ValidarTarjeta.php" method="post">
                            <div class="row">
                              
                                
<!--                                <script> 
                                
                                function cardnumber(inputtxt)
{
  var cardno = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
  if(inputtxt.value.match(cardno))
        {
      return true;
        }
      else
        {
        alert("Not a valid Visa credit card number!");
        return false;
        }
}
                                
                                
                                </script>-->
                                
                                                  <div class="col-12" col-md-6">
                                    
                                  
                                     
                                         <div class="group">
                                       
                                             <select name="tarjeta">

                                 <option value="visa">Visa</option>

                         <option value="mastercard">MasterCard</option>



</select>
                                             
                                             
                                             
                                    </div>
                                    
                                </div> 
                                
                                <div class="col-12">
                                    
                                  
                                     
                                         <div class="group">
                                             <input type="text" name="numero" id="numero" required maxlength="16" minlength="16"  >
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Número de tarjeta</label>
                                    </div>
                                    
                                </div>
                                
                                
                                
                                
                                
             
                                <div class="col-12">
                                  

                                   <div class="group">
                                       <input type="text" name="titular" id="titular" required autocomplete="off" maxlength="50">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Titular</label>
                                    </div>
                                   </div>
                                
                                 
                                
                                 <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="number" name="mes" id="mes" required autocomplete="off" min="1" max="12">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Mes</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text" name="año" id="año" required autocomplete="off"  maxlength="4" minlength="4">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Año</label>
                                    </div>
                                </div>
                                      <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text" name="ccv" id="ccv" required autocomplete="off" minlength="3" maxlength="">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>CCV</label>
                                    </div>
                                      
                                   
         
                                
                                   
                            <div class="col-12">
                                <center> <button type="submit" name="submit" value="Submit" class="btn world-btn" >Registrar tarjeta</button></center>
                                </div>
                           
                                </div>
                       </div>   
                            </form>    
                            </div>

                       
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