<html>
    <body>
        <?php
            $valor1 = 10;
            function operacion_uno($valor2) {
                global $valor1;
                return $valor1 + $valor2;        
            }
            
            function operacion_dos($valor2) {
                global $valor1;
                return $valor1 - $valor2;        
            }

            $numero= "uno";
            $op = "operacion_".$numero;
            echo "<br> Ahora sumo dos números usando Funciones variables: " . $op(5); //Imprime 15
            
            $op = "";
            $numero= "dos";
            $op = "operacion_".$numero;
            echo "<br> Ahora resto dos números usando Funciones variables: " . $op(2); //Imprime 8 
        
        ?>
    </body>
</html>


<html>
    <body>
        <?php
            $operacion_uno = fn($valor2) => $valor1 + $valor2;
            $operacion_dos = fn($valor2) => $valor1 - $valor2;

            $numero = "uno";
            $op = "operacion_".$numero;
            echo "<br> Ahora sumo dos números usando Funciones variables: " . $$op(2); // Imprime 12
            
            $op = "";
            $numero = "dos";
            $op = "operacion_".$numero;
            echo "<br> Ahora resto dos números usando Funciones variables: " . $$op(2); // Imprime 8
        ?>
    </body>
</html>