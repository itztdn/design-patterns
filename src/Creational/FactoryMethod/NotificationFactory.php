<?php

namespace App\Creational\FactoryMethod;

abstract class NotificationFactory
{
    /**
     * EN: The Factory Method.
     * RU: Фабричный метод.
     */
    abstract public function createNotification(): NotificationInterface;

    /**
     * EN: Core business logic that relies on the product.
     * RU: Основная бизнес-логика, которая зависит от продукта.
     */
    public function notifyUser(string $message): void
    {
        // EN: Call the factory method to create a Product object.
        // RU: Вызываем фабричный метод, чтобы получить объект продукта.
        $notification = $this->createNotification();

        $notification->send($message);
    }
}
