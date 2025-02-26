<html>
    <body>
        <?php
            function calcularPotencia($base, $exponente = 2) {
                return pow($base, $exponente);
            }

            echo calcularPotencia(5); 
            echo "<br>" ;       
            echo calcularPotencia(3, 3);      
        ?>
    </body>
</html>
<html>
    <body>
    <form method="POST" action="">
            <label for="base">Base:</label>
            <input type="number" name="base" id="base" required><br><br>

            <label for="exponente">Exponente:</label>
            <input type="number" name="exponente" id="exponente" required><br><br>

            <input type="submit" value="Calcular Potencia">
        </form>
        <?php
            function calcularPotencia2($base, $exponente = 2) {
                return pow($base, $exponente);
            }

            if (isset($_POST['base']) && isset($_POST['exponente'])) {
                // Convertimos los parámetros a números
                $base = $_POST['base'];
                $exponente = $_POST['exponente'];
            
                // Verificamos que los valores sean números válidos
                if ($base !== false && $exponente !== false) {
                    
                    $resultado = calcularPotencia2($base, $exponente);
                    echo "El resultado de la operación es: $resultado";
                } else {
                    echo "Error: Los valores proporcionados no son números válidos.";
                }
            }
           
        ?>
    </body>
</html>

