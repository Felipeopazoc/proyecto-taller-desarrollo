<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de campings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles_mostrar_camping/styles.css">
    <link rel="stylesheet" href="styles_mostrar_camping/responsive.css">
    <script src="https://kit.fontawesome.com/10a72ae3cd.js" crossorigin="anonymous"></script>
</head>
<body>
        <?php include_once("conexion_bd/conexion.php"); ?>
        <div class="w-100 d-flex flex-column">
            <header class="header">
                <nav class="nav">
                    <a href="" class="logo nav-link">Geocamping</a>
                    <button class="nav-toggle" aria-label="">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <ul class="nav-menu">
                        <li class="nav-menu-item"><a href="#" class="nav-menu-link nav-link">Registrar Camping</a></li>
                        <li class="nav-menu-item"><a href="mostrar_campings.php" class="nav-menu-link nav-link">Listado camping</a></li>
                    
                    </ul>
                </nav>
            </header>
            <h1 class="text-center text-white mt-3">Listado de campings registrados</h1>
            <table class="table table-hover w-75 m-auto bg-light">
                <thead>
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
                    $sql = "select * from camping ca, ciudad c, estado e where ca.cod_ciudad = c.id_ciudad and e.id_estado = ca.id_estado ";
                    $resultado = mysqli_query($conn, $sql);
                    $filas = mysqli_num_rows($resultado);

                    if($filas){
                        while($camping = $resultado->fetch_row()){
                             ?>
                             <tr>
                               
                                 <td><?php echo htmlspecialchars (strip_tags ($camping[1])) ?></td>
                                 <td><?php echo htmlspecialchars (strip_tags ($camping[2])) ?></td>
                                 <td><?php echo htmlspecialchars (strip_tags ($camping[4])) ?></td>
                                 <td><?php echo htmlspecialchars (strip_tags ($camping[5])) ?></td>
                                 <td><?php echo htmlspecialchars (strip_tags ($camping[6])) ?></td>
                                 <td><?php echo htmlspecialchars (strip_tags ($camping[12]))?></td>
                                 <td><?php echo htmlspecialchars (strip_tags ($camping[15]))?></td>
                                 <td>
                                     <a class="btn btn-primary mb-2" href="listadoImagenes.php?id=<?php echo $camping[0] ?>">Imágenes</a>
                                     <a class="btn btn-danger mb-2" href="crud-camping/delete.php?id=<?php echo $camping[0] ?>">Eliminar</a>
                                </td>
                             </tr>
                            <?php
                        }
                    }else{
                        ?>
                          <p class="alert alert-danger text-center m-auto w-50 mb-3">No hay campings registrados</p>
                        <?php
                    }

                 ?>

                </tbody>
             
            </table>
           
        </div>
        <script src="index.js"></script>
</body>
</html>