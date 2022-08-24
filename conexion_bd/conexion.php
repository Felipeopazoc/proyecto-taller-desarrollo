
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