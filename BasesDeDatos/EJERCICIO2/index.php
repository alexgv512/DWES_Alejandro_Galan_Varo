<?php
// INICIO DE SESIÓN
session_start();


//incluyo el archivo de configuración y conexión a la base de datos y los archivos de registro y login
require_once 'config/config.php';
require_once 'lib/conexion.php';
include 'registro.php';
include 'login.php';

//instancio la clase Conexion   
$conexion = new Conexion();
$pdo = $conexion->getPdo();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTO Y LOGIN DE LA EMPRSA</title>
</head>
<body>

<!--FORMULARIO DE REGISTRO-->
<h2>Registro</h2>
<form method="POST" action="registro.php">
    Email: <input type="email" name="email_register" required>
    Contraseña: <input type="password" name="password_register" required>
    <input type="submit" name="register" value="Registrar">
</form>


<!--FORMULARIO DE INICIO DE SESIÓN-->
<h2>Iniciar Sesión</h2> 
<form method="POST" action="login.php">

    Email: <input type="email" name="email_login" required>
    Contraseña: <input type="password" name="password_login" required>
    <input type="submit" name="login" value="Iniciar Sesión">

</form>

</body>
</html>