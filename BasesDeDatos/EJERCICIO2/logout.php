<?php

//2.6 Cerrar la sesión
session_start();

session_unset();
session_destroy();

echo "Sesión cerrada";

echo "<script> 

        setTimeout(function(){window.location.href='index.php';}, 2000);

      </script>";    

?>