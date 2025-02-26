<html>
    <body>
        <?php
             // Radio de la esfera
            $radio = 5;

            // Constante de pi
            $pi = pi();

            // Cálculos
            $longitud = 2 * $pi * $radio; // Longitud de la circunferencia
            $superficie = 4 * $pi * pow($radio, 2); // Superficie de la esfera
            $volumen = (4/3) * $pi * pow($radio, 3); // Volumen de la esfera

            // Mostrar resultados usando round()
            echo "Usando round():<br>";
            echo "Longitud: " . round($longitud, 2) . "<br>";
            echo "Superficie: " . round($superficie, 2) . "<br>";
            echo "Volumen: " . round($volumen, 2) . "<br><br>";

            // Mostrar resultados usando printf()
            echo "Usando printf():<br>";
            printf("Longitud: %.2f<br>", $longitud);
            printf("Superficie: %.2f<br>", $superficie);
            printf("Volumen: %.2f<br>", $volumen);
            ?>

        
        ?>
    </body>
</html>