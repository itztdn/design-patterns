<?php

namespace App\Behavioral\Strategy;

class CreditCardPayment implements PaymentStrategy
{
    public function __construct(
        private readonly string $cardNumber,
        private readonly string $cvv
    ) {}

    public function pay(float $amount): void
    {
        // EN: Logic for processing credit card payment.
        // RU: Логика обработки платежа по кредитной карте.
        echo "Processing credit card payment of $" . number_format($amount, 2) . " using card ending in " . substr($this->cardNumber, -4) . PHP_EOL;
    }
}
