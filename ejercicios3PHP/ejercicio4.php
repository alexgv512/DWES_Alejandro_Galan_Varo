<html>
    <body>
        <?php
            $arra1=[];
            $cuadrados=[];
            $cubo=[];
            for ($i=0; $i < 20 ; $i++) { 
                array_push($arra1,rand(0,100));
            }
            
            for ($i= 0; $i < count($arra1); $i++) {
                $cuadrados[$i] = $arra1[$i] **2;
            }

            for ($i= 0; $i < count($arra1); $i++) {
                $cubo[$i] = $arra1[$i] **3;
            }

            function mostrararray($array){
                foreach ($array as  $value) {
                    echo $value . " ";
                }
                echo"<br>";
            }
            mostrararray($arra1);
            
            mostrararray($cuadrados);
            
            mostrararray($cubo);

        ?>
    </body>
</html>