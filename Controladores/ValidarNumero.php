<?php

session_start();

$_SESSION['checkon']=1 ;
//Recoger variables y guardarlas en sesion.

if(isset($_REQUEST["nombre"])){

$nombre=$_REQUEST["nombre"] ; 
$nombre=ucwords($nombre) ;
$_SESSION['nombre']= $nombre;
};
if(isset($_REQUEST["apellidos"])){

$apellidos=$_REQUEST["apellidos"] ;
$apellidos=ucwords($apellidos) ;
$_SESSION['apellidos']= $apellidos;
};


if(isset($_REQUEST["nombreUs"])){

$nombreUs=$_REQUEST["nombreUs"] ;
$nombreUs=ucwords($nombreUs) ;
$_SESSION['nombreUs']= $nombreUs;
};


if(isset($_REQUEST["email"])){

$email=$_REQUEST["email"] ;
$email=ucwords($email) ;
$_SESSION['email']= $email;
};

if(isset($_REQUEST["direccion"])){

$direccion=$_REQUEST["direccion"] ;
$direccion=ucwords($direccion) ;
$_SESSION['direccion']= $direccion;
};


if(isset($_REQUEST['edicion'])){

          if(isset($_REQUEST["contraseñaActual"])){
 
             $contraseñaActual=$_REQUEST["contraseñaActual"] ;
             
             $_SESSION['contraseñaActual']= $contraseñaActual;
             };
             
              if(isset($_REQUEST["contraseñaNueva"])){
 
             $contraseñaNueva=$_REQUEST["contraseñaNueva"] ;
             
             $_SESSION['contraseñaNueva']= $contraseñaNueva;
             };
             
              if(isset($_REQUEST["contraseñaNueva2"])){
 
             $contraseñaNueva2=$_REQUEST["contraseñaNueva2"] ;
             
             $_SESSION['contraseñaNueva2']= $contraseñaNueva2;
             };
        
           
    
    
    

}else{
    
    
       if(isset($_REQUEST["contraseña"])){
 
             $contraseña=$_REQUEST["contraseña"] ;
             $contraseña= base64_encode ($contraseña);
             $_SESSION['contraseña']= $contraseña;
             };
    
    
};


if(isset($_REQUEST["fechaNac"])){

$fechaNac=$_REQUEST["fechaNac"] ; 
$_SESSION['fechaNac']= $fechaNac;
};

if(isset($_REQUEST["nif"])){

$nif=$_REQUEST["nif"] ;
$nif=strtoupper($nif);
$_SESSION['nif']= $nif;
};

if(isset($_REQUEST["provincia"])){

$provincia=$_REQUEST["provincia"] ;
$provincia=ucwords($provincia) ;
$_SESSION['provincia']= $provincia;
};


if(isset($_REQUEST["poblacion"])){

$poblacion=$_REQUEST["poblacion"] ;
$poblacion=ucwords($poblacion) ;
$_SESSION['poblacion']= $poblacion;
};


if(isset($_REQUEST["codigoP"])){

$codigoP=$_REQUEST["codigoP"] ;
$codigoP=ucwords($codigoP) ;
$_SESSION['codigoP']= $codigoP;
};

if(isset($_REQUEST["movil"])){

$movil=$_REQUEST["movil"] ;
$movil=ucwords($movil) ;
$_SESSION['movil']= $movil;
};









 //Funcion validar codigo postal

function validaPostal ($cadena)
       {
          //Comrpobamos que realmente se ha añadido el formato correcto
         if(preg_match('/^[0-9]{5}$/i', $cadena)) {
        
         } else {
            
            $_SESSION['mensajeBD']= "Código postal inválido" ;
             
             if(isset($_REQUEST['edicion'])) {  
        
    header("Location:../Vistas/PerfilVista.php?editar=1");
          exit;
      }else{
    header("Location:../Vistas/RegistroVista.php");
    exit;
    
      };
              
         };    
       }


//______________________




//Funcion de validar telefono

function validate_phone_number($phone)
{
    
     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
   
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
    
     
     if (strlen($phone_to_check) < 9 || strlen($phone_to_check) > 9) {
         
         
        $_SESSION['mensajeBD']= "El número de móvil o telefono es inválido" ;
       
        
      if(isset($_REQUEST['edicion'])) {  
        
    header("Location:../Vistas/PerfilVista.php?editar=1");
          exit;
      }else{
    header("Location:../Vistas/RegistroVista.php");
    exit;
    
      };
    
        exit;
        
        
     } else {
          if(isset($_REQUEST['edicion'])) {
               
              header("Location:PerfilControlador.php?edicion=1");
              exit;
              
          }else{
          header("Location:RegistroControlador.php");};
        exit;
     };

};

     




       
    validaPostal($codigoP)  ;   
       
     
validate_phone_number($movil) ;





                                                   
?>

