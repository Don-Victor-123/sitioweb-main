<?php

// Include connection file (replace 'connection.php' with your actual filename)

// Variables and error messages (initialize to empty strings)
/*$nombre = "";
$apellidos = "";
$fechaNacimiento = "";
$correo = "";
$telefono = "";
$errorMsg = "";

// Process form submission if data is sent via POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Sanitize user input to prevent SQL injection and XSS attacks
  $nombre = filter_var(trim($_POST['nombre']), FILTER_SANITIZE_STRING);
  $apellidos = filter_var(trim($_POST['apellidos']), FILTER_SANITIZE_STRING);
  $fechaNacimiento = filter_var(trim($_POST['fechaNacimiento']), FILTER_SANITIZE_STRING);
  $correo = filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL);
  $telefono = filter_var(trim($_POST['telefono']), FILTER_SANITIZE_STRING);

  // Validate email format
  if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $errorMsg = "Correo electrónico inválido.";
  } else {
    // Check for duplicate email in database
    $sql = "SELECT COUNT(*) FROM usuarios WHERE correo = :correo";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
    $rowCount = $stmt->fetchColumn();

    if ($rowCount > 0) {
      $errorMsg = "El correo electrónico ingresado ya está en uso.";
    } else {
      // Insert user data into database if no errors
      $sql = "INSERT INTO usuarios (nombre, apellidos, fechaNacimiento, correo, telefono) VALUES (:nombre, :apellidos, :fechaNacimiento, :correo, :telefono)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':nombre', $nombre);
      $stmt->bindParam(':apellidos', $apellidos);
      $stmt->bindParam(':fechaNacimiento', $fechaNacimiento);
      $stmt->bindParam(':correo', $correo);
      $stmt->bindParam(':telefono', $telefono);

      if ($stmt->execute()) {
        $_SESSION['message'] = "Usuario registrado exitosamente!";
        header("Location: login.php"); // Redirect to login page after successful registration
        exit();
      } else {
        $errorMsg = "Error al registrar usuario.";
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

  <div class="container mt-4">
    <h2>Registro de Usuario</h2>

    <?php if (isset($_SESSION['message'])): ?>
      <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['message'];
        unset($_SESSION['message']);  // Clear session message after display
        ?>
      </div>
    <?php endif; ?>

    <?php if ($errorMsg != ""): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $errorMsg; ?>
      </div>
    <?php endif; ?>

    <form method="POST" novalidate>

      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
        </div>

<div class="mb-3">
  <label for="apellidos" class="form-label">Apellidos</label>
  <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellidos; ?>" required>
</div>

<div class="mb-3">
  <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
  <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $fechaNacimiento; ?>" required>
</div>

<div class="mb-3">
  <label for="correo" class="form-label">Correo Electrónico</label>
  <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $correo; ?>" required>
</div>

<div class="mb-3">
  <label for="telefono" class="form-label">Teléfono</label>
  <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="YYY-YYY-YYYY">  </div>

<button type="submit" class="btn btn-primary">Registrarse</button>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVFQWjxhNBM9L2VJUwohIWUTNrqdiVuKVvR0CWm/XGzo4EGsOe3n8" crossorigin="anonymous"></script>
</body>
</html>
*/
