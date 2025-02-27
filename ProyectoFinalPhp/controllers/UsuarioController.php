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

    public function registrarUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = htmlspecialchars(trim($_POST['nombre']));
            $apellidos = htmlspecialchars(trim($_POST['apellidos']));
            $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            $password = htmlspecialchars(trim($_POST['password']));

            if (empty($nombre) || empty($apellidos) || !$email || empty($password)) {
                $_SESSION['error'] = 'Todos los campos son obligatorios y deben ser válidos.';
                header('Location: /ruta-al-formulario');
                exit();
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            try {
                $stmt = $this->db->prepare('INSERT INTO usuarios (nombre, apellidos, email, password) VALUES (:nombre, :apellidos, :email, :password)');
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':apellidos', $apellidos);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->execute();

                $_SESSION['success'] = 'Usuario registrado correctamente.';
                header('<?BASE_URL;?>');
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = 'Error al registrar el usuario: ' . $e->getMessage();
                header('');
                exit();
            }
        }
    }
}
?>