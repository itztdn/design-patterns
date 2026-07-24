<?php

namespace App\Structural\Decorator;

/**
 * EN: The Base Decorator. It holds a reference to the wrapped object
 * and delegates everything to it by default. Concrete decorators
 * override only the steps they actually want to change.
 * RU: Базовый декоратор. Хранит ссылку на обернутый объект и по умолчанию
 * делегирует ему все вызовы. Конкретные декораторы переопределяют
 * только то, что действительно хотят изменить.
 */
abstract class ProductRepositoryDecorator implements ProductRepositoryInterface
{
    public function __construct(
        protected readonly ProductRepositoryInterface $repository
    ) {}

    public function findById(int $id): ?Product
    {
        return $this->repository->findById($id);
    }
}
