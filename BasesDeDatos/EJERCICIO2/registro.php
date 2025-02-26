<?php
// INICIO DE SESIÓN     
session_start();

//incluyo el archivo de configuración y conexión a la base de datosç

require_once 'config/config.php';   
require_once 'lib/conexion.php';

//instancio la clase Conexion   
$conexion = new Conexion();
$pdo = $conexion->getPdo();

//REGISTRO DE USUARIOS

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Compruebo que el email es válido
    $email = filter_var(trim($_POST['email_register']), FILTER_VALIDATE_EMAIL);
    // Quito los espacios en blanco al comienzo y final de la contraseña
    $password = trim($_POST['password_register']);

    if ($email && $password) {
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Si el email no existe en la base de datos, lo inserto
        if ($stmt->rowCount() == 0) {
            $stmt = $pdo->prepare("INSERT INTO usuarios (email, password) VALUES (:email, :password)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);   
            $stmt->execute();
            echo "Usuario registrado correctamente";
        } else {
            echo "El email ya existe";
        }
    } else {
        echo "Email o contraseña incorrectos";
    }   
}else{
    echo "Error al registrar el usuario";
}
