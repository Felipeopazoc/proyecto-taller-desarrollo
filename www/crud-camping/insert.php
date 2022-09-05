<?php
    include_once("../conexion_bd/conexion.php");
     
  
    if(!empty($_POST)){
    
        $nombre = $_POST["nombre"];
        $cantidad = $_POST["cantidad_sitios"];
        $correo = $_POST["email"];
        $descripcion = $_POST["descripcion"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $mes_inicio = $_POST["inicio"];
        $mes_fin = $_POST["fin"];
        $comuna = $_POST["select_comuna"];
        $id_random = rand(1,100000);
        //Sanitizamos las variables
     
        if(isset($nombre)){
            $nombre = trim($nombre);
            $nombre = htmlspecialchars(strip_tags($nombre));
        
        }
        if(isset($cantidad)){
            $cantidad = trim($cantidad);
            $cantidad = htmlspecialchars(strip_tags($cantidad));
        }
        if(isset($correo)){
            $correo = trim($correo);
            $correo = htmlspecialchars(strip_tags($correo));
        }
        if(isset($descripcion)){
            $descripcion = trim($descripcion);
            $descripcion = htmlspecialchars(strip_tags($descripcion));

        }
        if(isset($telefono)){
            
            $telefono = trim($telefono);
            $telefono = htmlspecialchars(strip_tags($telefono));
        }
        
        if(isset($direccion)){
            
            $direccion = trim($direccion);
            $direccion = htmlspecialchars(strip_tags($direccion));
        }
                
        
      
        
        $sql = "insert into camping values($id_random,'$nombre',$cantidad,'$descripcion','$direccion','$correo',$telefono,$mes_inicio,$mes_fin,$comuna,1)";

        if(mysqli_query($conn,$sql)){
            echo $id_random;
            exit;
        }

        //echo $descripcion;
        //header("Location: ../listado_campings/agregarImagenes.php?id=$id_random"); //Opcion 1
//        header("Location: ../listadoImagenes.php?id=$id_random");
        
}

exit;
  

?>