<?php

namespace App\Creational\AbstractFactory;

/**
 * EN: A concrete product of the PostgreSQL family.
 * RU: Конкретный продукт семейства PostgreSQL.
 */
class PostgresConnection implements ConnectionInterface
{
    public function connect(): void
    {
        echo "PostgresConnection: connected via pgsql" . PHP_EOL;
    }

    public function run(string $sql): void
    {
        echo "PostgresConnection: running [{$sql}]" . PHP_EOL;
    }
}
