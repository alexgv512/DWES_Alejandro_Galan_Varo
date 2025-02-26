<html>
    <body>
        <?php
              $notas = [
                "Matematicas" => [3, 10, 7, 6.7],
                "Lengua" => [8, 5, 3, 5.3],
                "Fisica" => [7, 2, 1, 3.3],
                "Latin" => [4, 7, 8, 6.3],
                "Ingles" => [6, 2, 3, 3.7]
            ];

            function  nota_media($notas){
                //sumamos todas las notas del array
                $suma_notas = array_sum($notas);
                //calculamos el nuemro de asignatuas que hay
                $numasig = 5;
                if ($numasig > 0) {
                    return $suma_notas / $numasig; 
                } else {
                    return 0; 
                }
            }/// hacer bien q eres tonto
        ?>
    </body>
</html>