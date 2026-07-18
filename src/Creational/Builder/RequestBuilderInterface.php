<?php

namespace App\Creational\Builder;

interface RequestBuilderInterface
{
    /**
     * EN: Start a new product, so one builder can be reused many times.
     * RU: Начать новый продукт, чтобы один строитель можно было использовать многократно.
     */
    public function reset(): void;

    /**
     * EN: Building steps return $this to allow a fluent interface.
     * RU: Шаги сборки возвращают $this, что дает текучий интерфейс.
     */
    public function setMethod(string $method): static;

    public function setUrl(string $url): static;

    public function addHeader(string $name, string $value): static;

    public function setBody(string $body): static;
}
