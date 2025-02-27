<?php

    namespace lib;

    use PDO;
    use PDOException;

    class BaseDeDatos  {
        private $pdo;
        
        public function __construct($host, $dbname, $usuario, $contraseña) {
            try {
                $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $contraseña);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Error al conectar a la base de datos: ' . $e->getMessage());
            }
        }
    
        public function getConexion() {
            return $this->pdo;
        }

        public function prepare($sql) {
            return $this->pdo->prepare($sql);
        }
    }
?>