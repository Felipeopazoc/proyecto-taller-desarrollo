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
        $nombre = htmlspecialchars($nombre);
        $correo = htmlspecialchars($correo);
        $cantidad = htmlspecialchars($cantidad);
        $descripcion = htmlspecialchars($cantidad);
        $telefono = htmlspecialchars($cantidad);


        $sql = "insert into camping values($id_random,'$nombre',$cantidad,'$descripcion','$direccion','$correo',$telefono,1,1)";

        $conn ->query($sql);
        echo $sql;
        echo $descripcion;
        header("Location: ../listado_campings/agregarImagenes.php?id=$id_random");
        
       
    }

?>