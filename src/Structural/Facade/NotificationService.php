<?php

namespace App\Structural\Facade;

class NotificationService
{
    public function sendOrderConfirmation(string $email, string $trackingNumber): void
    {
        echo "NotificationService: confirmation sent to {$email} (tracking {$trackingNumber})" . PHP_EOL;
    }
}
