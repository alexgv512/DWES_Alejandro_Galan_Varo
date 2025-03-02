<?php

namespace controllers;

use models\Usuario;
use PDOException;

class UsuarioController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index(): void {
        echo "<h1>Controlador Usuario, acción index</h1>";
    }

    public function registrarse(): void {
        require_once "views/usuario/registrarse.php";
    }

    public function login(): void {
        require_once "views/usuario/login.php";
    }

    public function administrar(): void {
        $usuario = new Usuario();
        $usuarios = $usuario->getAll();
        require_once "views/usuario/administrarAdmin.php";
    }



    public function registrarUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = htmlspecialchars(trim($_POST['nombre']));
            $apellidos = htmlspecialchars(trim($_POST['apellidos']));
            $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            $password = htmlspecialchars(trim($_POST['password']));

            // Validaciones
            if (empty($nombre) || empty($apellidos) || !$email || empty($password)) {
                $_SESSION['error'] = 'Todos los campos son obligatorios y deben ser válidos.';
                header('Location: ' . BASE_URL . 'usuario/registrarse');
                exit();
            }

            if (strlen($password) < 6) {
                $_SESSION['error'] = 'La contraseña debe tener al menos 6 caracteres.';
                header('Location: ' . BASE_URL . 'usuario/registrarse');
                exit();
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 'El email no es válido.';
                header('Location: ' . BASE_URL . 'usuario/registrarse');
                exit();
            }

            // Verificar si el email ya existe en la base de datos
            try {
                $stmt = $this->db->prepare('SELECT COUNT(*) FROM usuarios WHERE email = :email');
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $count = $stmt->fetchColumn();

                if ($count > 0) {
                    $_SESSION['error'] = 'El email ya está registrado.';
                    header('Location: ' . BASE_URL . 'usuario/registrarse');
                    exit();
                }
            } catch (PDOException $e) {
                $_SESSION['error'] = 'Error al verificar el email: ' . $e->getMessage();
                header('Location: ' . BASE_URL . 'usuario/registrarse');
                exit();
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            
            try {
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($hashedPassword);
                $usuario->save();
                $_SESSION['success'] = 'Usuario registrado correctamente.';
                header('Location: ' . BASE_URL . 'usuario/registrarse');
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = 'Error al registrar el usuario: ' . $e->getMessage();
                header('Location: ' . BASE_URL . 'usuario/registrarse');
                exit();
            }
        }
    }
    //login
    public function entrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            $password = htmlspecialchars(trim($_POST['password']));

            if (!$email || empty($password)) {
                $_SESSION['error'] = 'Todos los campos son obligatorios y deben ser válidos.';
                header('Location: ' . BASE_URL . 'usuario/login');
                exit();
            }

            try {
                $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE email = :email');
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $usuario = $stmt->fetch();

                if ($usuario && password_verify($password, $usuario['password'])) {
                    $_SESSION['usuario'] = $usuario;
                    header('Location: ' . BASE_URL);
                    exit();
                } else {
                    $_SESSION['error'] = 'Email o contraseña incorrectos.';
                    header('Location: ' . BASE_URL . 'usuario/login');
                    exit();
                }
            } catch (PDOException $e) {
                $_SESSION['error'] = 'Error al iniciar sesión: ' . $e->getMessage();
                header('Location: ' . BASE_URL . 'usuario/login');
                exit();
            }
        }
    }

    public function cerrarsesion() {
        // Eliminar la cookie
        setcookie('login_token', '', time() - 3600, "/");

        session_destroy();
        header('Location: ' . BASE_URL);
        exit();
    }

    public function verificarSesion() {
        if (isset($_COOKIE['login_token'])) {
            $token = $_COOKIE['login_token'];

            try {
                $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE token = :token');
                $stmt->bindParam(':token', $token);
                $stmt->execute();
                $usuario = $stmt->fetch();

                if ($usuario) {
                    $_SESSION['usuario'] = $usuario;
                }
            } catch (PDOException $e) {
                // Manejar el error si es necesario
            }
        }
    }

    public function eliminarUsuario() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            try {
                $usuario = new Usuario();
                $usuario->delete($id);
                $_SESSION['success'] = 'Usuario eliminado correctamente.';
            } catch (PDOException $e) {
                $_SESSION['error'] = 'Error al eliminar el usuario: ' . $e->getMessage();
            }
        } else {
            $_SESSION['error'] = 'ID de usuario no proporcionado.';
        }
        header('Location: ' . BASE_URL . 'usuario/administrar');
        exit();
    }

    public function editar() {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $usuario = Usuario::getById($id);
            if ($usuario) {
                require_once "views/usuario/editarUsuario.php";
            } else {
                $_SESSION['error'] = 'Usuario no encontrado.';
                header('Location: ' . BASE_URL . 'usuario/administrar');
                exit();
            }
        } else {
            $_SESSION['error'] = 'ID de usuario no proporcionado.';
            header('Location: ' . BASE_URL . 'usuario/administrar');
            exit();
        }
    }
    
    public function actualizarUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = intval($_POST['id']);
            $nombre = htmlspecialchars(trim($_POST['nombre']));
            $apellidos = htmlspecialchars(trim($_POST['apellidos']));
            $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            $rol = htmlspecialchars(trim($_POST['rol']));
    
            // Validaciones
            if (empty($nombre) || empty($apellidos) || !$email || empty($rol)) {
                $_SESSION['error'] = 'Todos los campos son obligatorios y deben ser válidos.';
                header('Location: ' . BASE_URL . 'usuario/editar&id=' . $id);
                exit();
            }
    
            try {
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setRol($rol);
                $usuario->update();
                $_SESSION['success'] = 'Usuario actualizado correctamente.';
                header('Location: ' . BASE_URL . 'usuario/administrar');
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = 'Error al actualizar el usuario: ' . $e->getMessage();
                header('Location: ' . BASE_URL . 'usuario/editar&id=' . $id);
                exit();
            }
        }
    }

}
?>