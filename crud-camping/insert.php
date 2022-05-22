<?php
    include_once("../conexion_bd/conexion.php");

    if(isset($_POST["submit"])){
        $nombre = $_POST["nombre"];
        $cantidad = $_POST["cantidad_sitios"];
        $correo = $_POST["email"];
        $descripcion = $_POST["descripcion"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $id_random = rand(1,100000);
        //Sanitizamos las variables
        $nombre = trim($nombre);
        $correo = trim($correo);
        $descripcion = trim($descripcion);
        //Eliminamos la posible inyeccion html
        $nombre = htmlspecialchars(strip_tags($nombre));
        $correo = htmlspecialchars(strip_tags($correo));
        $cantidad = htmlspecialchars(strip_tags($cantidad));
        $descripcion = htmlspecialchars(strip_tags($descripcion));
        $telefono = htmlspecialchars(strip_tags($telefono));
        $direccion = htmlspecialchars(strip_tags($direccion));

        
        $sql = "insert into camping values($id_random,'$nombre',$cantidad,'$descripcion','$direccion','$correo',$telefono,1,1)";

        $conn ->query($sql);
        echo $sql;
        echo $descripcion;
        //header("Location: ../listado_campings/agregarImagenes.php?id=$id_random"); //Opcion 1
        header("Location: ../listadoImagenes.php?id=$id_random");
        
       
    }

?>