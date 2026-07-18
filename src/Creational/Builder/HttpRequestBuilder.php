<?php

namespace App\Creational\Builder;

class HttpRequestBuilder implements RequestBuilderInterface
{
    private string $method;
    private string $url;

    /** @var array<string, string> */
    private array $headers;

    private ?string $body;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->method = 'GET';
        $this->url = '';
        $this->headers = [];
        $this->body = null;
    }

    public function setMethod(string $method): static
    {
        $this->method = strtoupper($method);

        return $this;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function addHeader(string $name, string $value): static
    {
        $this->headers[$name] = $value;

        return $this;
    }

    public function setBody(string $body): static
    {
        $this->body = $body;

        return $this;
    }

    /**
     * EN: Returns the finished product and resets the builder,
     * so the next build starts from a clean state.
     * RU: Возвращает готовый продукт и сбрасывает строитель,
     * чтобы следующая сборка начиналась с чистого состояния.
     */
    public function getRequest(): HttpRequest
    {
        $request = new HttpRequest($this->method, $this->url, $this->headers, $this->body);

        $this->reset();

        return $request;
    }
}
