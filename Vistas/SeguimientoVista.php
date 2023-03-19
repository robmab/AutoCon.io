<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../Tema/CSS.php"  ;
            if(isset($_SESSION['chekon'])){
               unset($_SESSION['chekon']);
               
            }else{
               header("Location:../Controladores/SeguimientoControlador.php");
            };?>
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Title  -->
        <title>Seguimientos - AutoCon</title>
        <!-- Favicon  -->
        <link rel="stylesheet" href="../Tema/Button/Cancelar.css">
    </head>
    <body>
        <?php  include "../Tema/Menu.php"  ;
            //Evita pasar antes por la vista

            ?>
        <!-- ***** Header Area End ***** -->
        <!-- ********** Hero Area Start ********** -->
        <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(../img/blog-img/seguimiento.jpg);"></div>
        <!-- ********** Hero Area End ********** -->
        <?php  
            $c=0;
            
            ?>
        <section class="contact-area section-padding-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                    </div>
                    <?php         
                        if(isset($_SESSION['datosVehiculos'])){
                        
                        ?>  
                    <!-- Contact Form Area -->
                    <div class="col-12 col-md-10 col-lg-8" id="1">
                        <div class="contact-form">
                            <center>
                                <h3>    Vehículos</h3>
                                <p>_______________________________________________________</p>
                            </center>
                            <br>
                            <center>  <?php   if (isset($_SESSION['mensajeBD1'])){
                                echo  " <h6 style='color:red;'> ". $_SESSION['mensajeBD1']."</h6> "  ;
                                unset($_SESSION['mensajeBD1']);
                                }   ;  ?>
                            </center>
                            <br>
                            <!-- Datos -->
                            <table>
                                <?php   foreach ($_SESSION['datosVehiculos'] as $vehiculo => $num){   
                                        foreach ($num as $dato => $valor){

                                        ?>
                                <?php if($dato == 'img'){?> 
                                <tr>
                                    <td>
                                        <img src="../img/bmw<?php echo $valor ;  ?>" height="70%" width="70%">  <?php } ?>
                                        <?php if($dato == 'vehiculo'){?> 
                                        <p style="color: black;font-size: 15px"><?php echo $valor   ?> </p>
                                        <br>
                                        <p> </p>
                                    </td>
                                    <?php } ?>
                                    <?php if($dato == 'reservado'){?> <?php if($valor == 'Si'){ ?>
                                    <td>
                                        <h6 style="color: black"><?php echo "Reservado"?></h6>
                                        <h6><?php echo " por €". $num['precio'] . " " ?> </h6>
                                        <a href="../Controladores/SeguimientoControlador.php?R=1&vehiculo=<?php echo $num['vehiculo']   ?>& n=<?php echo $num['n'] ?>#1" style="color:red">Cancelar X</a><br><br>
                                        <p style="color: transparent">___________________________</p>
                                    </td>
                                    <?php }elseif($valor == 'Comprado'){  ?>  
                                    <td>
                                        <h6 style="color: blue"><?php echo "Comprado"?></h6>
                                        <h6>  <?php  echo  "por ". $num['precio'] . " €" ?></h6>
                                        <br><br>
                                        <p style="color: transparent">___________________________</p>
                                        <?php  } ?>
                                    </td>
                                    <?php } ?>
                                    <?php if($dato == 'alquilado'){?> 
                                    <td>
                                        <h6 style="color: #c69500"><?php echo "Alquilado"?></h6>
                                        <h6> <?php echo " por ";echo $num['precio']. " € al mes."   ?></h6>
                                        <a href="../Controladores/SeguimientoControlador.php?A=1&vehiculo=<?php echo $num['vehiculo']   ?>& n=<?php echo $num['n'] ?>#1" style="color:red">Cancelar X</a><br><br>
                                        <p style="color: transparent">___________________________</p>
                                    </td>
                                    <?php } ?>
                                    <?php if($dato == 'n'){?>  
                                    <td>
                                        <i><?php echo $num['fecha'] ?></i>
                                        <h6>#<?php echo $num['n'] ?></h6>
                                        <br><br><br>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php  
                                    }
                                    } ?>                  
                            </table>
                        </div>
                    </div>
                    <?php 
                        $c=1;                 
                        unset($_SESSION['datosVehiculos']);
                                      
                                    };
                                    ?>  
                    <?php         
                        if(isset($_SESSION['datosComponentes'])){
                        
                        ?>  
                    <div class="col-12 col-md-10 col-lg-8" id="2">
                        <div class="contact-form">
                            <center>
                                <h3>Componentes</h3>
                                <p>_______________________________________________________</p>
                            </center>
                            <br>
                            <center>  <?php   if (isset($_SESSION['mensajeBD2'])){
                                echo  " <h6 style='color:red;'> ". $_SESSION['mensajeBD2']."</h6> "  ;
                                unset($_SESSION['mensajeBD2']);
                                }   ;  ?>
                            </center>
                            <br>
                            <!-- Datos -->
                            <table>
                                <?php   foreach ($_SESSION['datosComponentes'] as $componente => $num){   
                                        foreach ($num as $dato => $valor){

                                        ?>
                                <?php if($dato == 'ruta'){?> 
                                <tr >
                                    <td>
                                        <img src="../img/componentes/<?php echo $valor ;  ?>" height="40%" width="40%">  <?php } ?>
                                        <?php if($dato == 'nombre'){?> 
                                        <p style="color: black;font-size: 15px"><?php echo $valor . " - "   ?> <?php } ?>
                                            <?php if($dato == 'tipo'){?> <?php echo $valor   ?>
                                        </p>
                                        <br>
                                        <p> </p>
                                    </td>
                                    <?php } ?>
                                    <?php if($dato == 'cantidad' AND $num['finalizado'] == 'No'){?>
                                    <td>
                                        <h6><?php echo "Cantidad x" . $valor   ?></h6>
                                        <h6><?php echo $num['precio'] ?> €</h6>
                                        <?php if ($valor > 1){   ?>
                                        <a href="../Controladores/SeguimientoControlador.php?uno=1&nombre=<?php echo $num['nombre']?>&tipo=<?php echo $num['tipo']?>& n=<?php echo $num['n'] ?>#2" style="color:red">Cancelar 1</a><a> | </a>
                                        <a href="../Controladores/SeguimientoControlador.php?todos=1&nombre=<?php echo $num['nombre']?>&tipo=<?php echo $num['tipo']?>&cantidad=<?php echo $num['cantidad']   ?>& n=<?php echo $num['n'] ?>#2" style="color:red">Cancelar Todos</a>
                                        <p style="color: transparent">____________________________</p>
                                    </td>
                                    <?php }else{ ?>
                                    <a href="../Controladores/SeguimientoControlador.php?unico=1&nombre=<?php echo $num['nombre']?>&tipo=<?php echo $num['tipo']?>& n=<?php echo $num['n'] ?>#2" style="color:red">Cancelar X</a>
                                    <p style="color: transparent">____________________________</p>
                                    </td> 
                                    <?php   }?>
                                    <?php  
                                        }  ?>
                                    <?php if($dato == 'cantidad' AND $num['finalizado'] == 'Si'){?>    
                                    <td>
                                        <h6>Cantidad x<?php echo $num['cantidad'] ?></h6>
                                        <h6><?php echo $num['precio'] ?> €</h6>
                                        <h6 style="color: blue">Comprado</h6>
                                        <p style="color: transparent">____________________________</p>
                                    </td>
                                    <?php  } ?>    
                                    <?php if($dato == 'fecha'){?> 
                                    <td>
                                        <i><?php echo $num['fecha'] ?></i>
                                        <h6>#<?php echo $num['n'] ?></h6>
                                        <br>
                                    </td>
                                </tr>
                                <?php  }  ?>
                                <?php }
                                    }
                                       ?>                  
                            </table>
                        </div>
                    </div>
                    <?php 
                        $c=1;                 
                        unset($_SESSION['datosComponentes']);
                                      
                                    }; ?>
                    <?php         
                        if(isset($_SESSION['datosReparacion'])){
                        
                        ?>   
                    <div class="col-12 col-md-10 col-lg-8" id="3">
                        <div class="contact-form">
                            <center>
                                <h3>Reparación</h3>
                                <p>_______________________________________________________</p>
                            </center>
                            <br>
                            <center>  <?php   if (isset($_SESSION['mensajeBD3'])){
                                echo  " <h6 style='color:red;'> ". $_SESSION['mensajeBD3']."</h6> "  ;
                                unset($_SESSION['mensajeBD3']);
                                }   ;  ?>
                            </center>
                            <br>
                            <!-- Datos -->
                            <table>
                                <?php  
                                    foreach ($_SESSION['datosReparacion'] as $servicio => $num){   
                                        foreach ($num as $dato => $valor){
                                            if($num['aceptado'] != 'Finalizado'){
                                            ?>
                                <?php if($dato == 'servicio'){?> 
                                <tr >
                                    <td>
                                        <?php if($valor == 'sustituir'){?>       <img src="../img/reparacion/1.jpg" height="60%" width="60%"><a style="color: white">_____________________</a> 
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Sustituir piezas defectuosas</h6>
                                        <?php } ?>
                                        <?php if($valor == 'neumatico'){?><img src="../img/reparacion/2.jpg" height="60%" width="60%"><a style="color: white">_____________________</a>  
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Cambio de Neumáticos</h6>
                                        <?php } ?>
                                        <?php if($valor == 'llanta'){?><img src="../img/reparacion/3.jpg" height="60%" width="60%"><a style="color: white">_____________________</a>  
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Revisión de llantas</h6>
                                        <?php } ?>
                                        <?php if($valor == 'aceite'){?><img src="../img/reparacion/4.jpg" height="60%" width="60%"><a style="color: white">_____________________</a>  
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Aceite y Liquidos</h6>
                                        <?php } ?>
                                        <?php if($valor == 'pintura'){?><img src="../img/reparacion/5.jpg" height="60%" width="60%"><a style="color: white">_____________________</a> 
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Renovación de pinturas y arañazos</h6>
                                        <?php } ?>
                                        <?php if($valor == 'carroceria'){?><img src="../img/reparacion/7.jpg" height="60%" width="60%"><a style="color: white">_____________________</a> 
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Reparación carrocería</h6>
                                        <?php } ?>
                                        <?php if($valor == 'bateria'){?><img src="../img/reparacion/6.jpg" height="60%" width="60%"><a style="color: white">_____________________</a>  
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Baterías y Arranque</h6>
                                        <?php } ?>
                                        <?php if($valor == 'bombilla'){?><img src="../img/reparacion/8.jpg" height="60%" width="60%"><a style="color: white">_____________________</a> 
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Bombillas</h6>
                                        <?php } ?>
                                        <?php if($valor == 'parabrisas'){?><img src="../img/reparacion/9.jpg" height="60%" width="60%"><a style="color: white">_____________________</a> 
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Limpia-parabrisas y escobillas</h6>
                                        <?php } ?>
                                        <?php if($valor == 'limpieza'){?><img src="../img/reparacion/10.jpg" height="60%" width="60%"><a style="color: white">_____________________</a> 
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Limpieza</h6>
                                        <?php } ?>
                                        <?php    }  ?>
                                        <?php if($dato == 'fecha'){?>  
                                        <p><?php echo $valor  ?></p>
                                        <a style="color: white">___________________________</a> 
                                    </td>
                                    <td>
                                        <p style="color: transparent">______</p>
                                    </td>
                                    <?php    }  ?>
                                    <?php if($dato == 'aceptado'){?> 
                                    <td>
                                        <?php if ($num['aceptado'] == 'Si') {?> 
                                        <p style="color: white">________________</p>
                                        <h6 style="color: #28a745">Aceptado</h6>
                                        <?php }elseif($num['aceptado'] == 'Espera'){?>  
                                        <p style="color: white">________________</p>
                                        <h6>  <?php echo $valor ?></h6>
                                        <?php ;}?>  <?php    }  ?>
                                        <?php if($dato == 'precio'){?>  
                                        <h6><?php if($valor > 0){ echo $valor   ?> € <?php };  ?></h6>
                                        <?php if ($num['aceptado'] != 'Finalizado') {?> <a href="../Controladores/SeguimientoControlador.php?fecha=<?php echo $num['fecha']   ?>&servicio=<?php  echo $num['servicio'] ?>&n=<?php echo $num['n'] ?>#3" style="color:red">Cancelar X</a>
                                        <p style="color: white">________________</p>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <h6>#<?php echo $num['n'] ?></h6>
                                    </td>
                                </tr>
                                <?php    
                                    }  ?>      
                                <?php    
                                    }
                                    }      
                                    }
                                    //Para los finalizados________________________________________________________________________
                                        foreach ($_SESSION['datosReparacion'] as $servicio => $num){   
                                        foreach ($num as $dato => $valor){
                                        if($num['aceptado'] == 'Finalizado'){
                                        ?>
                                <?php   if($dato == 'servicio'){?> 
                                <tr >
                                    <td>
                                        <?php if($valor == 'sustituir'){?>       <img src="../img/reparacion/1.jpg" height="60%" width="60%"><a style="color: white">_____________________</a>
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Sustituir piezas defectuosas</h6>
                                        <?php } ?>
                                        <?php if($valor == 'neumatico'){?><img src="../img/reparacion/2.jpg" height="60%" width="60%"><a style="color: white">_____________________</a> 
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Cambio de Neumáticos</h6>
                                        <?php } ?>
                                        <?php if($valor == 'llanta'){?><img src="../img/reparacion/3.jpg" height="60%" width="60%"> <a style="color: white">_____________________</a>
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Revisión de llantas</h6>
                                        <?php } ?>
                                        <?php if($valor == 'aceite'){?><img src="../img/reparacion/4.jpg" height="60%" width="60%"> <a style="color: white">_____________________</a>
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Aceite y Liquidos</h6>
                                        <?php } ?>
                                        <?php if($valor == 'pintura'){?><img src="../img/reparacion/5.jpg" height="60%" width="60%"><a style="color: white">_____________________</a>
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Renovación de pinturas y arañazos</h6>
                                        <?php } ?>
                                        <?php if($valor == 'carroceria'){?><img src="../img/reparacion/7.jpg" height="60%" width="60%"><a style="color: white">_____________________</a>
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Reparación carrocería</h6>
                                        <?php } ?>
                                        <?php if($valor == 'bateria'){?><img src="../img/reparacion/6.jpg" height="60%" width="60%"><a style="color: white">_____________________</a> 
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Baterías y Arranque</h6>
                                        <?php } ?>
                                        <?php if($valor == 'bombilla'){?><img src="../img/reparacion/8.jpg" height="60%" width="60%"> <a style="color: white">_____________________</a>
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Bombillas</h6>
                                        <?php } ?>
                                        <?php if($valor == 'parabrisas'){?><img src="../img/reparacion/9.jpg" height="60%" width="60%"><a style="color: white">_____________________</a>
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Limpia-parabrisas y escobillas</h6>
                                        <?php } ?>
                                        <?php if($valor == 'limpieza'){?><img src="../img/reparacion/10.jpg" height="60%" width="60%"><a style="color: white">_____________________</a>
                                    </td>
                                    <td>
                                        <br>
                                        <h6 style="color: black">Limpieza</h6>
                                        <?php } ?>
                                        <?php    }  ?>
                                        <?php if($dato == 'fecha'){?>  
                                        <p><?php echo $valor  ?></p>
                                        <a style="color: white">___________________________</a> 
                                    </td>
                                    <td></td>
                                    <?php    }  ?>
                                    <?php if($dato == 'aceptado'){?> 
                                    <td>
                                        <p style="color: white">________________</p>
                                        <?php if ($num['aceptado'] == 'Si') {?> 
                                        <p style="color: #28a745">Aceptado</p>
                                        <?php }elseif($num['aceptado'] == 'Finalizado'){?> 
                                        <h6 style="color: blue">Finalizado</h6>
                                        <?php ;}?>  <?php    }  ?>
                                        <?php if($dato == 'precio'){?>  
                                        <h6><?php if($valor > 0){ echo $valor   ?> € <?php };  ?></h6>
                                        <p style="color: white">________________</p>
                                        <?php if ($num['aceptado'] != 'Finalizado') {?> <a href="../Controladores/SeguimientoControlador.php?fecha=<?php echo $num['fecha']   ?>&servicio=<?php  echo $num['servicio'] ?>" style="color:red">Cancelar X</a><?php } ?>
                                    </td>
                                    <td>
                                        <h6>#<?php echo $num['n'] ?></h6>
                                    </td>
                                </tr>
                                <?php    }  ?>      
                                <?php    
                                    }
                                    }      

                                    }

                                       ?>                  
                            </table>
                        </div>
                    </div>
                    <?php 
                        $c=1;              
                        unset($_SESSION['datosReparacion']);
                                      
                                    }; ?>
                    <?php  
                        if ($c==0){    ?>
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="contact-form">
                            <br><br><br>
                            <center>  <?php   if (isset($_SESSION['mensajeBD1'])){
                                echo  " <h6 style='color:red;'> ". $_SESSION['mensajeBD1']."</h6> "  ;
                                unset($_SESSION['mensajeBD1']);
                                }   ;  ?>
                            </center>
                            <center>  <?php   if (isset($_SESSION['mensajeBD2'])){
                                echo  " <h6 style='color:red;'> ". $_SESSION['mensajeBD2']."</h6> "  ;
                                unset($_SESSION['mensajeBD2']);
                                }   ;  ?>
                            </center>
                            <center>  <?php   if (isset($_SESSION['mensajeBD3'])){
                                echo  " <h6 style='color:red;'> ". $_SESSION['mensajeBD3']."</h6> "  ;
                                unset($_SESSION['mensajeBD3']);
                                }   ;  ?>
                            </center>
                            <br><br>
                            <h5>Aún no has realizado ninguna compra o solicitado algún servicio.</h5>
                            <!-- Datos -->
                            <br><br><br><br>
                        </div>
                    </div>
                    <?php     
                        }
                        ?>     
                </div>
            </div>
        </section>
        <?php include "../Tema/Scripts.php"  ?>
    </body>
</html>