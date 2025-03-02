<?php

    namespace controllers;
    
    use models\Categoria;
    use models\Producto;
   

    class CategoriaController{
        public function index(): void{
            echo "<h1>Controlador Categoria, acción index</h1>";
        }
        
        public function administrar(): void {
            $categorias = Categoria::getAll();
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
                    if ($categoria->save()) {
                        $mensaje = "Categoría creada correctamente.";
                    } else {
                        $mensaje = "Error al crear la categoría.";
                    }
                    require_once "views/categoria/crear.php";
                } else {
                    $mensaje = "El nombre de la categoría no es válido.";
                    require_once "views/categoria/crear.php";
                }
            } else {
                $mensaje = "El nombre de la categoría es obligatorio.";
                require_once "views/categoria/crear.php";
            }
        }

        public function mostrar(): void {
            $categorias = Categoria::getAll();
            
            foreach ($categorias as $categoria) {
                echo "<p>" . htmlspecialchars($categoria->getNombre()) . "</p>";
            }
            require_once "views/categoria/administrar.php";
        }
        
        public function cargarCategorias(): void {
            $categorias = Categoria::getAll();
            $_SESSION['categorias'] = $categorias;
        }
        private function validarNombre($nombre): bool {
            return !empty($nombre) && strlen($nombre) >= 3 && strlen($nombre) <= 50;
        }

        public function productos(): void {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $producto = new Producto();
                $productos = $producto->getByCategory($id);
                require_once "views/categoria/productos.php";
            } else {
                $_SESSION['mensaje'] = "ID de categoría no válido";
                header("Location: " . BASE_URL);
            }
        }
    }

?>