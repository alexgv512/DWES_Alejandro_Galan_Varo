<html>
    <body>
        <?php
            echo "Hola Mundo";
            echo "<hr>";

            $A =2.5;
            $B =2;
            $resul = $A+$B;
            echo $resul;

            echo"<br>";
            $var = 5 ;
            $$var = 7;
            echo $var; 
            echo"<br>";  
            echo $$var; 
            echo"<br>";
            echo"<br>";

            $mensaje_es="Hola";
            $mensaje_en="Hello";
            $idioma = "es";
            $mensaje = "mensaje_es";
            $idioma;
            print $$mensaje;

            echo"<br>";
            echo"<br>";

            $mensaje_es = "hola";
            $mensaje_en = "hi";
            $idioma= "en";
            $mensaje ="mensaje_en" ;
            print $$mensaje;

            echo"<br>";
            echo"<br>";

            function prueba(): void{
                global $A;
                $c = $A;
                echo $c;
            }
            prueba();
            echo"<br>";
            

            function hola (?string $nombre = null){
                if (is_null($nombre)){
                    echo "hola!";
                }else{
                    return "hola!" .$nombre."!";
                }
            }
            
         
            



            class Number{

                private int|float $number;
                
                public function setNumber(int|float $number) : void{
                    $this-> number= $number;
                }

                public function getNumber():int|float{
                    return $this-> number;
                }
            }
             
            echo"<br>";
            $num1 = new Number() ;
            $num1->setNumber(69) ;
            echo $num1->getNumber() ;

            echo "<br>";
            define("TITULO", "Mein Kampf");
            if ( defined( "TITULO")) {
            echo " El título del libro es :  ". TITULO;
            }else{
                echo "El libro no esta definido";
            }

            echo"<br>";
            echo"<br>"; 
            echo"<br>";

            $A = " 123 ";
            echo gettype($A) ;
            $A = +$A;
            echo $A;
            echo gettype($A) ;

            echo"<br>";
            echo"<br>"; 
            echo"<br>";

            $a =32;
            echo "<br>";
            echo $a;
            echo "<br>";
            $b = 2;
            $a >>= $b;
            echo $a;

            
        ?>
    </body>
</html>

<html>
    <body>
        <?php
            $listado_archivos = `dir`; // Listado de todos los archivos del directorio actual
            echo "<pre>$listado_arcivos<pre>"; // Se muestra en pantalla
        ?>
    </body>
</html>


<html>
    <body>
        <?php
           echo"<br>";
           echo $variable ?? 'no existe';
           echo '<br>';


           echo"<br>";
           $variable = null;
           echo $variable ?? 'no existe';
           echo '<br>';

           echo"<br>";
           $variable= 'ana';
           echo $variable ?? 'no existe';
           echo '<br>';
        ?>
    </body>
</html>



<html>
    <body>
        <?php
           // Números enteros 
           echo 1 <=> 1; // 0
           echo 1 <=> 2; // -1
           echo 2 <=> 1; // 1
           // Numeros decimales
           echo 1.5 <=>1.5; //0
           echo 1.5 <=> 2.5; // -1
           echo 2.5 <=> 1.5; // 1
           // Cadenas de caracteres echo 
          echo "а"<=> "a"; //0
          echo "а"<=> "b"; //-1
          echo "b"<=> "a"; //1
        

          //comprobacion

          echo"<br>";
          $a = 5;
          $b= 13;
          echo $a <=> $b;

          echo"<br>";
          $a = 5;
          $b= 5;
          echo $a <=> $b;

          echo"<br>";
          $a = 12;
          $b= 2;
          echo $a <=> $b;
        ?>
    </body>
</html>

<html>
    <body>
    <?php
       class Session {
        public Usuario $usuario;
    
        public function __construct(Usuario $usuario) {
            $this->usuario = $usuario;
        }
    }
       class Usuario {
        public Estudios $estudios;

                public function getEstudios(){
                    return $this->estudios;
                }
                
                public function setEstudios(Estudios $estudios){
                    $this->estudios = $estudios;
                }
       }

       class Estudios{
           public string $universidad;
           public string $titulo;

           public function __construct(?string $universidad, string $titulo) {
            $this->universidad = $universidad;
            $this->titulo = $titulo;
           }
       }

       $estudios = new Estudios(null, "medicina");
      // $usuario = new Usuario(estudios: $estudios);
       $session = new Session(usuario: $usuario);
       $universidad = $session?-> usuario?->getEstudios()?-> $universidad;
       echo $universidad;
    ?>
    </body>
</html>


