<html>
    <body>
        <?php
            function comprobarArgumento($arg) {
                
                if (is_string($arg)) {
                    
                    if (empty($arg)) {
                        return "cadena vacía";
                    } else {
                        
                        return strtoupper($arg);
                    }
                } else {
                    
                    return $arg . " no es una cadena de caracteres anormal";
                }
            }
            
           
            echo comprobarArgumento("");   
            echo "<br>" ;      
            echo comprobarArgumento("Hola Mundo"); 
            echo "<br>" ;   
            echo comprobarArgumento(123); 
            echo "<br>" ;    
            echo comprobarArgumento(" I heil hitler nigga");      
        ?>
    </body>
</html>