<?php
// Número total de niveles de la pirámide
$filas = 5;

// Generamos la pirámide
for ($i = 1; $i <= $filas; $i++) {
    // Espacios en blanco para centrar la pirámide
    for ($j = $i; $j < $filas; $j++) {
        echo "&nbsp;&nbsp;";
    }
    
    // Imprimir asteriscos y espacios internos
    if ($i == 1) {
        // Si es el primer nivel, solo imprimimos un asterisco
        echo "*";
    } elseif ($i == $filas) {
        // Si es el último nivel, imprimimos todos los asteriscos
        echo str_repeat("*", 2 * $i - 1);
    } else {
        // Para los niveles intermedios, imprimimos asteriscos en los extremos y espacios en el centro
        echo "*";  // Asterisco inicial
        echo str_repeat("&nbsp;&nbsp;", 2 * $i - 3);  // Espacios internos
        echo "*";  // Asterisco final
    }
    
    // Salto de línea al terminar cada fila
    echo "<br>";
}
?>