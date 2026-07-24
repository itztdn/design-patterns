<?php

namespace App\Structural\Facade;

class PaymentGateway
{
    private const DECLINED_CARD = '0000';

    public function charge(string $cardNumber, float $amount): bool
    {
        $approved = !str_ends_with($cardNumber, self::DECLINED_CARD);

        echo 'PaymentGateway: charging $' . number_format($amount, 2)
            . ' -> ' . ($approved ? 'approved' : 'declined') . PHP_EOL;

        return $approved;
    }
}
