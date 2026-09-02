<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Creational\AbstractFactory\MySqlStorageFactory;
use App\Creational\AbstractFactory\PostgresStorageFactory;
use App\Creational\AbstractFactory\StorageFactoryInterface;

/**
 * EN: The client receives one factory and builds a whole consistent family
 * from it. It never names a concrete class, so it works with any storage
 * the same way - and cannot mix products from different families.
 * RU: Клиент получает одну фабрику и собирает из нее целое согласованное
 * семейство. Он не называет ни одного конкретного класса, поэтому работает
 * с любым хранилищем одинаково - и не может смешать продукты разных семейств.
 */
function fetchUsers(StorageFactoryInterface $factory): void
{
    $connection = $factory->createConnection();
    $queryBuilder = $factory->createQueryBuilder();

    $connection->connect();
    $connection->run($queryBuilder->selectAll('users'));
}

echo "App: Working with the MySQL family.\n";
echo "---------------------------------\n";
fetchUsers(new MySqlStorageFactory());

echo "\nApp: The same client code, the PostgreSQL family.\n";
echo "---------------------------------\n";
fetchUsers(new PostgresStorageFactory());

echo "\nApp: The factory is usually chosen once, from configuration.\n";
echo "---------------------------------\n";

$config = 'pgsql';

$factory = match ($config) {
    'mysql' => new MySqlStorageFactory(),
    'pgsql' => new PostgresStorageFactory(),
};

echo "App: configured storage -> {$config}" . PHP_EOL;
fetchUsers($factory);
