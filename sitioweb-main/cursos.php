<?php
include("template/cabecera.php");
?>

<?php
include("administrador/config/bd.php");

$sentenciaSQL = $conexion->prepare("SELECT * FROM cursos");
$sentenciaSQL->execute();
$listaCursos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($listaCursos as $Curso){?>
<div class="col-md-4">
    <div class="card">
        <img class="card-img-top" src=" ./img/<?php echo $Curso['imagen'];?> " alt="">
        <div class="card-body">
            <h4 class="card-title"> <?php echo $Curso['nombre'];?> </h4>
            <a name="" id="" class="btn btn-primary" href="#" role="button"> Ver mas </a>
        </div>
    </div>    
</div>
<?php }?>




<?php
include("template/pie.php");
?>