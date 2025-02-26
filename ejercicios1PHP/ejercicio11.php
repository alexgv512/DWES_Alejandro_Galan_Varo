<?php
// Inicializamos el contador
$i = 1;

// Usamos un bucle while para calcular y mostrar el cuadrado de los primeros 40 números naturales
while ($i <= 40) {
    // Calculamos el cuadrado
    $cuadrado = $i * $i;
    
    // Mostramos el número y su cuadrado
    echo "El cuadrado de " . $i . " es: " . $cuadrado . "<br>";
    
    // Incrementamos el contador
    $i++;
}
?>