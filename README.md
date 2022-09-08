
# Proyecto Geocamping

Este proyecto ha sido realizado para la asignatura de taller de desarrollo


## Instalación de proyecto

Para ejecutar el software en docker ejecute

```bash
    docker-compose up -d
```
    

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

## Instalación proyecto servidor de producción FACE

1. Clonar el repositorio
2. Entrar a la carpeta proyecto-taller-de-desarrollo
  ```bash
    cd proyecto-taller-de-desarrollo
  ```
3. Mover la carpeta www a la ruta /var/ww/html
  ```bash
     mv www /var/www/html
  ```
4. Dirigirse en el navegador a la dirección de red http://146.83.198.35:1068/