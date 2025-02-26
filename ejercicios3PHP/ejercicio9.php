<html>
    <body>
        <?php
            $privinciasAl_andalus=["Granada","Sevilla","Almeria","Malaga","Cordoba", "Cadiz","Huelva","Jaen"];

            $provincia_a_borrar = rand(0,7);
          
            
            function borrarProvincia(&$privinciasAl_andalus, $provincia_a_borrar){
                unset($privinciasAl_andalus[$provincia_a_borrar]);
                return $privinciasAl_andalus;
            }

            print_r($privinciasAl_andalus);
            echo"<br>";
            borrarProvincia($privinciasAl_andalus, $provincia_a_borrar); 
            echo"<br>";  
            print_r($privinciasAl_andalus);
            
            

        ?>
    </body>
</html>