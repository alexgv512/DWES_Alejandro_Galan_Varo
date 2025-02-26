<html>
    <body>
        <?php
           $peliculas = [
            "1" => "Inception",
            "2" => "Challengers",
            "3" => "The Godfather",
            "4" => "Los Vengadores",
            "5" => "Gladiator",
            "6" => "The Dark Knight",
            "7" => "Forrest Gump",
            "8" => "Interstellar",
            "9" => "Anyone but you",
            "10" => "Inside out 2"
        ];

        print_r($peliculas);
        
        // Imprimir las películas como párrafos
        echo "<h2> Mis 10 Películas Favoritas </h2>";
        foreach ($peliculas as $posicion => $pelicula) {
            echo "<p> Película $posicion: $pelicula </p>";
        }
        
        
        echo "<h2> Películas Favoritas en Tabla </h2>";
        echo "<table border='1' style='width: 100%; text-align: left;'>";
        echo "<tr><th>Posición</th><th>Película</th></tr>";
        
        foreach ($peliculas as $posicion => $pelicula) {
            echo "<tr><td>$posicion</td><td>$pelicula</td></tr>";
        }
        
        echo "</table>";
        ?> 
    </body>
</html>