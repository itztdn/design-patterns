<?php

namespace App\Creational\Builder;

/**
 * EN: The same building steps, but a completely different representation:
 * this builder produces a ready-to-run curl command instead of an object.
 * RU: Те же шаги сборки, но совершенно другое представление:
 * этот строитель выдает готовую команду curl вместо объекта.
 */
class CurlCommandBuilder implements RequestBuilderInterface
{
    /** @var string[] */
    private array $parts;

    private string $url;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->parts = [];
        $this->url = '';
    }

    public function setMethod(string $method): static
    {
        $this->parts[] = '-X ' . strtoupper($method);

        return $this;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function addHeader(string $name, string $value): static
    {
        $this->parts[] = "-H '{$name}: {$value}'";

        return $this;
    }

    public function setBody(string $body): static
    {
        $this->parts[] = "-d '{$body}'";

        return $this;
    }

    public function getCommand(): string
    {
        $command = 'curl ' . implode(' ', [...$this->parts, "'{$this->url}'"]);

        $this->reset();

        return $command;
    }
}
