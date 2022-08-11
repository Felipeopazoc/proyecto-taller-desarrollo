<?php
include("../conexion_bd/conexion.php");

if(!empty($_POST)){
    $id = $_POST["id_camping"];
    for ($i=0;$i<count($_POST["prices"]);$i++){
        $sql = "insert into tiene values (".$_POST["ids"][$i].",".$id.",".$_POST["prices"][$i].")";
        $conn -> query($sql);
    }
    echo "servicios ingresados";
    header("Location: ../incorporacion_servicios.php?id=$id");
}

print_r($_POST);

?>