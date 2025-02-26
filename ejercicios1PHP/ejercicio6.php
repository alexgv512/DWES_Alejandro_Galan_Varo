<?php
// Cadena de ejemplo
$cadena = "Hola, ¿cómo estás?";

// Obtenemos la longitud de la cadena
$longitud = mb_strlen($cadena);

// Variable para almacenar la cadena invertida
$cadena_invertida = "";

// Recorremos la cadena desde el último carácter hasta el primero
for ($i = $longitud - 1; $i >= 0; $i--) {
    // Extraemos el carácter en la posición $i y lo concatenamos a la cadena invertida
    $cadena_invertida .= mb_substr($cadena, $i, 1);
}

// Mostramos la cadena invertida
echo "Cadena original: " . $cadena . "<br>";
echo "Cadena invertida: " . $cadena_invertida;
?>