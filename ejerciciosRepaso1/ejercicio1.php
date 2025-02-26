<html>
    <body>

    <form method="post" action="">
    <label for="dia">Día de Nacimiento:</label>
    <input type="number" id="dia" name="dia" min="1" max="31" required>
    <br><br>
    <label for="mes">Mes de Nacimiento:</label>
    <input type="number" id="mes" name="mes" min="1" max="12" required>
    <br><br>
    <input type="submit" value="Consultar">

        </form>
        <?php
        //Escribe un programa que nos diga el horóscopo a partir del día 
        //y el mes de nacimiento.

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dia = isset($_POST["dia"]) ? (int)$_POST["dia"] : 0;
            $mes = isset($_POST["mes"]) ? (int)$_POST["mes"] : 0;
        }
        function obtenerHoroscopo($dia, $mes) {
            return match (true) {
                ($mes == 1 && $dia >= 20) || ($mes == 2 && $dia <= 18) => "Acuario",
                ($mes == 2 && $dia >= 19) || ($mes == 3 && $dia <= 20) => "Piscis",
                ($mes == 3 && $dia >= 21) || ($mes == 4 && $dia <= 19) => "Aries",
                ($mes == 4 && $dia >= 20) || ($mes == 5 && $dia <= 20) => "Tauro",
                ($mes == 5 && $dia >= 21) || ($mes == 6 && $dia <= 20) => "Géminis",
                ($mes == 6 && $dia >= 21) || ($mes == 7 && $dia <= 22) => "Cáncer",
                ($mes == 7 && $dia >= 23) || ($mes == 8 && $dia <= 22) => "Leo",
                ($mes == 8 && $dia >= 23) || ($mes == 9 && $dia <= 22) => "Virgo",
                ($mes == 9 && $dia >= 23) || ($mes == 10 && $dia <= 22) => "Libra",
                ($mes == 10 && $dia >= 23) || ($mes == 11 && $dia <= 21) => "Escorpio",
                ($mes == 11 && $dia >= 22) || ($mes == 12 && $dia <= 21) => "Sagitario",
                ($mes == 12 && $dia >= 22) || ($mes == 1 && $dia <= 19) => "Capricornio",
                default => "Fecha no válida",
            };
        }
        $signo = obtenerHoroscopo($dia, $mes);

        ?>
    </body>
</html>