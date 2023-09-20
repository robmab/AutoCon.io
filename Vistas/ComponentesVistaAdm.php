<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../Tema/CSS.php" ;
    
    
    
    
    
     if (isset($_SESSION['chekonn'])){
       unset($_SESSION['chekonn']);
   }else{
            
       header("Location:../Controladores/ComponentesControlador.php?Adm=1");
       exit;       
       
   };
   
         if (isset($_SESSION['rol'])){
       
             if($_SESSION['rol']!='Admin'){
                 
                 header("Location:Index.php");
                 
             }
             
   }else{
             
       header("Location:Index.php");
          
       
   };
    
   
   ?>
    <link href='../Tema/Button/on.css' rel='stylesheet' type='text/css'>
    <link href='../Tema/Button/+-.css' rel='stylesheet' type='text/css'>
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Componentes Adm- AutoCon</title>

    <!-- Favicon  -->
   

</head>

<body>
   <?php  include "../Tema/Menu.php"  ;
       
   
  
   
   
   $listaComponentes= $_SESSION['listaComponentes'];
   ?>
    <!-- ***** Header Area End ***** -->

    <!-- ********** Hero Area Start ********** -->
    <div  class="hero-area height-400 bg-img background-overlay" style="background-image: url(../img/blog-img/componentes.jpg);"></div>
    <!-- ********** Hero Area End ********** -->

    <div class="world-catagory-area mt-50" id="1">
                                    <center> <h1>Componentes</h1><p>_________________________________________________________________________________________________________________</p></center>
    
<center>
<?php if(isset($_SESSION['rol'])){
      if($_SESSION['rol']=='Admin'){
    ?>
<label class="switch">
                                        
    <input  class="switch-input" type="checkbox" checked="" />
                                       
                                          <span onclick="window.location='../Controladores/ComponentesControlador.php#1'"  class="switch-label" data-on="Adm" data-off="Usu"></span>
                                        <span onclick="window.location='../Controladores/ComponentesControlador.php#1'"  class="switch-handle"></span> 
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
                      <div id="<?php echo $nombre ?>" class="single-blog-post post-style-3 mt-50 wow " >
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img width="" src="../img/componentes/<?php  echo $listaComponentes[$nombre][$tipo]['ruta']  ?>" alt="">
                            <!-- Post Content -->
                            <div class="post-content d-flex align-items-center justify-content-between">
                                <!-- Catagory -->
                              
                                <div class="post-tag"></div>    
                                <!-- Headline -->
                                
                                    <h2 style="color: white"><?php echo $nombre  ?></h2>
                                
                                <!-- Post Meta -->
                  
                                <div class="post-meta">
                                    
                                   
                                    
                                 <?php   
                                
                                 
                                 foreach ($listaComponentes[$nombre] as $tipo => $num){
                                                     
                                               ?>
                                        
                                        <h6 style="color: white">
                                           <?php if ($listaComponentes[$nombre][$tipo]['cantidad'] > 0){   ?>
                                           <?php ;
                                            
                                           }    echo $tipo    ?>       
                                            
                                            <?php   
                                            if($listaComponentes[$nombre][$tipo]['cantidad'] == 0){ ?>- No disponible  
                                                                                             <button  onclick="window.location='../Controladores/ComponentesControlador.php?Adm=1&a=1&nom=<?php echo $nombre  ?>&tip=<?php echo $tipo ?>'" class="icon-btn add-btn">
    <div class="add-icon"></div>
    <div class="btn-txt">Añadir</div>
  </button>
                                           <?php ;} elseif ($listaComponentes[$nombre][$tipo]['cantidad'] > 0){ ?> - 
                                           <i style="color: greenyellow"> <?php echo $listaComponentes[$nombre][$tipo]['cantidad'] ?> 
                                               disponibles </i>
                                             <button  onclick="window.location='../Controladores/ComponentesControlador.php?Adm=1&a=1&nom=<?php echo $nombre  ?>&tip=<?php echo $tipo ?>'" class="icon-btn add-btn">
                                                  <div class="add-icon"></div>
    <div class="btn-txt">Añadir</div>
  </button>
  <button  onclick="window.location='../Controladores/ComponentesControlador.php?Adm=1&q=1&nom=<?php echo $nombre  ?>&tip=<?php echo $tipo ?>'" class="icon-btn add-btn">  
    <div  class="btn-txt">Quitar</div>
  </button><p style="color: transparent">_</p>
                                             <?php };  ?>
                                        
                                        
                                        </h6>                           
                                    
                                 <?php        };       ?>  <br>
                                    
                                        
                                        <div class="col-12">
                                
                                            
                                </div>
                           
                                        
                                        
                                        
                                        
                                  
                                
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