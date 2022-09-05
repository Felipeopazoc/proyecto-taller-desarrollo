<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar información</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include_once("../conexion_bd/conexion.php");
        $id = "";
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }

        
    ?>
    <div class="w-100 d-flex flex-column">
        <nav class="navbar navbar-expand-lg navbar-light bg-black text-white h-50">
                    <div class="container-fluid">
                        <a class="navbar-brand text-white" href="#"> <img src="../img/camping.png" width="50px" alt=""> </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active text-white " aria-current="page" href="../index.php">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white " href="../registro_camping.php">Registro de camping</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="../mostrar_campings.php">Listado de campings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <h1 class="text-center">Estamos en desarrollo :(</h1>
                <!---
                <form class="w-75 m-auto" action="">
                     <div class="col-6 mb-3">
                         <label class="label-form">Id camping</label>
                         <input type="number" name="id" value=<?php echo $id ?> class="form-control" disabled>
                     </div>
                     <div class="col-6 mb-3">
                          <label for="" class="label-form">Nombre Camping</label>
                          <input type="text" class="form-control" name="nombre" >
                     </div>
                     <div class="col-6 mb-3">
                          <label for="" class="label-form">Nombre Camping</label>
                          <input type="text" class="form-control" name="nombre" >
                     </div>
                     <div class="col-6 mb-3">
                          <label for="" class="label-form">Nombre Camping</label>
                          <input type="text" class="form-control" name="nombre" >
                     </div>
                     <div class="col-6 mb-3">
                          <label for="" class="label-form">Nombre Camping</label>
                          <input type="text" class="form-control" name="nombre" >
                     </div>
                </form>
                -->
    </div>
</body>
</html>