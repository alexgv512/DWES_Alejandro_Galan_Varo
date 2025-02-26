<html>
    <body>
        <?php
            //Crea un script que añada valores a un array mientras que su longitud sea menor que 120.
            //Después mostrará la información del array por pantalla

            $array = [];
           
            do {
                $contador = rand(1,50);
                array_push($array, $contador);
            }while ($contador < 120);

            
        ?>
    </body>
</html>