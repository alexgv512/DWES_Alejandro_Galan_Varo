<html>
    <body>
        <?php
            $arra1 = [] ;
            $arrayinverso = [] ;
            function mostrararray($array){
                foreach ($array as  $value) {
                    echo $value . " ";
                }
            }

            for ($i = 0; $i < 20; $i++) {
                array_push($arra1 ,rand(0,1));
                echo $arra1[$i]. " ";
                
                if ($array[$i] == 1) {
                    $arrayinverso[$i] = 0;
                }else{
                    $arrayinverso[$i] = 1;
                }
         
            }
            mostrararray($array);
            echo"<br>";
            mostrararray($arrayinverso);
            
        ?>
    </body>
</html>