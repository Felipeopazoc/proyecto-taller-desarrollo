<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles_mostrar_camping/styles.css">
    <script src="https://kit.fontawesome.com/10a72ae3cd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
<?php 
      $hoy=date("Y-m-d");
       include("conexion_bd/conexion.php");
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
                        <li><a href="#"><i class="fa-solid fa-campground"></i> Listado de campings</a></li>
                    </ul>
                </nav>
            </div>
            <div class="panel-admin">
            <h1>Listado de campings registrados</h1>
            
                    <?php
                    $sql = "select * from camping ca, ciudad c, estado e where ca.cod_ciudad = c.id_ciudad and e.id_estado = ca.id_estado ";
                    $resultado = mysqli_query($conn, $sql);
                    $filas = mysqli_num_rows($resultado);

                    if($filas){
                        ?>
                    <table class="table table-responsive table-striped w-100 bg-light">
                        <thead class="thead-dark">
                            <th>Nombre</th>
                            <th>Cantidad puestos</th>
                            <th>Dirección</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Comuna</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        <?php
                        while($camping = $resultado->fetch_row()){
                             ?>
                             <tr>
                                 <td><?php echo htmlspecialchars (strip_tags ($camping[1])) ?></td>
                                 <td><?php echo htmlspecialchars (strip_tags ($camping[2])) ?></td>
                                 <td><i class="fa-solid fa-location-dot"></i> <?php echo htmlspecialchars (strip_tags ($camping[4])) ?></td>
                                 <td><i class="fa-solid fa-envelope"></i> <?php echo htmlspecialchars (strip_tags ($camping[5])) ?></td>
                                 <td><?php echo htmlspecialchars (strip_tags ($camping[6])) ?></td>
                                 <td><?php echo htmlspecialchars (strip_tags ($camping[12]))?></td>
                                 <td><i class="fa-solid fa-check"></i></td>
                                 <td>
                                     <a class="btn btn-primary mb-2" href="listadoImagenes.php?id=<?php echo $camping[0] ?>"><i class="fa-solid fa-image"></i></a>
                                     <a class="btn btn-danger mb-2" href="crud-camping/delete.php?id=<?php echo $camping[0] ?>"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                             </tr>
                            <?php
                        }
                        ?>
                             </tbody>
                            </table>

                        <?php

                    }else{
                        ?>
                          <p class="alert alert-danger text-center w-50 mb-3">No hay campings registrados</p>
                        <?php
                    }

                 ?>

              
            </div>
        </div>
        <!--Fin contenedor-->

    </div>
</body>
</html>