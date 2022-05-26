
<?php
try{

//Credenciales para la conexion a phpmyadmin
$host = "localhost";
$dbname= "geocamping";
$username= "root";
$password = "";
date_default_timezone_set('America/Santiago');
$conn = new mysqli($host,$username,$password,$dbname);
$conn->set_charset("utf8");

}catch(Exception $e){
echo "Error: ".$e->getMessage();
}

?>