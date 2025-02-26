<html>
    <body>
        <?php
        //Enunciado: Tienes un array de frutas en desorden y tu tarea es ordenarlas alfabéticamente usando la función sort(). 
        //Después de ordenar el array, debes eliminar un elemento específico, por ejemplo, "naranja", utilizando la función unset(). 
        //Finalmente, muestra el array resultante después de realizar ambas operaciones.

        //Ejemplo: El array contiene las frutas [manzana, naranja, plátano, pera]. 
        //Primero debes ordenarlas y luego eliminar "naranja".

        $arrayfruticas = ["manzana", "naranja", "plátano", "pera"];
        print_r($arrayfruticas);
        echo"<br>";
        sort($arrayfruticas);
        print_r($arrayfruticas);
        echo"<br>";
        unset($arrayfruticas[array_search("naranja", $arrayfruticas)]);
        print_r($arrayfruticas);
        echo"<br>";   
        ?>
    </body>
</html>