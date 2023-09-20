<?php

session_start();
include '../ConexiónBD.php';






$_SESSION['chekon']=1;







if(isset($_REQUEST['añadir'])){
     
   
        
        
  //Comprobar que la fecha inicial no sea mayor que la final  
 if($_REQUEST['fechaI'] > $_REQUEST['fechaF']){
     
     $_SESSION['mensajeBD']='La fecha inicial no puede ser mayor que la final.';
     header("Location:../Vistas/EventosVista.php#1");
     exit;
 }   ;
    
  
 //Añadir Evento
//_____________________________________________________________
 
  $nombre =  $_REQUEST['nombre'] ;
   $banner =     $_REQUEST['banner'];
 
 $sql="INSERT INTO eventos_descuentos(nombre,fecha_in,fecha_fin,porciento,banner)   VALUES('".$nombre."','".$_REQUEST['fechaI']."','".$_REQUEST['fechaF']."','".$_REQUEST['porciento']."','".$banner."')";
$comprobar=$conexion->query($sql);


if ($conexion->affected_rows>0 ){}else{
       $_SESSION['mensajeBD']='No puedes crear un evento durante las mismas fechas que otro que tengas creado.';
     header("Location:../Vistas/EventosVista.php#1");
     exit;
    
} 
 
 
    
    
    
    
   
    
}

if(isset($_REQUEST['editar'])){
    
   
    
    
  $sql="UPDATE eventos_descuentos SET banner='".$_REQUEST['banner']."' WHERE  fecha_in='".$_REQUEST['fi']."'   AND fecha_fin='".$_REQUEST['ff']."'  ";
             $comprobar=$conexion->query($sql);
    
    
    
    
}


if(isset($_REQUEST['eliminar'])){
     
     $sql="DELETE FROM eventos_descuentos WHERE fecha_in='".$_REQUEST['fi']."'   AND fecha_fin='".$_REQUEST['ff']."' ";
    $comprobar=$conexion->query($sql);
   
    
}






//__________________//_________________________________________//_____________________________________
//________________________________//____________________________//____________________________________
//________________________________//________________________________//________________________________
//______________//______________________//____________________________________________________________



//Recoger eventos en array


    $sql="SELECT count(*) FROM eventos_descuentos" ;
  $memi=$conexion->query($sql) ;
  
      if( $memi->num_rows > 0 ){
          
           $info=$memi->fetch_array() ;
           $num=$info[0] ;
           $num=(int)$num ;
      }
    
 
                                                          $cont=0 ;
 $datosEventos=array() ;

 
for ( $cont2=0  ; $cont < $num ; $cont2++  ) {
 
    $sql="SELECT *  FROM eventos_descuentos WHERE id='". $cont2 ."'"; 

    $mem=$conexion->query($sql) ;
    
        
if ( $mem&&$mem->num_rows>0 ) {
    $info= $mem->fetch_array() ;
   

    
    $fechaI= date("d-m-Y", strtotime($info['fecha_in']));
    $datosEventos[$cont]['fechaI']=  $fechaI  ;
    $datosEventos[$cont]['fechaII']=  $info['fecha_in'] ;
    
    
     $fechaF= date("d-m-Y", strtotime($info['fecha_fin']));
    $datosEventos[$cont]['fechaF']=  $fechaF ;
     $datosEventos[$cont]['fechaFF']=  $info['fecha_fin'] ;
    
    $datosEventos[$cont]['nombre']=  $info['nombre'] ;
    
     $datosEventos[$cont]['porciento']=  $info['porciento'] ;
     $datosEventos[$cont]['banner']=  $info['banner'] ;
 
    
    
    
      
           
           
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

$datosEventos = array_sort($datosEventos, 'fechaI', SORT_DESC);
    

$_SESSION['datosEventos']= $datosEventos;

header("Location:../Vistas/EventosVista.php");exit;





?>
