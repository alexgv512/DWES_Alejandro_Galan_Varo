<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include 'datos.php';

        $error = "";
        $usuarioLogueado = null;

        if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["usuario"], $_GET["password"])) {
            $usuario = $_GET["usuario"];
            $password = $_GET["password"];

            // Validación del nombre de usuario
            if (!preg_match("/^[a-zA-Z0-9_]+$/", $usuario)) {
                $error = "ERROR: El nombre de usuario contiene caracteres no permitidos.";
            } else {
                try {
                    if (login($usuario, $password)) {
                        $usuarioLogueado = $usuario;
                    } else {
                        $error = "ERROR: Usuario o contraseña incorrectos.";
                    }
                } catch (Exception $e) {
                    $error = $e->getMessage();
                }
            }
        }
        

    ?>
      <style>
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>

<?php
    if ($usuarioLogueado) {
        echo "<h1>Bienvenido</h1>";
        try {
            escribeUsuario($usuarioLogueado);
            echo "<br>";
            escribeReservas($usuarioLogueado);
            agregarUsuario("Pedro", "abcd1234", "Pedro", "Lopez", "Sanchez", "pedro@correo.com", "2024-01-01");
            eliminarUsuario("Juan");
            agregarReserva("RES-00005", "Sala 4", "Ana", "2024-12-01", "2024-12-02", "Reunion de estrategia");
            eliminarReserva("RES-00003");
            listarUsuarios();

        } catch (Exception $e) {
            echo "<p class='error'>{$e->getMessage()}</p>";
        }
    } else {
        echo "<h1>Iniciar Sesión</h1>";
    ?>
        <form method="GET" action="index.php">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" required><br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required><br>
            <button type="submit">Entrar</button>
        </form>
    <?php
        if ($error) {
            echo "<span class='error'>{$error}</span>";
        }
    }
    ?>
</body>
</html>