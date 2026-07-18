<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Creational\Builder\CurlCommandBuilder;
use App\Creational\Builder\HttpRequestBuilder;
use App\Creational\Builder\RequestDirector;

$director = new RequestDirector();

echo "App: The same director, two different representations.\n";
echo "---------------------------------\n";

$requestBuilder = new HttpRequestBuilder();
$director->buildJsonPost($requestBuilder, 'https://api.example.com/orders', '{"item":"book","qty":2}');
echo $requestBuilder->getRequest()->describe() . PHP_EOL;

echo PHP_EOL;

$curlBuilder = new CurlCommandBuilder();
$director->buildJsonPost($curlBuilder, 'https://api.example.com/orders', '{"item":"book","qty":2}');
echo $curlBuilder->getCommand() . PHP_EOL;

echo "\nApp: Another predefined configuration.\n";
echo "---------------------------------\n";

$director->buildAuthorizedGet($curlBuilder, 'https://api.example.com/profile', 'secret-token');
echo $curlBuilder->getCommand() . PHP_EOL;

echo "\nApp: Without a director the client controls the steps itself.\n";
echo "---------------------------------\n";

// EN: Only the steps we really need, in any order.
// RU: Только действительно нужные шаги, в любом порядке.
$request = $requestBuilder
    ->setMethod('DELETE')
    ->setUrl('https://api.example.com/orders/42')
    ->addHeader('Authorization', 'Bearer secret-token')
    ->getRequest();

echo $request->describe() . PHP_EOL;
