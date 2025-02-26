<?php
/*Crea una clase Estudiante con las propiedades: nombre, edad, y notas (array de calificaciones).

Usa atributos/métodos estáticos para:

Llevar un contador del número total de estudiantes.

Calcular el promedio de un grupo de estudiantes.

Métodos de instancia:

__construct($nombre, $edad) para inicializar un estudiante (valida que la edad sea ≥ 18).

agregarNota($nota) para añadir una nota (valida que sea un número entre 0 y 10).

calcularPromedio() para retornar el promedio de las notas del estudiante.

Usa excepciones para manejar casos como el cálculo del promedio sin notas.

Requisitos:
Lanza una excepción si las notas son inválidas o si se intenta calcular el promedio sin notas.

Usa métodos estáticos para manejar el promedio y el conteo total de estudiantes. */

class estudiante{
    private $nombre;
    private $edad;
    private $notas = [];
    private static $numEstudiates =0;
    private static $sumatotalPromesio =0;

    public function __construct($nombre,$edad){
        if($this->edad >18 ){
            throw new Exception("la edad no puede ser mayo a 18");
        }else{
            $this->nombre = $nombre;
            $this->edad = $edad;
            self::$numEstudiates++;

        }
        
    }

    public function agregarNota($nota) {
        if (!is_numeric($nota) || $nota < 0 || $nota > 10) {
            throw new Exception("La nota debe ser un número entre 0 y 10.");
        }
        $this->notas[] = $nota;
    }

    public function calcularPromedio() {
        if (empty($this->notas)) {
            throw new Exception("No se pueden calcular el promedio sin notas.");
        }
        return array_sum($this->notas) / count($this->notas);
    }

    public static function obtenerTotalEstudiantes() {
        return self::$numEstudiates;
    }

    public static function calcularPromedioGrupo($estudiantes) {
        if (empty($estudiantes)) {
            throw new Exception("El grupo de estudiantes está vacío.");
        }

        $totalNotas = 0;
        $totalEstudiantes = 0;

        foreach ($estudiantes as $estudiante) {
            if (!$estudiante instanceof Estudiante) {
                throw new Exception("El grupo contiene elementos que no son objetos de tipo Estudiante.");
            }
            try {
                $totalNotas += $estudiante->calcularPromedio();
                $totalEstudiantes++;
            } catch (Exception $e) {
                // Ignorar estudiantes sin notas
            }
        }

        if ($totalEstudiantes === 0) {
            throw new Exception("No hay estudiantes con notas válidas en el grupo.");
        }

        return $totalNotas / $totalEstudiantes;
    }
}

// Ejemplo de uso:
try {
    $estudiante1 = new Estudiante("Juan", 20);
    $estudiante1->agregarNota(9);
    $estudiante1->agregarNota(8);
    
    $estudiante2 = new Estudiante("Ana", 19);
    $estudiante2->agregarNota(10);

    $estudiantes = [$estudiante1, $estudiante2];

    echo "Promedio de Juan: " . $estudiante1->calcularPromedio() . PHP_EOL;
    echo "Promedio de grupo: " . Estudiante::calcularPromedioGrupo($estudiantes) . PHP_EOL;
    echo "Total de estudiantes: " . Estudiante::obtenerTotalEstudiantes() . PHP_EOL;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}










?>