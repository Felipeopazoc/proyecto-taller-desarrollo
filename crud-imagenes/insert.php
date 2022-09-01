<?php
    include("../conexion_bd/conexion.php");
    
    if(isset($_POST["submit"])){
        $id = $_POST["id"];
        $check = getimagesize($_FILES["imagen"]["tmp_name"]);

        if($check !== false){
            $image = $_FILES['imagen']['tmp_name'];
            $imageContent =  addslashes(file_get_contents($image));
        }
        $sql = "insert into imagenes values (null,'$imageContent',$id,'1')";
        $conn->query($sql);
        header("Location: ../listadoImagenes.php?id=$id");
    }

?>