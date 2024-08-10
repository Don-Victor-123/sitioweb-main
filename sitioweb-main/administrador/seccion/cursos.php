<?php include("../template/cabecera.php"); ?>

<?php
$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtImagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

include("../config/bd.php");

switch ($accion) {

    case "Agregar":

        $sentenciaSQL = $conexion->prepare("INSERT INTO cursos (nombre,imagen) VALUES (:nombre,:imagen);");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);

        $fecha = new DateTime();
        $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg";

        $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

        if ($tmpImagen != "") {
            move_uploaded_file($tmpImagen, "../../img/" . $nombreArchivo);
        }

        $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
        $sentenciaSQL->execute();

        break;

    case "Modificar":

        $sentenciaSQL = $conexion->prepare("UPDATE cursos SET nombre = :nombre WHERE id = :id");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        if ($txtImagen != "") {

            $fecha = new DateTime();
            $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg";
            $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

            move_uploaded_file($tmpImagen, "../../img/" . $nombreArchivo);

            $sentenciaSQL = $conexion->prepare("SELECT imagen FROM cursos WHERE id = :id");
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
            $Curso = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if (isset($Curso["imagen"]) && ($Curso["imagen"] != "imagen.jpg")) {
                if (file_exists("../../img/" . $Curso["imagen"])) {
                    unlink("../../img/" . $Curso["imagen"]);
                }
            }

            $sentenciaSQL = $conexion->prepare("UPDATE cursos SET imagen = :imagen WHERE id = :id");
            $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
        }
        header("location:cursos.php");

        break;

    case "Cancelar":
        header("location:cursos.php");
        break;

    case "Borrar":

        $sentenciaSQL = $conexion->prepare("SELECT imagen FROM cursos WHERE id = :id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $Curso = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if (isset($Curso["imagen"]) && ($Curso["imagen"] != "imagen.jpg")) {

            if (file_exists("../../img/" . $Curso["imagen"])) {
                unlink("../../img/" . $Curso["imagen"]);
            }
        }

        $sentenciaSQL = $conexion->prepare("DELETE FROM cursos WHERE id = :id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        header("location:cursos.php");

        break;

    case "Seleccionar":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM cursos WHERE id = :id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $Curso = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre = $Curso['nombre'];
        $txtImagen = $Curso['imagen'];

        break;
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM cursos");
$sentenciaSQL->execute();
$listaCursos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos de los Cursos
        </div>

        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="txtID"> ID </label>
                    <input type="text" readonly require value="<?php echo $txtID; ?>" class="form-control" name="txtID" id="txtID" placeholder="">
                </div>

                <div class="form-group">
                    <label for="txtNombre"> Nombre </label>
                    <input type="text" required value="<?php echo $txtNombre; ?>" class="form-control" name="txtNombre" id="txtNombre" placeholder="">
                </div>

                <div class="form-group">
                    <label for="txtimagen"> Imagen </label>
                    <?php if ($txtImagen != "") { ?>
                        <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen; ?>" width="50" alt="">
                    <?php } ?>
                    <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="">
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" <?php echo ($accion == "Seleccionar") ? "disabled" : ""; ?> value="Agregar" class="btn btn-success"> Agregar </button>
                    <button type="submit" name="accion" <?php echo ($accion != "Seleccionar") ? "disabled" : ""; ?> value="Modificar" class="btn btn-warning"> Modificar </button>
                    <button type="submit" name="accion" <?php echo ($accion != "Seleccionar") ? "disabled" : ""; ?> value="Cancelar" class="btn btn-info"> Cancelar </button>
                </div>

            </form>



        </div>
    </div>

</div>

<div class="col-md-7">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th> ID </th>
                <th> Nombre </th>
                <th> Imagen </th>
                <th> Acciones </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaCursos as $curso) { ?>
                <tr>
                    <td> <?php echo $curso['id']; ?> </td>
                    <td> <?php echo $curso['nombre']; ?> </td>
                    <td>
                        <img class="img-thumbnail rounded" src="../../img/<?php echo $curso['imagen']; ?>" width="50" alt="">
                    </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="txtID" id="txtID" value="<?php echo $curso['id']; ?>" />
                            <input type="submit" name="accion" value="Borrar" class="btn btn-danger" />
                            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php include("../template/pie.php"); ?>