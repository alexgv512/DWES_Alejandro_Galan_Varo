<html>
    <body>

        <p>1. dia senama</p>
        <p>2. n primeros numeros</p>

        <form method="post" action="">
            <label for="menu">Dime un numero de los dos que hay  </label>
            <input type="number" id="menu" name="menu">
            <input type="submit" value="Enviar">
        </form>

            <?php
                if (isset($_POST['menu']) && !empty($_POST['menu'])) {
                    $menu = (int)htmlspecialchars($_POST['menu']);
                }

                switch ($menu) {
                   /* case 1:
                        include __DIR__ . '/index2.php';
                        break;
                    case 2:                                 // no va
                        include __DIR__ .'/bucles.php';
                        break;
                    default:
                    */
                    case 1:
                        header("Location: index2.php");
                        break;
                    case 2:
                        header("Location: bucles.php");
                        break;
                    default:
                        echo"esta opcion no exixte";
                    
            }
    
            ?>
    </body>
</html>