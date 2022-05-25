<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php
include("registro_camping.view.php");
include("conexion_bd/conexion.php");

if(isset($_POST["submit"])){

    $nombre = $_POST["nombre"];
    $cantidad = $_POST["cantidad_sitios"];
    $correo = $_POST["email"];
    $descripcion = $_POST["descripcion"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $fecha_inicio = $_POST["inicio"];
    $fecha_fin = $_POST["fin"];
    $id_random = rand(1,100000);
    $comuna = $_POST["select_comuna"];
    //Sanitizamos las variables
    $nombre = trim($nombre);
    $correo = trim($correo);
    $descripcion = trim($descripcion);
    //Eliminamos la posible inyeccion html
    $nombre = htmlspecialchars(strip_tags($nombre));
    $correo = htmlspecialchars(strip_tags($correo));
    $cantidad = htmlspecialchars(strip_tags($cantidad));
    $descripcion = htmlspecialchars(strip_tags($descripcion));
    $telefono = htmlspecialchars(strip_tags($telefono));
    $direccion = htmlspecialchars(strip_tags($direccion));
    
    $contador_validacion = 0;

  //  validarNombre($nombre);
  //  validarCorreo($correo);
  //  validarDireccion($direccion);
  //validarTelefono($telefono);
     if(!validarNombre($nombre)){
         $contador_validacion++;
     }
     if(!validarCorreo($correo)){
         $contador_validacion++;
     }
     if(!validarDireccion($direccion)){
         $contador_validacion++;
     }
     if(validarTelefono($telefono)){
        $contador_validacion++;
     }
     if(validarFechas($fecha_inicio,$fecha_fin)){
         $contador_validacion++;
     }


    
     if($contador_validacion==5){
         ?>
            <p class="alert alert-success w-75 m-auto text-center">Camping registrado correctamente, redireccionando.....</p>
         <?php
             $sql = "insert into camping values($id_random,'$nombre',$cantidad,'$descripcion','$direccion','$correo',$telefono,'$fecha_inicio','$fecha_fin',$comuna,1)";
             $conn ->query($sql);
             echo"<script language='javascript'>window.location='listadoImagenes.php?id=$id_random'</script>;";
            
        }else{
         ?>
            <p class="alert alert-danger w-50 mb-2 m-auto text-center"> <strong>Ingrese de nuevo la información </strong></p>
        <?php
     }
  
    
    //header("Location: ../listado_campings/agregarImagenes.php?id=$id_random"); //Opcion 1
 
    
}

function validarNombre($nombre){
    $nombre = strtoupper($nombre);
    include("conexion_bd/conexion.php");
    $existe = false;
    $sql = "select * from camping";
    $resultado = mysqli_query($conn,$sql);
    $filas = mysqli_num_rows($resultado);
    if($filas){
        while($nombre_camping = $resultado->fetch_row()){
            if(strcmp($nombre,strtoupper($nombre_camping[1]))==0){
                 $existe = true;
                 ?>
                    <p class="alert alert-danger w-50 mb-2 m-auto text-center">Este <strong>nombre </strong> ya está registrado</p>
                 <?php
                 break;
            }
        }
    }
    return $existe;
}

function validarCorreo($correo){
    $correo = strtoupper($correo);
    include("conexion_bd/conexion.php");
    $existe = false;
    $sql = "select * from camping";
    $resultado = mysqli_query($conn,$sql);
    $filas = mysqli_num_rows($resultado);
    if($filas){
        while($correo_camping = $resultado->fetch_row()){
            if(strcmp($correo,strtoupper($correo_camping[5]))==0){
                 $existe = true;
                 ?>
                 <p class="alert alert-danger w-50 mb-2 m-auto text-center">Este <strong>correo</strong> ya está registrado</p>
                <?php
                 break;
            }
        }
    }
    return $existe;
}
function validarDireccion($direccion){
    $direccion = strtoupper($direccion);
    include("conexion_bd/conexion.php");
    $existe = false;
    $sql = "select * from camping";
    $resultado = mysqli_query($conn,$sql);
    $filas = mysqli_num_rows($resultado);
    if($filas){
        while($direccion_camping = $resultado->fetch_row()){
            if(strcmp($direccion,strtoupper($direccion_camping[4]))==0){
                $existe = true;
                ?>
                <p class="alert alert-danger w-50 mb-2 m-auto text-center">Esta <strong> dirección </strong> ya está registrada</p>
                <?php
                break;
            }
        }
    }
    return $existe;
}
function validarTelefono($telefono){
 
     $largo = strlen($telefono);
     if($largo==9){
        return true;
     }else{
        ?>
        <p class="alert alert-danger w-50 mb-2 m-auto text-center">Este <strong> teléfono </strong> debe tener 9 dígitos</p>
        <?php
        return false;
     }
}
function validarFechas($inicio,$final){
     if($final > $inicio){
        return true;
     }else{
         ?>
            <p class="alert alert-danger w-50 mb-2 m-auto text-center">La <strong>fecha de inicio </strong> no debe ser mayor que la <strong>fecha de término </strong> de temporada</p>
         <?php
         return false;
     }
}

?>


