<?php
    // Base de datos (debería ser reemplazado por el $_ENV)
    $dsn = 'mysql:host=localhost;dbname=tienda';
    $username = 'root';
    $password = '';

    // Controlador y acción por defecto

    define('CONTROLLER_DEFAULT', 'Producto');
    define('ACTION_DEFAULT', 'recomendados');

    // Rutas

    define('BASE_URL', 'http://localhost/DWES2/ProyectoFinalPhp/');

?>