<?php

namespace App\Structural\Adapter;

/**
 * EN: Another Adaptee - legacy in-house code that stores cache rows
 * in a database table and knows nothing about expiration at all.
 * RU: Еще один адаптируемый класс - легаси-код, который хранит строки
 * кэша в таблице БД и вообще ничего не знает про время жизни.
 */
class LegacyDatabaseCache
{
    /** @var array<string, array<string, string>> */
    private array $tables = [];

    public function selectRow(string $table, string $id): ?string
    {
        echo "LegacyDatabaseCache: SELECT FROM {$table} WHERE id = '{$id}'" . PHP_EOL;

        return $this->tables[$table][$id] ?? null;
    }

    public function insertRow(string $table, string $id, string $serialized): void
    {
        echo "LegacyDatabaseCache: INSERT INTO {$table} (id = '{$id}')" . PHP_EOL;

        $this->tables[$table][$id] = $serialized;
    }
}
