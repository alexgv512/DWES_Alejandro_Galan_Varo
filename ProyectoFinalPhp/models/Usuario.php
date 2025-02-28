<?php

    namespace models;

    use lib\BaseDatos;
    
    class Usuario {
        private $nombre;
        private $apellidos;
        private $email;
        private $password;
    
        public function __construct() {
        }
    
        public function getNombre() {
            return $this->nombre;
        }
    
        public function getApellidos() {
            return $this->apellidos;
        }
    
        public function getEmail() {
            return $this->email;
        }
    
        public function getPassword() {
            return $this->password;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setApellidos($apellidos) {
            $this->apellidos = $apellidos;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function save() {
            $bd = new BaseDatos();
            $conexion = $bd->getConexion();
            $sql = "INSERT INTO usuarios (nombre, apellidos, email, password) VALUES (:nombre, :apellidos, :email, :password)";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':nombre', $this->nombre);
            $sentencia->bindParam(':apellidos', $this->apellidos);
            $sentencia->bindParam(':email', $this->email);
            $sentencia->bindParam(':password', $this->password);
            $sentencia->execute();
        }

        
    }

?>