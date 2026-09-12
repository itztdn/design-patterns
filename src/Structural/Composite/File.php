<?php

namespace App\Structural\Composite;

/**
 * EN: A Leaf. It has no children and does the real work - here, simply
 * holding a size. Leaves are the end nodes of the tree.
 * RU: Лист. У него нет детей, и он делает реальную работу - здесь просто
 * хранит размер. Листья - конечные узлы дерева.
 */
class File implements FileSystemItemInterface
{
    public function __construct(
        private readonly string $name,
        private readonly int $size
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function render(string $indent = ''): string
    {
        return "{$indent}- {$this->name} ({$this->size} B)" . PHP_EOL;
    }
}
