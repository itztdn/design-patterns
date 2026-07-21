<?php

namespace App\Structural\Adapter;

/**
 * EN: The second Adapter. The legacy storage has no expiration support,
 * so the adapter emulates it: the deadline is saved next to the value
 * and checked on read. Adapters often have to fill such gaps.
 * RU: Второй адаптер. Легаси-хранилище не поддерживает время жизни,
 * поэтому адаптер эмулирует его: срок хранится рядом со значением
 * и проверяется при чтении. Адаптерам часто приходится закрывать такие пробелы.
 */
class LegacyDatabaseCacheAdapter implements CacheInterface
{
    public function __construct(
        private readonly LegacyDatabaseCache $legacyCache,
        private readonly string $table = 'cache_entries'
    ) {}

    public function get(string $key): ?string
    {
        $row = $this->legacyCache->selectRow($this->table, $key);

        if ($row === null) {
            return null;
        }

        /** @var array{value: string, expires_at: int} $entry */
        $entry = unserialize($row);

        if ($entry['expires_at'] < time()) {
            echo "LegacyDatabaseCacheAdapter: entry '{$key}' is expired" . PHP_EOL;

            return null;
        }

        return $entry['value'];
    }

    public function set(string $key, string $value, int $ttlSeconds = 60): void
    {
        $this->legacyCache->insertRow($this->table, $key, serialize([
            'value' => $value,
            'expires_at' => time() + $ttlSeconds,
        ]));
    }
}
