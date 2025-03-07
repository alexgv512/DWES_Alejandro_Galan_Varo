<?php
// index.php

// Incluyo el archivo de configuración
require_once 'config/config.php';

//Incluyo el autoloader
require_once 'lib/autoloader.php';

// Incluyo la cabecera de la página
require_once __DIR__ . '/views/partials/header.php';

use controllers\PacienteController;

$pacienteController = new PacienteController();
$pacienteController->mostrarTodos();

use controllers\DoctorController;

$doctorController = new DoctorController();
$doctorController ->mostrarTodos();

// Incluyo el footer de la página
require_once __DIR__ . '/views/partials/footer.php';

