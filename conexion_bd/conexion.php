
<?php
try{

//Credenciales para la conexion a phpmyadmin
$host = "localhost";
$dbname= "geocamping";
$username= "root";
$password = "";

$conn = new mysqli($host,$username,$password,$dbname);

}catch(Exception $e){
echo "Error: ".$e->getMessage();
}

?>