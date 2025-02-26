<?php
    
        class perro {
            function __construct(public string $tamaño, public string $raza, public string $color, public string $nombre){
                $this->set_tamaño($tamaño);
                $this->set_raza($raza);
                $this->set_color($color);
                $this->set_nombre($nombre);
            }

            // Métodos getters
            public function get_tamaño(): string{
                return $this->tamaño;
            }
    
            public function get_raza(): string{
                return $this->raza;
            }
    
            public function get_color(): string{
                return $this->color;
            }
    
            public function get_nombre(): string{
                return $this->nombre;
            }
    
            // Métodos setters con validación
            public function set_tamaño(string $tamaño): bool{
                if (!empty($tamaño)) {
                    $this->tamaño = $tamaño;
                    return true;
                }
                echo "Error: El tamaño no puede estar vacío.\n";
                return false;
            }
    
            public function set_raza(string $raza): bool{
                if (!empty($raza)) {
                    $this->raza = $raza;
                    return true;
                }
                echo "Error: La raza no puede estar vacía.\n";
                return false;
            }
    
            public function set_color(string $color): bool{
                if (!empty($color)) {
                    $this->color = $color;
                    return true;
                }
                echo "Error: El color no puede estar vacío.\n";
                return false;
            }
    
            public function set_nombre(string $nombre): bool{
                if (is_string($nombre) && strlen($nombre) <= 21) {
                    $this->nombre = $nombre;
                    return true;
                }
                echo "Error: El nombre debe ser una cadena de caracteres de máximo 21 caracteres.\n";
                return false;
            }

            public function mostrar_propiedades(): void{
                echo "El tamaño del perro es {$this->tamaño}, su color {$this->color}, su raza {$this->raza} y su nombre: {$this->nombre}.\n";
            }

            public function speak(){
                echo "BOMBARDEN FERAZ, DIGO GUAUU GUAU";
            }
        }
    ?>
