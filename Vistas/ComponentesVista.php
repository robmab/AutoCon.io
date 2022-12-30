<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../Tema/CSS.php" ;
    
     if (isset($_SESSION['chekonn'])){
       unset($_SESSION['chekonn']);
   }else{
            
       header("Location:../Controladores/ComponentesControlador.php");
       exit;       
       
   };?>
    <link href='../Tema/Button/on.css' rel='stylesheet' type='text/css'>
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Componentes - AutoCon</title>

    <!-- Favicon  -->
   

</head>

<body>
   <?php  include "../Tema/Menu.php"  ;
       
   
  
   
   
   $listaComponentes= $_SESSION['listaComponentes'];
   ?>
    <!-- ***** Header Area End ***** -->

    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(../img/blog-img/componentes.jpg);"></div>
    <!-- ********** Hero Area End ********** -->

    <div class="world-catagory-area mt-50" id="1">
                                    <center> <h1>Componentes</h1><p>_________________________________________________________________________________________________________________</p></center>
    
<center>
<?php if(isset($_SESSION['rol'])){
      if($_SESSION['rol']=='Admin'){
    ?>
<label class="switch">
                                        
    <input  class="switch-input" type="checkbox"  />
                                       
   <span onclick="window.location='../Controladores/ComponentesControlador.php?Adm2=1#1'"  class="switch-label" data-on="Adm" data-off="Usu"></span>
   <span onclick="window.location='../Controladores/ComponentesControlador.php?Adm2=1#1'"  class="switch-handle"></span> 
</label>
<?php }} ?>
  <?php   if (isset($_SESSION['mensajeBD'])){
    ?> <br><br>  <?php
                    echo  " <h5 style='color:red;'> ". $_SESSION['mensajeBD'].""  ;
                    unset($_SESSION['mensajeBD']);
                    }   ;  ?></b> </center>  
    
    
    <div class="row justify-content-center">
                <!-- ========== Single Blog Post ========== -->     
                
                
                       <?php                         
                       $cont="" ;
                                    foreach ($listaComponentes as $nombre => $num){                                                       
                                    foreach ($num as $tipo => $num2){
                                   
                                        if ($cont != $nombre){                                
                                                                                            ?> 
                
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="../img/componentes/<?php  echo $listaComponentes[$nombre][$tipo]['ruta']  ?>" alt="">
                            <!-- Post Content -->
                            <div class="post-content d-flex align-items-center justify-content-between">
                                <!-- Catagory -->
                              
                                <div class="post-tag"></div>    
                                <!-- Headline -->
                                
                                    <h2 style="color: white"><?php echo $nombre  ?></h2>
                                
                                <!-- Post Meta -->
                  
                                <div class="post-meta">
                                    
                                    <form action="../Controladores/ComponentesControlador.php?comprar=1&nombre=<?php echo $nombre ?>#1"  method="post">
                                    
                                 <?php   
                                 $conta=1;
                                 
                                 foreach ($listaComponentes[$nombre] as $tipo => $num){
                                                     
                                               ?>
                                        
                                        <h6 style="color: white">
                                           <?php if ($listaComponentes[$nombre][$tipo]['cantidad'] > 0){   ?>
                                            <input    type=radio name='tipo' value="<?php echo $tipo    ?>-<?php echo  $listaComponentes[$nombre][$tipo]['precioR'] ?>"> <?php ;
                                            $conta=2;
                                           }    echo $tipo    ?>       
                                            
                                            <?php   
                                            if($listaComponentes[$nombre][$tipo]['cantidad'] == 0){ ?>- No disponible 
                                                
                                           <?php ;} elseif ($listaComponentes[$nombre][$tipo]['descuento']== 0){ ?>
                                            por <i style="color: #3399ff; font-size: 18px; text-shadow: 0.1em 0.1em #000000"><?php echo $listaComponentes[$nombre][$tipo]['precio'] ?> €</i> <?php }else{ ?>
                                            por  <strike> <?php echo $listaComponentes[$nombre][$tipo]['precioO'] ?> €       </strike> 
                                            <i  style="color: red; font-size: 22px;text-shadow: 0.1em 0.1em #000000"><?php echo $listaComponentes[$nombre][$tipo]['precioR'] ?> €</i>  <?php };  ?>
                                        
                                        
                                        </h6>                           
                                    
                                 <?php        };       ?>  <br>
                                    
                                        
                                        <div class="col-12">
                                
                                      <center> <?php if($conta ==2) {  ?>     <button type="submit" name="submit" value="Submit" class="btn world-btn" >Comprar</button><?php ;}  ?></center>
                                </div>
                           
                                        
                                        
                                        
                                        
                                    </form>
                                
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
                                <?php       
                                        
                
                
               
                                        };
                
                
                

    
           
                         $cont=$nombre  ;
                                            
                                    
                                    
                                    }; 
                                    }
                                    ;
                                     ?>    
                                    
                
                
                
                
            </div>

        

                                        
                             
                                           
                                        
                                       
                                        
                                        
                              

                
                                      
    
    

    <!-- Google Maps: If you want to google map, just uncomment below codes -->
    <!--
    <div class="map-area">
        <div id="googleMap" class="googleMap"></div>
    </div>
    -->

 <?php include "../Tema/Scripts.php"  ?>

</body>

</html>