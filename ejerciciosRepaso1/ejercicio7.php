<html>
    <body>
        <?php
            /*$array = [];

            for ($i=0; $i < 6; $i++) { 
                for ($j=0; $j < 9; $j++) { 
                    do {
                       $temp= rand(100,999);

                    } while (in_array($temp,$array));
                    max: $array[$i][$j]= $temp;
                    echo " ". $array[$i][$j];
                  
                }
                echo "<br>";
            }*/

           // Crear un array con todos los números entre 100 y 999
            $numeros = range(100, 999);

            // Barajar el array para que los números estén en un orden aleatorio
            shuffle($numeros);

            // Inicializar el array bidimensional de 6x9
            $array = [];
            $contador = 0;

            // Llenar el array bidimensional con números aleatorios sin repetirse
            for ($i = 0; $i < 6; $i++) {
                for ($j = 0; $j < 9; $j++) {
                    // Asignar un número único del array barajado
                    $array[$i][$j] = $numeros[$contador];
                    $contador++;  // Aumentar el contador para asignar el siguiente número
                }
            }

            // Mostrar el contenido del array
            for ($i = 0; $i < 6; $i++) {
                for ($j = 0; $j < 9; $j++) {
                    echo $array[$i][$j] . " ";  // Imprimir el número
                }
                echo "<br>";  // Salto de línea al final de cada fila
            }

            // Encontrar el valor mínimo en el array
            $minimo = min(array_merge(...$array));

            // Mostrar el contenido del array con colores
            echo "<table border='1' style='border-collapse: collapse;'>";

            for ($i = 0; $i < 6; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 9; $j++) {
                    // Establecer el color del texto
                    $color = "black"; // Color predeterminado

                    // Si el número es el mínimo, hacerlo azul
                    if ($array[$i][$j] == $minimo) {
                        $color = "blue";
                    }
                    // Si el número está en alguna de las dos diagonales que pasan por el mínimo, hacerlo verde
                    elseif ($i == $j || $i + $j == 5) {
                        $color = "green";
                    }

                    // Mostrar el número con el color correspondiente
                    echo "<td style='color: $color; padding: 10px; text-align: center;'>{$array[$i][$j]}</td>";
                }
                echo "</tr>";
            }

echo "</table>";
        


            

        ?>
    </body>
</html>