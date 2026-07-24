<?php

namespace App\Structural\Decorator;

/**
 * EN: A decorator that adds behaviour around the call
 * without touching the repository itself.
 * RU: Декоратор, добавляющий поведение вокруг вызова,
 * не трогая сам репозиторий.
 */
class LoggingProductRepository extends ProductRepositoryDecorator
{
    public function findById(int $id): ?Product
    {
        echo "LoggingProductRepository: looking for product #{$id}" . PHP_EOL;

        $product = parent::findById($id);

        $result = $product === null ? 'nothing found' : "found '{$product->title}'";
        echo "LoggingProductRepository: {$result}" . PHP_EOL;

        return $product;
    }
}
