<?php

namespace App\Creational\Builder;

/**
 * EN: The director knows the order of the building steps for typical
 * configurations. It is optional: the client may drive a builder directly.
 * RU: Директор знает порядок шагов сборки для типовых конфигураций.
 * Он необязателен: клиент может управлять строителем напрямую.
 */
class RequestDirector
{
    /**
     * EN: The director works with any builder through the common interface,
     * so it has no idea which representation is being produced.
     * RU: Директор работает с любым строителем через общий интерфейс,
     * поэтому не знает, какое именно представление собирается.
     */
    public function buildJsonPost(RequestBuilderInterface $builder, string $url, string $payload): void
    {
        $builder
            ->setMethod('POST')
            ->setUrl($url)
            ->addHeader('Content-Type', 'application/json')
            ->addHeader('Accept', 'application/json')
            ->setBody($payload);
    }

    public function buildAuthorizedGet(RequestBuilderInterface $builder, string $url, string $token): void
    {
        $builder
            ->setMethod('GET')
            ->setUrl($url)
            ->addHeader('Authorization', "Bearer {$token}");
    }
}
