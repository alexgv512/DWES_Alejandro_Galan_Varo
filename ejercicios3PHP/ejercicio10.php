<html>
    <body>
    <?php
        $poblacion = array(
            "España" => 47450795,  
            "Portugal" => 10196709, 
            "Francia" => 65273511,  
            "Italia" => 60244639,   
            "Grecia" => 10423054    
        );

        
        foreach ($poblacion as $pais => $censo) {
            echo "La población de $pais es $censo.<br>";
        }
    ?>
    </body>
</html>