<?php

session_start(); 
include '../ConexiónBD.php';

//Recoger variable


if(isset($_REQUEST["valor"])){

$valor=$_REQUEST["valor"] ; 

};



//Requerir que haya iniciado sesión


if(isset($_SESSION['user'])){}else{
    
  $_SESSION['mensajeBD']='Necesitas iniciar sesión primero';
  header('Location:../Vistas/LoginVista.php')  ;
  exit;    
    
}

$userL=$_SESSION['user'];
//funcion para ahorrar código y que se realice la operacion.

function solicitar_servicio(){

    global $userL, $valor , $conexion ;
    
    
  $sql="SELECT id  FROM usuarios WHERE nombreUsuario='".$userL."' OR correo='".$userL."' "; 

    $mem=$conexion->query($sql) ;

if ( $mem&&$mem->num_rows>0 ) {
    $info= $mem->fetch_array() ;
    $user=$info['id'];
}
    
//Comprobar si se selecciono el mismo servicio anteriormente y validarlo solo en caso de que este en estado de finalizado.    
    
  







         $n=rand(1000000000,9999999999);
      $contad = 0 ;
  while ($contad == 0){
      
      $sql="SELECT * FROM reparacion WHERE n='".$n."'";
    $memi=$conexion->query($sql) ;
    if( $memi->num_rows > 0 ){
        
        
        $n=rand(1000000000,9999999999);
        
        
    }else{
        $contad = 1 ;
        
    };
      
  }
  

    


//________________________________________________


//Ahora solo insertara en caso de que aceptado este en finalizado o sea 0, es decir que no hubiera solicitado nunca un servicio de ese tipo este usuario.

  
  
  $sql="SELECT *  FROM reparacion WHERE  servicio='".$valor."' AND aceptado='Si' AND usuario='".$user."' "; 

    $mem=$conexion->query($sql) ;

if ( $mem&&$mem->num_rows>0 ) {
  
     $_SESSION['mensajeBD']='No puedes solicitar un servicio que ya está en espera de completarse.';

  header('Location:../Vistas/ReparacionVista.php')  ;
 
  exit;  
    
}


 $sql="SELECT *  FROM reparacion WHERE  servicio='".$valor."' AND aceptado='Espera' AND usuario='".$user."' "; 

    $mem=$conexion->query($sql) ;

if ( $mem&&$mem->num_rows>0 ) {
  
     $_SESSION['mensajeBD']='No puedes solicitar un servicio que ya está en espera de completarse.';

  header('Location:../Vistas/ReparacionVista.php')  ;
 
  exit;  
    
}


  
  $fechaActual= date("o\-m\-d") ;
  

  
$sql="SELECT *  FROM reparacion WHERE fecha='".$fechaActual."' AND servicio='".$valor."' AND aceptado!='Finalizado' AND usuario='".$user."' "; 

    $mem=$conexion->query($sql) ;

if ( $mem&&$mem->num_rows>0 ) {
    
    
     
    $_SESSION['mensajeBD']='No puedes solicitar el mismo servicio en el mismo día.';

  header('Location:../Vistas/ReparacionVista.php')  ;
 
  exit;  
    
    
    
}else{

 
    
    $sql="INSERT INTO reparacion(usuario,servicio,aceptado,n)   VALUES('".$user."','".$valor."','Espera','".$n."')";
    $comprobar=$conexion->query($sql);

if ($conexion->affected_rows>0 ){ 

    
     $_SESSION['mensajeBD3']='Gracias por solicitar nuestros servicios.';
  header('Location:SeguimientoControlador.php#3')  ;
  exit;   
    



}  
 

}
}



//Según el servicio elegido, ese se añadira a la petición

if ($valor == 'sustituir'){

   solicitar_servicio();
   
}elseif($valor == 'neumatico'){
    
    
    solicitar_servicio();
    
    
}elseif($valor == 'llanta'){
    
    
    solicitar_servicio();
    
    
    
}elseif($valor == 'aceite'){
    
    solicitar_servicio();
    
    
}elseif($valor == 'pintura'){ 
    
    solicitar_servicio();
    
    
}elseif($valor == 'carroceria'){    
    
    solicitar_servicio();
    
    
}elseif($valor == 'bateria'){
    
    
    solicitar_servicio();
    
    
}elseif($valor == 'bombilla'){    
    
    
    solicitar_servicio();
    
    
}elseif($valor == 'parabrisas'){
    
    
    solicitar_servicio();
    
    
}elseif($valor == 'limpieza'){
    
    solicitar_servicio();
    
    
    
}

    
    
    




?>



