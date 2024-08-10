<?php

$host = "localhost";
$bd = "sitio";
$usuario = "root";
$contrasenia = "";

try {

    $conexion = new PDO("mysql:host=$host;dbname=$bd", $usuario, $contrasenia);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "conectados... a sistema. ";
} catch (PDOException $ex) {
    echo "la conexion ha fallado por: " . $ex->getMessage();
}
