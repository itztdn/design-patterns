<?php

namespace App\Behavioral\Strategy;

class PayPalPayment implements PaymentStrategy
{
    public function __construct(
        private readonly string $email
    ) {}

    public function pay(float $amount): void
    {
        // EN: Logic for processing PayPal API payment.
        // RU: Логика обработки платежа через API PayPal.
        echo "Processing PayPal payment of $" . number_format($amount, 2) . " for account {$this->email}" . PHP_EOL;
    }
}
