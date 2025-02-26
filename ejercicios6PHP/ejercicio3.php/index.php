<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <?php
        try{
            if(!file_exists('perro.php')){
                throw new Exception("el archivo no existe");
            }
            include 'perro.php';

        }catch(Exception $e){
            echo $e->getMessage();
        }

        $labrador = new perro("20","labrador","negro", "sanxe");
        $labrador -> speak();
        echo"<br>";

        $canoche = new perro("6", "cani","blanco","asteroid destroyer");
        $canoche -> speak();
        echo"<br>";

        $perro_error_message = $labrador->set_nombre("bella");
        echo $perro_error_message ? 'nombre actualizado': 'nombre no  actualizado';
        echo"<br>";
        ?>
    </body>
</html>