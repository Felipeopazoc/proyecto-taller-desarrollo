<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/10a72ae3cd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body>
<?php 
      $hoy=date("Y-m-d");
       include("conexion_bd/conexion.php");
       $errores = "";
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
                        <li><a href="#"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                        <li><a href="#"><i class="fa-solid fa-registered"></i> Registro camping</a></li>
                        <li><a href="#"><i class="fa-solid fa-campground"></i> Listado de campings</a></li>
                        <li><a href="#"><i class="fa-solid fa-box"></i> Imágenes</a></li>
                    </ul>
                </nav>
            </div>
            <div class="panel-admin">
                <h2 class="h1">Registrar camping</h2>
                

                <form class="formulario was-validated row" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">

                    <div class="col-lg-7 col-md-6 col-sm-6">
                        <label class="form-label" for="name"> <i class="fa-solid fa-campfire"></i> Nombre camping: </label>
                        <input class="form-control" id="name"  pattern="[a-zA-Z ]{10,60}" placeholder="Camping ......" required type="text" name="nombre" id="nombre">
                        <div class="invalid-feedback">Por favor ingrese un nombre con un mínimo 10 carácteres y sin números.</div>
                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-5">
                        <label class="form-label" for="sitios">Cantidad de sitios: </label>
                        <input type="number" id="sitios" max="40" " placeholder="Sitios disponibles" required class="form-control" name="cantidad_sitios">
                        <div class="invalid-feedback">Por favor ingrese cantidad, máximo 40 sitios.</div>
                     </div>
                     <div class="col-lg-7 col-md-8 col-sm-11">
                         <label class="form-label" for="direccion">Dirección: </label>
                         <input type="text" id="direccion" placeholder="Dirección + numero"  minlength="10" required class="form-control" name="direccion">
                          <div class="invalid-feedback">Por favor ingrese una dirección, mínimo 10 caráteres (Incluya letras y números) </div>
                     </div>
                     <div class="col-lg-4 col-md-5 col-sm-6 mb-2 ">
                        <label class="form-label" for="">Teléfono: </label>
                        <input type="number" placeholder="123456789 -> 9 dígitos" required class="form-control" name="telefono">
                        <div class="invalid-feedback">Por favor ingrese un numero de 9 dígitos.</div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-5 mb-2">
                        <label class="form-label" for="">Correo: </label>
                        <input type="email" pattern="[^@ \t\r\n]+@gmail\.com" placeholder="Formato: xxxx@gmail.com" required class="form-control"  name="email">
                        <div class="invalid-feedback">Por favor ingrese un correo válido.</div>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
                        <label class="form-label" for="">Region: </label>
                        <select name="select_region" id="" class="form-select">
                            <option value="">Región del bio bio</option>
                        </select>
                        <div style="color:green; font-size:15px; margin-left:3px; margin-top:3px;" class="w-100">Solo disponible la esta región de momento.</div>
                    </div>
                    
                    <div class="col-lg-7 col-md-6 col-sm-6 ">
                        <label class="form-label" for="">Comuna: </label>
                        <select required name="select_comuna" id="" class="form-select">
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
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <label for="" class="form-label">Comienzo Temporada</label>
                        <input type="date" required name="inicio" min=<?php echo $hoy;?> class="form-control">
                        <div class="invalid-feedback">Por favor ingrese una fecha válida.</div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-6 mt-2">
                        <label for="" class="form-label">Fin Temporada</label>
                        <input type="date" required  class="form-control" min=<?php echo $hoy;?> name="fin">
                        <div class="invalid-feedback">Por favor ingrese una fecha válida.</div>
                    </div>
                    <div class="col-lg-6 mb-2 mt-2">
                        <label class="form-label" for="">Descripción: </label>
                        <textarea class="form-control" placeholder="Breve descripción de su servicio" name="descripcion" required ></textarea>
                        <div class="invalid-feedback">Por favor ingrese una descripción.</div>
                    </div>
                    <div class="col-lg-5 mt-2 row m-auto p-3">
                        <button class="m-auto btn btn-primary" name="submit" id="button" type="submit">Enviar información</button>
                    </div>  

                </form>
            </div>
        </div>
        <!--Fin contenedor-->

    </div>
    <script src="">
                    
            let button = document.getElementById("button");

            button.addEventListener("click",()=>{
                Swal.fire({
                   icon: 'error',
                   title: 'Oops...!',
                   text: 'Operación inválida, el nombre ya está registrado.',  
                   });
            })
    </script>
</body>
</html>