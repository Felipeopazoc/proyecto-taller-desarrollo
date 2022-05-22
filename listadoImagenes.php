<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagenes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles_listadoimagenes/styles.css">
</head>

<body>
    <?php 
    include("conexion_bd/conexion.php");
    $id = "";
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }
    
    ?>
    <div class="w-100 d-flex flex-column">
        <nav class="navbar navbar-expand-lg navbar-light bg-black text-white h-50">
                    <div class="container-fluid">
                        <a class="navbar-brand text-white" href="#"> <img src="img/camping.png" width="50px" alt=""> </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active text-white " aria-current="page" href="index.php">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white " href="registro_camping.php">Registro de camping</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="mostrar_campings.php">Listado de campings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <h1 class="text-center text-white">Listado de imagenes de camping registrado</h1>
                <!-- Button to Open the Modal -->
                    

                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title text-center">Ingresar imagen</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form class="w-100 m-auto" action="crud-imagenes/insert.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value=<?php echo $id;?>> 
                                <div class="col-12 mb-3">
                                    <label class="form-label" for=""> Imagen </label>
                                    <input type="file" required name="imagen" class="form-control">
                                 </div>
                                 <div class="w-100 d-flex mb-2">
                                      <button name="submit" class=" w-75 m-auto btn btn-success">Enviar</button>
                                 </div>
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>

                        </div>
                    </div>
                    </div>
            
        <table class=" w-75 m-auto table table-hover text-center bg-light">
            <thead>
                <th>ID</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php
                    $sql = "select * from imagenes where id_camping=$id";
                    $resultados= mysqli_query($conn,$sql);
                    $filas = mysqli_num_rows($resultados);
                    if($filas){
                        while($imagen = $resultados->fetch_assoc()){
                            ?>
                             <tr>
                                 <td class="text-center"><?php echo $imagen["id_imagen"]; ?></td>
                                 <td class=""><?php echo '<img width=200px src="data:image/jpg;base64,'.base64_encode( $imagen['imagen'] ).'"/>';  ?></td>
                                 <td><a class="mt-4 btn btn-danger" href="crud-imagenes/delete.php?idImagen=<?php echo $imagen["id_imagen"]."&id_camping=$id"; ?>">Eliminar</a></td>
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                            <p class="w-50 m-auto mt-2 mb-3 text-center alert alert-danger">El camping no tiene imágenes</p>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        <button type="button" class="w-25 m-auto mt-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Ingresar una imagen</button>
    </div>
</body>
</html>