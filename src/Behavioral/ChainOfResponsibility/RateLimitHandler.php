<?php

namespace App\Behavioral\ChainOfResponsibility;

/**
 * EN: A Concrete Handler. It counts requests per IP and stops the chain once
 * the limit is exceeded. The check is cheap, so this handler stands first and
 * shields the more expensive handlers behind it.
 * RU: Конкретный обработчик. Считает запросы с каждого IP и останавливает
 * цепочку, когда лимит превышен. Проверка дешевая, поэтому этот обработчик
 * стоит первым и прикрывает более дорогие обработчики за собой.
 */
class RateLimitHandler extends AbstractHandler
{
    /** @var array<string, int> */
    private array $hits = [];

    public function __construct(
        private readonly int $maxRequests
    ) {}

    public function handle(Request $request): ?string
    {
        $this->hits[$request->ip] = ($this->hits[$request->ip] ?? 0) + 1;

        if ($this->hits[$request->ip] > $this->maxRequests) {
            echo "RateLimitHandler: limit exceeded for {$request->ip}, stopping the chain" . PHP_EOL;

            return '429 Too Many Requests';
        }

        echo "RateLimitHandler: {$request->ip} is within the limit, passing on" . PHP_EOL;

        return parent::handle($request);
    }
}
