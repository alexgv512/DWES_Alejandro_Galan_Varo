<html>
    <body>
        <?php
        
            $valor1 = 10;
            $resta = fn($valor2) => $valor1 - $valor2;
            $multiplicacion = fn($valor2) => $valor1 * $valor2;

            echo "<br> El resultado de restar es " . $resta(3);
            echo "<br> El resultado de multiplicar es " . $multiplicacion(3);    
        
        ?>
    </body>
</html>