<html>
    <body>
        <?php
            $a = array("a" => "apple", "b" => "banana");
            $b = array("a" => "pear", "b" => "strawberry", "c" => "cherry");

            $c = $a + $b; // Union of $a and $b
            print_r($c);
            echo"<br>";
            var_dump($c);

            echo "<br>";// declaro de forma moderna los arrays
            $d = ["a" => "apple", "b" => "banana"];
            $e = ["a" => "pear", "b" => "strawberry", "c" => "cherry"];
           
            $c = $d + $e; //sumo los arrays e imprimo el resultado
            print_r($c);
            echo"<br>";
            var_dump($c);

            //imprimo valor de manzana
            echo "<br>";
            echo $d["a"];
        ?>
    </body>
</html>

<html>
    
    <body>
        
        <form method="post" action="">
            <label for="dia">¿Qué dia es hoy?: </label>
            <input type="text" id="dia" name="dia">
            <input type="submit" value="Enviar">
        </form>

        <?php
            $dia = null;
            if (isset($_POST['dia']) && !empty($_POST['dia'])) {
                $dia = (int)htmlspecialchars($_POST['dia']);
            }
            
            if ($dia !==null) {
                echo match ($dia) {
                    1 => "Hoy es lunes",
                    2 => "Hoy es martes",
                    3 => "Hoy es miércoles",
                    4 => "Hoy es jueves",
                    5 => "Hoy es viernes",
                    6 => "Hoy es sábado",
                    7 => "Hoy es domingo",
                    default => "Ese día de la semana no existe",
                };
            }
        ?>

        
    </body>
    
</html>

<html>
    <body>

        <form method="post" action="">
            <label for="num1">Dime un numero </label>
            <input type="number" id="num1" name="num1">
            <input type="submit" value="Enviar">
        </form>

        
        <?php
        /*Actividad 1: Pídele al usuario que introduzca un número entre 1 y 10.
         Si acierta el número salte del bucle usando la sentencia break. 
         Usa un formulario para coger el valor del número introducido por el usuario. */
            $numsecret = 7;
            $num1=null;
            if (isset($_POST['num1']) && !empty($_POST['num1'])) {
                $dia = (int)htmlspecialchars($_POST['num1']);
            }
            echo"<br>";
            echo"<br>";
            echo"<br>";
            echo"<br>";

            do {
                // Verificar si el número está dentro del rango permitido
                if ($num1 >= 1 && $num1 <= 10) {
                    if ($num1 == $numsecret) {
                        echo "¡Felicidades! Adivinaste el número correcto: $numsecret.";
                        break; // Romper el bucle si acierta
                    } else {
                        echo "Lo siento, $num1 no es el número correcto. Intenta de nuevo.";
                    }
                } else {
                    echo "Por favor, introduce un número entre 1 y 10.";
                    break;
                }
                // Si no acierta, esperar otra entrada
            } while ($num1 != $numsecret);
        
            
        
        
        ?>
    </body>
</html>

<html>
    <body>
        <?php
        /*Actividad 2: Pídele al usuario que imprima todos los números entre 1 y 30 omitiendo los divisibles por 3.
         En ese caso deberá saltarse la iteración usando la sentencia continue y continuar con el siguiente número.
          Usa un formulario para coger el valor del número introducido por el usuario.*/
        
        
        
        ?>
    </body>
</html>