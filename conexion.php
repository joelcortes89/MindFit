<?php


$host = "localhost";
$usuario = "root";
$password = "";
$basedatos = "mindfit";


$conexion = new mysqli($host, $usuario, $password, $basedatos);


if ($conexion->connect_error) {
    die("Error de conexión con la base de datos");
}


$conexion->set_charset("utf8mb4");

?>
