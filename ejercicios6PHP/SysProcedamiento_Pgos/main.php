<?php
require_once 'vendor/autoload.php';
require_once 'src/Pagos/TarjetaCredito.php';
require_once 'src/Pagos/TransferenciaBancaria.php';
require_once 'src/Pagos/PayPal.php';

use App\Pagos\TarjetaCredito;
use App\Pagos\TransferenciaBancaria;
use App\Pagos\PayPal;

$targeta = new TarjetaCredito();
$PayPal = new PayPal();
$Transferencia = new TransferenciaBancaria();

echo $targeta->procesarPago(100)."<br>";
echo $PayPal->procesarPago(100)."<br>";
echo $Transferencia->procesarPago(100)."<br>";