<?php

namespace App\Creational\AbstractFactory;

/**
 * EN: One of the abstract products. Every storage family provides its own
 * connection, but the client works with them only through this interface.
 * RU: Один из абстрактных продуктов. Каждое семейство хранилища дает свое
 * соединение, но клиент работает с ними только через этот интерфейс.
 */
interface ConnectionInterface
{
    public function connect(): void;

    public function run(string $sql): void;
}
