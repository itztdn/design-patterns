<?php

namespace App\Creational\AbstractFactory;

/**
 * EN: The Abstract Factory. It declares a creation method for each product
 * in the family. A single concrete factory always produces products that
 * belong together, so the client cannot mix a MySQL connection with a
 * Postgres query builder by accident.
 * RU: Абстрактная фабрика. Объявляет метод создания для каждого продукта
 * семейства. Одна конкретная фабрика всегда выдает продукты, подходящие
 * друг другу, поэтому клиент не сможет случайно смешать соединение MySQL
 * с построителем запросов Postgres.
 */
interface StorageFactoryInterface
{
    public function createConnection(): ConnectionInterface;

    public function createQueryBuilder(): QueryBuilderInterface;
}
