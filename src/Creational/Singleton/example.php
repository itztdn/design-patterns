<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Creational\Singleton\DatabaseConnection;
use App\Creational\Singleton\Logger;

/**
 * EN: Different parts of the application ask for the connection independently,
 * but they all receive the same instance.
 * RU: Разные части приложения запрашивают соединение независимо друг от друга,
 * но получают один и тот же экземпляр.
 */
function userRepository(): void
{
    DatabaseConnection::getInstance()->query('SELECT * FROM users');
}

function orderRepository(): void
{
    DatabaseConnection::getInstance()->query('SELECT * FROM orders');
}

echo "App: Two repositories share one connection.\n";
echo "---------------------------------\n";

userRepository();
orderRepository();

$first = DatabaseConnection::getInstance();
$second = DatabaseConnection::getInstance();

var_dump($first === $second);
echo "Total queries on the shared connection: {$first->getQueryCount()}\n";

echo "\nApp: Every singleton class keeps its own instance.\n";
echo "---------------------------------\n";

Logger::getInstance()->log('User logged in.');
Logger::getInstance()->log('Order created.');

echo 'Records collected by the logger: ' . count(Logger::getInstance()->getRecords()) . "\n";
var_dump(Logger::getInstance() === $first);

echo "\nApp: Creating a second instance is impossible.\n";
echo "---------------------------------\n";

try {
    // EN: The constructor is private, so `new` throws an Error.
    // RU: Конструктор закрыт, поэтому `new` выбрасывает Error.

    /** @noinspection PhpPrivateConstructorUsageInspection */
    new DatabaseConnection();
} catch (Error $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
