<?php

namespace App\Creational\Singleton;

class DatabaseConnection
{
    use SingletonTrait;

    private int $queryCount = 0;

    /**
     * EN: Expensive resource we want to create only once.
     * RU: Дорогой ресурс, который мы хотим создать только один раз.
     */
    public function query(string $sql): void
    {
        $this->queryCount++;

        echo "DatabaseConnection: Running query #{$this->queryCount}: {$sql}" . PHP_EOL;
    }

    public function getQueryCount(): int
    {
        return $this->queryCount;
    }
}
