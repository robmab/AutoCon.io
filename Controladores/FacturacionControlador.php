<?php

session_start();
include '../ConexiónBD.php';



//Controlador para eliminar tarjeta


if(isset($_REQUEST['eliminar'])){
   
    $sql="SELECT id FROM usuarios WHERE nombreUsuario='".$_SESSION['user']."' or correo='".$_SESSION['user']."'" ;
    $memi=$conexion->query($sql) ;
  
      if( $memi->num_rows > 0 ){
        $info=$memi->fetch_array() ;
    
          $usuario=$info['id']  ;
          
          
      };
    
    $sql="DELETE FROM usuarios_facturacion WHERE usuario='".$usuario."'";
    $comprobar=$conexion->query($sql);


  
    
    
    header("Location:PerfilControlador.php");
    exit;
    
    
};




//:________________________



// Recoger variables            



if(isset($_SESSION["tarjetaF"])){

$tarjeta=$_SESSION["tarjetaF"] ; 
$tarjeta=ucwords($tarjeta) ;
unset($_SESSION["tarjetaF"]);


};

if(isset($_SESSION["numeroF"])){

$numero=$_SESSION["numeroF"] ; 
$numero=ucwords($numero) ;
unset($_SESSION["numeroF"]);
};

if(isset($_SESSION["titularF"])){

$titular=$_SESSION["titularF"] ; 
$titular=ucwords($titular) ;
unset($_SESSION["titularF"]);
};

if(isset($_SESSION["mesF"])){

$mes=$_SESSION["mesF"] ; 
$mes=ucwords($mes) ;
unset($_SESSION["mesF"]);

};

if(isset($_SESSION["añoF"])){

$año=$_SESSION["añoF"] ; 
$año=ucwords($año) ;
unset($_SESSION["añoF"]);
};

if(isset($_SESSION["ccvF"])){

$ccv=$_SESSION["ccvF"] ; 
$ccv=ucwords($ccv) ;
unset($_SESSION["ccvF"]);
};

//_________________________

//Insertar datos

    $sql="SELECT id FROM usuarios WHERE nombreUsuario='".$_SESSION['user']."' or correo='".$_SESSION['user']."'" ;
    $memi=$conexion->query($sql) ;
  
      if( $memi->num_rows > 0 ){
        $info=$memi->fetch_array() ;
    
          $usuario=$info['id']  ;
          
          
      };


$sql="INSERT INTO usuarios_facturacion(usuario,numero,tipo,titular,ccv,fechaM,fechaA)   VALUES('".$usuario."','".$numero."','".$tarjeta."','".$titular."','".$ccv."','".$mes."','".$año."')";
$comprobar=$conexion->query($sql);


if ($conexion->affected_rows>0 ){ 
    
   if(isset($_SESSION['checkF'])){
       unset( $_SESSION['checkF']) ;
    header("Location:VehiculoCompra.php?alquilar=1"); 
    exit;
    
   }else {
       
        header("Location:PerfilControlador.php"); 
    exit;
   };
};




?>
