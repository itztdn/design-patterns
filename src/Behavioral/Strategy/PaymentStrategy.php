<?php

namespace App\Behavioral\Strategy;

interface PaymentStrategy
{
    /**
     * EN: Execute the payment process.
     * RU: Выполнить процесс оплаты.
     */
    public function pay(float $amount): void;
}
