<?php

namespace App\Behavioral\ChainOfResponsibility;

/**
 * EN: A Concrete Handler. It lets the request through only with a known token.
 * It has no idea what comes next - a controller or yet another check - and
 * does not need to.
 * RU: Конкретный обработчик. Пропускает запрос дальше только с известным
 * токеном. Он понятия не имеет, что идет следом - контроллер или еще одна
 * проверка, - и ему это не нужно.
 */
class AuthenticationHandler extends AbstractHandler
{
    /**
     * @param string[] $validTokens
     */
    public function __construct(
        private readonly array $validTokens
    ) {}

    public function handle(Request $request): ?string
    {
        if (!in_array($request->token, $this->validTokens, true)) {
            echo 'AuthenticationHandler: missing or invalid token, stopping the chain' . PHP_EOL;

            return '401 Unauthorized';
        }

        echo 'AuthenticationHandler: token accepted, passing on' . PHP_EOL;

        return parent::handle($request);
    }
}
