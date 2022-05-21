
<?php
    include("../conexion_bd/conexion.php");
    if(isset($_POST["submit"])){
        $id = $_POST["id"];
        $check1 = getimagesize($_FILES["imagen1"]["tmp_name"]);
        if($check1 !== false){
            $image1 = $_FILES['imagen1']['tmp_name'];
            $imgContent1 = addslashes(file_get_contents($image1));
        }
        $check2 = getimagesize($_FILES["imagen2"]["tmp_name"]);
        if($check2 !==false){
            $image2 = $_FILES["imagen2"]["tmp_name"];
            $imgContent2 = addslashes(file_get_contents($image2));
        }   
        $check3 = getimagesize($_FILES["imagen3"]["tmp_name"]);
        if($check3!==false){
            $image3 = $_FILES["imagen3"]["tmp_name"];
            $imgContent3 = addslashes(file_get_contents($image3));
        }
        
        $insert1 = "insert into imagenes values (null,'$imgContent1',$id)";
        $insert2 = "insert into imagenes values (null,'$imgContent2',$id)";
        $insert3 = "insert into imagenes values (null,'$imgContent3',$id)";
        
        $conn->query($insert1);
        $conn->query($insert2);
        $conn->query($insert3);

        echo("Imagenes subidas exitosamente");

        header("Location: ../registro_camping.php");

    }else{
        echo "Please select an image file to upload.";
    }

?>