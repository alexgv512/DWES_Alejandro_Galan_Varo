<html>
    <body>
        <?php
            $animalitos = [];
            $numanimal =rand(20,30);
            for ($i = 0; $i < $numanimal ; $i++) {
                array_push($animalitos, "&#".rand(128000,128060));
            }
            
            foreach ($animalitos as $animal) {
                echo $animal ."";
            }
            echo"<br>";

            // mostramos un animal al hazar de los que hay en el array para eliminarlo
            echo"animal a eliminar";
            $kill = rand(0,$numanimal-1);
            echo $animalitos[$kill]. "<br><br>";
            $animala_eliminar = $animalitos[$kill];
            //unset($animalitos[$kill]);

            
            for ($i = 0; $i < $numanimal ; $i++){
                if ($animalitos[$i] == $animala_eliminar) {
                    unset($animalitos[$i]);
                }else{

                }
            }

            //mostramos el array sin el elemento
            foreach ($animalitos as $animal) {
                echo $animal ."";
            }

            
        ?>
    </body>
</html>