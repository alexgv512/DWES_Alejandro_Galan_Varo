<?php

    namespace controllers;

    use models\Producto;

    class ProductoController{

        public function index(): void{
            echo "<h1>Controlador Producto, acción index</h1>";
        }

        public function recomendados(): void{
            require_once "views/producto/recomendados.php";
        }

        public function gestion(): void {
            $producto = new Producto();
            $productos = $producto->getAll();
            require_once "views/producto/gestion.php";
        }

        public function crear(): void {
            require_once "views/producto/crear.php";
        }

        public function guardar(): void {
            // Validar campos requeridos
            if (empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['precio']) || 
                empty($_POST['categoria_id']) || empty($_POST['stock']) || empty($_FILES['imagen']['name'])) {
                $_SESSION['mensaje'] = "Todos los campos son obligatorios";
                header("Location: " . BASE_URL . "producto/crear");
                return;
            }
        
            // Validar que el precio y el stock sean números positivos
            if (!is_numeric($_POST['precio']) || $_POST['precio'] <= 0) {
                $_SESSION['mensaje'] = "El precio debe ser un número positivo";
                header("Location: " . BASE_URL . "producto/crear");
                return;
            }
        
            if (!is_numeric($_POST['stock']) || $_POST['stock'] < 0) {
                $_SESSION['mensaje'] = "El stock debe ser un número no negativo";
                header("Location: " . BASE_URL . "producto/crear");
                return;
            }
        
            // Si todas las validaciones pasan, guardar el producto
            $data = [
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion'],
                'precio' => $_POST['precio'],
                'categoria_id' => $_POST['categoria_id'],
                'stock' => $_POST['stock'],
                'oferta' => $_POST['oferta'],
                'imagen' => $_FILES['imagen']['name']
            ];
        
            $producto = new Producto();
            if ($producto->save($data)) {
                $_SESSION['mensaje'] = "Producto creado correctamente";
            } else {
                $_SESSION['mensaje'] = "Error al crear el producto";
            }
        
            header("Location: " . BASE_URL . "producto/gestion");
        }

        public function eliminar(): void {
            if (empty($_GET['id'])) {
                $_SESSION['mensaje'] = "ID de producto no válido";
                header("Location: " . BASE_URL . "producto/gestion");
                return;
            }
        
            $producto = new Producto();
            if ($producto->delete($_GET['id'])) {
                $_SESSION['mensaje'] = "Producto eliminado correctamente";
            } else {
                $_SESSION['mensaje'] = "Error al eliminar el producto";
            }
        
            header("Location: " . BASE_URL . "producto/gestion");
        }

        public function editar(): void {
            if (empty($_GET['id'])) {
                $_SESSION['mensaje'] = "ID de producto no válido";
                header("Location: " . BASE_URL . "producto/gestion");
                return;
            }
        
            $producto = new Producto();
            $producto = $producto->getById($_GET['id']);
            require_once "views/producto/editar.php";
        }

        public function actualizar(): void {
            if (empty($_POST['id']) || empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['precio']) || 
                empty($_POST['categoria_id']) || empty($_POST['stock'])) {
                $_SESSION['mensaje'] = "Todos los campos son obligatorios";
                header("Location: " . BASE_URL . "producto/editar&id=" . $_POST['id']);
                return;
            }
        
            if (!is_numeric($_POST['precio']) || $_POST['precio'] <= 0) {
                $_SESSION['mensaje'] = "El precio debe ser un número positivo";
                header("Location: " . BASE_URL . "producto/editar&id=" . $_POST['id']);
                return;
            }
        
            if (!is_numeric($_POST['stock']) || $_POST['stock'] < 0) {
                $_SESSION['mensaje'] = "El stock debe ser un número no negativo";
                header("Location: " . BASE_URL . "producto/editar&id=" . $_POST['id']);
                return;
            }
        
            // Handle image upload
            $imagen = $_FILES['imagen']['name'];
            if ($imagen) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($imagen);
                move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file);
            } else {
                $imagen = $_POST['imagen_actual'];
            }

            $data = [
                'id' => $_POST['id'],
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion'],
                'precio' => $_POST['precio'],
                'categoria_id' => $_POST['categoria_id'],
                'stock' => $_POST['stock'],
                'oferta' => $_POST['oferta'],
                'imagen' => $imagen
            ];
        
            $producto = new Producto();
            if ($producto->update($data)) {
                $_SESSION['mensaje'] = "Producto actualizado correctamente";
            } else {
                $_SESSION['mensaje'] = "Error al actualizar el producto";
            }
        
            header("Location: " . BASE_URL . "producto/gestion");
        }

    
    }

?>