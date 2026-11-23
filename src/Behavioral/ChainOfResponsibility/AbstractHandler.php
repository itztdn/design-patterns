<?php

namespace App\Behavioral\ChainOfResponsibility;

/**
 * EN: The Base Handler. It stores the link to the next handler and implements
 * the default behaviour - passing the request further. Concrete handlers
 * extend it and call parent::handle() whenever they decide not to stop the request.
 * RU: Базовый обработчик. Хранит ссылку на следующий обработчик и реализует
 * поведение по умолчанию - передачу запроса дальше. Конкретные обработчики
 * наследуют его и вызывают parent::handle(), когда решают не останавливать запрос.
 */
abstract class AbstractHandler implements HandlerInterface
{
    private ?HandlerInterface $next = null;

    public function setNext(HandlerInterface $handler): HandlerInterface
    {
        $this->next = $handler;

        return $handler;
    }

    public function handle(Request $request): ?string
    {
        // EN: The end of the chain: nobody has handled the request. This is a
        // real consequence of the pattern - handling is not guaranteed.
        // RU: Конец цепочки: запрос никто не обработал. Это реальное следствие
        // паттерна - обработка не гарантирована.
        if ($this->next === null) {
            return null;
        }

        return $this->next->handle($request);
    }
}
