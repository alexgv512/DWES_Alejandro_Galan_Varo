<html>
    <body>
        <?php
            function predef($cadena){
                echo "La cadena es: " . $cadena . "<br>";
                echo "Los primeros 12 caracteres de la cadena son: " . substr( $cadena,0,12) . "<br>";
                echo "La posición donde está la cadena Mundo con M mayúscula es: " . strpos($cadena,"Mundo") . "<br>";
                echo "La posición donde está la cadena mundo con m minúscula es: " . strpos($cadena,"mundo") . "<br>";
                echo "La cadena a mayúsculas es: " . strtoupper($cadena) . "<br>";
                echo "La cadena a mayúsculas con UTF-8 es: " . mb_strtoupper($cadena, "UTF-8") . "<br>";
                echo "La cadena a minúsculas es: " . strtolower($cadena) . "<br>";
                echo "La cadena desde el punto final (incluido) es: " . strstr($cadena, ".") . "<br>";
                function strstrstr($str){
                    $r="";
                    $found = false;
                    for($i = 0; $i < strlen($str); $i++){
                        if($str[$i] == "."){
                            $found = true;
                        }
                        if($found){
                            $r .= $str[$i];
                        }
                    }
                    return $r;
                }
                echo "La cadena desde el punto final (incluido) con funcion no predefinida es: " . strstrstr($cadena) . "<br>";
                echo "La cadena del revés es: " . strrev($cadena) . "<br>";
                function mb_strrev($str){
                    $r = '';
                    for ($i = mb_strlen($str); $i>=0; $i--) {
                        $r .= mb_substr($str, $i, 1);
                    }
                    return $r;
                }
                echo "La cadena del revés con función no predefinida es: " . mb_strrev($cadena);

            }
            $cadena2 = "Hola, mundo. ¿Qué tal estás hoy?";
            echo "<br>" . predef($cadena2);
        ?>
    </body>
</html>