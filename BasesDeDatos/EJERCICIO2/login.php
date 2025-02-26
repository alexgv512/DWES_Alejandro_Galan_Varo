
<?php
// INICIO DE SESIÓN
session_start();
session_destroy();

//incluyo el archivo de configuración y conexión a la base de datos
require_once 'config/config.php';
require_once 'lib/conexion.php';

//instancio la clase Conexion
$conexion = new Conexion();
$pdo = $conexion->getPdo();

// login

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    //$_SESSION['email'] = $_POST['email_login'];
    
    // Compruebo que el email es válido
    $email = filter_var(trim($_POST['email_login']), FILTER_VALIDATE_EMAIL);
    // Quito los espacios en blanco al comienzo y final de la contraseña
    $password = trim($_POST['password_login']);

    if ($email && $password) {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        // Si el email y la contraseña coinciden, inicio sesión
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            if(password_verify($password, $user['password_hash'])){
                header("location: bienvenida.php");
                exit();
            } else {
                echo "contraseña incorrecta";
            }
        }else{
            echo "El email no existe";
        }
    }
}
