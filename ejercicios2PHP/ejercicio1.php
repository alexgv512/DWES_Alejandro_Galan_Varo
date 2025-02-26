<html>
    <body>
        <?php
        //Escribe una función para calcular el factorial de un número que recibirá como argumento. 
        //Prueba a hacerlo usando recursividad.
        function factorial($num) {
            if ($num <= 1) {
                return 1; 
            } else {
                return $num * factorial($num-1);
            }
        }
        echo factorial(num: 9);
        ?>
    </body>
</html>