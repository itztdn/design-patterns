<?php

namespace App\Creational\FactoryMethod;

class SmsNotificationFactory extends NotificationFactory
{
    public function __construct(
        private readonly string $phoneNumber
    ) {}

    public function createNotification(): NotificationInterface
    {
        return new SmsNotification($this->phoneNumber);
    }
}
