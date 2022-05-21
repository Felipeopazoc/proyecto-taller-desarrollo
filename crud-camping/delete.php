<?php 
    include_once("../conexion_bd/conexion.php");
    $id = "";

    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }

    $sql = "delete from camping where id_camping = $id";

    $conn->query($sql);

    header("Location: ../mostrar_campings.php");

?>