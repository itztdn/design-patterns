<?php

namespace App\Structural\Facade;

/**
 * EN: A simple DTO describing the outcome of the whole scenario.
 * RU: Простой DTO, описывающий итог всего сценария.
 */
readonly class OrderResult
{
    private function __construct(
        public bool $success,
        public string $message,
        public ?string $trackingNumber = null
    ) {}

    public static function placed(string $trackingNumber): self
    {
        return new self(true, 'Order placed', $trackingNumber);
    }

    public static function rejected(string $reason): self
    {
        return new self(false, $reason);
    }
}
