<?php

namespace App\Behavioral\ChainOfResponsibility;

/**
 * EN: A simple DTO - the request that travels along the chain. Handlers only
 * read it and decide whether to stop it or pass it on.
 * RU: Простой DTO - запрос, который путешествует по цепочке. Обработчики
 * только читают его и решают, остановить его или передать дальше.
 */
readonly class Request
{
    public function __construct(
        public string $path,
        public string $ip,
        public ?string $token = null
    ) {}
}
