<?php

namespace App\Structural\Adapter;

/**
 * EN: The Target interface. This is the only contract our application
 * knows about, and it never changes because of a third-party library.
 * RU: Целевой интерфейс. Это единственный контракт, о котором знает
 * наше приложение, и он не меняется из-за сторонней библиотеки.
 */
interface CacheInterface
{
    public function get(string $key): ?string;

    public function set(string $key, string $value, int $ttlSeconds = 60): void;
}
