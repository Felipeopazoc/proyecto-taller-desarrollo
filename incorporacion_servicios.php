<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link rel="stylesheet" href="styles_incorporacion_servicios/styles.css">
    <link rel="stylesheet" href="styles_incorporacion_servicios/responsive.css">
    <script src="https://kit.fontawesome.com/10a72ae3cd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
        include_once("./conexion_bd/conexion.php");
        $id_camping = $_GET["id"];
        
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
                    <li class="nav-menu-item"><a href="mostrar_campings.php" class="nav-menu-link nav-linked"><i class="fa-solid fa-campground"></i> Listado de campings</a></li>
                </ul>
            </nav>
        </header>
        <!--Comienza el contenedor-->        
        <div class="content">
            <div class="barra-navegacion">
                <nav class="navegacion">
                    <ul class="ul">
                        <li><a href="#"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li><a href="index.php"><i class="fa-solid fa-registered"></i> Registro camping</a></li>
                        <li><a href="listadoImagenes.php?id=<?php echo $id_camping?>"><i class="fa-solid fa-images"></i> Im??genes camping</a></li>
                    </ul>
                </nav>
            </div>
            
            <div class="panel-admin">
               
                        <?php
                            $sql = "select c.id_camping ,t.id_servicio, s.nombre_servicio, t.precio from camping c, tiene t, servicio s where c.id_camping = t.id_camping and t.id_servicio = s.id_servicio and c.id_camping = $id_camping";
                            $query = mysqli_query($conn,$sql);
                            $filas = mysqli_num_rows($query);
                            if($filas){
                                ?>
                                    <h1 class="titulo">Servicios registrados</h1>
                                    <table class="w-100 table">
                                        <thead class="">
                                            <td>Nombre servicio</td>
                                            <td>Precio entrada</td>
                                            <td>Acciones</td>
                                        </thead>
                                        <tbody>
                                <?php
                                while($tiene = $query->fetch_row()){
                                    ?>
                                   
                                       <tr>
                                            <td><?php echo $tiene[2] ?></td>
                                            <td><?php echo $tiene[3] ?></td>
                                            <td><a class="btn btn-danger" href="crud-servicios/delete.php?id_camping=<?php echo $tiene[0]?>&id_servicio=<?php echo $tiene[1]?>">Eliminar</a></td>
                                       </tr>
                                    <?php
                                }

                                ?>
                                       </tbody>
                                    </table>
                                <?php
                            }
                            
                        ?>
                      
                 
             
            
                  
                <div class="box">
                        <h1 class="titulo2">Servicios disponibles que va ofrecer su camping</h1>
                </div>
                <div class="box-servicios">
                   <?php
                        $sql = "select * from servicio";
                        $resultado = mysqli_query($conn,$sql);
                        $contador=1;
                        $filas = mysqli_num_rows($resultado);
                  
                        if($filas){
                            ?>
                           
                            <?php
                            while($servicio = $resultado->fetch_row()){
                                ?>
                                    <div class="contenedor" id="contenedor<?php echo $contador;?>" class="form-check">
                                        <label><?php echo $servicio[1];?></label>
                                        <input type="checkbox" class="form-check-input" value="<?php echo $servicio[0]?>" name="checkbox<?php echo $contador?>" id="select<?php echo $contador?>">
                                    </div>
                                  
                                <?php
                                $contador++;

                            }
                            
                            ?>
                          
                            </div>
                            <form id="form" action="crud-servicios/insert.php" class="m-auto  row formulario" style="margin-top:50px !important;"  method="POST">
                            <h1 id="title" class="text-center">Ning??n servicio seleccionado</h1>
                            <?php
                            // for($i=1;$i<$contador;$i++){
                                $i=1;
                                $resultado2 = mysqli_query($conn,$sql);
                                while($servicio = $resultado2->fetch_row()){
                                ?>
                                  <input type="hidden" id="id_camping" name="id_camping" value="<?php echo $id_camping?>" >
                                  <div id="servicio<?php echo $i?>" class=" col-sm-10 col-md-6">
                                        
                                        <label class="form-label" for="">Nombre servicio:</label>
                                        <input  id="name<?php echo $i ?>" type="text" class="form-control">
                                        <input type="hidden" name="id<?php echo $i?>" id="id<?php echo $i?>" value="<?php echo $servicio[0]; ?>">
                                       
                                  </div>
                                  <div id="precio<?php echo $i?>" class="col-sm-10  col-md-6">
                                        <label class="form-label" for="">$Precio: </label>
                                        <input type="number" name="price<?php echo $i?>" id="price<?php echo $i ?>" class="form-control">
                                  </div>
                                  
                                <?php
                                $i++;
                            }
                            ?>
                             <div id="boton" class="w-75 m-auto mt-2 row">
                                <input class="btn btn-primary" type="submit" value="Registrar servicios">
                            </div>
                            </form>
                            <?php
                        }

                    ?>
                
                <div class="box-button">
                    <a class="btn btn-danger  w-75 m-auto" href="listadoImagenes.php?id=<?php echo $id_camping?>">Incorporar Im??genes</a>
                </div>

                <h1 class="titulo">Ilustraci??n de ejemplo:</h1>
                <div class="box-img">
                        <img src="img/campings.jpg"  alt="">
                        <img src="img/piscina.jpg"  alt="">
                        <img src="img/Camping.jpg"  alt="">
                       
                </div>
               
            </div>
        </div>
        <!--Fin contenedor-->

    </div>
    <script src="js/validar_checkbox.js"></script>
    <script src="js/validar_formulario_servicios.js"></script>
    <script src="js/validar_servicios.js"></script>
    <script src="js/menu-responsive.js"></script>
    <script src="js/menu.js"></script>
</body>
</html>