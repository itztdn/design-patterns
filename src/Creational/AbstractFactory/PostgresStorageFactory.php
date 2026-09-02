<?php

namespace App\Creational\AbstractFactory;

/**
 * EN: A Concrete Factory. It creates a whole family of PostgreSQL products
 * that are guaranteed to work together.
 * RU: Конкретная фабрика. Создает целое семейство продуктов PostgreSQL,
 * которые гарантированно работают вместе.
 */
class PostgresStorageFactory implements StorageFactoryInterface
{
    public function createConnection(): ConnectionInterface
    {
        return new PostgresConnection();
    }

    public function createQueryBuilder(): QueryBuilderInterface
    {
        return new PostgresQueryBuilder();
    }
}
