<?php

namespace App\Creational\AbstractFactory;

/**
 * EN: A concrete product of the MySQL family.
 * RU: Конкретный продукт семейства MySQL.
 */
class MySqlConnection implements ConnectionInterface
{
    public function connect(): void
    {
        echo "MySqlConnection: connected via mysqli" . PHP_EOL;
    }

    public function run(string $sql): void
    {
        echo "MySqlConnection: running [{$sql}]" . PHP_EOL;
    }
}
