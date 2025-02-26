<html>
    <body>

        <form method="post" action="">
            <label for="num1">Dime un numero </label>
            <input type="number" id="num1" name="num1">
            <input type="submit" value="Enviar">
        </form>

        <form method="post" action="index.php">
            <label for="num1">volver al menu </label>
            <input type="submit" value="volver">
        </form>

        
        <?php
        /*saca los n primeros numeros */
            $num1 = null;

            if (isset($_POST['num1']) && !empty($_POST['num1'])) {
                $num1 = (int)htmlspecialchars($_POST['num1']);
            }
            $num1 = (int)$num1;

            $i=1;
            
            while($num1){
                if ($num1 == $i){
                    break;
                }
                echo $i,"";
                $i++;
            }
        ?>
    </body>
</html>

<html>
    <body>
        <?php
        /*Actividad 2: Pídele al usuario que imprima todos los números entre 1 y 30 omitiendo los divisibles por 3.
         En ese caso deberá saltarse la iteración usando la sentencia continue y continuar con el siguiente número.
          Usa un formulario para coger el valor del número introducido por el usuario.*/
        
        
        
        ?>
    </body>
</html>