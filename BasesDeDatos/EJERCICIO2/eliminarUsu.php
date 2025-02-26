
<?php
session_start();
require_once 'config/config.php';
require_once 'lib/conexion.php';

$conexion = new Conexion(); 
$pdo = $conexion->getPdo();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
</head>
<body>
    <a href="bienvenida.php"></a>
    <form method="POST" action="eliminarUsu.php">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" required><br>
        <input type="sumbit" name="eliminar" value="Eliminar">
    </form>
</body>
</html>