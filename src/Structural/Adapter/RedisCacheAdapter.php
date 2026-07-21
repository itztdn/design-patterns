<?php

namespace App\Structural\Adapter;

/**
 * EN: The Adapter implements our interface and translates every call
 * into what the third-party client expects.
 * RU: Адаптер реализует наш интерфейс и переводит каждый вызов
 * в то, что ожидает сторонний клиент.
 */
class RedisCacheAdapter implements CacheInterface
{
    public function __construct(
        private readonly ThirdPartyRedisClient $client,
        private readonly string $namespace = 'app'
    ) {}

    public function get(string $key): ?string
    {
        $entry = $this->client->fetch($this->namespace, $key);

        // EN: Unwrap the vendor's array into the plain string we promised.
        // RU: Разворачиваем массив вендора в обычную строку, которую обещали.
        return $entry['payload'] ?? null;
    }

    public function set(string $key, string $value, int $ttlSeconds = 60): void
    {
        // EN: Convert seconds to the milliseconds the vendor works with.
        // RU: Переводим секунды в миллисекунды, с которыми работает вендор.
        $this->client->store($this->namespace, $key, $value, $ttlSeconds * 1000);
    }
}
