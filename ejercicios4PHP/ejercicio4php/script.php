<html>
    <body>
        <?php
            function ArrAlumnos() {
                return [
                    "Marta" => 7.8,
                    "Luis" => 5.0,
                    "Lorena" => 6.9,
                    "David" => 10
                ];
            } 

            //ordenamos el array y lo mostramos

            function mostrarAlumnos($alumnos){
                arsort($alumnos);

                foreach($alumnos as $nombre => $nota){
                    echo "$nombre -> $nota";
                    echo "<br>";
                }
            }
            // Función calcular media 
            function calcularMedia($alumnos) {
                return array_sum($alumnos) / count($alumnos);
            }
            // Función para agregar o actualizar un alumno
            function agregarAlumno(&$alumnos, $nombre, $nota) {
                if (array_key_exists($nombre, $alumnos)) {
                    echo "<p>El alumno '$nombre' ya existe. Su nota ha sido actualizada.</p>";
                } else {
                    echo "<p>El alumno '$nombre' ha sido añadido.</p>";
                }
                $alumnos[$nombre] = $nota;
            }


            //ceamos el array
            $alumnos = ArrAlumnos();

            // Mostrar el array inicial
            mostrarAlumnos($alumnos);

            //mostramos la media
             $media = calcularMedia($alumnos);
             echo "la media de los alumnos es : $media";

             // Manejar formulario para agregar alumnos
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST['nombre'];
                $nota = (float)$_POST['nota'];
                agregarAlumno($alumnos, $nombre, $nota);
                // Mostrar el array actualizado
                mostrarAlumnos($alumnos);
            }
        ?>
        <form method="post">
            <label for="nombre">Nombre del Alumno:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br>
            <label for="nota">Nota:</label>
            <input type="number" id="nota" name="nota" step="0.1" required>
            <br><br>
            <input type="submit" value="Añadir Alumno">
        </form>
    </body>
</html>