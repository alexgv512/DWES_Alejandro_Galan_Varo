<?php
session_start();// nos aseguramos de tener activa la sesion
session_unset();// eliminamos todas la viariables de la sesion
session_destroy();//destuimos la senion
setcookie('bienvenida', '', time() - 3600, '/');
header("Location: index.php");
exit;
?>