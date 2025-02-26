<html>
    <body>
        <?php
        function calcularextension(&$fichero){
            if(!empty($fichero)){
                $fichero =strstr($fichero,'.'); //strstr($_POST['fichero'],'.')
                echo "<br> la extension del fichero es: $fichero " ;
            }
        }
        
        function devuelvetipofich($fichero){
            if(!empty($fichero)){
                $fichero = ltrim($fichero,'.');
                $fichero = strtoupper($fichero);
            }
        }
        ?>
    </body>
</html>