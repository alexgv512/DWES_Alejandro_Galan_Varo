<?php

    namespace controllers;

    use models\Usuario;

    class UsuarioController{

        public function index(): void{
            echo "<h1>Controlador Usuario, acción index</h1>";
        }

        public function registrarse(): void{
            require_once "views/usuario/registrarse.php";
        }

        public function guardar(): void {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
                // Recoger datos y sanitizar para evitar XSS
                $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : false;
                $apellidos = isset($_POST['apellidos']) ? trim($_POST['apellidos']) : false;
                $email = isset($_POST['email']) ? ($_POST['email']) : false;
                $password = isset($_POST['password']) ? trim($_POST['password']) : false;
                $rol = isset($_POST['rol']) ? $_POST['rol'] : 'user';
        
                // Guardar datos en sesión para mantenerlos en caso de error
                $_SESSION['form_data'] = compact('nombre', 'apellidos', 'email', 'password', 'rol');
        
                // Validaciones
                $errores = [];
        
                if (!$nombre || !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,}$/u", $nombre)) {
                    $errores['nombre'] = "El nombre debe tener al menos 4 caracteres y solo letras.";
                }
        
                if (!$apellidos || !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,}$/u", $apellidos)) {
                    $errores['apellidos'] = "Los apellidos deben tener al menos 4 caracteres y solo letras.";
                }
        
                if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errores['email'] = "El email no es válido.";
                }
        
                if (!$password || !preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
                    $errores['password'] = "La contraseña debe tener al menos 8 caracteres, incluyendo una letra y un número.";
                }
        
                // Si hay errores, guardar en sesión y redirigir
                if (!empty($errores)) {
                    $_SESSION['register_errors'] = $errores;
                    header("Location:" . BASE_URL . "usuario/" . (isset($_SESSION['admin']) ? 'crear' : 'registrarse'));
                    exit;
                }
        
        
                // Crear objeto Usuario y guardar en BD
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $usuario->setRol($rol);
        
                if ($usuario->save()) {
                    $_SESSION['register'] = 'complete';
                    unset($_SESSION['form_data']); // Limpiar datos de sesión si el registro fue exitoso
                    header("Location:" . BASE_URL . "usuario/" . (isset($_SESSION['admin']) ? 'crear' : 'registrarse'));
                } else {
                    $_SESSION['register'] = 'failed_db';
                }
            }
        }
    }

?>