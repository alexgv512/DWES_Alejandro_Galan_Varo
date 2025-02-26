<html>
    <body>

        <?php
        //enunciado: dado un array de numeros enteros, se debe verificar si un numero especifico esta presente en el array y ademas, contar cuantos elementos hay en dicho array.
        //Debes utilizar las funciones in_array() para realizar la busqueda y count() para contar el numero de elementos. 
        //el programa debe devolver si el numero exixte o no y la cantidad total de elementos.

            function estaenarray($array1, $num1) {
                
                $estaPresente = in_array($num1, $array1);

                $cantidadElementos = count($array1);
                echo "¿El número $num1 está presente? : " . ($estaPresente ? 'Sí' : 'No');
                echo"<br>";
                echo "Cantidad de elementos en el array: " . $cantidadElementos ;
            }

            $arrayNumeros = [1, 2, 3, 4, 5, 6, 7, 8, 9];
            $numeroEspecifico = 5;

            $resultado = estaenarray($arrayNumeros, $numeroEspecifico);
        ?>
    </body>
</html>