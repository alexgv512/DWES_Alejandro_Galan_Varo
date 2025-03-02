<?php

    namespace models;

    use lib\BaseDatos;

    class Producto{

        private int $id;
        private int $categoriaId;
        private string $nombre;
        private string $descripcion;
        private float $precio;
        private int $stock;
        private string $oferta;
        private string $fecha;
        private string $imagen;
        private BaseDatos $baseDatos;

        public function __construct(){
            $this->baseDatos = new BaseDatos();
        }

        /* GETTERS Y SETTERS */

        public function getId(): int{
            return $this->id;
        }

        public function getCategoriaId(): int{
            return $this->categoriaId;
        }

        public function getNombre(): string{
            return $this->nombre;
        }

        public function getDescripcion(): string{
            return $this->descripcion;
        }

        public function getPrecio(): float{
            return $this->precio;
        }

        public function getStock(): int{
            return $this->stock;
        }

        public function getOferta(): string{
            return $this->oferta;
        }

        public function getFecha(): string{
            return $this->fecha;
        }

        public function getImagen(): string{
            return $this->imagen;
        }

        public function setId(int $id): void{
            $this->id = $id;
        }

        public function setCategoriaId(int $categoriaId): void{
            $this->categoriaId = $categoriaId;
        }

        public function setNombre(string $nombre): void{
            $this->nombre = $nombre;
        }

        public function setDescripcion(string $descripcion): void{
            $this->descripcion = $descripcion;
        }

        public function setPrecio(float $precio): void{
            $this->precio = $precio;
        }

        public function setStock(int $stock): void{
            $this->stock = $stock;
        }

        public function setOferta(string $oferta): void{
            $this->oferta = $oferta;
        }

        public function setFecha(string $fecha): void{
            $this->fecha = $fecha;
        }

        public function setImagen(string $imagen): void{
            $this->imagen = $imagen;
        }

        /* MÉTODOS DINÁMICOS */
        public function save($data) {
            $sql = "INSERT INTO productos (nombre, descripcion, precio, categoria_id, stock, oferta, imagen) VALUES (:nombre, :descripcion, :precio, :categoria_id, :stock, :oferta, :imagen)";
            $stmt = $this->baseDatos->prepare($sql);
            $stmt->bindParam(':nombre', $data['nombre']);
            $stmt->bindParam(':descripcion', $data['descripcion']);
            $stmt->bindParam(':precio', $data['precio']);
            $stmt->bindParam(':categoria_id', $data['categoria_id']);
            $stmt->bindParam(':stock', $data['stock']);
            $stmt->bindParam(':oferta', $data['oferta']);
            $stmt->bindParam(':imagen', $data['imagen']);
            return $stmt->execute();
        }

        public function delete($id) {
            $sql = "DELETE FROM productos WHERE id = :id";
            $stmt = $this->baseDatos->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }

        public function update($data) {
            $sql = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, categoria_id = :categoria_id, stock = :stock, oferta = :oferta, imagen = :imagen WHERE id = :id";
            $stmt = $this->baseDatos->prepare($sql);
            $stmt->bindParam(':nombre', $data['nombre']);
            $stmt->bindParam(':descripcion', $data['descripcion']);
            $stmt->bindParam(':precio', $data['precio']);
            $stmt->bindParam(':categoria_id', $data['categoria_id']);
            $stmt->bindParam(':stock', $data['stock']);
            $stmt->bindParam(':oferta', $data['oferta']);
            $stmt->bindParam(':imagen', $data['imagen']);
            $stmt->bindParam(':id', $data['id']);
            return $stmt->execute();
        }

        public function getAll() {
            $sql = "SELECT * FROM productos";
            $stmt = $this->baseDatos->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function getById($id) {
            $sql = "SELECT * FROM productos WHERE id = :id";
            $stmt = $this->baseDatos->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        }

  
    }

?>