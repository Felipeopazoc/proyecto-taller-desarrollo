
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campings</title>
    <link rel="stylesheet" href="./styles_resumen/styles.css">
    <script src="https://kit.fontawesome.com/10a72ae3cd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
<?php 
      $hoy=date("Y-m-d");
      $id = $_GET["id"];
       include("conexion_bd/conexion.php");
       $sql = "select c.nombre as nombre_camping,c.cantidad_puestos,c.direccion,
       c.telefono,c.descripcion,r.numero_region,c.correo,r.nombre as nombre_region,
       ci.id_ciudad, ci.nombre as nombre_ciudad
       from camping c,ciudad ci, region r
       where c.id_camping=$id
       and c.cod_ciudad = ci.id_ciudad 
       and ci.numero_region = r.numero_region";
       $resultado = mysqli_query($conn,$sql);

       $fila = mysqli_fetch_array($resultado,MYSQLI_ASSOC);

       $sql2 = "select m.id_mes,m.nombre from camping c, mes m
       where c.mes_inicio = m.id_mes and c.id_camping = $id";
       $resultado2 = mysqli_query($conn,$sql2);
       $fila_mes_inicio = mysqli_fetch_array($resultado2,MYSQLI_ASSOC);

        
       $sql3 = "select m.id_mes,m.nombre from camping c, mes m
       where c.mes_fin = m.id_mes and c.id_camping = $id";
       $resultado3 = mysqli_query($conn,$sql3);
       $fila_mes_final = mysqli_fetch_array($resultado3,MYSQLI_ASSOC);

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
                        <li><a href="index.php"><i class="fa-solid fa-registered"></i> Registro camping</a></li>
    
                    </ul>
                </nav>
            </div>
            <div class="panel-admin">
                <h1>Resumen de registro</h1>
                <form class="formulario was-validated m-auto row" id="form" method="POST">
                    <div class="col-lg-7 col-md-6 col-sm-6">
                        <label class="form-label" for="name"> <i class="fa-solid fa-campfire"></i> Nombre camping: </label>
                        <input type="text" disabled required name="nombre"  pattern="[a-zA-Z ]{8,100}" autocomplete="off" value ="<?php echo $fila["nombre_camping"]; ?>" class="form-control efecto" id="name" placeholder="Mínimo 8 carácteres y sin números"   >
                        <div class="invalid-feedback" id="mensaje"></div>
                        <div class="invalid-feedback">Por favor ingrese un nombre sin números</div>
                    </div>


                    <div class="col-lg-4 col-md-5 col-sm-5">
                        <label class="form-label" for="sitios">Cantidad de sitios: </label>
                        <input type="number" required id="sitios" max="40" disabled value="<?php echo  $fila["cantidad_puestos"]; ?>" placeholder="Sitios disponibles"  class="form-control" name="cantidad_sitios">
                        <div class="invalid-feedback">Por favor ingrese cantidad, máximo 40 sitios.</div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-11">
                        <label class="form-label" for="direccion">Dirección: </label>
                        <input disabled type="text" id="direccion" value="<?php echo  $fila["direccion"]; ?>" required placeholder="Dirección + numero" class="form-control" name="direccion">
                        <div class="invalid-feedback" id="mensaje2"></div>
                        <div class="invalid-feedback">Por favor ingrese una dirección</div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-6 mb-2 ">
                        <label class="form-label" for="">Teléfono: </label>
                        <input disabled type="text" value="<?php echo $fila["telefono"];?>" maxlength="9" placeholder="123456789 -> 9 dígitos" required class="form-control" id="telefono" name="telefono">
                        <div class="invalid-feedback" id="mensaje3"></div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-5 mb-2">
                        <label class="form-label" for="">Correo: </label>
                        <input value="<?php echo $fila["correo"] ?>" disabled type="email" id="email" pattern="[^@ \t\r\n]+@gmail.com" placeholder="Formato: xxxx@gmail.com" required class="form-control"  name="email">
                        <div class="invalid-feedback" id="mensaje4"></div>
                        <div class="invalid-feedback">Por favor ingrese un correo con el formato de gmail</div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-6 mb-md-2 mb-2">
                        <label class="form-label" for="">Region: </label>
                        <select disabled required name="select_region" id="" class="form-select">
                            <option value="">Seleccione una región</option>
                            <option selected value="<?php echo $fila["numero_region"]?>"><?php echo $fila["nombre_region"]?></option>
                        </select>
                        <div style="color:green; font-size:15px; margin-left:3px; margin-top:3px;" class="w-100">Solo disponible esta región de momento.</div>
                    </div>
                    <div class="col-lg-7 mb-2 ">
                        <label class="form-label" for="">Descripción: </label>
                        <textarea maxlength="100" class="form-control" id="descripcion" placeholder="Breve descripción del camping a registrar" disabled name="descripcion" required ><?php echo $fila["descripcion"]?></textarea>
                        <div class="invalid-feedback">Por favor ingrese una descripción.</div>
                    </div>
                    <div class="col-lg-4 col-md-12 mb-md-2 col-sm-6 ">
                        <label class="form-label" for="">Comuna: </label>
                        <select disabled required name="select_comuna" id="comuna" class="form-select">
                            <option value="">Seleccione una comuna: </option>
                            <option value="<?php echo $fila["id_ciudad"] ?>" selected><?php echo $fila["nombre_ciudad"]?></option>
                        </select>
                        <div class="invalid-feedback">Por favor ingrese una comuna.</div>
                    </div>

                    <div class="col-lg-7 col-md-6 col-sm-6">
                        <label for="" class="form-label">Mes comienzo Temporada</label>
                        <select disabled required class="form-select" name="inicio" id="inicio">
                            <option value="">Seleccione un mes</option>
                            <option selected value="<?php echo $fila_mes_inicio["id_mes"] ; ?>"><?php echo $fila_mes_inicio["nombre"] ; ?></option>
                        </select>
                        <div class="invalid-feedback">Por favor seleccione un mes.</div>
                        <div id="mensaje5"></div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <label for="" class="form-label">Mes fin Temporada</label>
                        <select disabled required class="form-select" name="fin" id="fin">
                            <option value="">Seleccione un mes</option>
                            <option selected value="<?php echo $fila_mes_final["id_mes"] ; ?>"><?php echo $fila_mes_final["nombre"] ; ?></option>
                        </select>
                        <div class="invalid-feedback">Por favor seleccione un mes.</div>
                        <div id="mensaje6" ></div>
                    </div>
                    </form>
                </form> 
                <h2>Servicios elegidos</h2>
                <table class="table table-hover">
                    <thead>
                        <th>Nombre</th>
                        <th>Precio entrada</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nomdada</td>
                        </tr>
                    </tbody>
                </table>            
            </div>
      
        </div>
        <!--Fin contenedor-->

    </div>
</body>
</html>
