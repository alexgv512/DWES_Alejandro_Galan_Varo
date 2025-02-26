<?php
session_start();
require_once 'config/config.php';
require_once 'lib/conexion.php';

$conexion = new Conexion();
$pdo = $conexion->getPdo();

if (isset($_POST['modificar'])) {

    //consulto es id de usuario que quiero modificar
    $email = $_SESSION["email"];
    $sql= "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();

    //modifico el usuario
    $emailNuevo = $_POST['email'];
    $emailNuevo = $_POST['nombre'];
    $id = $user['id'];
    $sql = "UPDATE usuarios SET email = :emailNuevo, Nombre = :nombreNuevo WHERE usuarios.id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':emailNuevo', $emailNuevo);
    $stmt->bindParam(':nombreNuevo', $nombreNuevo);
    $stmt->execute();
    $user = $stmt->fetch();
    echo "Usuario modificado correctamente";
    echo "<script> 

        setTimeout(function(){window.location.href='index.php';}, 2000);

      </script>";  
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar ususario</title>
</head>
<body>
    <a href="index.php">Volver</a>

    <h1>Modificar usuario</h1>

    <form method="POST" action="modificar.php">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" required><br>
        <label for="nombre">Nombre:</label>
        <input type="nombre" name="email" value="<?php echo $_SESSION['nombre']; ?>" required><br>
        <input type="submit" name="modificar" value="Modificar">

</body>
</html>