<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../Tema/CSS.php";
    
    
    
      if (isset($_SESSION['rol'])){
       
             if($_SESSION['rol']!='Admin'){
                 
                 header("Location:Index.php");
                 
             }
             
   }else{
             
       header("Location:Index.php");
          
       
   };
    ?>
    
    <link href='../Tema/Button/boton.css' rel='stylesheet' type='text/css'>
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Panel de Control - AutoCon</title>

    <!-- Favicon  -->
   

</head>

<body>
   <?php  include "../Tema/Menu.php"  ;
       
   
  
   
  
   ?>
    <!-- ***** Header Area End ***** -->

    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(../img/blog-img/paneldecontrol.png);"></div>
    <!-- ********** Hero Area End ********** -->

    <div class="world-catagory-area mt-50">
        
        <div class="container">
            <center> <h1>Panel de Control</h1><br></center>
            <div class="row justify-content-center">
                

                 
                      
                <!-- Contact Form Area -->
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="contact-form">
                                    
    
<center>  <?php   if (isset($_SESSION['mensajeBD'])){
    ?> <br><br>  <?php
                    echo  " <h5 style='color:red;'> ". $_SESSION['mensajeBD'].""  ;
                    unset($_SESSION['mensajeBD']);
                    }   ;  ?></b> </center>  
    
    
    
                <!-- ========== Single Blog Post ========== -->     
                
                
                  
                                                        <div class="col-12 ">
                                            <!-- Single Blog Post -->
                                            <div class="single-blog-post post-style-2 d-flex align-items-center wow " >                    
                                                <div class="post-content">
                                                 <br>
                                                    <div class="box">
                                                        <a href="../Controladores/UsuariosControlador.php" class="btn btn-white btn-animation-1">Usuarios</a> 
</div>
                                                    <!-- Post Meta -->
                                                   
                                                </div>
                                                 <div class="post-thumbnail">
                                                     <br><br><br>
                                                </div>
                                            </div>
                                            


                                            <!-- Single Blog Post -->
                                                                                                                      
                                                                  <div class="single-blog-post post-style-2 d-flex align-items-center wow " >                    
                                                <div class="post-content">
                                                 <br>
                                                     <div class="box">
                                                         <a href="../Controladores/ProveedoresControlador.php" class="btn btn-white btn-animation-1">Proveedores</a> 
</div>
                                                    <!-- Post Meta -->
                                                   
                                                </div>
                                                 <div class="post-thumbnail">
                                                     <br><br><br>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                                                                <div class="single-blog-post post-style-2 d-flex align-items-center wow " >                    
                                                <div class="post-content">
                                                 <br>
                                                     <div class="box">
                                                         <a href="../Controladores/GVehiculosControlador.php" class="btn btn-white btn-animation-1">Gestión de Vehículos</a> 
</div>
                                                    <!-- Post Meta -->
                                                   
                                                </div>
                                                 <div class="post-thumbnail">
                                                     <br><br><br>
                                                </div>
                                            </div>
                                            
                                            
                                                  <div class="single-blog-post post-style-2 d-flex align-items-center wow " >                    
                                                <div class="post-content">
                                                 <br>
                                                     <div class="box">
                                                         <a href="../Controladores/EventosControlador.php" class="btn btn-white btn-animation-1">Eventos de Descuento</a> 
</div>
                                                    <!-- Post Meta -->
                                                   
                                                </div>
                                                 <div class="post-thumbnail">
                                                     <br><br><br>
                                                </div>
                                            </div>
                                            
               
                                            
                                               <div class="single-blog-post post-style-2 d-flex align-items-center wow " >                    
                                                <div class="post-content">
                                                 <br>
                                                     <div class="box">
                                                         <a href="../Controladores/GComponentesControlador.php" class="btn btn-white btn-animation-1">Componentes comprados</a> 
</div>
                                                    <!-- Post Meta -->
                                                   
                                                </div>
                                                 <div class="post-thumbnail">
                                                     <br><br><br>
                                                </div>
                                            </div>
                                            
                                                                                                               <div class="single-blog-post post-style-2 d-flex align-items-center wow " >                    
                                                <div class="post-content">
                                                 <br>
                                                     <div class="box">
                                                         <a href="../Controladores/GReparacionControlador.php" class="btn btn-white btn-animation-1">Servicios de Reparación Solicitados</a> 
</div>
                                                    <!-- Post Meta -->
                                                   
                                                </div>
                                                 <div class="post-thumbnail">
                                                     <br><br><br>
                                                </div>
                                            </div>
                                            
     
                                                                                                                                                                     
                                                                                        
                                        </div>
                
                    </div>
                </div>
              </div>  
            </div>

        

                                        
                      <br>     <br>   <br>    <br>     
                                           
                                        
                                       
                                        
                                        
                              

                
                                      
    
    

    <!-- Google Maps: If you want to google map, just uncomment below codes -->
    <!--
    <div class="map-area">
        <div id="googleMap" class="googleMap"></div>
    </div>
    -->

 <?php include "../Tema/Scripts.php"  ?>

</body>

</html>