<?php
/*Crea un sistema bancario donde las clases CuentaBancaria y TarjetaCredito compartan un trait Operaciones para reutilizar lógica común.

El trait Operaciones incluye:

depositar($monto) para aumentar el saldo (valida que el monto sea positivo).

retirar($monto) para disminuir el saldo. Lanza una excepción si el saldo es insuficiente.

CuentaBancaria y TarjetaCredito heredan del trait y agregan lógica específica:

CuentaBancaria: Permite transferencias entre cuentas del mismo tipo.

TarjetaCredito: Incluye un límite de crédito máximo (valídalo antes de retirar).

Incluye constantes como el tipo de moneda (MONEDA = 'USD') en ambas clases.

Requisitos:
Maneja errores como saldo insuficiente y límites de crédito excedidos usando excepciones.

Implementa transacciones entre cuentas. */

trait Operaciones{
    private $saldo;

    public function depositar($monto){
        if($monto > 0){ 
            $this->saldo += $monto;
        } else{
            throw new Exception("El monto debe ser positivo");
        } 
    }

    public function retirar($monto){
        if($this->saldo >= $monto){     
            $this->saldo -= $monto; 
        }else{
            throw new Exception("El saldo es insuficiente");
        }
    } 

    public function consultarSaldo(){
        return $this->saldo;
    }
}

class CuentaBancaria{
    use Operaciones;
    private const moneda = 'USD';

    public function __construct($saldoIni){
        if($saldoIni > 0){
            throw new Exception("El saldo inicial debe ser positivo");
        }else{
            $this->saldo = $saldoIni;
        }
    }

    public function transferir( CuentaBancaria $cuenta, $monto){
        $this->retirar($monto);
        $this->depositar($monto);
    }
    public function ObtenerSaldo(){
        return $this->saldo ." ". self::moneda;
    }
}

class TarjetaCredito{
    use Operaciones;
    private const moneda = 'USD';
    private  $limiteCredito;

    public function __construct($limiteCredito, $saldoIni= 0){
        if($limiteCredito <= 0){
            throw new Exception("El límite de crédito debe ser positivo");
        }elseif($saldoIni < 0){
            throw new Exception("El saldo inicial debe ser positivo");
        }else{
            $this->limiteCredito = $limiteCredito;
            $this->saldo = $saldoIni;
        }
    }

    public function retirar($monto){
        if ($monto > ($this->saldo + $this->limiteCredito)) {
            throw new RuntimeException("Límite de crédito excedido.");
        }
        $this->saldo -= $monto;
    }

    public function consultarLimCredito(){
        return $this->limiteCredito;
    }
    public function ObtenerSaldo(){
        return $this->saldo ." ". self::moneda;
    }
}
// Ejemplo de uso
try {
    // Crear cuentas bancarias
    $cuenta1 = new CuentaBancaria(1000);
    $cuenta2 = new CuentaBancaria(500);

    // Transferir dinero entre cuentas
    echo "Saldo inicial de cuenta1: {$cuenta1->consultarSaldo()} USD\n";
    echo "Saldo inicial de cuenta2: {$cuenta2->consultarSaldo()} USD\n";

    $cuenta1->transferir($cuenta2, 300);
    echo "Saldo después de la transferencia:\n";
    echo "Cuenta1: {$cuenta1->consultarSaldo()} USD\n";
    echo "Cuenta2: {$cuenta2->consultarSaldo()} USD\n";

    // Crear tarjeta de crédito
    $tarjeta = new TarjetaCredito(2000, 100);
    echo "Saldo inicial de la tarjeta: {$tarjeta->consultarSaldo()} USD\n";

    // Realizar operaciones con la tarjeta
    $tarjeta->retirar(1500);
    echo "Saldo después de retirar 1500 USD: {$tarjeta->consultarSaldo()} USD\n";

    // Intentar exceder el límite de crédito
    $tarjeta->retirar(1000);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>