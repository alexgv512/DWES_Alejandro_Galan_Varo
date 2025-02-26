<?php
// controllers/PacienteController.php

namespace Controllers;

use Models\Paciente;

class DoctorController {
    private $Doctor;

    public function __construct() {
        $this->Doctor = new Paciente();
    }

    public function mostrarTodos() {
        $todos_mis_pacientes = $this->Doctor->getAll();
        require_once __DIR__ . '/../views/Doctor/mostrar_todos.php';
    }
}