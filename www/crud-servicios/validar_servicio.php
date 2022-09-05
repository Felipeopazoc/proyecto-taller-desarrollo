<?php

include("../conexion_bd/conexion.php");

if(!empty($_POST)){
    $id = $_POST["id1"];
    $id_camping = $_POST["id_camping"];
    $query = "select * from tiene t where t.id_servicio = $id and t.id_camping = $id_camping";

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