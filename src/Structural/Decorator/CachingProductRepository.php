<?php

namespace App\Structural\Decorator;

/**
 * EN: A decorator that may skip the wrapped object entirely.
 * On a hit the inner repository is never called at all.
 * RU: Декоратор, который может вообще не вызывать обернутый объект.
 * При попадании в кэш внутренний репозиторий не трогается.
 */
class CachingProductRepository extends ProductRepositoryDecorator
{
    /** @var array<int, Product|null> */
    private array $cache = [];

    public function findById(int $id): ?Product
    {
        // EN: array_key_exists, not isset - a cached null is still a valid answer.
        // RU: array_key_exists, а не isset - закэшированный null тоже валидный ответ.
        if (array_key_exists($id, $this->cache)) {
            echo "CachingProductRepository: HIT for product #{$id}" . PHP_EOL;

            return $this->cache[$id];
        }

        echo "CachingProductRepository: MISS for product #{$id}" . PHP_EOL;

        return $this->cache[$id] = parent::findById($id);
    }
}
