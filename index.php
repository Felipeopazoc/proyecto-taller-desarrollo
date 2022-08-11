<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de camping </title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./styles_registro_camping/styles.css">
    <link rel="stylesheet" href="styles_registro_camping/responsive.css">
    <script src="https://kit.fontawesome.com/10a72ae3cd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>
<body>
<?php 
      $hoy=date("Y-m-d");
       include("conexion_bd/conexion.php");
       $errores = "";
      ?>
    <div class="main-container">
        <header class="header2" id="header2">
            <div class="logo2">
                <h3>Geocamping</h3>
            </div>
            <div class="login">
                <h3><i id="toggler" class="fa-solid fa-bars"></i></h3>
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
            <div class="barra-navegacion" id="navbar">
                <nav class="navegacion">
                    <ul class="ul">
                        <li><a href="#"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li><a href="#"><i class="fa-solid fa-registered"></i> Registro camping</a></li>
                        <!-- <li><a href="mostrar_campings.php"><i class="fa-solid fa-campground"></i> Listado de campings</a></li> -->
                    </ul>
                </nav>
            </div>
            <div class="panel-admin">
             
                <h2 class="h1">Formulario de registro</h2>
                <form class="formulario was-validated row" id="form" method="POST">

                    <div class="col-lg-7 col-md-6 col-sm-6">
                        <label class="form-label" for="name"> <i class="fa-solid fa-campfire"></i> Nombre camping: </label>
                        <input type="text" required name="nombre"  pattern="[a-zA-Z ]{8,100}" autocomplete="off" class="form-control efecto" id="name" placeholder="Mínimo 8 carácteres y sin números"   >
                        <div class="invalid-feedback" id="mensaje"></div>
                        <div class="invalid-feedback">Por favor ingrese un nombre sin números</div>
                    </div>


                    <div class="col-lg-4 col-md-5 col-sm-5">
                        <label class="form-label" for="sitios">Cantidad de sitios: </label>
                        <input type="number" required id="sitios" max="40" min="1" placeholder="Sitios disponibles"  class="form-control" name="cantidad_sitios">
                        <div class="invalid-feedback">Por favor ingrese cantidad, máximo 40 sitios.</div>
                     </div>
                     <div class="col-lg-7 col-md-6 col-sm-11">
                         <label class="form-label" for="direccion">Dirección: </label>
                         <input type="text" id="direccion" required placeholder="Dirección + número" class="form-control" name="direccion">
                          <div class="invalid-feedback" id="mensaje2"></div>
                          <div class="invalid-feedback">Por favor ingrese una dirección</div>
                     </div>
                     <div class="col-lg-4 col-md-5 col-sm-6 mb-2 ">
                        <label class="form-label" for="">Teléfono: </label>
                        <input type="number" maxlength="9" placeholder="123456789 -> 9 dígitos" required class="form-control" id="telefono" name="telefono">
                        <div class="invalid-feedback" id="mensaje3"></div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-5 mb-2">
                        <label class="form-label" for="">Correo: </label>
                        <input type="email" id="email" placeholder="Formato: xxxx@ejemplo.com" required class="form-control"  name="email">
                        <div class="invalid-feedback" id="mensaje4"></div>
                        <div class="invalid-feedback">Por favor ingrese un correo</div>
                     </div>
                     <div class="col-lg-4 col-md-5 col-sm-6 mb-md-2 mb-2">
                        <label class="form-label" for="">Region: </label>
                        <select disabled required name="select_region" id="" class="form-select">
                            <option selected value="1">Región del bio bio</option>
                        </select>
                        <div style="color:green; font-size:15px; margin-left:3px; margin-top:3px;" class="w-100">Solo disponible esta región de momento.</div>
                    </div>
                    <div class="col-lg-7 mb-2 ">
                        <label class="form-label" for="">Descripción: </label>
                        <textarea maxlength="20" class="form-control" id="descripcion" placeholder="Breve descripción del camping a registrar" name="descripcion" required ></textarea>
                        <div class="invalid-feedback">Por favor ingrese una descripción.</div>
                    </div>
                    <div class="col-lg-4 col-md-12 mb-md-2 col-sm-6 ">
                        <label class="form-label" for="">Comuna: </label>
                        <select required name="select_comuna" id="comuna" class="form-select">
                            <option value="">Seleccione una comuna: </option>
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
                        <div class="invalid-feedback">Por favor ingrese una comuna.</div>
                    </div>
                  
                    <div class="col-lg-7 col-md-6 col-sm-6">
                        <label for="" class="form-label">Mes comienzo Temporada</label>
                        <select required class="form-select" name="inicio" id="inicio">
                            <option value="">Seleccione un mes</option>
                            <?php 
                                $sql2 = "select * from mes";
                                $resultado2 = mysqli_query($conn,$sql2);
                                $filas2 = mysqli_num_rows($resultado2);

                                if($filas2){
                                    while($mes = $resultado2->fetch_row()){
                                        ?>
                                        <option value="<?php echo $mes[0]?>"><?php echo $mes[1] ?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                        <div class="invalid-feedback">Por favor seleccione un mes.</div>
                        <div id="mensaje5"></div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <label for="" class="form-label">Mes fin Temporada</label>
                        <select required class="form-select" name="fin" id="fin">
                            <option value="">Seleccione un mes</option>
                            <?php 
                                $sql3 = "select * from mes";
                                $resultado3 = mysqli_query($conn,$sql2);
                                $filas3 = mysqli_num_rows($resultado2);

                                if($filas3){
                                    while($mes = $resultado3->fetch_row()){
                                        ?>
                                        <option value="<?php echo $mes[0]?>"><?php echo $mes[1] ?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                        <div class="invalid-feedback">Por favor seleccione un mes.</div>
                        <div id="mensaje6" ></div>
                    </div>
                   
                    <div class="col-lg-5 mt-2 row m-auto p-3">
                        <button class="m-auto btn btn-primary" name="submit" id="button" type="submit">Siguiente</button>
                    </div>  

                </form>
            </div>
        </div>
        <!--Fin contenedor-->

    </div>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/validacion_nombre.js"></script>
    <script src="./js/validar-direccion.js"></script>
    <script src="./js/validar_telefono.js"></script>
    <script src="./js/validar-correo.js"></script>
    <script src="./js/validar-temporada.js"></script>
    <script src="./js/enviardatos.js"></script>
    <script src="./js/menu-responsive.js"></script>
    <script src="./js/menu.js"></script>
</body>
</html>