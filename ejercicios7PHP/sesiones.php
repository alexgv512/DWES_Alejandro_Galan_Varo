/*
establecer cuna cookie llamada visita con un mensaje de bienvenida.
crear una sesion  que cuente el numero de veces que el usuario visita la pagina.
y mostrar un mensaje como:

primera visita:bienvenido esta es tu primera vista.
visitas repetidas: bienvenido de nuevo, esta es tu visita numero x.
*/

<?php
// Iniciar sesión para manejar el conteo de visitas
session_start();

// Establecer una cookie "visita" si no existe
if (!isset($_COOKIE['visita'])) {
    setcookie("visita", "bienvenido", time() + (86400 * 30), "/"); // La cookie dura 30 días
}

// Verificar si es la primera visita
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 1;
    echo "<p>Primera visita: ¡Bienvenido! Esta es tu primera visita.</p>";
} else {
    $_SESSION['contador']++;
    $contador = $_SESSION['contador'];
    echo "<p>Visitas repetidas: ¡Bienvenido de nuevo! Esta es tu visita número $contador.</p>";
}
?>
