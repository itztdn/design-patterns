<?php

namespace App\Structural\Decorator;

/**
 * EN: A simple DTO returned by the repository.
 * RU: Простой DTO, который возвращает репозиторий.
 */
readonly class Product
{
    public function __construct(
        public int $id,
        public string $title,
        public float $price
    ) {}
}
