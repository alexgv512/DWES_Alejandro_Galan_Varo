<html>
    <body>
        <?php
        // Función para calcular el factorial con manejo de excepción para números negativos
        function factorial($num) {
            // Lanza una excepción si el número es negativo
            if ($num < 0) {
                throw new InvalidArgumentException("El número no puede ser negativo.");
            }

            // Caso base para la recursión
            if ($num <= 1) {
                return 1;
            } else {
                return $num * factorial($num - 1);
            }
        }

        try {
            // Prueba con el número 9
            echo factorial(9);
        } catch (InvalidArgumentException $e) {
            // Captura la excepción y muestra el mensaje
            echo "Error: " . $e->getMessage();
        }
        ?>
    </body>
</html> 