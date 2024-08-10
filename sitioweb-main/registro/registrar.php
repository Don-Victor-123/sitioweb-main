<?php

include("conexion.php");

if (isset($_POST['register'])) {
    if (
        strlen($_POST['name']) >= 1 &&
        strlen($_POST['last_name']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['cellphone']) >= 1 &&
        strlen($_POST['no_se']) >= 1
    ) {
        $name = trim($_POST['name']);
        $last_name = trim($_POST['last_name']);
        $email = trim($_POST['email']);
        $cellphone = trim($_POST['cellphone']);
        $fecha = date("dia/ mes/ año");

        $conection = "INSERT INTO usuarios(nombres, apellidos, correo, telefono, no_se) VALUES ('$name', '$last_name', '$email', '$cellphone', '$fecha')";
    }
}
