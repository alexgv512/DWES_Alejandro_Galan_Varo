<html>
    <body>
        <?php
        $arrayfruticas = ["manzana", "naranja", "plátano", "pera"];
        print_r($arrayfruticas);
        echo"<br>";

        array_push($arrayfruticas,"fentanilo");
        array_push($arrayfruticas," hojas de coca");
        print_r($arrayfruticas);
        echo"<br>";

        array_pop($arrayfruticas);
        print_r($arrayfruticas);
        echo"<br>";

        $cositas = array_reverse($arrayfruticas);
        print_r($cositas);
        echo"<br>";
        ?>
    </body>
</html>