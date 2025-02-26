<html>
    <body>
        <form method="post" action="">
            <label for="dia">¿Qué dia es hoy?: </label>
            <input type="text" id="dia" name="dia">
            <input type="submit" value="Enviar">
        </form>

        <form method="post" action="index.php">
            <label for="num1">volver al menu </label>
            <input type="submit" value="volver">
        </form>
        
        <?php
            $dia = null;
            if (isset($_POST['dia']) && !empty($_POST['dia'])) {
                $dia = (int)htmlspecialchars($_POST['dia']);
            }
            
            if ($dia !==null) {
                echo match ($dia) {
                    1 => "Hoy es lunes",
                    2 => "Hoy es martes",
                    3 => "Hoy es miércoles",
                    4 => "Hoy es jueves",
                    5 => "Hoy es viernes",
                    6 => "Hoy es sábado",
                    7 => "Hoy es domingo",
                    default => "Ese día de la semana no existe",
                };
            }
        ?>
    </body>
</html>
