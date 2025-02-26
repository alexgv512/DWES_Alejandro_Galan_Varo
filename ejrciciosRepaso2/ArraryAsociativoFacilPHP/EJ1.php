<html>
    <body>
        <?php
           // Crea un array asociativo con datos de una persona (nombre, edad, y ciudad) y muestra sus valores.
           $persona =[
            "nombre" => "Alonso",
            "edad"=> 21,
            "ciudad"=>"Granada"
           ];
           echo "Nombre: " . $persona["nombre"] . "\n";
           echo "Edad: " . $persona["edad"] . "\n";
           echo "Ciudad: " . $persona["ciudad"] . "\n";

           //Crea un array asociativo de productos con sus precios. Agrega un nuevo producto y elimina otro.
           $productos = [
            "boli"=> 1,
            "subrayador"=> 2,
            "lapiz"=> 1.5
           ];

           //hay dos formas de añadir una correta para arrays asociativos
           //1º
           $produstos["goma"] = 3;
           //2º
           // array_push($productos,"portaminas","cable");

           /*
           En PHP, array_push está diseñado para trabajar con arrays indexados (con claves numéricas) y no con arrays asociativos. 
           Si intentas usarlo en un array asociativo como $productos, no funcionará como esperas, 
           porque los elementos no tendrán claves asociadas específicas.
           */


           //Recorre un array asociativo de capitales de países y muestra el país y su capital.
           $capitales=[
            "España"=> "Madrid",
            "Alemania"=>"Berlin",
            "Polonia"=> "Varsovia"
           ];

           foreach ($capitales as $pais => $capital) {
            echo "$pais =>> $capital";
           }
           //Crea un array asociativo con nombres de estudiantes y sus notas. Cuenta cuántos estudiantes hay y haga la media.
           $estudiantes = [
             "Ana" => 8.5,
             "Luis" => 7.2,
             "Carlos" => 9.0,
             "Marta" => 6.8
            ];
        
            echo "Número de estudiantes: " . count($estudiantes);
            $sumaNotas = array_sum($estudiantes);
            echo "la menia de las notas es $sumaNotas " /  count($estudiantes);

        
           //Busca si un producto está disponible en un inventario.
           
            $inventario = [
                "laptop" => 5,
                "teclado" => 10,
                "ratón" => 7
            ];

            $producto = "teclado";

            if (array_key_exists($producto, $inventario)) {
                echo "$producto está disponible con " . $inventario[$producto] . " unidades.\n";
            } else {
                echo "$producto no está en el inventario.\n";
            }

        ?>
    </body>
</html>