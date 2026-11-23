<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Behavioral\ChainOfResponsibility\AuthenticationHandler;
use App\Behavioral\ChainOfResponsibility\ControllerHandler;
use App\Behavioral\ChainOfResponsibility\HandlerInterface;
use App\Behavioral\ChainOfResponsibility\RateLimitHandler;
use App\Behavioral\ChainOfResponsibility\Request;

/**
 * EN: The client sends a request to the first handler only. It knows neither
 * how long the chain is nor which handler will finally respond.
 * RU: Клиент отправляет запрос только первому обработчику. Он не знает ни
 * длины цепочки, ни того, какой обработчик в итоге ответит.
 */
function send(HandlerInterface $chain, Request $request): void
{
    $response = $chain->handle($request);

    echo 'App: response -> ' . ($response ?? 'nobody handled the request') . PHP_EOL;
}

// EN: Link the handlers: rate limit -> authentication -> controller.
// setNext() returns its argument, so the rest of the chain is one expression.
// RU: Связываем обработчики: лимит запросов -> аутентификация -> контроллер.
// setNext() возвращает свой аргумент, поэтому остаток цепочки - одно выражение.
$api = new RateLimitHandler(maxRequests: 2);
$api->setNext(new AuthenticationHandler(['secret-token']))
    ->setNext(new ControllerHandler());

echo "App: A valid request passes every handler and reaches the controller.\n";
echo "---------------------------------\n";
send($api, new Request('/profile', '10.0.0.1', 'secret-token'));

echo "\nApp: Without a token the chain stops early; the controller never runs.\n";
echo "---------------------------------\n";
send($api, new Request('/profile', '10.0.0.1'));

echo "\nApp: Over the limit, the very first handler stops even a valid request.\n";
echo "---------------------------------\n";
send($api, new Request('/profile', '10.0.0.1', 'secret-token'));

echo "\nApp: The same handler classes, a different chain: a public page needs no token.\n";
echo "---------------------------------\n";

$public = new RateLimitHandler(maxRequests: 2);
$public->setNext(new ControllerHandler());
send($public, new Request('/about', '10.0.0.2'));

echo "\nApp: A chain without a final handler may leave the request unhandled.\n";
echo "---------------------------------\n";
send(new AuthenticationHandler(['secret-token']), new Request('/profile', '10.0.0.3', 'secret-token'));
