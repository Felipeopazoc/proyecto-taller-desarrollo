
<?php
try{

//Credenciales para la conexion a phpmyadmin
$host = "localhost";
$dbname= "geocamping";
$username= "root";
$password = "";
date_default_timezone_set('America/Santiago');
$conn = new mysqli($host,$username,$password,$dbname);

}catch(Exception $e){
echo "Error: ".$e->getMessage();
}

?>