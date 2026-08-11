<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Behavioral\State\OrderContext;

/**
 * EN: The client always calls the same methods. It never checks the
 * current state with if/switch - the state object decides what happens.
 * RU: Клиент всегда вызывает одни и те же методы. Он никогда не проверяет
 * текущее состояние через if/switch - что произойдет, решает объект состояния.
 */

echo "App: A happy path from new to shipped.\n";
echo "---------------------------------\n";

$order = new OrderContext('order-1');
$order->pay();
$order->ship();
echo "App: final state -> {$order->getStateName()}" . PHP_EOL;

echo "\nApp: The same actions are refused in the wrong order.\n";
echo "---------------------------------\n";

$second = new OrderContext('order-2');
$second->ship();  // EN: cannot ship before payment / RU: нельзя отгрузить до оплаты
$second->pay();
$second->pay();   // EN: already paid / RU: уже оплачен

echo "\nApp: Cancelling is allowed early, forbidden once shipped.\n";
echo "---------------------------------\n";

$third = new OrderContext('order-3');
$third->cancel();
$third->pay();    // EN: cannot pay a cancelled order / RU: нельзя оплатить отмененный

$fourth = new OrderContext('order-4');
$fourth->pay();
$fourth->ship();
$fourth->cancel(); // EN: a shipped order cannot be cancelled / RU: отгруженный нельзя отменить
echo "App: final state -> {$fourth->getStateName()}" . PHP_EOL;
