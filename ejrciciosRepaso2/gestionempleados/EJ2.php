<html>
    <body>
        <?php
        // creamos el array de empleados

        $empleados=[
            101=>["nombre" => "Juan", "salario"=>45000],
            103=>["nombre" => "Ana", "salario"=>55000],
            102=>["nombre" => "Luis", "salario"=>50000],
            104=>["nombre" => "Marta", "salario"=>60000]
        ];

        print_r($empleados);
        echo "<br>";
        /*
        Aumenta el salario de todos los empleados en un 10%, excepto aquellos que ya ganan más de 50,000. Utiliza array_map() para realizar la operación.
        */
        $aumentarSalario= function ($empleados){
            if ($empleados["salario"]<=50000) {
                $empleados["salario"]*= 1.10;
            }
            return $empleados;
        };

        $empleados = array_map($aumentarSalario,$empleados);
        print_r($empleados);
        echo "<br>";

        /*
        Asegúrate de que los IDs de los empleados estén en orden ascendente. Utiliza ksort() para ordenar el array por las claves (IDs).
        */ 

        ksort($empleados);
        print_r($empleados);
        echo "<br>";

        

       // Ordenamos por salario de mayor a menor
        uasort($empleados, function ($a, $b) {// funcions de anuel AA
            return $b["salario"] <=> $a["salario"];
        });

        print_r($empleados);
        echo "<br>";
        /*
        Devuelve una lista de los tres empleados con los salarios más altos, usando arsort() para ordenar por salario de mayor a menor y luego array_slice() para obtener los primeros tres.
        */ 
        // Obtenemos los tres empleados con salarios más altos
        $topEmpleados = array_slice($empleados, 0, 3, true);
        print_r($topEmpleados);
        echo "<br>";
        
        ?>
    </body>
</html>