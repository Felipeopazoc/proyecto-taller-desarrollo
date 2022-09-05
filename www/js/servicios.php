<?php
    include("../conexion_bd/conexion.php");
    if(!empty($_POST)){
        $id_servicio = $_POST["id_servicio"];
        $sql = "select id_servicio , nombre_servicio from servicio where id_servicio = $id_servicio";
        $resultado = mysqli_query($conn,$sql);
        $filas = mysqli_num_rows($resultado);

        if($filas > 0){
            $data = mysqli_fetch_assoc($resultado);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            exit;
        }else{
            echo "error";
            exit;
        }

    }
    exit;
?>