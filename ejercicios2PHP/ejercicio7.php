<html>
    <body>
         <?php
            // Función para comprobar si un número es primo
            function esPrimo($numero) {
                // Los números menores o iguales a 1 no son primos
                if ($numero <= 1) {
                    return false;
                }
                // Verificamos divisores desde 2 hasta la raíz cuadrada del número
                for ($i = 2; $i <= sqrt($numero); $i++) {
                    if ($numero % $i == 0) {
                        return false; // Si es divisible por algún número, no es primo
                    }
                }
                return true; // Si no tiene divisores, es primo
            }

            // Programa para probar la función
            $numero = 3;

            if (esPrimo($numero)) {
                echo "$numero es un número primo.";
            } else {
                echo "$numero no es un número primo.";
            }
    ?>
    </body>
</html>