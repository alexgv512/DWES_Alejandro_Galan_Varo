<?php
function euros_a_dolares($euros, $conversion = 1.05) {
    return $euros * $conversion;
}


$euros = 100;
$dolares = euros_a_dolares($euros);
echo "La cantidad de $euros euros equivale a $dolares dólares.";
?>