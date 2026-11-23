<?php

namespace App\Behavioral\ChainOfResponsibility;

/**
 * EN: The Handler interface. It declares a method for linking handlers into
 * a chain and a method for processing the request. The client and every
 * handler know only this interface, never the concrete classes in the chain.
 * RU: Интерфейс обработчика. Объявляет метод для связывания обработчиков
 * в цепочку и метод для обработки запроса. Клиент и каждый обработчик знают
 * только этот интерфейс и никогда - конкретные классы в цепочке.
 */
interface HandlerInterface
{
    /**
     * EN: Returns the handler it received, so a chain can be built in one
     * expression: $a->setNext($b)->setNext($c).
     * RU: Возвращает переданный обработчик, чтобы цепочку можно было собрать
     * одним выражением: $a->setNext($b)->setNext($c).
     */
    public function setNext(HandlerInterface $handler): HandlerInterface;

    /**
     * EN: Returns a response, or null if nobody in the chain handled the request.
     * RU: Возвращает ответ или null, если запрос никто в цепочке не обработал.
     */
    public function handle(Request $request): ?string;
}
