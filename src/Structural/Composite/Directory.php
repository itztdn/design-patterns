<?php

namespace App\Structural\Composite;

/**
 * EN: The Composite. It stores children (leaves or other composites) and
 * implements the child-related operations. Its own methods usually delegate
 * the work to the children and combine the results.
 * RU: Компоновщик. Хранит детей (листья или другие компоновщики) и реализует
 * операции работы с ними. Его собственные методы обычно делегируют работу
 * детям и объединяют результаты.
 */
class Directory implements FileSystemItemInterface
{
    /** @var FileSystemItemInterface[] */
    private array $children = [];

    public function __construct(
        private readonly string $name
    ) {}

    /**
     * EN: The container accepts the interface, so it does not care whether a
     * child is a file or another directory - that is the heart of the pattern.
     * RU: Контейнер принимает интерфейс, поэтому ему все равно, файл ребенок
     * или другая папка, - в этом и суть паттерна.
     */
    public function add(FileSystemItemInterface $item): self
    {
        $this->children[] = $item;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSize(): int
    {
        $total = 0;

        // EN: Recursion: each child answers for its own subtree.
        // RU: Рекурсия: каждый ребенок отвечает за собственное поддерево.
        foreach ($this->children as $child) {
            $total += $child->getSize();
        }

        return $total;
    }

    public function render(string $indent = ''): string
    {
        $output = "{$indent}+ {$this->name}/ ({$this->getSize()} B)" . PHP_EOL;

        foreach ($this->children as $child) {
            $output .= $child->render($indent . '  ');
        }

        return $output;
    }
}
