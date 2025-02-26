<html>
    <body>
        <?php
            //Imagina que tienes un sistema de gestión de empleados donde cada empleado tiene un ID único, 
            //su nombre, y su salario. El array que gestiona esta información es un array asociativo donde la clave 
            //es el ID del empleado y el valor es otro array con su nombre y salario. 
            //Deberás implementar las siguientes funcionalidades:

            $empleados = [
                101 => ["nombre" => "Juan", "salario" => 45000],
                102 => ["nombre" => "Ana", "salario" => 55000],
                103 => ["nombre" => "Luis", "salario" => 50000],
                104 => ["nombre" => "Marta", "salario" => 60000],

            ];
            print_r($empleados);
            echo "<br>";

                //Aumenta el salario de todos los empleados en un 10%, excepto aquellos que ya ganan más de 50,000. 
                //Utiliza array_map() para realizar la operación.


            function aumentarSalario($empleados) {
                if ($empleados["salario"] <= 50000) {
                    $empleados["salario"] *= 1.10;
                }
                return $empleados;
            }
            

            $empleados = array_map("aumentarSalario", $empleados);
            echo "<br>";

            print_r($empleados);

                //Asegúrate de que los IDs de los empleados estén en orden ascendente. 
                //Utiliza ksort() para ordenar el array por las claves (IDs).
            echo "<br> <br>";
            ksort($empleados);
            print_r($empleados);
            
            
                //Devuelve una lista de los tres empleados con los salarios más altos, 
                //usando arsort() para ordenar por salario de mayor a menor y luego array_slice() para obtener los primeros tres.
                echo "<br> <br>";
                arsort($empleados,SORT_REGULAR);

                $empleados3 = array_slice($empleados, 0,-1,true);
                
                print_r($empleados);
        ?>
    </body>
</html>