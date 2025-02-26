<html>
    <body>
        <form method="POST" action="">
            <label for="numero1">Número 1:</label>
            <input type="number" name="numero1" id="numero1" required><br><br>

            <label for="numero2">Número 2:</label>
            <input type="number" name="numero2" id="numero2" required><br><br>

            <input type="submit" value="Calcular MCD">
    </form>
        <?php
            function calcularMCD($a, $b) {
                while ($b != 0) {
                    $temp = $a % $b;
                    $a = $b;
                    $b = $temp;
                }
                return $a;
            }
            
            // Programa para probar la función MCD
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $numero1 = $_POST['numero1'];
                $numero2 = $_POST['numero2'];
            
                // Llamamos a la función para calcular el MCD
                $mcd = calcularMCD($numero1, $numero2);
            
                // Mostramos el resultado
                echo "El Máximo Común Divisor de $numero1 y $numero2 es: $mcd";
            }
        
        ?>
    </body>
</html>