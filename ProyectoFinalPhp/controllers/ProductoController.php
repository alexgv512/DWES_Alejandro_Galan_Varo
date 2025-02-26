<?php

    namespace controllers;

    class ProductoController{

        public function index(): void{
            echo "<h1>Controlador Producto, acción index</h1>";
        }

        public function recomendados(): void{
            require_once "views/producto/recomendados.php";
        }
        
    }

?>