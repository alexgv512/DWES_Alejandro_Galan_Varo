<html>
    <body>
        <?php
            //Escribe un script que almacene un array de 8 números enteros
            $arra1= [1,3,3,5,7,8,9,2] ;
            
            //ecorrerá el array y lo mostrará
            foreach ($arra1 as $valor) {
                echo $valor;
            }


            //lo ordenará y lo mostrará
            sort($arra1);
            foreach ($arra1 as $valor) {
                echo $valor;
            }
            //mostrará su longitud
            
            echo"el tamaño del array es de : ". count( $arra1 ) ;
    
            //buscará un elemento dentro del array
            $bucado = 8;
            if(in_array($buscado, $arra1 )) {
                echo "el numero $buscado se encuetra en el array" ;
            }else{
                echo "el numero $buscado no se encuetra en el array" ;
            }

            //buscará un elemento dentro del array, pero por el parámetro que llegue a la URL

            $bucado = $_GET['valor'];
            if(in_array($buscado, $arra1 )) {
                echo "el numero $buscado se encuetra en el array" ;
            }else{
                echo "el numero $buscado no se encuetra en el array" ;
            }
        ?>
    </body>
</html>