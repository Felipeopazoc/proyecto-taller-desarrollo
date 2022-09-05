<?php

include("../conexion_bd/conexion.php");

$id_camping = "";
$id_servicio="";
if(!empty($_GET)){
    $id_camping = $_GET["id_camping"];
    $id_servicio = $_GET["id_servicio"];

    $sql = "delete from tiene where id_camping = $id_camping and id_servicio=$id_servicio";
    $conn -> query($sql);

    header("Location: ../incorporacion_servicios.php?id=$id_camping");
}

?>