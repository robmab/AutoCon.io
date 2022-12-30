<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../Tema/CSS.php";
    
    
    
     if (isset($_SESSION['check'])){
       unset($_SESSION['check']);
   }else{
             
       header("Location:../Controladores/VehiculosControlador.php");
          
       
   };?>
    <link href='../Tema/Button/+-.css' rel='stylesheet' type='text/css'>
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Vehículos - AutoCon</title>

    <!-- Favicon  -->
   

</head>

<body>
   <?php  include "../Tema/Menu.php"  ;
       
   
  
   
   ?>
    <!-- ***** Header Area End ***** -->

    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(../img/blog-img/vehiculos.jpg);"></div>
    <!-- ********** Hero Area End ********** -->


    
    
    
        
                                <div class="world-catagory-area mt-50">
                                    <center> <h1>Automóviles</h1><p>_________________________________________________________________________________________________________________</p></center>

                            <div class="tab-content" id="myTabContent2">

                                <div class="tab-pane fade show active" id="world-tab-10" role="tabpanel" aria-labelledby="tab10">
                                    <div class="row">

                                        
                                    <?php   
                                    foreach ($_SESSION['listaVeh'] as $vehiculo => $num){
                                        
                                        
                                       
                                            ?>
                                             <div class="col-12 col-md-6">
                                            <!-- Single Blog Post -->
                                            <div id="<?php echo $vehiculo ?>" class="single-blog-post wow fadeInUpBig" data-wow-delay="0.3s">
                                                <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <img <?php if ($_SESSION['listaVeh'][$vehiculo]['disponibles']>0){?> onclick="window.location='Vehiculo<?php echo $_SESSION['listaVeh'][$vehiculo]['ruta'] ?>.php'" <?php } ?>src="../img/bmw<?php if ($_SESSION['listaVeh'][$vehiculo]['disponibles']==0){ echo "Off";};  echo $_SESSION['listaVeh'][$vehiculo]['img']  ?>" alt="">
                                                    <!-- Catagory -->
                                                  <?php if ($_SESSION['listaVeh'][$vehiculo]['rebaja']>0){ ?> <div class="post-cta">
                                                   <?php if ($_SESSION['listaVeh'][$vehiculo]['disponibles']>0){ ?>   <a href="Vehiculo<?php echo $_SESSION['listaVeh'][$vehiculo]['ruta'] ?>.php"><?php {echo "Rebajado";}; ?> 
                                                       <?php echo $_SESSION['listaVeh'][$vehiculo]['rebaja'] ?>%</a> <?php }
                                                   else{?> <p style="color: black"><?php {echo "Rebajado";}; ?> <?php echo $_SESSION['listaVeh'][$vehiculo]['rebaja'] ?>%</p> <?php }; ?>
                                                  </div> <?php };?>
                                                </div>
                                                <!-- Post Content -->
                                                <div class="post-content">
                                                    
                                                   <?php if ($_SESSION['listaVeh'][$vehiculo]['disponibles']>0 ){?> <a href="Vehiculo<?php echo $_SESSION['listaVeh'][$vehiculo]['ruta'] ?>.php" class="headline"><?php }; ?>
                                                        <h5><?php echo $vehiculo   ?></h5>
                                                    </a>
                                                    <p>Precio: <?php echo $_SESSION['listaVeh'][$vehiculo]['precioRebajado'] ?>€   <?php 
                                                    if ($_SESSION['listaVeh'][$vehiculo]['precioRebajado'] != $_SESSION['listaVeh'][$vehiculo]['precio']){
                                                        ?><strike> <?php
                                                    echo $_SESSION['listaVeh'][$vehiculo]['precio'] ;
                                                       ?>€</strike><?php };  ?></p>
                                                    <!-- Post Meta -->
                                                    <div class="post-meta">
                                                     <?php if ($_SESSION['listaVeh'][$vehiculo]['disponibles']>0 AND isset($_SESSION['rol']) AND $_SESSION['rol'] == 'Admin'){  ?>  
  <button onclick="window.location='../Controladores/VehiculosControlador.php?a=1&model=<?php echo $vehiculo  ?>'" class="icon-btn add-btn">
    <div class="add-icon"></div>
    <div class="btn-txt">Añadir</div>
  </button>
  <button onclick="window.location='../Controladores/VehiculosControlador.php?q=1&model=<?php echo $vehiculo  ?>'" class="icon-btn add-btn">  
    <div class="btn-txt">Quitar</div>
  </button><p style="color: transparent">_</p>
                                                        
                                                        <p style="color: cadetblue;font-size: 15px"><?php echo $_SESSION['listaVeh'][$vehiculo]['disponibles'] ?> disponibles</p>
                                                        <p style="color: #E1B42B;font-size: 15px"><?php echo $_SESSION['listaVeh'][$vehiculo]['alquilados'] ?> alquilados</p>
                                                        <p style="color: cornflowerblue;font-size: 15px"><?php echo $_SESSION['listaVeh'][$vehiculo]['vendidos'] ?> vendidos</p>
 


                                                            <?php                                                  
                                                     
                                                     }elseif($_SESSION['listaVeh'][$vehiculo]['disponibles']==0 AND isset($_SESSION['rol']) AND $_SESSION['rol'] == 'Admin'){ ?>
                                                      <button onclick="window.location='../Controladores/VehiculosControlador.php?a=1&model=<?php echo $vehiculo  ?>'" class="icon-btn add-btn">
    <div class="add-icon"></div>
    <div class="btn-txt">Añadir</div>
  </button>
  <?php if($_SESSION['listaVeh'][$vehiculo]['disponibles']>0){ ?><button onclick="window.location='../Controladores/VehiculosControlador.php?q=1&model=<?php echo $vehiculo  ?>'" class="icon-btn add-btn">  
    <div class="btn-txt">Quitar</div>
    </button><?php } ?><p style="color: transparent">_</p>  
                                                     <p style="color: red;font-size: 15px">No disponible</p>  
                                                     <?php   if (isset($_SESSION['rol']) AND $_SESSION['rol'] == 'Admin'){ ?>
                                                       <p style="color: #E1B42B;font-size: 15px"><?php echo $_SESSION['listaVeh'][$vehiculo]['alquilados'] ?> alquilados</p>
                                                        <p style="color: cornflowerblue;font-size: 15px"><?php echo $_SESSION['listaVeh'][$vehiculo]['vendidos'] ?> vendidos</p>
                                                     
                                                     <?php } ?>
                                                  <?php    }  ?>
                                                    </div>
                                                    
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>
                                            <?php
                                       
                                        
                                    }
                                    ;
                                     ?>    
                                   

                
                                        </div>
                                       
                                                </div>
                                            </div>
                                        </div>
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