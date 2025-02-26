<html>
    <body>
        <?php
            function es_contraseña_valida($contraseña) {
                // Comprobar longitud
                if (strlen($contraseña) < 6 || strlen($contraseña) > 15) {
                    return false;
                }
            
                // Comprobar si contiene al menos un número
                if (!preg_match('/\d/', $contraseña)) {
                    return false;
                }
            
                // Comprobar si contiene al menos una letra mayúscula
                if (!preg_match('/[A-Z]/', $contraseña)) {
                    return false;
                }
            
                // Comprobar si contiene al menos una letra minúscula
                if (!preg_match('/[a-z]/', $contraseña)) {
                    return false;
                }
            
                // Comprobar si contiene al menos un carácter no alfanumérico
                if (!preg_match('/[\W_]/', $contraseña)) {
                    return false;
                }
            
                // Si pasa todas las comprobaciones, es válida
                return true;
            }
            
            // Ejemplo de uso
            $contraseña = "Ejemplo@123";
            if (es_contraseña_valida($contraseña)) {
                echo "La contraseña es válida.";
            } else {
                echo "La contraseña no es válida.";
            }
        ?>
    </body>
</html>