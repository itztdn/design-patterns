<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Structural\Adapter\CacheInterface;
use App\Structural\Adapter\LegacyDatabaseCache;
use App\Structural\Adapter\LegacyDatabaseCacheAdapter;
use App\Structural\Adapter\RedisCacheAdapter;
use App\Structural\Adapter\ThirdPartyRedisClient;

/**
 * EN: The client code only knows CacheInterface. It has no idea whether
 * a vendor SDK or a legacy database table is working behind the adapter.
 * RU: Клиентский код знает только CacheInterface. Он понятия не имеет,
 * что работает за адаптером - SDK вендора или легаси-таблица в БД.
 */
function renderProfile(CacheInterface $cache, string $userId): void
{
    $cached = $cache->get($userId);

    if ($cached !== null) {
        echo "App: served from cache -> {$cached}" . PHP_EOL;

        return;
    }

    echo "App: cache miss, querying the database..." . PHP_EOL;

    $profile = "profile of user {$userId}";
    $cache->set($userId, $profile, 30);

    echo "App: served from source -> {$profile}" . PHP_EOL;
}

echo "App: Working through the third-party Redis client.\n";
echo "---------------------------------\n";

$redisCache = new RedisCacheAdapter(new ThirdPartyRedisClient(), 'profiles');

renderProfile($redisCache, '42');
renderProfile($redisCache, '42');

echo "\nApp: The very same client code, legacy storage behind it.\n";
echo "---------------------------------\n";

$legacyCache = new LegacyDatabaseCacheAdapter(new LegacyDatabaseCache());

renderProfile($legacyCache, '42');
renderProfile($legacyCache, '42');

echo "\nApp: An expired entry looks like a miss to the client.\n";
echo "---------------------------------\n";

// EN: A negative TTL puts the deadline in the past.
// RU: Отрицательный TTL помещает срок годности в прошлое.
$legacyCache->set('7', 'stale profile', -1);

renderProfile($legacyCache, '7');
