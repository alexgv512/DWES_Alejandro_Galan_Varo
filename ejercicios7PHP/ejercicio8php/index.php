<?php
session_start();

// Autenticación del usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] === 'alex' && $_POST['password'] === '1234') {
        session_regenerate_id(true);
        $_SESSION['user'] = $_POST['username'];
        $_SESSION['last_activity'] = time();
        echo "<p>Bienvenido, {$_SESSION['user']}.</p>";
    } else {
        echo "<p>Credenciales incorrectas.</p>";
    }
}

// Expirar sesión tras 5 minutos de inactividad
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
    session_destroy();
    session_unset();
    echo "<p>Sesión expirada.</p>";
}

// Cierre de sesión manual
if (isset($_GET['logout'])) {
    session_destroy();
    session_unset();
    echo "<p>Sesión cerrada.</p>";
}

$_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Sesiones</title>
</head>
<body>
    <?php if (!isset($_SESSION['user'])): ?>
        <form method="POST">
            <label>Usuario:</label>
            <input type="text" name="username" required>
            <label>Contraseña:</label>
            <input type="password" name="password" required>
            <button type="submit">Iniciar sesión</button>
        </form>
    <?php else: ?>
        <p>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']); ?>.</p>
        <a href="?logout=true">Cerrar sesión</a>
    <?php endif; ?>
</body>
</html>
