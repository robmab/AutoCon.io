<?php

session_start();
include '../ConexiónBD.php';


                                                   
//Recoger variables // Registro - Login

if(isset($_SESSION["nombre"])){

$nombre=$_SESSION["nombre"] ; 
$nombre=ucwords($nombre) ;
unset($_SESSION['nombre']);


if(isset($_SESSION["apellidos"])){

$apellidos=$_SESSION["apellidos"] ;
$apellidos=ucwords($apellidos) ;
unset($_SESSION['apellidos']);
}





if(isset($_SESSION["nombreUs"])){

$nombreUs=$_SESSION["nombreUs"] ;
$nombreUs=ucwords($nombreUs) ;
unset($_SESSION['nombreUs']);
}

if(isset($_SESSION["email"])){

$email=$_SESSION["email"] ;
$email=ucwords($email) ;
unset($_SESSION['email']);
}

if(isset($_SESSION["direccion"])){

$direccion=$_SESSION["direccion"] ;
$direccion=ucwords($direccion) ;
unset($_SESSION['direccion']);
}

if(isset($_SESSION["contraseña"])){

$contraseña=$_SESSION["contraseña"] 
        ;
unset($_SESSION['contraseña']);
}

if(isset($_SESSION["fechaNac"])){

$fechaNac=$_SESSION["fechaNac"] ; 
unset($_SESSION['fechaNac']);
}

if(isset($_SESSION["nif"])){

$nif=$_SESSION["nif"] ;
$nif=strtoupper($nif);
unset($_SESSION['nif']);
}

if(isset($_SESSION["provincia"])){

$provincia=$_SESSION["provincia"] ;
$provincia=ucwords($provincia) ;
unset($_SESSION['provincia']);
}


if(isset($_SESSION["poblacion"])){

$poblacion=$_SESSION["poblacion"] ;
$poblacion=ucwords($poblacion) ;
unset($_SESSION['poblacion']);}

if(isset($_SESSION["codigoP"])){

$codigoP=$_SESSION["codigoP"] ;
$codigoP=ucwords($codigoP) ;
unset($_SESSION['codigoP']);
}


if(isset($_SESSION["movil"])){

$movil=$_SESSION["movil"] ;
$movil=ucwords($movil) ;
unset($_SESSION['movil']);
};

//Insertar en la Base de Datos


$sql="INSERT INTO usuarios(nombre,nif,domicilio,fechaNacimiento,contraseña,rol,apellidos,nombreUsuario,correo,provincia,población,codigoPostal,numeroMovil)   VALUES('".$nombre."','".$nif."','".$direccion."','".$fechaNac."','".$contraseña."','Usuario','".$apellidos."','".$nombreUs."','".$email."','".$provincia."','".$poblacion."','".$codigoP."','".$movil."')";
$comprobar=$conexion->query($sql);


if ($conexion->affected_rows>0 ){ 

$_SESSION['mensajeBD']= "Usuario ". $nombreUs." creado." ;
    
$_SESSION['user']= $nombreUs;
$_SESSION['rol']='Usuario' ;
  header("Location:../Vistas/Index.php"); 
    exit;
    

} 
else {

$_SESSION['mensajeBD']= "Este usuario ya existe" ;
    
  header("Location:../Vistas/RegistroVista.php"); 
exit;
}
}

//________________________________________-

?>
