<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incorporación de servicios</title>
    <script src="https://kit.fontawesome.com/10a72ae3cd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles_incorporacion_servicios/styles.css">
</head>
<body>
     <div class="w-100 d-flex flex-column">
            <header class="header">
                <nav class="nav">
                    <a href="index.php" class="logo nav-link">Geocamping</a>
                    <button class="nav-toggle" aria-label="">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <ul class="nav-menu">
                        <li class="nav-menu-item"><a href="index.php" class="nav-menu-link nav-link">Registrar Camping</a></li>
                        <li class="nav-menu-item"><a href="mostrar_campings.php" class="nav-menu-link nav-link">Listado camping</a></li>
                    </ul>
                </nav>
            </header>
            <div class="w-75 m-auto bg-white">
                <form action="" method="post">
                    <div class="col-12">
                        <label class="form-label" for="">Servicios del camping a registrar</label>
                        <input type="checkbox" >
                    </div>
                </form>
            </div>
     </div>

     <script src="index.js"></script>
</body>
</html>