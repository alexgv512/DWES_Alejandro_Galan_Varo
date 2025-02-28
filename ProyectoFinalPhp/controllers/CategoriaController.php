<?php

    namespace controllers;
    
    use models\Categoria;
   

    class CategoriaController{
        public function index(): void{
            echo "<h1>Controlador Categoria, acción index</h1>";
        }
        
        public function administrar(): void{

            require_once "views/categoria/administrar.php";
        }
       
        public function crear(): void{
            require_once "views/categoria/crear.php";
        }

        public function guardar(): void {
            if (isset($_POST['nombre'])) {
                $nombre = trim($_POST['nombre']);
                if ($this->validarNombre($nombre)) {
                    $categoria = new Categoria();
                    $categoria->setNombre($nombre);
                    $categoria->save();
                    header("Location: " . BASE_URL . "categoria/administrar");
                    exit();
                } else {
                    echo "<p>Error: El nombre de la categoría no es válido.</p>";
                    require_once "views/categoria/crear.php";
                }
            } else {
                echo "<p>Error: El nombre de la categoría es obligatorio.</p>";
                require_once "views/categoria/crear.php";
            }
        }

        public function mostrar(): void {
            $categorias = Categoria::getAll();
            require_once "views/categoria/index.php";
        }
    
        private function validarNombre($nombre): bool {
            return !empty($nombre) && strlen($nombre) >= 3 && strlen($nombre) <= 50;
        }
    }

?>