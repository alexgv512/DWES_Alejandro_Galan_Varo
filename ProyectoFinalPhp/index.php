<?php

session_start();

// Importar controlador de errores
use controllers\ErrorController;
use controllers\CategoriaController;

// Autoload, Configuración y Clase Utils
require_once 'autoload.php';
require_once 'config.php';
require_once 'helpers/Utils.php';
// Requiero el header
require_once 'views/layout/header.php';

// Crear una instancia de la conexión a la base de datos
$db = new PDO('mysql:host=localhost;dbname=tienda', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db = new PDO('mysql:host=localhost;dbname=tienda', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Cargar categorías en la sesión
$categoriaController = new CategoriaController();
$categoriaController->cargarCategorias();


// 1. Si existe el controlador en la URL, se ejecuta ese
// 2. Si no existe el controlador en la URL, ejecutamos el controlador por defecto
// 3. Si el controlador no existe, mostramos un error

if (isset($_GET['controller'])) {
    $nombre_controlador = 'controllers\\' . $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controlador = 'controllers\\' . CONTROLLER_DEFAULT . 'Controller';
} else {  // Realmente este else no es necesario, pero quizá lo hace más claro el código
    echo "Controlador no encontrado";
    (new ErrorController())->index();
    exit();
}

// Compruebo si existe la clase
if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador($db); // Pasar la conexión a la base de datos al constructor del controlador

    // 1. Si existe la acción en la URL, se ejecuta esa
    // 2. Si no existe la acción en la URL, ejecutamos la acción por defecto
    // 3. Si la acción no existe, mostramos un error

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = ACTION_DEFAULT;
        $controlador->$action_default();
    } else {
        echo "Acción no encontrada";
        (new ErrorController())->index();
    }
} else {
    echo "Controlador no encontrado";
    (new ErrorController())->index();
}

// Requiero el footer
require_once 'views/layout/footer.php';

?>