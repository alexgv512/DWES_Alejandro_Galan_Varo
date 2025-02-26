<?php
// Simulamos la tirada de dos dados usando la función rand()
$dado1 = rand(1, 6);
$dado2 = rand(1, 6);

// Mostramos los resultados de la tirada
echo "Tirada del primer dado: " . $dado1 . "<br>";
echo "Tirada del segundo dado: " . $dado2 . "<br>";

// Verificamos si es una pareja (valores iguales)
if ($dado1 == $dado2) {
    echo "¡Ha salido una pareja de valores iguales!<br>";
} 

// Determinamos el mayor de los dos valores
$mayor = ($dado1 > $dado2) ? $dado1 : $dado2;
echo "El mayor valor de la tirada es: " . $mayor . "<br>";
?>