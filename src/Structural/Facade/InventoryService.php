<?php

namespace App\Structural\Facade;

/**
 * EN: One of the subsystem classes. It is not aware of the facade
 * and can still be used directly when the fine-grained API is needed.
 * RU: Один из классов подсистемы. Он не знает о фасаде,
 * и его по-прежнему можно использовать напрямую, если нужен детальный API.
 */
class InventoryService
{
    /** @var array<string, int> */
    private array $stock = [
        'book' => 5,
        'keyboard' => 1,
    ];

    public function isAvailable(string $sku, int $quantity): bool
    {
        $available = ($this->stock[$sku] ?? 0) >= $quantity;

        echo "InventoryService: checking {$quantity} x '{$sku}' -> " . ($available ? 'in stock' : 'not enough') . PHP_EOL;

        return $available;
    }

    public function reserve(string $sku, int $quantity): void
    {
        $this->stock[$sku] -= $quantity;

        echo "InventoryService: reserved {$quantity} x '{$sku}'" . PHP_EOL;
    }

    public function release(string $sku, int $quantity): void
    {
        $this->stock[$sku] += $quantity;

        echo "InventoryService: released {$quantity} x '{$sku}' back to stock" . PHP_EOL;
    }
}
