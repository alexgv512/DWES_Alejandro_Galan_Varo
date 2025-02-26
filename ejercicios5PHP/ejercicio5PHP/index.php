<html>
    <body>
        <?php

            // 1. Crear un fichero de texto con varias líneas
            $filename = "archivo.txt";
            $handle = fopen($filename, "w"); // Abrir el archivo en modo escritura
            if ($handle) {
                fwrite($handle, "Primera línea del texto\n");
                fwrite($handle, "Segunda línea del texto\n");
                fwrite($handle, "Tercera línea del texto\n");
                fclose($handle);
                echo "Archivo creado y cerrado con éxito.<br>";
            }

            // 2. Abrir el archivo en modo lectura y leer el contenido con fgets()
            $handle = fopen($filename, "r"); // Abrir el archivo en modo lectura
            if ($handle) {
                echo "Contenido del archivo:<br>";
                while (($line = fgets($handle)) !== false) {
                    echo htmlspecialchars($line) . "<br>"; // Mostrar cada línea
                }
                fclose($handle); // Cerrar el archivo después de leer
                echo "Archivo leído y cerrado.<br>";
            }

            // 3. Abrir el archivo en modo escritura para agregar nuevo contenido
            $handle = fopen($filename, "a"); // Modo 'a' agrega el contenido anterior
            if ($handle) {
                fwrite($handle, "PP PSOE LA MISMA MIERDA SON\n");
                fclose($handle); // Cerrar el archivo
                echo "Nuevo contenido escrito y archivo cerrado.<br>";
            }

            // 4. Copiar el archivo de texto con otro nombre
            $copiedFilename = "archivosalida.txt";
            if (copy($filename, $copiedFilename)) {
                echo "Archivo copiado a '$copiedFilename'.<br>";
            } else {
                echo "Error al copiar el archivo.<br>";
            }

            // 5. Renombrar el archivo original
            $newFilename = "archivosalida.txt";
            if (rename($filename, $newFilename)) {
                echo "Archivo renombrado a '$newFilename'.<br>";
            } else {
                echo "Error al renombrar el archivo.<br>";
            }

            // 6. Eliminar el archivo renombrado
            if (unlink($newFilename)) {
                echo "Archivo '$newFilename' eliminado.<br>";
            } else {
                echo "Error al eliminar el archivo '$newFilename'.<br>";
            }
        ?>
    </body>
</html>