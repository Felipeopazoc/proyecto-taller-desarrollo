<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de camping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles_registro_camping/styles.css">
    <link rel="stylesheet" href="styles_registro_camping/responsive.css">
    <link href='https://unpkg.com/css.gg/icons/all.css' rel='stylesheet'>
</head>
<body>
  <?php 
      $hoy=date("Y-m-d");
       include("conexion_bd/conexion.php");
      ?>
   <div class="w-100 d-flex flex-column justify-content-center">
        <!--BARRA DE NAVEGACION-->
        <nav class="navbar navbar-expand-lg navbar-light  text-white h-50">
            <div class="container-fluid">
                <a class="navbar-brand text-white text-center" href="#"> <img src="img/camping.png" width="50px" alt=""> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center">
                        <li class="nav-item text-center li">
                              <a class="nav-link text-white " href="#">Registro de camping</a>
                        </li>
                        <li class="nav-item text-center li">
                             <a class="nav-link text-white" href="mostrar_campings.php">Listado de campings</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--FIN DE BARRA DE NAVEGACIÓN-->
        <h1 class="text-center text-white mt-3">Registro de camping</h1>
        <form class="w-75 row m-auto text-black border mb-3 formulario rounded mt-2 p-3" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
           
            <div class="col-lg-6 col-md-6 col-sm-6 mb-2 ">
                <label class="form-label" for="">Nombre camping: </label>
                <input class="form-control" required type="text" name="nombre" id="nombre">
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 mb-2">
                <label class="form-label" for="">Cantidad de sitios: </label>
                <input type="number" required class="form-control" name="cantidad_sitios">
            </div>
            <div class="col-lg-6 col-md-10 col-sm-11 mb-2">
                <label class="form-label" for="">Dirección: </label>
                <input type="text" required class="form-control" name="direccion">
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6 mb-2 ">
                <label class="form-label" for="">Teléfono: </label>
                <input type="number" required class="form-control" name="telefono">
            </div>
          
            <div class="col-lg-6 col-md-6 col-sm-5 mb-2">
                <label class="form-label" for="">Correo: </label>
                <input type="email" required class="form-control"  name="email">
            </div>
         
            <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
                <label class="form-label" for="">Region: </label>
                <select name="select_region" id="" class="form-select">
                    <option value="">Región del bio bio</option>
                </select>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 ">
                <label class="form-label" for="">Comuna: </label>
                <select name="select_comuna" id="" class="form-select">
                    <?php
                        $sql = "select * from ciudad order by nombre";
                        $resultado = mysqli_query($conn,$sql);
                        $filas = mysqli_num_rows($resultado);
                        if($filas){
                            while($ciudad = $resultado->fetch_row()){
                                ?>
                                    <option value="<?php echo $ciudad[0]?>"><?php echo $ciudad[1] ?></option>
                                <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <label for="" class="form-label">Comienzo Temporada</label>
                <input type="date" required name="inicio" min=<?php echo $hoy;?> class="form-control">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
                <label for="" class="form-label">Fin Temporada</label>
                <input type="date" required class="form-control" min=<?php echo $hoy;?> name="fin">
            </div>
            <div class="col-6-lg-6 mb-2 mt-2">
                <label class="form-label" for="">Descripción: </label>
                <textarea class="form-control" name="descripcion" required ></textarea>
            </div>

            <div class="col-lg-5 mt-2 row m-auto p-3">
                <button class="m-auto btn btn-primary" name="submit" type="submit">Enviar información</button>
            </div>  
         
        </form>

   </div> 
</body>
</html>
