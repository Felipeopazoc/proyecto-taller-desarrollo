<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>
    <script src="https://kit.fontawesome.com/10a72ae3cd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    
    <link rel="stylesheet" href="styles_home/styles.css">
</head>
<body>
    <div class="main-container">
        <header class="header2" id="header2">
            <div class="logo2">
                <h3>Geocamping</h3>
            </div>
            <div class="barra">
                <nav class="nav">
                    <ul class="ul">
                        <li class="li">
                            <a href="home.php">Inicio</a>
                        </li>
                        <li class="li">
                        <a href="index.php">Registrar camping</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="content">
            
        <div id="campings">
          
           </div>
           <?php
    include("conexion_bd/conexion.php");
    if(!empty($_POST)){
        $servicio = $_POST["servicio"];
        $servicio = htmlspecialchars(strip_tags($servicio));

        $comuna = $_POST["comuna"];
        $estado = $_POST["estado"];


        if(!empty($servicio) && !empty($comuna) && !empty($estado)){
            $sql = "select distinct * from camping c, ciudad ci, estado e, tiene t 
            where c.id_camping = t.id_camping
            and ci.id_ciudad = c.cod_ciudad
            and c.id_estado = e.id_estado
            
            and e.id_estado = $estado
            and ci.id_ciudad = $comuna
            and t.id_servicio = $servicio";
            $resultado = mysqli_query($conn,$sql);
            $filas = mysqli_num_rows($resultado);
            if($filas > 0){
                ?>
                     <h2 class="text-white text-center">Resultados de búsqueda</h2>
                <?php
                while ($camping = $resultado->fetch_row()){
                    ?>
                       
                        <div class="camping mt-2">
                            <div class="portada">
                                <img src="./img/portada.jpg" alt="">
                            </div>
                            <div class="detalle">
                                <h1><?php echo $camping[1]?></h1>
                                <p><?php echo $camping[3] ?></p>
                                <cite><?php echo $camping[4].", ".$camping[12]?></cite>
                                <a class="btn btn-primary" href="detalle_camping.php?id=<?php echo $camping[0]?>">Ver más</a>
                            </div>
                            
                        </div>
                    <?php
                }
            }else{
                ?>
                    <h1 class="text-white text-center">No hay resultados de búsqueda</h1>
                <?php
            }

        }
        
        if(!empty($servicio) && empty($comuna && empty($estado))){
            $sql = "select * from camping c, servicio s, tiene t 
            where c.id_camping = t.id_camping
            and s.id_servicio = t.id_servicio
            and t.id_servicio = 1";
            $resultado = mysqli_query($conn,$sql);
            $filas = mysqli_num_rows($resultado);
            if($filas > 0){
                while ($camping = $resultado->fetch_row()){
                    ?>
                        <div class="camping">
                            <div class="portada">
                                <img src="./img/portada.jpg" alt="">
                            </div>
                            <div class="detalle">
                                <h1><?php echo $camping[1]?></h1>
                                <p><?php echo $camping[3] ?></p>
                                <cite><?php echo $camping[4].", ".$camping[12]?></cite>
                                <a class="btn btn-primary" href="detalle_camping.php?id=<?php echo $camping[0]?>">Ver más</a>
                            </div>
                            
                        </div>
                    <?php
                }
            }else{
                ?>
                <h1 class="text-white text-center">No hay resultados de búsqueda</h1>
                <?php
            }
        }
        
        if(!empty($comuna) && empty($servicio) && empty($estado)){
            $sql = "select * from camping c, ciudad ci 
            where c.cod_ciudad = ci.id_ciudad
            and c.cod_ciudad = $comuna";
            $resultado = mysqli_query($conn,$sql);
            $filas = mysqli_num_rows($resultado);
            if($filas){
                while ($camping = $resultado->fetch_row()){
                    ?>
                        <div class="camping">
                            <div class="portada">
                                <img src="./img/portada.jpg" alt="">
                            </div>
                            <div class="detalle">
                                <h1><?php echo $camping[1]?></h1>
                                <p><?php echo $camping[3] ?></p>
                                <cite><?php echo $camping[4].", ".$camping[12]?></cite>
                                <a class="btn btn-primary" href="detalle_camping.php?id=<?php echo $camping[0]?>">Ver más</a>
                            </div>
                            
                        </div>
                    <?php
                }
            }else{
                ?>
                    <h1 class="text-white text-center">No hay resultados de búsqueda</h1>
                <?php
            }
        }
        if(!empty($estado) && empty($comuna) && empty($servicio)){
            $sql = "select * from camping c, estado e
            where c.id_estado = e.id_estado
            and e.id_estado = $estado";
            $resultado = mysqli_query($conn,$sql);
            $filas = mysqli_num_rows($resultado);
            if($filas){
                while ($camping = $resultado->fetch_row()){
                    ?>
                        <div class="camping">
                            <div class="portada">
                                <img src="./img/portada.jpg" alt="">
                            </div>
                            <div class="detalle">
                                <h1><?php echo $camping[1]?></h1>
                                <p><?php echo $camping[3] ?></p>
                                <cite><?php echo $camping[4].", ".$camping[12]?></cite>
                                <a class="btn btn-primary" href="detalle_camping.php?id=<?php echo $camping[0]?>">Ver más</a>
                            </div>
                            
                        </div>
                    <?php
                }
            }else{
                ?>
               <h1 class="text-white text-center">No hay resultados de búsqueda</h1>
            <?php
            }
        }
        
    }
    

?>
        </div>  
    </div>
    <script src="./js/buscador.js"></script>
</body>
</html>


