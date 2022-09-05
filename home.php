<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="https://kit.fontawesome.com/10a72ae3cd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    
    <link rel="stylesheet" href="styles_home/styles.css">
</head>
<body>
    <?php 
        include("./conexion_bd/conexion.php");
        
    ?>
    <div class="main-container">
        <header class="header2" id="header2">
            <div class="logo2">
                <h3>Geocamping</h3>
            </div>
            <div class="barra">
                <nav class="nav">
                    <ul class="ul">
                        <li class="li">
                            <a href="#">Inicio</a>
                        </li>
                        <li class="li">
                        <a href="index.php">Registrar camping</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="content">
            <div class="buscador">
                <form class="w-75 m-auto text-white row" id="form" method="POST" action="buscar.php">
                    
                    <div class="col-3">
                        <label class="form-label">Comuna</label>
                        <select name="comuna" class="form-control" id="comuna">
                            <option value="">Seleccione una Comuna</option>
                            <?php
                                $sql = "select * from ciudad";
                                $resultado = mysqli_query($conn,$sql);
                                $filas = mysqli_num_rows($resultado);
                                if($filas){
                                    while($comuna = $resultado->fetch_row()){
                                    ?>
                                        <option value="<?php echo $comuna[0]?>">
                                            <?php echo $comuna[1] ?>
                                        </option>
                                    <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-4">
                        <label class="form-label">Servicios</label>
                        <select class="form-control" name="servicio" id="servicio">
                            <option value="">Seleccione un servicio</option>
                            <?php
                                $sql = "select * from servicio";
                                $resultado = mysqli_query($conn,$sql);
                                $filas = mysqli_num_rows($resultado);
                                if($filas){
                                    while($estado = $resultado->fetch_row()){
                                    ?>
                                        <option value="<?php echo $estado[0]?>">
                                            <?php echo $estado[1] ?>
                                        </option>
                                    <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-3">
                        <label class="form-label">Estado</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="">Seleccione un estado</option>
                        <?php
                                $sql = "select * from estado";
                                $resultado = mysqli_query($conn,$sql);
                                $filas = mysqli_num_rows($resultado);
                                if($filas){
                                    while($estado = $resultado->fetch_row()){
                                    ?>
                                        <option value="<?php echo $estado[0]?>">
                                            <?php echo $estado[1] ?>
                                        </option>
                                    <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-2 d-flex align-items-end">
                        <button type="submit" id="buscador" class="btn btn-primary mt-3">Buscar</button>
                    </div>
                    <div id="mensaje_alerta" class="w-75 m-auto mt-2">
                            
                    </div>
                </form>
            </div>
        <div id="campings">
         
            <?php
                $sql3 = "select * from camping c, ciudad ci where c.cod_ciudad = ci.id_ciudad";
                $resultado = mysqli_query($conn,$sql3);
                $filas = mysqli_num_rows($resultado);
                if($filas){
                    while ($camping = $resultado->fetch_row()){
                        $sql4 = "select * from  imagenes i , camping c where c.id_camping = i.id_camping 
                        and c.id_camping = $camping[0] and i.is_portada = 1";
                        $resultado2 = mysqli_query($conn,$sql4);
                        $filas2 = mysqli_num_rows($resultado2);
                        ?>
                            <div class="camping">
                                <div class="portada">
                        <?php
                        if($filas2){
                            while($imagen = $resultado2->fetch_row()){
                               echo '<img src="data:image/jpg;base64,'.base64_encode( $imagen[1] ).'"/>';
                            }
                        }else{
                            echo "Sin portada";
                        }
                        ?>
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
                }
            ?>
           </div>
        </div>  
    </div>
    <script src="./js/buscador.js"></script>
    <script src="./js/validar_buscador.js"></script>
</body>
</html>