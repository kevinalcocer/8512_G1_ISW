<?php 
//Configuracion para acceder a la bd
function conn(){
$hostname = "localhost";
$usuariodb = "root";
$passworddb ="";
$dbname = "registro";

    //Conectar con el servidor

    $conectar =mysqli_connect($hostname, $usuariodb, $passworddb, $dbname);
    return $conectar;
}


?>