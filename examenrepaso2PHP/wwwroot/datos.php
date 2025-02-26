<?php
 $usuarios = [
    "Marcelox" => ["contraseña" => "1234","nombre" => "Marcelo","apellido1" => "Gonzalez","apellido2" => "Hernandez","edad" => 21,"fechaalta" => "12-03-2019"],
    "LuciaR" => ["contraseña" => "5678","nombre" => "Lucía","apellido1" => "Ramírez","apellido2" => "Martínez","edad" => 25,"fechaalta" => "05-08-2021"],
    "JuanP" => ["contraseña" => "9101","nombre" => "Juan","apellido1" => "Pérez","apellido2" => "López","edad" => 30,"fechaalta" => "15-11-2020"]
];

$libros = [
    "9781234567890" => ["unidades" => 10, "titulo" => "Programación en PHP","editorial" => "Editorial Tecnológica","ano_edicion" => 2020,"autores" => [["nombre" => "Juan", "apellido1" => "Pérez", "apellido2" => "López"],]],
    "9780987654321" => ["unidades" => 5,"titulo" => "Desarrollo Web Avanzado","editorial" => "Innovación Editorial","ano_edicion" => 2021,"autores" => [["nombre" => "Luis", "apellido1" => "Ramírez", "apellido2" => "Martínez"]]],
    "9781122334455" => ["unidades" => 8,"titulo" => "Bases de Datos Modernas","editorial" => "Datos Editoriales","ano_edicion" => 2019,"autores" => [["nombre" => "Carla", "apellido1" => "Fernández", "apellido2" => "Gómez"],]],
    "9786677889900" => ["unidades" => 12,"titulo" => "Introducción a la Inteligencia Artificial","editorial" => "Ciencia Editorial","ano_edicion" => 2022,"autores" => [["nombre" => "Ana", "apellido1" => "Mendoza", "apellido2" => "Cortés"]]]
];

$prestamos =[
    ["isbn" =>"9781234567890","usuario"=>"Marcelox","fechaini"=>"19-10-2024","fechaFin"=>"10-11-2014"],
    ["isbn" =>"9780987654321","usuario"=>"LuciaR","fechaini"=>"3-11-2014","fechaFin"=>"16-11-2024"],
    ["isbn" =>"9781122334455","usuario"=>"JuanP","fechaini"=>"18-9-2024","fechaFin"=>"19-11-2014"]
];


function login($usu,$pw){
    global $usuarios;
    if (!empty($pw)) {
        return isset($usuarios[$usu]) && $usuarios[$usu]["contraseña"] === $pw; //si exixte juanpedro y su contraseña es correcta -> true
    }else {
        throw new Exception("no puedes dejar campos vacios");
    }
}

function escribeUsuario($usu) {
    global $usuarios;
    if (!isset($usuarios[$usu])) {//isset nos dice si una variable esta definida o no
        throw new Exception("ERROR DEL SISTEMA: El usuario no existe");
    }else{
        $user = $usuarios[$usu];
        echo "{$user['apellido1']} {$user['apellido2']}, {$user['nombre']} ({$user['edad']} años)<br>";
        echo "Está con nosotros desde el " . date("d - F - Y", strtotime($user['fechaAlta'])) . "<br><br>";
    }
}

function escribePrestamos($usu){
    global $prestamos, $libros, $usuarios;
    if (!isset($usuarios[$usu])) {
        throw new Exception("ERROR DEL SISTEMA: El usuario no existe");
    }
    echo "Préstamos realizados por {$usuarios[$usu]['nombre']}<br>";
    echo "<table border='1'>";
// 7. Imprimo todos los prestamos del usuario en una tabla
    echo "<tr><th>ISBN</th><th>Título</th><th>Fecha de inicio</th><th>Fecha de Fin</th><th>Retrasado</th></tr>";
    foreach ($prestamos as $prestamo) {
        if ($prestamo['usuario'] === $usu) {
            $isbn = $prestamo['isbn'];
            $titulo = $libros[$isbn]['titulo'];
            $fechaInicio = date("d-m-Y", strtotime($prestamo['fechaInicio']));
            $fechaFin = date("d-m-Y", strtotime($prestamo['fechaFin']));
// 8. Si la fecha de hoy es mayor que la fecha de fin de prestamo entonces marco retrasado como 'No'
// ¡Ojo a la forma de hacer la condición! 
            $retrasado = (strtotime($prestamo['fechaFin']) < time()) ? 'SI' : 'NO';
            echo "<tr><td>$isbn</td><td>$titulo</td><td>$fechaInicio</td><td>$fechaFin</td><td>$retrasado</td></tr>";
        }
    }
    echo "</table>";
}
?>