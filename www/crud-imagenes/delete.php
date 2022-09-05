<?php 
include("../conexion_bd/conexion.php");
$id="";
if(isset($_GET["idImagen"])){
    $id = $_GET["idImagen"];
    $id_camping = $_GET["id_camping"];
}
$sql = "delete from imagenes where id_imagen = $id";

$conn->query($sql);

header("Location: ../listadoImagenes.php?id=$id_camping");

?>