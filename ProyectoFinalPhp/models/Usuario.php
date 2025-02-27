<?php

    namespace models;

    use lib\BaseDatos;
    

    class Usuario {
        private $nombre;
        private $apellidos;
        private $email;
        private $password;
    
        public function __construct($nombre, $apellidos, $email, $password) {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->email = $email;
            $this->password = $password;
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
    }

?>