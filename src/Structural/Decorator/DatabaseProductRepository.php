<?php

namespace App\Structural\Decorator;

/**
 * EN: The Concrete Component - the only class that does the real work.
 * It knows nothing about logging or caching wrapped around it.
 * RU: Конкретный компонент - единственный класс, который делает реальную работу.
 * Он ничего не знает о логировании и кэшировании вокруг себя.
 */
class DatabaseProductRepository implements ProductRepositoryInterface
{
    /** @var array<int, Product> */
    private array $rows;

    public function __construct()
    {
        $this->rows = [
            1 => new Product(1, 'Design Patterns book', 39.90),
            2 => new Product(2, 'Mechanical keyboard', 129.00),
        ];
    }

    public function findById(int $id): ?Product
    {
        echo "DatabaseProductRepository: SELECT * FROM products WHERE id = {$id}" . PHP_EOL;

        return $this->rows[$id] ?? null;
    }
}
