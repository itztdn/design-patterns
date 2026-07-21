<?php

namespace App\Structural\Adapter;

/**
 * EN: An Adaptee. Imagine this class comes from a vendor package:
 * we cannot change its method names, argument order or return types.
 * The storage is kept in memory to make the example runnable.
 * RU: Адаптируемый класс. Представьте, что он пришел из vendor-пакета:
 * мы не можем изменить ни имена методов, ни порядок аргументов, ни типы.
 * Хранилище держим в памяти, чтобы пример был запускаемым.
 */
class ThirdPartyRedisClient
{
    /** @var array<string, array{payload: string, expires_at: float}> */
    private array $storage = [];

    /**
     * EN: Note the differences from our interface: a namespace argument,
     * a TTL in milliseconds and an array as the result.
     * RU: Отличия от нашего интерфейса: аргумент namespace,
     * TTL в миллисекундах и массив в качестве результата.
     *
     * @return array{payload: string, expires_at: float}|null
     */
    public function fetch(string $namespace, string $key): ?array
    {
        $entry = $this->storage["{$namespace}:{$key}"] ?? null;

        if ($entry === null || $entry['expires_at'] < microtime(true)) {
            return null;
        }

        echo "ThirdPartyRedisClient: HIT {$namespace}:{$key}" . PHP_EOL;

        return $entry;
    }

    public function store(string $namespace, string $key, string $payload, int $ttlMillis): void
    {
        echo "ThirdPartyRedisClient: SET {$namespace}:{$key} (ttl {$ttlMillis} ms)" . PHP_EOL;

        $this->storage["{$namespace}:{$key}"] = [
            'payload' => $payload,
            'expires_at' => microtime(true) + $ttlMillis / 1000,
        ];
    }
}
