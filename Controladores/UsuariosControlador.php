<?php

session_start();
include '../ConexiónBD.php';






$_SESSION['chekon']=1;




//Modificación de usuarios


if(isset($_REQUEST['nU'])){
 
    if(isset($_REQUEST['adm'])){
        
        $sql="UPDATE usuarios SET rol='Admin' WHERE nombreUsuario='".$_REQUEST['nU']."'";
             $comprobar=$conexion->query($sql);
    }
  
     if(isset($_REQUEST['user']) AND $_REQUEST['nU']!="Rob"){
        $sql="UPDATE usuarios SET rol='Usuario' WHERE nombreUsuario='".$_REQUEST['nU']."'";
             $comprobar=$conexion->query($sql);
             
             
        
    }
 
     if(isset($_REQUEST['eliminar']) AND $_REQUEST['nU']!="Rob"){
         
         
         $sql="DELETE FROM componente_usuario WHERE usuario='".$_REQUEST['id']."' ";
    $comprobar=$conexion->query($sql);
    $sql="DELETE FROM vehiculos_usuarios WHERE usuario='".$_REQUEST['id']."' ";
    $comprobar=$conexion->query($sql);
    $sql="DELETE FROM reparacion WHERE usuario='".$_REQUEST['id']."' ";
    $comprobar=$conexion->query($sql);
         
             $sql="DELETE FROM usuarios_facturacion WHERE usuario='".$_REQUEST['id']."' ";
    $comprobar=$conexion->query($sql);
      
         $sql="DELETE FROM usuarios WHERE nombreUsuario='".$_REQUEST['nU']."' ";
    $comprobar=$conexion->query($sql);
        
    }
  
}






//__________________//_________________________________________//_____________________________________
//________________________________//____________________________//____________________________________
//________________________________//________________________________//________________________________
//______________//______________________//____________________________________________________________



//Recoger usuarios en array


    $sql="SELECT count(*) FROM usuarios" ;
  $memi=$conexion->query($sql) ;
  
      if( $memi->num_rows > 0 ){
          
           $info=$memi->fetch_array() ;
           $num=$info[0] ;
           $num=(int)$num ;
      }
    
 
                                                          $cont=0 ;
 $datosUsuarios=array() ;

 
for ( $cont2=0  ; $cont < $num ; $cont2++  ) {
 
    $sql="SELECT *  FROM usuarios WHERE id='". $cont2 ."'"; 

    $mem=$conexion->query($sql) ;
    
        
if ( $mem&&$mem->num_rows>0 ) {
    $info= $mem->fetch_array() ;
   
   
    
   
        
        $datosUsuarios[$info['nombreUsuario']]['nombre']=  $info['nombre']  ;
        $datosUsuarios[$info['nombreUsuario']]['nif']=  $info['nif']  ;
        $datosUsuarios[$info['nombreUsuario']]['domicilio']=  $info['domicilio']  ;
        $info['fechaNacimiento']= date("d-m-Y", strtotime($info['fechaNacimiento']));
        $datosUsuarios[$info['nombreUsuario']]['fechaNacimiento']=  $info['fechaNacimiento']  ;
        $datosUsuarios[$info['nombreUsuario']]['rol']=  $info['rol']  ;
        $datosUsuarios[$info['nombreUsuario']]['apellidos']=  $info['apellidos']  ;
        $datosUsuarios[$info['nombreUsuario']]['codigoPostal']=  $info['codigoPostal']  ;
        $datosUsuarios[$info['nombreUsuario']]['correo']=  $info['correo']  ;
        $datosUsuarios[$info['nombreUsuario']]['provincia']=  $info['provincia']  ;
        $datosUsuarios[$info['nombreUsuario']]['población']=  $info['población']  ;
        $datosUsuarios[$info['nombreUsuario']]['numeroMovil']=  $info['numeroMovil']  ;
        $datosUsuarios[$info['nombreUsuario']]['id']=  $info['id']  ;
      
        
        
        
       
                          
         
           
           
            $cont++ ;
       }
       
    }


            //_______________________________________________________   
        //Ordenado por nombre.
        //_______________________________________________________   

function array_sort($array, $on, $order=SORT_ASC){

    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

$datosUsuarios = array_sort($datosUsuarios, 'nombre', SORT_ASC);
    
    

$_SESSION['datosUsuarios']= $datosUsuarios;

header("Location:../Vistas/UsuariosVista.php");exit;





?>
