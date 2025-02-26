<html>
    <body>
        <?php
            //Escriba un script que cree un array con 15 números aleatorios y los muestre en pantalla. 
                $arr1 = [] ;
                $tamaño=15;

                for ($i= 0; $i< $tamaño; $i++) {
                    $arr1[$i] = rand(1,9);
                }

                foreach ($arr1 as $elemneto) {
                    echo"".$elemneto."";
                }

                echo"<br>";
            //A continuación, rotará los elementos de ese array una posición. Es decir, el elemento de la posición 0 debe pasar a la posición 1, 
            //el de al 1 a la 2, …, el elemento de la última posición pasará a la posición 0. 
                $aux= $arr1[$tamaño -1];   
                for ($i= $tamaño - 1; $i > 0 ; $i--) {
                    $arr1[$i+1]= $arr1[$i -1];
                }
                $arr1[0]= $aux;

                
            //Por último, mostrará el nuevo contenido del array.

                foreach ($arr1 as $elemneto) {
                    echo"".$elemneto."";
                }

        
                //forma hypereficiente
                echo"<br>";

                $array1= [1,2,3,4,5];
                print_r($array1);
                echo"<br>";
                $aux2 = array_pop($array1);
                array_unshift($array1,$aux2);
                print_r($array1);

        ?>
    </body>
</html>