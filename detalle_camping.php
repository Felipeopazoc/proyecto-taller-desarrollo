<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="styles_detalle/styles.css">
</head>
<body>
    <?php 
        include_once("conexion_bd/conexion.php"); 
        $id_camping = $_GET["id"];
    ?>
    <div class="main-container">
        <header class="header2" id="header2">
            <div class="logo2">
                <h3>Geocamping</h3>
            </div>
            <div class="nav">
                <ul>
                    <li><a href="home.php">Inicio</a></li>
                    <li><a href="home.php">Registrar camping</a></li>
                </ul>
            </div>
        </header>
        <div class="content">
            <!--Aquí va el detalle del camping-->
            <?php 
                $sql = "select * from camping c, ciudad ci where c.cod_ciudad = ci.id_ciudad and c.id_camping = $id_camping";
                $resultado = mysqli_query($conn,$sql);
                $filas = mysqli_num_rows($resultado);

                if($filas){
                    while($camping = $resultado->fetch_row()){
                        ?>
                             <div class="camping mt-2">
            
                                <div class="detalle">
                                    <h1>Información general: <?php echo $camping[1]?></h1>
                
                                    <p> </i> Cantidad de sitios: <?php echo $camping[2]?></p>
                                    
                         
                                    <?php
                                        $sql2 = "select * from tiene t, servicio s , camping c where c.id_camping = t.id_camping and t.id_servicio = s.id_servicio and c.id_camping = $id_camping";
                                        $resultado2 = mysqli_query($conn,$sql2);
                                        $filas2 = mysqli_num_rows($resultado2);
                                        if($filas2){
                                            ?>
                                            <table class="table table-hover text-white">
                                                <thead>
                                                    <th>Servicio</th>
                                                    <th>Valor entrada</th>
                                                </thead>
                                                <tbody>
                                            <?php
                                            while($servicios = $resultado2->fetch_row()){
                                            ?>
                                                <tr>
                                                     <td><?php echo $servicios[4] ?> </td>
                                                     <td>$<?php echo $servicios[2] ?></td>
                                                </tr>
                                            <?php
                                            }
                                        }
                                    ?>
                                        </tbody>
                                    </table>
                                    <p>Correo: <?php echo $camping[5] ?>, Teléfono: <?php echo $camping[6]?> </p>
                                    <cite>Ubicación: <?php echo $camping[4].", ".$camping[12]?></cite>
                                    <h4 class="text-center">Listado de imágenes</h4>
                                    <div class="box-img">
                                    <?php
                                        $sql4 = "select * from imagenes i , camping c where i.id_camping = c.id_camping and c.id_camping = $id_camping and i.is_portada=0";
                                        $resultado3 = mysqli_query($conn,$sql4);
                                        $filas3 = mysqli_num_rows($resultado3);
                                        if($filas3){
                                            while($imagen = $resultado3->fetch_row()){
                                                echo '<img src="data:image/jpg;base64,'.base64_encode( $imagen[1] ).'"/>';
                                            }
                                        }else{
                                            ?>
                                                <p>No hay imagenes</p>
                                            <?php
                                        }
                                    ?>
                                    </div>
                                </div>
                                
                            </div>
                        <?php
                    }
                }else{
                    ?>
                        <p>El camping no tiene servicios registrados</p>
                    <?php
                }
            ?>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/10a72ae3cd.js" crossorigin="anonymous"></script>
</body>
</html>