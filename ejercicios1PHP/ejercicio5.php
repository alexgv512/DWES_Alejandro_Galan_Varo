<?php
// Fecha de hoy
$hoy = date('Y-m-d');

// Fecha de mañana
$manana = date('Y-m-d', strtotime('+1 day'));

// Fecha de ayer
$ayer = date('Y-m-d', strtotime('-1 day'));

// Mostrar por pantalla las fechas
echo "Hoy: " . $hoy . "<br>";
echo "Mañana: " . $manana . "<br>";
echo "Ayer: " . $ayer . "<br>";
?>