<?php

    namespace models;

    use lib\BaseDatos;
    
    class Usuario {
        private $nombre;
        private $apellidos;
        private $email;
        private $password;

        private $rol;
    
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

        public function getRol() {
            return $this->rol;
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

        public function setRol($rol) {
            $this->rol = $rol;
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

        public function delete() {
            $bd = new BaseDatos();
            $conexion = $bd->getConexion();
            $sql = "DELETE FROM usuarios WHERE id = :id";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':id', $id);
            $sentencia->execute();
        }

        public function update() {
            $bd = new BaseDatos();
            $conexion = $bd->getConexion();
            $sql = "UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, email = :email, password = :password, rol= :rol WHERE email = :email";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':nombre', $this->nombre);
            $sentencia->bindParam(':apellidos', $this->apellidos);
            $sentencia->bindParam(':email', $this->email);
            $sentencia->bindParam(':password', $this->password);
            $sentencia->bindParam(':rol', $this->rol);
            $sentencia->execute();
        }

        public static function getAll() {
            $bd = new BaseDatos();
            $conexion = $bd->getConexion();
            $sql = "SELECT * FROM usuarios";
            $sentencia = $conexion->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll();
        }

        public static function getById($id) {
            $bd = new BaseDatos();
            $conexion = $bd->getConexion();
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':id', $id);
            $sentencia->execute();
            return $sentencia->fetch();
        }

        
    }

?>