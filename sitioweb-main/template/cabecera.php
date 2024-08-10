<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Sitio web</title>
</head>
<body>
<?php $url = "http://" . $_SERVER['HTTP_HOST'] . "/sitioweb" ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php"> VictorDV </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> Inicio </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cursos.php"> Cursos </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="nosotros.php"> Nosotros </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url; ?>/administrador/seccion/cursos.php"> Agregar cliente </a>
            </li>
        </ul>
    </nav>

<div class="container">
<br/>
    <div class="row">