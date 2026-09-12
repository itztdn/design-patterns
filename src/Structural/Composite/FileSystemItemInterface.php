<?php

namespace App\Structural\Composite;

/**
 * EN: The Component interface. It is shared by both simple items (files)
 * and containers (directories), which is what lets the client treat a whole
 * tree and a single leaf in exactly the same way.
 * RU: Интерфейс компонента. Его разделяют и простые элементы (файлы),
 * и контейнеры (папки) - именно это позволяет клиенту работать с целым
 * деревом и с одиночным листом совершенно одинаково.
 */
interface FileSystemItemInterface
{
    public function getName(): string;

    /**
     * EN: A leaf returns its own size; a container returns the sum of its
     * children. The client calls the method the same way in both cases.
     * RU: Лист возвращает свой размер; контейнер - сумму размеров детей.
     * Клиент вызывает метод одинаково в обоих случаях.
     */
    public function getSize(): int;

    public function render(string $indent = ''): string;
}
