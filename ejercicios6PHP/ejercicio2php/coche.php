<?php
class Coche {
    public function __construct(
        public string $color = "rojo",
        public string $marca = "Ferrari",
        public string $modelo = "Testarrosa",
        public int $velocidad = 250,
        public int $caballos = 350,
        public int $plazas = 2
    ) {}

    // Métodos getter
    public function getColor(): string {
        return $this->color;
    }

    public function getMarca(): string {
        return $this->marca;
    }

    public function getModelo(): string {
        return $this->modelo;
    }

    public function getVelocidad(): int {
        return $this->velocidad;
    }

    public function getCaballos(): int {
        return $this->caballos;
    }

    public function getPlazas(): int {
        return $this->plazas;
    }

    // Métodos setter
    public function setColor(string $color): void {
        $this->color = $color;
    }

    public function setMarca(string $marca): void {
        $this->marca = $marca;
    }

    public function setModelo(string $modelo): void {
        $this->modelo = $modelo;
    }

    public function setVelocidad(int $velocidad): void {
        $this->velocidad = $velocidad;
    }

    public function setCaballos(int $caballos): void {
        $this->caballos = $caballos;
    }

    public function setPlazas(int $plazas): void {
        $this->plazas = $plazas;
    }

    // Métodos funcionales
    public function acelerar(int $incremento): void {
        $this->velocidad += $incremento;
    }

    public function frenar(int $decremento): void {
        $this->velocidad -= $decremento;
        if ($this->velocidad < 0) {
            $this->velocidad = 0; // Evitar que la velocidad sea negativa
        }
    }

    public function __tostring(){
        return "<br> - Empleado:  ". $this->marca. " ". $this->modelo ." ". $this->color ." ". $this-> caballos;
    }
    
    
}