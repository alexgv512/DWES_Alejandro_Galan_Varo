<?php
// Número total de filas de la pirámide
$filas = 5;

// Generamos la pirámide
for ($i = 1; $i <= $filas; $i++) {
    // Espacios en blanco (se reduce en cada nivel)
    for ($j = $i; $j < $filas; $j++) {
        echo "&nbsp;&nbsp;";
    }
    
    // Asteriscos (aumentan en cada nivel)
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    
    // Salto de línea al terminar cada fila
    echo "<br>";
}
?>