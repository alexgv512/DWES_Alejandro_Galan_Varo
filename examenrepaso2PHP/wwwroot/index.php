<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="index.php"> formulario autoprocesado. Se llama en action a él mismo 
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required ><br><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>

    <?php
        include 'datos.php';
        if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['usuario']) && isset($_GET['contraseña'])){//pasamos todos los campos del formulario
            $usuario = $_GET['usuario'];
            $contraseña = $_GET['contraseña'];

            //controlamos errores
            try {
               // Comrpuebo que el usuario y la contraseña están en la base de datos
                if (login($usuario, $contraseña)) {
                    escribeUsuario($usuario);
                    escribePrestamos($usuario);
                } else {
                    echo "Error: Usuario o contraseña incorrectos.";
                }
            } catch (Exception $e) {
                $e->getMessage();
            }
        }
           
    ?>
</body>
</html>