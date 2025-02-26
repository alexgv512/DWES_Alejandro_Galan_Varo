<?php
// controllers/PacienteController.php

namespace controllers;

use models\Paciente;

class PacienteController {
    private $paciente;

    public function __construct() {
        $this->paciente = new Paciente();
    }

    public function mostrarTodos() {
        $todos_mis_pacientes = $this->paciente->getAll();
        require_once __DIR__ . '/../views/Paciente/mostrar_todos.php';
    }
}