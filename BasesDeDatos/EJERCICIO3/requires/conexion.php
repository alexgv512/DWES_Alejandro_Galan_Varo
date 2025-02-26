<?php
//conexion a la base de datos
$dns = 'mysql:host=localhost;dbname=blog;charset=utf8mb4';
$username = 'root';
$password = '';
try {
    $pdo = new PDO($dns, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "conexion exitosa";
 } catch (PDOException $e) {
     die("Error en la conexion: " . $e->getMessage());
 }

?>