<html>
    <body>
        <?php
            //Se te proporciona un array multidimensional que contiene información sobre diferentes productos en una tienda. Cada producto tiene el nombre, precio, y cantidad en stock. 
            //Tu tarea es realizar las siguientes operaciones:
            //Ordena el array de productos primero por precio en orden ascendente y luego por cantidad en stock en orden descendente. 
            
            //Para esto, utiliza las funciones usort() y una función de comparación personalizada.
            //Después de la ordenación, verifica si un producto específico, por ejemplo "Televisor", existe en la lista usando in_array() o array_search().
            //Finalmente, calcula el valor total de todos los productos en stock (precio * cantidad) y muestra el total.

            $productos = [
                ["nombre" => "Televisor", "precio" => 400, "stock" => 10],
                ["nombre" => "Portátil", "precio" => 800, "stock" => 5],
                ["nombre" => "Smartphone", "precio" => 300, "stock" => 20],
            ];

            print_r($productos);
            echo"<br>";

            usort($productos, function($a, $b) {
                if ($a['precio'] == $b['precio']) {
                    // Si los precios son iguales, ordenar por stock en orden descendente
                    return $b['stock'] - $a['stock'];
                }
                return $a['precio'] - $b['precio']; // Orden ascendente por precio
            });

            print_r($productos);
            echo"<br>";
            echo"<br>";
///////////////////////
            if (in_array("Televisor", $productos)) {
                echo "el televisor esta a allí";
                echo"<br>";
            }else{
                echo "te lo han robao";
                echo"<br>";
            }
/////////////////////////////

            $totalValorStock = 0;
            foreach ($productos as $producto) {
                $totalValorStock += $producto['precio'] * $producto['stock'];
            }

            echo "El valor total de todos los productos en stock es: " . $totalValorStock ."€";
        ?>
    </body>
</html>