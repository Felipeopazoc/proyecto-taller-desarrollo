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
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/10a72ae3cd.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php 
      $hoy=date("Y-m-d");
       include("conexion_bd/conexion.php");
      ?>
   <div class="w-100 d-flex flex-column justify-content-center">
        <!--BARRA DE NAVEGACION-->
        <header class="header">
            <nav class="nav">
                <a href="index.php" class="logo nav-link">Geocamping</a>
                <button class="nav-toggle" aria-label="">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <ul class="nav-menu">
                    <li class="nav-menu-item"><a href="#" class="nav-menu-link nav-link">Registrar Camping</a></li>
                    <li class="nav-menu-item"><a href="mostrar_campings.php" class="nav-menu-link nav-link">Listado camping</a></li>
                  
                </ul>
            </nav>
        </header>
        <!--FIN DE BARRA DE NAVEGACIÓN-->
        <h1 class="text-center text-white mt-3">Registro de camping</h1>
        <form class=" row m-auto text-black border mb-3 formulario rounded mt-2 p-3 was-validated" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
           
            <div class="col-lg-6 col-md-6 col-sm-6 mb-2 ">
                <label class="form-label " for="name">Nombre camping: </label>
                <input class="form-control" id="name" placeholder="Camping ........" required type="text" name="nombre" id="nombre">
                <div class="invalid-feedback">Por favor ingrese un nombre</div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 mb-2">
                <label class="form-label" for="sitios">Cantidad de sitios: </label>
                <input type="number" id="sitios" placeholder="Sitios disponibles" required class="form-control" name="cantidad_sitios">
                <div class="invalid-feedback">Por favor ingrese cantidad</div>
            </div>
            <div class="col-lg-6 col-md-10 col-sm-11 mb-2">
                <label class="form-label" for="direccion">Dirección: </label>
                <input type="text" id="direccion" placeholder="Calle + Número" required class="form-control" name="direccion">
                <div class="invalid-feedback">Por favor ingrese una dirección</div>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6 mb-2 ">
                <label class="form-label" for="">Teléfono: </label>
                <input type="number" placeholder="123456789 -> 9 dígitos" required class="form-control" name="telefono">
                <div class="invalid-feedback">Por favor ingrese un numero de 9 dígitos</div>
            </div>
          
            <div class="col-lg-6 col-md-6 col-sm-5 mb-2">
                <label class="form-label" for="">Correo: </label>
                <input type="email" placeholder="Formato: xxxx@xxxxx" required class="form-control"  name="email">
                <div class="invalid-feedback">Por favor ingrese un correo</div>
            </div>
         
            <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
                <label class="form-label" for="">Region: </label>
                <select name="select_region" id="" class="form-select">
                    <option value="">Región del bio bio</option>
                </select>
                <div style="color:green; font-size:15px; margin-left:3px; margin-top:3px;" class="w-100">Solo disponible la esta región de momento</div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 ">
                <label class="form-label" for="">Comuna: </label>
                <select name="select_comuna" id="" class="form-select">
                    <option value="-1">Seleccione una comuna: </option>
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
                <div class="invalid-feedback">Por favor ingrese una fecha válida</div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
                <label for="" class="form-label">Fin Temporada</label>
                <input type="date" required  class="form-control" min=<?php echo $hoy;?> name="fin">
                <div class="invalid-feedback">Por favor ingrese una fecha válida</div>
            </div>
            <div class="col-6-lg-6 mb-2 mt-2">
                <label class="form-label" for="">Descripción: </label>
                <textarea class="form-control" placeholder="Breve descripción de su servicio" name="descripcion" required ></textarea>
                <div class="invalid-feedback">Por favor ingrese una descripción</div>
            </div>

            <div class="col-lg-5 mt-2 row m-auto p-3">
                <button class="m-auto btn btn-primary" name="submit" type="submit">Enviar información</button>
            </div>  
         
        </form>

   </div> 
   <script src="./index.js"></script>
</body>
</html>
