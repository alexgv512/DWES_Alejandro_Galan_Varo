<?php
// Inicializar variables
$errores = [];
$resultado = null;

// Procesar el formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Validar nombre
        $nombre = $_POST['nombre'] ?? '';
        if (empty($nombre)) {
            throw new Exception("El nombre es obligatorio.");
        }
        
        // Validar correo
        $correo = $_POST['correo'] ?? '';
        if (empty($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Debes ingresar un correo válido.");
        }
        
        // Validar edad
        $edad = $_POST['edad'] ?? '';
        if (empty($edad) || !filter_var($edad, FILTER_VALIDATE_INT) || $edad <= 0) {
            throw new Exception("La edad debe ser un número positivo.");
        }

        // Si todo está bien, procesar los datos
        $datosFormulario = [
            'nombre' => htmlspecialchars($nombre),
            'correo' => htmlspecialchars($correo),
            'edad' => htmlspecialchars($edad)
        ];

        $resultado = "Formulario enviado correctamente. Aquí están los datos:";
    } catch (Exception $e) {
        $errores[] = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Auto-Procesado</title>
    <style>
        .error { color: red; font-size: 0.9em; }
        .success { color: green; font-size: 1em; }
        .form-container { max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Formulario Auto-Procesado</h1>
        <form method="POST">
            // Campo: Nombre 
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= $_POST['nombre'] ?? '' ?>" required>
            <?php if (in_array("El nombre es obligatorio.", $errores)): ?>
                <span class="error">El nombre es obligatorio.</span>
            <?php endif; ?>
            <br><br>

            //Campo: Correo
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="<?= $_POST['correo'] ?? '' ?>" required>
            <?php if (in_array("Debes ingresar un correo válido.", $errores)): ?>
                <span class="error">Debes ingresar un correo válido.</span>
            <?php endif; ?>
            <br><br>

             //Campo: Edad 
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" value="<?= $_POST['edad'] ?? '' ?>" required>
            <?php if (in_array("La edad debe ser un número positivo.", $errores)): ?>
                <span class="error">La edad debe ser un número positivo.</span>
            <?php endif; ?>
            <br><br>

            <button type="submit">Enviar</button>
        </form>

        <br>
        // Mostrar resultados 
        <?php if ($resultado): ?>
            <p class="success"><?= $resultado ?></p>
            <ul>
                <?php foreach ($datosFormulario as $clave => $valor): ?>
                    <li><strong><?= ucfirst($clave) ?>:</strong> <?= $valor ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        // Mostrar errores generales 
        <?php if (!empty($errores)): ?>
            <div class="error">
                <p>Se encontraron los siguientes errores:</p>
                <ul>
                    <?php foreach ($errores as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>