<html>
    <body>
        <?php

            setlocale(LC_TIME,'es_ES.UTF-8','es_ES', 'spanish');
            date_default_timezone_set('Europe/Madrid');


            $fecha= new DateTime('now');
            echo "<br> la fecha de hoy es:" . $fecha->format('I, d \d\e F \d\e Y');


            
        ?>
    </body>
</html>