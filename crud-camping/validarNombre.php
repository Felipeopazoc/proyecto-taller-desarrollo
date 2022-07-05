<?php
    include("../conexion_bd/conexion.php");

    if(!empty($_POST)){
        $nombre = $_POST["nombre"];
        //Sanitizamos el string del nombre
        $nombre = trim($nombre);
        $nombre = htmlspecialchars(strip_tags($nombre));
        $query = "select * from camping where nombre = '$nombre'";

        $resultado = mysqli_query($conn,$query);
    
        mysqli_close($conn);
    
        $filas = mysqli_num_rows($resultado);
        if($filas > 0){
            $data = mysqli_fetch_assoc($resultado);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            exit;
        }
            echo 'error';
        exit;
    }
    exit;

?>

