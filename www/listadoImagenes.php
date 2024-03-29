<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imágenes</title>
    <link rel="stylesheet" href="styles_listadoimagenes/styles.css">
    <link rel="stylesheet" href="styles_listadoimagenes/responsive.css">
    <script src="https://kit.fontawesome.com/10a72ae3cd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php 
      $hoy=date("Y-m-d");
       include("conexion_bd/conexion.php");
       $id = "";
       if($_GET["id"]){
          $id = $_GET["id"];
       }
      ?>
    <div class="main-container">
        <header class="header2" id="header2">
            <div class="logo2">
                <h3>Geocamping</h3>
            </div>
        </header>
        <header class="header" id="header">
            <nav class="nav">
                <a href="" class="logo nav-linked">Geocamping</a>
                <button class="nav-toggle" aria-label="">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <ul class="nav-menu">
                    <li class="nav-menu-item"><a href="#" class="nav-menu-link nav-linked"><i class="fa-solid fa-house"></i> Home</a></a></li>
                    <li class="nav-menu-item"><a href="#" class="nav-menu-link nav-linked"><i class="fa-solid fa-registered"></i> Registro camping</a></a></li>
                    <!-- <li class="nav-menu-item"><a href="mostrar_campings.php" class="nav-menu-link nav-linked"><i class="fa-solid fa-campground"></i> Listado de campings</a></li> -->
                </ul>
            </nav>
        </header>
        


        <!--Comienza el contenedor-->        
        <div class="content">
            <div class="barra-navegacion">
                <nav class="navegacion">
                    <ul class="ul">
                        <li><a href="home.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li><a href="index.php"><i class="fa-solid fa-registered"></i> Registro camping</a></li>
                        <!-- <li><a href="mostrar_campings.php"><i class="fa-solid fa-campground"></i> Listado de campings</a></li> -->
                    </ul>
                </nav>
            </div>
            
            <div class="panel-admin">
                <div class="box">
                    <h1>Listado de imágenes de camping seleccionado</h1>
                    <button type="button" id="ingresar" class="boton btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Ingresar portada camping</button>   
                </div>
                <div class="w-75 mt-3 m-auto d-flex">
                        <!-- <a class="btn btn-danger" href="incorporacion_servicios.php?id=<?php echo $id?>">Incorporación de servicios</a> -->
                        <a class="btn btn-success mb-2" href="home.php">Finalizar registro</a>
                    </div>
                <!--Inicio de modal-->
                <div class="modal w-100" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title text-center">Subir Imagen</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form class="w-100 m-auto" id="form_imagen" action="crud-imagenes/insert.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value=<?php echo $id;?>> 
                                <div class="col-12 mb-3">
                                    <label class="form-label" for=""> Imagen </label>
                                    <input type="file" id="input_imagen2" required name="imagen" class="form-control">
                                 </div>
                                 <div class="w-100 m-auto">
                                    <p id="mensaje2" class="w-100 alert alert-warning">Por favor ingresar imágenes png , jpg</p>
                                 </div>
                                 <div class="w-100 d-flex mb-2">
                                      <button name="submit" id="boton2" type="submit" class=" w-75 m-auto btn btn-success">Enviar</button>
                                 </div>
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>

                        </div>
                    </div>
                </div>

                <!--Fin del modal-->
                <form enctype="multipart/form-data" class="w-75 m-auto row" action="crud-imagenes/insert.php" method="post">
                    <input type="hidden" name="id" value=<?php echo $id;?>> 
                    <div class="col-12 col-md-10 col-sm-11">
                        <label>Imagenes de camping</label>
                        <input type="file" required id="input_imagen" name="imagen_portada" class="form-control">        
                    </div>
                    <div class="w-100 m-auto">
                            <p style="z-index:-1" id="mensaje" class="w-75 m-auto alert mt-2 alert-warning">Por favor ingresar imágenes png , jpg</p>
                    </div>
                    <div class="col-3 d-flex align-items-center mt-4">
                        <input id="boton" name="portada" type="submit" class="btn btn-primary" value="Subir imagen">
                    </div>
                </form>
                <?php
                            
                            $sql = "select * from imagenes where id_camping = $id and is_portada = 1 ";
                            $resultado = mysqli_query($conn,$sql);

                            $filas = mysqli_num_rows($resultado);

                            if($filas){
                                ?>
                                <script>
                                    $(document).ready(()=>{
                                        $("#ingresar").prop("disabled",true);
                                    });
                                </script>
                                <h1 class="h1">Imagen portada</h1>
                                <table class="tabla mt-2 ml-2 table table-striped">
                                        <thead>
                                            <th>Imagen</th>
                                            <th>Acciones</th>
                                        </thead>
                                        <tbody>
                                <?php
                                while($imagen = $resultado->fetch_assoc()){
                                    ?>
                                     <tr>
                                         <td class=""><?php echo '<img width=400px height=300px src="data:image/jpg;base64,'.base64_encode( $imagen['imagen'] ).'"/>';  ?></td>
                                         <td><a class="mt-4 btn btn-danger" href="crud-imagenes/delete.php?idImagen=<?php echo $imagen["id_imagen"]."&id_camping=$id"; ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                      </tbody>
                                    </table>
                                <?php

                            }else{
                                ?>
                                    <p style="z-index:-1" class="alert alert-danger w-75 text-center mt-2">No hay imagen de portada para este camping</p>
                                <?php

                            }
                            
                        
                        ?>
                        <?php
                    
                            
                            $sql = "select * from imagenes where id_camping = $id and is_portada = 0 ";
                            $resultado = mysqli_query($conn,$sql);

                            $filas = mysqli_num_rows($resultado);

                            if($filas){
                                ?>
                                  <h1 class="h1">Imágenes camping</h1>  
                                <table class="tabla mt-2 ml-2 table table-striped">
                                        <thead>
                                            <th>Imagen</th>
                                            <th>Acciones</th>
                                        </thead>
                                        <tbody>
                                <?php
                                while($imagen = $resultado->fetch_assoc()){
                                    ?>
                                     <tr>
                                         <td class=""><?php echo '<img width=400px height=300px src="data:image/jpg;base64,'.base64_encode( $imagen['imagen'] ).'"/>';  ?></td>
                                         <td><a class="mt-4 btn btn-danger" href="crud-imagenes/delete.php?idImagen=<?php echo $imagen["id_imagen"]."&id_camping=$id"; ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                      </tbody>
                                    </table>
                                <?php

                            }else{
                                ?>
                                    <p style="z-index:-1" class="alert alert-danger w-75 text-center mt-2">No hay imágenes registradas para este camping</p>
                                <?php

                            }
                            
                        
                        ?>
                    
                   
                     
            </div>
        </div>
        <!--Fin contenedor-->

    </div>
    <script src="./js/menu-responsive.js"></script>
    <script src="./js/menu.js"></script>
    <script src="./js/validar-imagenes.js" ></script>
</body>
</html>