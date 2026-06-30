<?php

namespace App\Creational\FactoryMethod;

class EmailNotification implements NotificationInterface
{
    public function __construct(
        private readonly string $adminEmail
    ) {}

    public function send(string $content): void
    {
        // EN: Logic for sending an email.
        // RU: Логика отправки email.
        echo "Sending Email to {$this->adminEmail}: {$content}" . PHP_EOL;
    }
}
