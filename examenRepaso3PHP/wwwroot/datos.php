<?php
$Usuarios = [
    "Alonso" => ["contraseña" => "1234", "nombre" => "Alonso", "apellido1" => "Hernandez", "apellido2" => "Robles", "correo" => "alonso@gmail.com", "fechaReg" => "13-12-2023"],
    "Juan" => ["contraseña" => "1234", "nombre" => "Juan", "apellido1" => "Garcia", "apellido2" => "Rosales", "correo" => "juan@gmail.com", "fechaReg" => "12-11-2024"],
    "Ana" => ["contraseña" => "1234", "nombre" => "Ana", "apellido1" => "Quero", "apellido2" => "De la rosa", "correo" => "ana@gmail.com", "fechaReg" => "14-11-2004"],
    "Sara" => ["contraseña" => "1234", "nombre" => "Sara", "apellido1" => "Garzon", "apellido2" => "Galdeano", "correo" => "sara@gmail.com", "fechaReg" => "23-9-2014"]
];

$reservas = [
    "RES-00001" => ["sala" => "001", "usuario" => "Alonso", "fechaIni" => "12-01-2024", "fechaFin" => "14-01-2024", "comentarios" => "No veah que guapo"],
    "RES-00002" => ["sala" => "002", "usuario" => "Juan", "fechaIni" => "16-11-2024", "fechaFin" => "18-11-2024", "comentarios" => "Goooooolllllllll de iniesta"],
    "RES-00003" => ["sala" => "002", "usuario" => "Ana", "fechaIni" => "17-06-2018", "fechaFin" => "17-06-2018", "comentarios" => "AlejandroPuto calvo"],
    "RES-00004" => ["sala" => "003", "usuario" => "Sara", "fechaIni" => "03-05-2020", "fechaFin" => "05-05-2020", "comentarios" => "SASASASASASSSASASSA"]
];

// Validación de correos
foreach ($usuarios as $usuario) {
    if (!filter_var($usuario["correo"], FILTER_VALIDATE_EMAIL)) {
        throw new Exception("ERROR DEL SISTEMA: El correo electrónico no es válido.");
    }
}

// Validación de comentarios
foreach ($reservas as $reserva) {
    if (!preg_match("/^[a-zA-Z0-9\s]+$/", $reserva["comentarios"])) {
        throw new Exception("ERROR DEL SISTEMA: El comentario contiene caracteres no permitidos.");
    }
}

function login($usu, $pw) {
    global $usuarios;
    if (empty($pw)) {
        throw new Exception("ERROR DEL SISTEMA: La contraseña no puede estar vacía.");
    }
    return isset($usuarios[$usu]) && $usuarios[$usu]["contraseña"] === $pw;
}

// Función escribeUsuario
function escribeUsuario($usu) {
    global $usuarios;
    if (!isset($usuarios[$usu])) {
        throw new Exception("ERROR DEL SISTEMA: El usuario no existe.");
    }
    $usuario = $usuarios[$usu];
    echo "{$usuario['apellido1']} {$usuario['apellido2']}, {$usuario['nombre']} (Correo: {$usuario['correo']})<br>";
    echo "Registrado desde el " . date("d-m-Y", strtotime($usuario["fechaReg"])) . "<br>";
}

// Función escribeReservas
function escribeReservas($usu) {
    global $usuarios, $reservas;
    if (!isset($usuarios[$usu])) {
        throw new Exception("ERROR DEL SISTEMA: El usuario no existe.");
    }
    echo "Reservas realizadas por {$usuarios[$usu]['nombre']}<br>";
    echo "<table border='1'>
        <tr>
            <th>ID Reserva</th>
            <th>Sala</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Fin</th>
            <th>Comentarios</th>
        </tr>";
    foreach ($reservas as $id => $reserva) {
        if ($reserva["usuario"] === $usu) {
            echo "<tr>
                <td>{$id}</td>
                <td>{$reserva['sala']}</td>
                <td>{$reserva['fechaIni']}</td>
                <td>{$reserva['fechaFin']}</td>
                <td>{$reserva['comentarios']}</td>
            </tr>";
        }
    }
    echo "</table>";
}

// Función para agregar un nuevo usuario
function agregarUsuario($usuario, $contraseña, $nombre, $apellido1, $apellido2, $correo, $fechaReg) {
    global $usuarios;
    
    if (isset($usuarios[$usuario])) {
        throw new Exception("ERROR DEL SISTEMA: El usuario ya existe.");
    }
    
    // Validación del correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("ERROR DEL SISTEMA: El correo electrónico no es válido.");
    }
    
    // Validación del nombre de usuario
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $usuario)) {
        throw new Exception("ERROR: El nombre de usuario contiene caracteres no permitidos.");
    }

    // Agregar el usuario
    $usuarios[$usuario] = [
        "contraseña" => $contraseña,
        "nombre" => $nombre,
        "apellido1" => $apellido1,
        "apellido2" => $apellido2,
        "correo" => $correo,
        "fechaReg" => $fechaReg
    ];

    echo "Usuario {$usuario} agregado correctamente.<br>";
}

// Función para eliminar un usuario
function eliminarUsuario($usuario) {
    global $usuarios;
    
    if (!isset($usuarios[$usuario])) {
        throw new Exception("ERROR DEL SISTEMA: El usuario no existe.");
    }

    unset($usuarios[$usuario]);
    echo "Usuario {$usuario} eliminado correctamente.<br>";
}

// Función para agregar una nueva reserva
function agregarReserva($idReserva, $sala, $usuario, $fechaIni, $fechaFin, $comentarios) {
    global $reservas;
    
    if (isset($reservas[$idReserva])) {
        throw new Exception("ERROR DEL SISTEMA: La reserva con el ID {$idReserva} ya existe.");
    }

    // Validación de comentarios
    if (!preg_match("/^[a-zA-Z0-9\s]+$/", $comentarios)) {
        throw new Exception("ERROR DEL SISTEMA: El comentario contiene caracteres no permitidos.");
    }

    // Agregar la reserva
    $reservas[$idReserva] = [
        "sala" => $sala,
        "usuario" => $usuario,
        "fechaIni" => $fechaIni,
        "fechaFin" => $fechaFin,
        "comentarios" => $comentarios
    ];

    echo "Reserva con ID {$idReserva} agregada correctamente.<br>";
}

// Función para eliminar una reserva
function eliminarReserva($idReserva) {
    global $reservas;
    
    if (!isset($reservas[$idReserva])) {
        throw new Exception("ERROR DEL SISTEMA: La reserva con el ID {$idReserva} no existe.");
    }

    unset($reservas[$idReserva]);
    echo "Reserva con ID {$idReserva} eliminada correctamente.<br>";
}

// Función para listar todos los usuarios
function listarUsuarios() {
    global $usuarios;
    
    if (empty($usuarios)) {
        throw new Exception("ERROR DEL SISTEMA: No hay usuarios registrados.");
    }
    
    echo "Lista de usuarios:<br>";
    echo "<table border='1'>
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Fecha de Registro</th>
            </tr>";

    foreach ($usuarios as $usuario => $datos) {
        echo "<tr>
                <td>{$usuario}</td>
                <td>{$datos['nombre']} {$datos['apellido1']} {$datos['apellido2']}</td>
                <td>{$datos['correo']}</td>
                <td>{$datos['fechaReg']}</td>
              </tr>";
    }

    echo "</table>";
}

?>