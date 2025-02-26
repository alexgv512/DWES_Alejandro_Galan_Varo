<?php

  class Empleado{
     public $nombre;
     public $apellidos;

     public function __construct($nombre,$apellidos){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
     }

     public function setNombre($nombre){
        $this->nombre = $nombre;
     }
     public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
     }

     public function getNombre($nombre){
        return $this->nombre;
     }

     public function getApellido($apellidos){
        return $this->apellidos;
     }
     public function __tostring(){
        return "<br> - Empleado:  ". $this->nombre. " ". $this->apellidos;
     }
  }
    
  $emp = new Empleado("","");
  $emp->setNombre("juan");
  $emp->setApellidos("Alvarez Manzano");
  echo $emp;

  $emp2 = new Empleado("Pedro","Paramo");
  echo $emp2;
?>