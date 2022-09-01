<?php
    include("../conexion_bd/conexion.php");
    if(!empty($_POST)){
        $id_servicio = $_POST["id_servicio"];
        $id_camping = $_POST["id_camping"];
        $sql = "select t.id_servicio from tiene t where t.id_camping = $id_camping and t.id_servicio=$id_servicio";
        $resultado = mysqli_query($conn,$sql);
        $filas = mysqli_num_rows($resultado);
        if($filas > 0){
            $data = mysqli_fetch_assoc($resultado);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            exit;
        }
        echo "error";
        exit;
    }
    exit;
    
?>