<?php

namespace App\Creational\AbstractFactory;

/**
 * EN: A Concrete Factory. It creates a whole family of MySQL products
 * that are guaranteed to work together.
 * RU: Конкретная фабрика. Создает целое семейство продуктов MySQL,
 * которые гарантированно работают вместе.
 */
class MySqlStorageFactory implements StorageFactoryInterface
{
    public function createConnection(): ConnectionInterface
    {
        return new MySqlConnection();
    }

    public function createQueryBuilder(): QueryBuilderInterface
    {
        return new MySqlQueryBuilder();
    }
}
