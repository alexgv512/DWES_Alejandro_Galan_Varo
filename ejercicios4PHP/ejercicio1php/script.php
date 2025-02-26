<html>
    <body>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $nombre = $_POST['nombre'] ?? '';
                $apellidos = $_POST['apellidos'] ?? '';
                $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
                $correo = $_POST['correo'] ?? '';
                $lenguajes = $_POST['lenguajes'] ?? [];
                $sabe_web = $_POST['sabe_web'] ?? '';
                $comentarios = $_POST['comentarios'] ?? '';
                $contrasena = $_POST['contrasena'] ?? '';
                $repite_contrasena = $_POST['repite_contrasena'] ?? '';
        
                
                echo "<p>Nombre: $nombre</p>";
                echo "<p>Apellidos: $apellidos</p>";
                echo "<p>Fecha de Nacimiento: $fecha_nacimiento</p>";
                echo "<p>Correo Electrónico: $correo</p>";
                echo "<p>Lenguajes de Programación Conocidos:" . implode(', ', $lenguajes) . "</p>";
                echo "<p>Sabe crear páginas web estáticas?: $sabe_web</p>";
                echo "<p>Comentarios: $comentarios</p>";

            } else {
                echo "<p>No se ha enviado ningún dato.</p>";
            }
            
        ?>
    </body>
</html>