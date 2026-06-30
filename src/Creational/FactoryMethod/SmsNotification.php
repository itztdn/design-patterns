<?php

namespace App\Creational\FactoryMethod;

class SmsNotification implements NotificationInterface
{
    public function __construct(
        private readonly string $phoneNumber
    ) {}

    public function send(string $content): void
    {
        // EN: Logic for sending an SMS.
        // RU: Логика отправки SMS.
        echo "Sending SMS to {$this->phoneNumber}: {$content}" . PHP_EOL;
    }
}
