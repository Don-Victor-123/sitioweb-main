<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="" method="post">

    <h2>hola</h2>
    <p>inica tu registro</p>

    <div class="input-wrapper">
        <input type="text" name="name" id="" placeholder="Nombre">
        <img class="input-icon" src="" alt="">
    </div>

    <div class="input-wrapper">
        <input type="text" name="last_name" id="" placeholder="Apellidos">
        <img class="input-icon" src="" alt="">
    </div>

    <div class="input-wrapper">
        <input type="text" name="email" id="" placeholder="Correos">
        <img class="input-icon" src="" alt="">
    </div>

    <div class="input-wrapper">
        <input type="text" name="cellphone" id="" placeholder="Telefono">
        <img class="input-icon" src="" alt="">
    </div>

    <div class="input-wrapper">
        <input type="text" name="" id="no_se" placeholder="***">
        <img class="input-icon" src="" alt="">
    </div>  
    <input type="submit" name="register" value="Enviar">

</form>
<?php 
include("registrar.php");
?>

</body>
</html>