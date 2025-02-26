<html>
    <body>
        <?php
        //////////////////funciones anonimas////////////////

            $multiplicador = function($a,$b){
                return $a * $b;
            };

            $numeros = range(1,10);
            $numeros2 = range(1,10);

            $lista = array_map($multiplicador,$numeros, $numeros2);
            echo implode(",", $lista);

        ?>
    </body>
</html>