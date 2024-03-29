
# Proyecto Geocamping

Este proyecto ha sido realizado para la asignatura de taller de desarrollo


## Instalación de proyecto

Para ejecutar el software en docker ejecute

```bash
    docker-compose up -d
```

URL-Proyecto: http://localhost:80
PHPMYADMIN: http://localhost:8000 

## Características de Docker

* SO: Debian
* Contiene imágenes de Apache2, Mysql y Phpmyadmin

## Tecnologías utilizadas

* PHP 8.0
* Javascript
* Bootstrap 4
* CSS
* Html
* Base de datos: MYSQL

## Credenciales Servidor FACE

  * Usuario: usuario53
  * Contraseña: U@er53
  * **Root:** 1067@2022

## Credenciales PHPMYADMIN FACE
  * Usuario: G53taller
  * Contraseña: G53taller
  * Nombre base de datos: G53taller_bd

## Credenciales Docker PHPMYADMIN

  * Host: "db"
  * Usuario: "root"
  * Contraseña: "test"
  * Nombre base de datos: "dbname"


## Servidor de producción
#### Instalar apache 

Comenzaremos actualizando el índice del paquete local. Esto es para garantizar que refleje la última versión cargada del nuevo paquete.
```
sudo apt update
```

A continuación, instalamos el paquete apache2:
```
sudo apt install apache2
```

Ahora verificamos el estado del servidor:
```
sudo service apache2 status
```

Arracamos apache2

```
sudo service apache2 start
```

#### Instalar MySQL
Instalamos MySQL:
```
sudo apt install mysql-server
```

#### Instalar PHP
Usaremos apt para instalar PHP
```
sudo apt install php libapache2-mod-php php-mysql
```
#### Instalar git
Descargamos e instalamos git con el siguiente comando:
```
sudo apt install git
```
#### Ejecución del proyecto
Primero que nada nos dirigimos a la ruta donde clonearemos nuestro proyecto:
```
cd /var/www/html
```
Una vez aquí realizamos la clonación del proyecto:
```
git clone https://github.com/Felipeopazoc/proyecto-taller-desarrollo.git
```
Luego de eso ingresamos a la carpeta www/:
```
cd www
```
Y moveremos todo el contenido a la carpeta principal:
```
mv * /var/www/html/
```
Reiniciamos el servidor para asegurarnos de que funcione bien nuestro proyecto:
```
sudo service apache2 restart
```

#### Configuración de la base de datos en el servidor:

Debemos importar el archivo geocamping.sql que se encuentra ubicada en la carpeta **dump/**, en donde importaremos en la interfaz phpmyadmin en el servidor que nos proporciona la universidad Link: http://mysqltrans.face.ubiobio.cl

Una vez importada la base de datos, debemos instalar el editor nano, en caso de que ya lo tengas instalado podras saltarte este paso:
````
sudo apt-get install nano
````
Luego de eso vamos a editar el siguiente archivo de conexión:
````
nano conexion_bd/conexion.php
````
Una vez en el archivo **conexion.php** ingresaremos las credenciales y lo cambiaremos por estas credecenciales:
## Credenciales PHPMYADMIN FACE
  * Usuario: G53taller
  * Contraseña: G53taller
  * Nombre base de datos: G53taller_bd

Modelo de ejemplo
```PHP
    <?php
      try{
    //Credenciales para la conexion a phpmyadmin
    $host = "mysqltrans.face.ubiobio.cl";
    $dbname= "G53taller_bd";
    $username= "G53taller";
    $password = "G53taller1067";
    date_default_timezone_set('America/Santiago');
    $conn = new mysqli($host,$username,$password,$dbname);
    $conn->set_charset("utf8");

    }catch(Exception $e){
    echo "Error: ".$e->getMessage();
    }

?>
```
Para visualizar nuestro proyecto nos dirigimos a la siguiente url:  http://146.83.198.35:1068/
