<?php
/*
Crea una clase Usuario para gestionar información de usuarios.

Incluye un trait Validaciones con métodos comunes:

validarEmail($email) para verificar si el correo es válido (usa filter_var).

validarContrasena($contrasena) para asegurarte de que sea fuerte (mínimo 8 caracteres, debe contener letras y números).

La clase Usuario debe incluir las propiedades: nombre, email, y contrasena.

Métodos:

__construct($nombre, $email, $contrasena) para inicializar los valores.

cambiarContrasena($nuevaContrasena) que valida la nueva contraseña antes de asignarla.

autenticar($email, $contrasena) para comprobar si las credenciales son correctas.

Usa constantes como LONGITUD_MINIMA_CONTRASENA = 8.

Requisitos:
Usa excepciones para manejar errores de validación.

Implementa el trait para compartir lógica de validación entre esta clase y otras (por ejemplo, una clase Administrador).
*/

trait Validaciones {

    private const LONGITUD_MINIMA_CONTRASENA = '/{8}/';
    public function validarEmail(string $email): bool {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("El email proporcionado no es válido.");
        }
        return true;
    }

    public function validarContrasena(string $contrasena): bool {
        if (strlen($contrasena) < self::LONGITUD_MINIMA_CONTRASENA || 
            !preg_match('/[a-zA-Z]/', $contrasena) || 
            !preg_match('/[0-9]/', $contrasena)) {
            throw new InvalidArgumentException(
                "La contraseña debe tener al menos " . self::LONGITUD_MINIMA_CONTRASENA . 
                " caracteres y contener letras y números."
            );
        }
        return true;
    }
}
class Usuario{
    use Validaciones;
     // Constantes
     const LONGITUD_MINIMA_CONTRASENA = 8;

     // Propiedades
     private string $nombre;
     private string $email;
     private string $contrasena;
 
     // Constructor
     public function __construct(string $nombre, string $email, string $contrasena) {
         $this->nombre = $nombre;
         $this->validarEmail($email);
         $this->email = $email;
         $this->validarContrasena($contrasena);
         $this->contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
     }
 
     // Método para cambiar la contraseña
     public function cambiarContrasena(string $nuevaContrasena): void {
         $this->validarContrasena($nuevaContrasena);
         $this->contrasena = password_hash($nuevaContrasena, PASSWORD_DEFAULT);
     }
 
     // Método para autenticar al usuario
     public function autenticar(string $email, string $contrasena): bool {
         if ($email !== $this->email) {
             throw new InvalidArgumentException("El email proporcionado no coincide.");
         }
         if (!password_verify($contrasena, $this->contrasena)) {
             throw new InvalidArgumentException("La contraseña proporcionada es incorrecta.");
         }
         return true;
     }
 
     // Getters (opcional)
     public function getNombre(): string {
         return $this->nombre;
     }
 
     public function getEmail(): string {
         return $this->email;
     }
}

// Ejemplo de uso
try {
    $usuario = new Usuario("Juan Pérez", "juan.perez@example.com", "Contraseña123");
    echo "Usuario creado correctamente.\n";

    $usuario->cambiarContrasena("Nueva1234");
    echo "Contraseña cambiada correctamente.\n";

    if ($usuario->autenticar("juan.perez@example.com", "Nueva1234")) {
        echo "Autenticación exitosa.\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>