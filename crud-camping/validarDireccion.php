
<?php 
    include("../conexion_bd/conexion.php");

    if(!empty($_POST)){
        $direccion = $_POST["direccion"];
        //Sanitizamos el string del nombre
        $direccion = trim($direccion);
        $direccion = htmlspecialchars(strip_tags($direccion));
        $query = "SELECT * FROM CAMPING WHERE DIRECCION = '$direccion'";

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