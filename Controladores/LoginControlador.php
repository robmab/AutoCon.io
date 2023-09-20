<?php

session_start();
include '../ConexiónBD.php';


          





//Recoger variables // Registro - Login

if(isset($_REQUEST["email"])){
     $email=$_REQUEST["email"];
     $email=ucwords($email) ;
        
        
if(isset($_REQUEST["pass"])){
        $pass=$_REQUEST["pass"];
        
        }



//Comprobación de Usuario en la base de datos.
$sql="SELECT count(*) FROM usuarios" ;
  $memi=$conexion->query($sql) ;
  
      if( $memi->num_rows > 0 ){
          
           $info=$memi->fetch_array() ;
           $num=$info[0] ;
           $num=(int)$num ;
      }
    
     
                                                          $cont=0 ;
 $listaUsu=array() ;
 $listaCorreo=array() ;
 
for ( $cont2=0  ; $cont < $num ; $cont2++  ) {
 
    $sql="SELECT nombreUsuario,correo  FROM usuarios WHERE ID='". $cont2 ."'"; 

    $mem=$conexion->query($sql) ;

if ( $mem&&$mem->num_rows>0 ) {
    $info= $mem->fetch_array() ;
   
       $listaUsu[$cont]=  $info['nombreUsuario']  ;
       $listaCorreo[$cont]=  $info['correo']  ;

     
  
                                                          $cont++ ;
    } 
   }
   
  

   //______SQL INYECTION POR FILTRO__________________________________________________________

   
                                                         $contador = 1 ;
   
          foreach ($listaUsu as $usu   ){
             if ( $usu == $email  ) {
                 
                
                 
                $sql="SELECT * FROM usuarios WHERE nombreUsuario='". $email ."'";
                $mem=$conexion->query($sql) ;
                if ( $mem&&$mem->num_rows>0 ) {
                $info= $mem->fetch_array() ;
                  $_SESSION['user']= $info['nombreUsuario'] ;
                  
              
             
                  $email= $info['nombreUsuario'] ;
                };
                
                
                                                          $contador=0   ;
              };   
           };
           
               foreach ($listaCorreo as $correo   ){
             if ( $correo == $email  ) {
                 
                 
                 $sql="SELECT * FROM usuarios WHERE correo='". $email ."'";
                $mem=$conexion->query($sql) ;
                if ( $mem&&$mem->num_rows>0 ) {
                $info= $mem->fetch_array() ;
                  $_SESSION['user']= $info['nombreUsuario'] ;
                  $email= $info['nombreUsuario'] ;
                };
                  
                                                          $contador=0   ;
              };   
           };




if ( $contador == 1 ){
    
  echo $email ;
    
    $_SESSION['mensajeBD']='El usuario '. $email .' no esta registrado.' ; 
   unset($_SESSION['user']) ;
   $contador2=0 ;    
   header("Location:../Vistas/LoginVista.php"); 
   exit;
   
};


//Comprobación Contraseña


$sql="SELECT contraseña FROM usuarios WHERE nombreUsuario='". $email ."' OR correo='". $email ."'  ";
$memi=$conexion->query($sql) ;
    if( $memi->num_rows > 0 ){
    $info=$memi->fetch_array() ;
    
          $decContraseña= base64_decode(  $info['contraseña']  )  ;
    
         //   $decContraseña = $info['contraseña'] ;
          
          if ( $decContraseña != $pass   ){
              
              $_SESSION['mensajeBD']='La contraseña no coincide' ;
              unset($_SESSION['user']) ;
              $contador2=0 ;  
              
              
             header("Location:../Vistas/LoginVista.php");
              exit;
              
          }
          
    }








//Rol en sesión
    
    $sql="SELECT rol FROM usuarios WHERE nombreUsuario='". $email ."' OR correo='". $email ."'  " ;
    $memi=$conexion->query($sql) ;
    if( $memi->num_rows > 0 ){
    $info=$memi->fetch_array() ;
    
        $_SESSION['rol']= $info['rol'] ;
            
    }
    
  // unset ( $_SESSION['user']);
 
    echo $_REQUEST['compraV'] ;
    if(isset($_REQUEST['compraV'])){
        
      header("Location:VehiculosControlador.php");
    exit;  
        
    }else{
    
  header("Location:../Vistas/index.php");
    exit;
    
    
    };


}




