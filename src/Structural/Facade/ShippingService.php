<?php

namespace App\Structural\Facade;

class ShippingService
{
    public function schedule(string $sku, int $quantity, string $address): string
    {
        $trackingNumber = 'TRK-' . strtoupper(substr(md5($sku . $address), 0, 8));

        echo "ShippingService: scheduled delivery to '{$address}', tracking {$trackingNumber}" . PHP_EOL;

        return $trackingNumber;
    }
}
