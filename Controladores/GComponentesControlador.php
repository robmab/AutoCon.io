<?php

session_start();
include '../ConexiónBD.php';






$_SESSION['chekon']=1;




//Comprar/cancelar


if(isset($_REQUEST['usuario'])){
     
    
    
   if(isset($_REQUEST['comprar'])){
       
      
        
   $sql="UPDATE componente_usuario SET finalizado='Si' WHERE usuario='".$_REQUEST['usuario']."' AND componente='".$_REQUEST['componente']."'";
             $comprobar=$conexion->query($sql);
             
  
             
    }
    
   if(isset($_REQUEST['cancelar'])){
    $sql="DELETE FROM componente_usuario WHERE usuario='".$_REQUEST['usuario']."' AND componente='".$_REQUEST['componente']."' AND n='".$_REQUEST['n']."' ";
    $comprobar=$conexion->query($sql);
        
    }
}






//__________________//_________________________________________//_____________________________________
//________________________________//____________________________//____________________________________
//________________________________//________________________________//________________________________
//______________//______________________//____________________________________________________________



//Recoger vehiculos en array


    $sql="SELECT count(*) FROM componente_usuario" ;
  $memi=$conexion->query($sql) ;
  
      if( $memi->num_rows > 0 ){
          
           $info=$memi->fetch_array() ;
           $num=$info[0] ;
           $num=(int)$num ;
      }
    
 
                                                          $cont=0 ;
 $datosGComponentes=array() ;

 
for ( $cont2=0  ; $cont < $num ; $cont2++  ) {
 
    $sql="SELECT *  FROM componente_usuario WHERE id='". $cont2 ."'"; 

    $mem=$conexion->query($sql) ;
    
        
if ( $mem&&$mem->num_rows>0 ) {
    $info= $mem->fetch_array() ;
   
    $usuario =   $info['usuario'];    $datosGComponentes[$cont]['idU']=  $info['usuario']  ;
    $componente =   $info['componente'];    $datosGComponentes[$cont]['idC']=  $info['componente']  ;

    
    
    $fecha= date("d-m-Y", strtotime($info['fecha']));
    $datosGComponentes[$cont]['fecha']=  $fecha  ;
    $datosGComponentes[$cont]['n']=  $info['n']  ;
    $datosGComponentes[$cont]['precio']=  $info['precio'] *1  ;
       $datosGComponentes[$cont]['cantidad']=  $info['cantidad']  ;
        $datosGComponentes[$cont]['finalizado']=  $info['finalizado']  ;
    
   
              $sql="SELECT * FROM usuarios WHERE id='".$usuario."' " ;
    $memi=$conexion->query($sql) ;
  
      if( $memi->num_rows > 0 ){
        $info=$memi->fetch_array() ;
    
        $datosGComponentes[$cont]['nombreUsuario']=  $info['nombreUsuario']  ;
         $datosGComponentes[$cont]['correo']=  $info['correo']  ;
          $datosGComponentes[$cont]['numeroMovil']=  $info['numeroMovil']  ;
         $datosGComponentes[$cont]['nombre']=  $info['nombre']  ;
         $datosGComponentes[$cont]['apellidos']=  $info['apellidos']  ;
         $datosGComponentes[$cont]['nif']=  $info['nif']  ;
          
      };
      
      
                 $sql="SELECT * FROM componentes WHERE id='".$componente."' " ;
    $memi=$conexion->query($sql) ;
  
      if( $memi->num_rows > 0 ){
        $info=$memi->fetch_array() ;
    
           $datosGComponentes[$cont]['nombreC']=  $info['nombre']  ;
          $datosGComponentes[$cont]['tipo']=  $info['tipo']  ;
          $datosGComponentes[$cont]['ruta']=  $info['ruta']  ;


          
          
      };
       
     
    

      
        
        
        
       
                          
         
           
           
            $cont++ ;
       }
       
    }


            //_______________________________________________________   
        //Ordenado por estado.
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

$datosGComponentes = array_sort($datosGComponentes, 'finalizado', SORT_ASC);
    

$_SESSION['datosGComponentes']= $datosGComponentes;

header("Location:../Vistas/GComponentesVista.php");exit;





?>
