<?php

namespace App\Creational\FactoryMethod;

class EmailNotificationFactory extends NotificationFactory
{
    public function __construct(
        private readonly string $adminEmail
    ) {}

    public function createNotification(): NotificationInterface
    {
        return new EmailNotification($this->adminEmail);
    }
}
