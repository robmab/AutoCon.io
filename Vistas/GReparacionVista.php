<!DOCTYPE html>
<html lang="en">

<head>
    
    <link href='../Tema/Tabla/tabla.css' rel='stylesheet' type='text/css'>
    
    
    <?php include "../Tema/CSS.php"  ;
    
    
     if(isset($_SESSION['chekon'])){
        unset($_SESSION['chekon']);
        
    }else{
        header("Location:../Controladores/GReparacionControlador.php");
        
        
    };
    
      if (isset($_SESSION['rol'])){
       
             if($_SESSION['rol']!='Admin'){
                 
                 header("Location:Index.php");
                 
             }
             
   }else{
             
       header("Location:Index.php");
          
       
   };?>
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Servicios solicitados - AutoCon</title>

    <!-- Favicon  -->
    <link rel="stylesheet" href="../Tema/Button/Cancelar.css">

</head>

<body>
   <?php  include "../Tema/Menu.php"  ;
   
 
   
   
   
   //Evita pasar antes por la vista
   
 
   ?>
    
    
    <!-- ***** Header Area End ***** -->

    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(../img/blog-img/greparar.jpg);"></div>
    <!-- ********** Hero Area End ********** -->

  
    <?php  
    
   
   
    
  ?>



  

  




    
    <section class="contact-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center" id="1">
                
            <div class="col-12 col-md-10 col-lg-8">
                               <center>  <?php   if (isset($_SESSION['mensajeBD'])){
                    
                    echo  " <h5 style='color:red;'> ". $_SESSION['mensajeBD']."</h5> "  ;
                    unset($_SESSION['mensajeBD']);
                    }   ;  ?>
                       </center>  
            </div>
           
                      
                <!-- Contact Form Area -->
                
                    <div class="contact-form">
                        
              
                        <center><h3>Servicios Solicitados</h3></center><br><br>
                        <!-- Datos -->
                        
                        <table>
                           
                            <thead>
                                <tr>
                                    <th style="color: transparent">______________</th>
                                    <th>Numero Servicio</th>
                                    <th>Fecha</th>
                                    <th>Servicio</th>
                                    
                                    <th>Precio(€)</th>
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
                   <?php  foreach ($_SESSION['datosGReparacion'] as  $num){  
                       if ($num['aceptado']!= "Finalizado"){
                       ?> 
 
                       
                            
                            
                            
                            
                            
                            <tr>
                                <td><img height="200%" width="200%" src="../img/reparacion/<?php if($num['servicio']=='sustituir' ){echo "1.jpg";
                        }elseif($num['servicio']=='neumatico' ){echo "2.jpg";
                                     }elseif($num['servicio']=='llanta' ){echo "3.jpg";
                                     }elseif($num['servicio']=='aceite' ){echo "4.jpg";
                                     }elseif($num['servicio']=='pintura' ){echo "5.jpg";
                                     }elseif($num['servicio']=='carroceria' ){echo "7.jpg";
                                     }elseif($num['servicio']=='bateria' ){echo "6.jpg";
                                     }elseif($num['servicio']=='bombilla' ){echo "8.jpg";
                                    }elseif($num['servicio']=='parabrisas' ){echo "9.jpg";
                                    }elseif($num['servicio']=='limpieza' ){echo "10.jpg";}?>">
                                
                                </td>
                                <td><?php echo "#". $num['n']?></td>
                                <td><?php echo $num['fecha']?></td>
                                <td><?php if($num['servicio']=='sustituir' ){echo "Sustituir piezas defectuosas";}?>
                                    <?php if($num['servicio']=='neumatico' ){echo "Cambio de Neumáticos";}?>
                                    <?php if($num['servicio']=='llanta' ){echo "Revisión de llantas";}?>
                                    <?php if($num['servicio']=='aceite' ){echo "Aceite y Liquidos";}?>
                                    <?php if($num['servicio']=='pintura' ){echo "Renovación de pinturas y arañazos";}?>
                                    <?php if($num['servicio']=='carroceria' ){echo "Reparación carrocería";}?>
                                    <?php if($num['servicio']=='bateria' ){echo "Baterías y Arranque";}?>
                                    <?php if($num['servicio']=='bombilla' ){echo "Bombillas";}?>
                                    <?php if($num['servicio']=='parabrisas' ){echo "Limpia-parabrisas y escobillas";}?>
                                    <?php if($num['servicio']=='limpieza' ){echo "Limpieza";}?>
                                    
                                </td>
                            <p style="color: red">
                                 <td><?php if($num['aceptado']=="Si"){?>  
                                     <form method="post" action="../Controladores/GReparacionControlador.php?editar=1&n=<?php echo $num['n'] ?>#1">
                                         <input style="width:100px;height:30px" name="precioE" type="number" required step="0.01" value="<?php echo $num['precio'] ?>"    />
                                         <?php if(isset($_SESSION['rebaja'])){?><p style="color: red"><?php echo $_SESSION['rebaja'] . "% D.</p>"  ;} ?>
                                         <center><button type="submit" class="btn ">Editar</button></center>
                                     
                                     </form>
                                  <?php ;}elseif($num['aceptado']!="Espera"){   echo $num['precio'] . " €"; }?></td>
                                <td><?php echo $num['nombreUsuario']?></td>
                                <td><?php  echo $num['nombre']?></td>
                                <td><?php echo $num['apellidos']?></td>
                                <td><?php echo $num['correo']?></td>
                                <td><?php echo $num['numeroMovil']?></td>
                                <td><?php echo $num['nif']?></td>
                                <td>
                                    <?php if($num['aceptado']=="Si"){  ?>    
                                    <p style="color: palegoldenrod">Aceptado</p>
                                        <?php }elseif($num['aceptado']=="Espera"){ ?>  
                                            <p style="color: #E2B842">En espera</p>
                                            <?php
                                             } ?>
                                                
                                                
                                                
                                   
                                
                               </td>
          
                               
                               <td><?php if($num['aceptado']=="Espera"){ ?>
                                   <form method="post" action="../Controladores/GReparacionControlador.php?aceptar=1&n=<?php echo $num['n'] ?>#1"  >
                                       
                                     <center>  <input style="width:100px;height:30px" name="precio" type="number" required step="0.01"  /> 
                                   <button type="submit" class="btn ">Aplicar Precio €</button></center>
                                    
                                   </form>
                                   <?php }elseif($num['aceptado']=="Si"){  ?>   
                            <center> <a href="../Controladores/GReparacionControlador.php?finalizar=1&n=<?php echo 
                            $num['n'] ?>#1" style="color: palegoldenrod " > &ltFinalizar&gt</a></center>
                                       <?php } ?></td>
                               
                               
                                <td><?php if($num['aceptado']!="Finalizado"){ ?>
                            <a href="../Controladores/GReparacionControlador.php?cancelar=1&n=<?php echo $num['n'] ?>#1" style="color:red">Cancelar</a><?php 
                            
                                }  ?></td>
                                
                                
                                
                                
                            </tr>               
                            
                       
                     
                       <?php  }} ?>  
                            
                            
                          
                            
                            
                                               <?php  foreach ($_SESSION['datosGReparacion'] as  $num){  
                       if ($num['aceptado']== "Finalizado"){
                       ?> 
 
                       
                            
                            
                            
                            
                            
                            <tr>
                                <td><img height="200%" width="200%" src="../img/reparacion/<?php if($num['servicio']=='sustituir' ){echo "1.jpg";
                        }elseif($num['servicio']=='neumatico' ){echo "2.jpg";
                                     }elseif($num['servicio']=='llanta' ){echo "3.jpg";
                                     }elseif($num['servicio']=='aceite' ){echo "4.jpg";
                                     }elseif($num['servicio']=='pintura' ){echo "5.jpg";
                                     }elseif($num['servicio']=='carroceria' ){echo "7.jpg";
                                     }elseif($num['servicio']=='bateria' ){echo "6.jpg";
                                     }elseif($num['servicio']=='bombilla' ){echo "8.jpg";
                                    }elseif($num['servicio']=='parabrisas' ){echo "9.jpg";
                                    }elseif($num['servicio']=='limpieza' ){echo "10.jpg";}?>">
                                
                                </td>
                                <td><?php echo "#". $num['n']?></td>
                                <td><?php echo $num['fecha']?></td>
                                <td><?php if($num['servicio']=='sustituir' ){echo "Sustituir piezas defectuosas";}?>
                                    <?php if($num['servicio']=='neumatico' ){echo "Cambio de Neumáticos";}?>
                                    <?php if($num['servicio']=='llanta' ){echo "Revisión de llantas";}?>
                                    <?php if($num['servicio']=='aceite' ){echo "Aceite y Liquidos";}?>
                                    <?php if($num['servicio']=='pintura' ){echo "Renovación de pinturas y arañazos";}?>
                                    <?php if($num['servicio']=='carroceria' ){echo "Reparación carrocería";}?>
                                    <?php if($num['servicio']=='bateria' ){echo "Baterías y Arranque";}?>
                                    <?php if($num['servicio']=='bombilla' ){echo "Bombillas";}?>
                                    <?php if($num['servicio']=='parabrisas' ){echo "Limpia-parabrisas y escobillas";}?>
                                    <?php if($num['servicio']=='limpieza' ){echo "Limpieza";}?>
                                    
                                </td>
                               
                                 <td><?php echo $num['precio'] . " €"; ?></td>
                                <td><?php echo $num['nombreUsuario']?></td>
                                <td><?php  echo $num['nombre']?></td>
                                <td><?php echo $num['apellidos']?></td>
                                <td><?php echo $num['correo']?></td>
                                <td><?php echo $num['numeroMovil']?></td>
                                <td><?php echo $num['nif']?></td>
                                <td>
                                    <?php if($num['aceptado']=="Finalizado"){  ?>  
                                            <p style="color: #218838">Finalizado</p>
                                            <?php } ?>
                                                
                                                
                                                
                                   
                                
                               </td>
          
                               
                               <td></td>
                               
                               
                                <td></td>
                                
                                
                                
                                
                            </tr>               
                            
                       
                     
                       <?php  }} ?>  
                            
                            
                            
                        </tbody> </table>
                    </div>
                </div>
                
                
      
                
                
                
                
            </div>
        </div>
    </section>
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    

 <?php include "../Tema/Scripts.php"  ?>

</body>

</html>