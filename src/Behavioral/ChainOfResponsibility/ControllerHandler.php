<?php

namespace App\Behavioral\ChainOfResponsibility;

/**
 * EN: The final Concrete Handler. It always handles the request and never
 * passes it on - in a web framework this is the controller at the end of
 * the middleware chain.
 * RU: Завершающий конкретный обработчик. Он всегда обрабатывает запрос и
 * никогда не передает его дальше - в веб-фреймворке это контроллер в конце
 * цепочки middleware.
 */
class ControllerHandler extends AbstractHandler
{
    public function handle(Request $request): ?string
    {
        echo "ControllerHandler: rendering page '{$request->path}'" . PHP_EOL;

        return "200 OK: {$request->path}";
    }
}
