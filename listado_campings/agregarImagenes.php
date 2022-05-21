<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de camping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles_listado/styles.css">
</head>
<body>
    <?php include_once("../conexion_bd/conexion.php");
        if($_GET["id"]){
            $id_random = $_GET["id"];
        }
    ?>
   <div class="w-100 d-flex flex-column">
       <!--INICIO BARRA DE NAVEGACIÓN-->
        <nav class="navbar navbar-expand-lg navbar-light bg-black text-white h-50">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#"> <img src="../img/camping.png" width="50px" alt=""> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                             <a class="nav-link active text-white " aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link text-white " href="#">Registro de camping</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link text-white" href="#">Listado de campings</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--Fin BARRA DE NAVEGACIÓN-->
        <div class="w-100">
            <h1 class="text-center mt-3 w-75 m-auto">Ingresar imagenes para galería</h1>
            <h2 class="text-center text-white"></h2>

            <form class="w-50 m-auto formulario bg-light p-4" action="guardar.php" method="POST" enctype="multipart/form-data">
                <div class=" m-auto col-10 mb-3">
                    <label class="form-label" for="">Imagen 1: </label>
                    <input type="file" name="imagen1" required class="form-control">
                </div>
                <div class=" m-auto col-10 mb-3">
                    <label class="form-label" for="">Imagen 2: </label>
                    <input type="file" name="imagen2" required class="form-control">
                </div>
                <div class=" m-auto col-10 mb-3">
                    <label class="form-label" for="">Imagen 3: </label>
                    <input type="file" name="imagen3" required class="form-control">
                </div>

                <input type="hidden" value="<?php echo $id_random ?>" class="disabled" name="id">

                <div class="col-10 mt-2 m-auto row">
                    <button class="btn btn-primary" type="submit" name="submit">Guardar imágenes</button>
                </div>
            </form>
        </div>

   </div> 
</body>
</html>