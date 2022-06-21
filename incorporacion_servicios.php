<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link rel="stylesheet" href="styles_incorporacion_servicios/styles.css">
    <script src="https://kit.fontawesome.com/10a72ae3cd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
        include_once("./conexion_bd/conexion.php");
    ?>
    <div class="main-container">
        <header class="header">
            <div class="logo">
                <h3>Geocamping</h3>
            </div>
            <div class="login">
                <h3><i class="fa-solid fa-user"></i></h3>
            </div>
        </header>
        <!--Comienza el contenedor-->        
        <div class="content">
            <div class="barra-navegacion">
                <nav class="nav">
                    <ul class="ul">
                        <li><a href="#"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li><a href="index.php"><i class="fa-solid fa-registered"></i> Registro camping</a></li>
                        <li><a href="mostrar_campings.php"><i class="fa-solid fa-campground"></i> Listado de campings</a></li>
                    </ul>
                </nav>
            </div>
            
            <div class="panel-admin">
             
                <div class="box">
                    <h1 class="text-center">Seleccione los servicios que ofrece</h1>
                </div>
                <div class="box-servicios">
                   <?php
                        $sql = "select * from servicio";
                        $resultado = mysqli_query($conn,$sql);
                        $contador=1;
                        $filas = mysqli_num_rows($resultado);
                  
                        if($filas){
                            
                            while($servicio = $resultado->fetch_row()){
                                ?>
                                    <div class="form-check">
                                        <label><?php echo $servicio[1];?></label>
                                        <input type="checkbox" class="form-check-input" value="<?php echo $servicio[0]?>" name="checkbox<?php echo $contador?>" id="select<?php echo $contador?>">
                                    </div>
                                  
                                <?php
                                $contador++;

                            }
                            
                            ?>
                          
                            </div>
                            <form id="form" action="probar.php" class="w-75 m-auto row formulario"  method="GET">
                            <h1 id="title" class="text-center">Servicios seleccionados</h1>
                            <?php
                            // for($i=1;$i<$contador;$i++){
                                $i=1;
                                $resultado2 = mysqli_query($conn,$sql);
                                while($servicio = $resultado2->fetch_row()){
                                ?>
                                  <div id="servicio<?php echo $i?>" class="col-6">
                                        <label class="form-label" for="">Nombre servicio:</label>
                                        <input  id="name<?php echo $i ?>" type="text" class="form-control">
                                        <input type="hidden" name="id<?php echo $i?>" id="id<?php echo $i?>" value="<?php echo $servicio[0]; ?>">
                                       
                                  </div>
                                  <div id="precio<?php echo $i?>" class="col-6">
                                        <label class="form-label" for="">$Precio: </label>
                                        <input type="number" name="price<?php echo $i?>" id="price<?php echo $i ?>" class="form-control">
                                  </div>
                                <?php
                                $i++;
                            }
                            ?>
                             <div id="boton" class="w-75 m-auto mt-2 row">
                                <input class="btn btn-primary" type="submit" value="Enviar datos">
                            </div>
                               </form>
                            <?php
                        }

                    ?>
                   
              


                <div class="box-img">
                        <img src="img/campings.jpg" width="300px" height="250px" alt="">
                        <img src="img/piscina.jpg" width="300px" height="250px" alt="">
                        <img src="img/Camping.jpg" width="300px" height="250px" alt="">
                       
                </div>
               
            </div>
        </div>
        <!--Fin contenedor-->

    </div>
    <script src="js/validar_checkbox.js"></script>
    <script src="js/validar_formulario_servicios.js"></script>
</body>
</html>