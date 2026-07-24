<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Structural\Decorator\CachingProductRepository;
use App\Structural\Decorator\DatabaseProductRepository;
use App\Structural\Decorator\LoggingProductRepository;
use App\Structural\Decorator\ProductRepositoryInterface;

/**
 * EN: The client code accepts the interface, so it works the same way
 * with a bare repository and with any stack of decorators around it.
 * RU: Клиентский код принимает интерфейс, поэтому одинаково работает
 * и с голым репозиторием, и с любой стопкой декораторов вокруг него.
 */
function showProduct(ProductRepositoryInterface $repository, int $id): void
{
    $product = $repository->findById($id);

    echo $product === null
        ? "App: product #{$id} is not available" . PHP_EOL
        : "App: {$product->title} costs \${$product->price}" . PHP_EOL;
}

echo "App: Bare repository, every call goes to the database.\n";
echo "---------------------------------\n";

$repository = new DatabaseProductRepository();

showProduct($repository, 1);
showProduct($repository, 1);

echo "\nApp: Wrapped in caching, the second call never reaches the database.\n";
echo "---------------------------------\n";

$cached = new CachingProductRepository(new DatabaseProductRepository());

showProduct($cached, 1);
showProduct($cached, 1);

echo "\nApp: Logging outside caching - the log sees every call.\n";
echo "---------------------------------\n";

$loggedCache = new LoggingProductRepository(
    new CachingProductRepository(new DatabaseProductRepository())
);

showProduct($loggedCache, 2);
showProduct($loggedCache, 2);

echo "\nApp: Swapped order - the log sees only what the cache misses.\n";
echo "---------------------------------\n";

$cachedLog = new CachingProductRepository(
    new LoggingProductRepository(new DatabaseProductRepository())
);

showProduct($cachedLog, 2);
showProduct($cachedLog, 2);

echo "\nApp: A missing product is cached as well.\n";
echo "---------------------------------\n";

showProduct($cached, 99);
showProduct($cached, 99);
