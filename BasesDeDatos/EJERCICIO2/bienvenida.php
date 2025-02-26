<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
</head>
<body>
    <h1>bienvenido</h1>

    <a href="logout.php">cerrar sesion</a>
    <a href="modificar.php">modificar usuario</a>
<br>
    <?php if($_SESSION['rol']){ ?>
        <a href=""zona admin </a>
        <a href="eliminarUsu.php">Eliminar Usuario</a>
    <?php } ?>
<br>
    <?php  echo $_SESSION['email']; ?>
</body>
</html>