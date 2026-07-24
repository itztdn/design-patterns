<?php

namespace App\Structural\Decorator;

/**
 * EN: The Component interface. Both the real repository and every
 * decorator implement it, which is what makes them interchangeable.
 * RU: Интерфейс компонента. Его реализуют и настоящий репозиторий,
 * и каждый декоратор - именно поэтому они взаимозаменяемы.
 */
interface ProductRepositoryInterface
{
    public function findById(int $id): ?Product;
}
