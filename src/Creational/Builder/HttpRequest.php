<?php

namespace App\Creational\Builder;

/**
 * EN: The product assembled step by step. It stays immutable,
 * because all the configuration happens in the builder.
 * RU: Продукт, который собирается шаг за шагом. Он остается неизменяемым,
 * так как вся настройка происходит в строителе.
 */
readonly class HttpRequest
{
    /**
     * @param array<string, string> $headers
     */
    public function __construct(
        public string $method,
        public string $url,
        public array $headers = [],
        public ?string $body = null
    ) {}

    public function describe(): string
    {
        $lines = ["{$this->method} {$this->url}"];

        foreach ($this->headers as $name => $value) {
            $lines[] = "  {$name}: {$value}";
        }

        if ($this->body !== null) {
            $lines[] = "  body: {$this->body}";
        }

        return implode(PHP_EOL, $lines);
    }
}
