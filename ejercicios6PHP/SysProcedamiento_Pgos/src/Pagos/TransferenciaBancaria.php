<?php
namespace App\Pagos;

use App\Interfaces\PagoInterface;

class TransferenciaBancaria implements PagoInterface {
    public function procesarPago(float $cantidad): string {
        return "Pago de $cantidad procesado mediante transferencia bancaria.";
    }
}