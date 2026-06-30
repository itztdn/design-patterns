<?php

namespace App\Creational\FactoryMethod;

interface NotificationInterface
{
    /**
     * EN: Send a notification with the given content.
     * RU: Отправить уведомление с заданным содержимым.
     */
    public function send(string $content): void;
}
