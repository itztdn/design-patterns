<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Structural\Facade\InventoryService;
use App\Structural\Facade\NotificationService;
use App\Structural\Facade\OrderFacade;
use App\Structural\Facade\PaymentGateway;
use App\Structural\Facade\ShippingService;

$inventory = new InventoryService();

$facade = new OrderFacade(
    $inventory,
    new PaymentGateway(),
    new ShippingService(),
    new NotificationService()
);

echo "App: One call instead of four subsystems.\n";
echo "---------------------------------\n";

// EN: The client knows nothing about reservations, gateways or tracking numbers.
// RU: Клиент ничего не знает про резервы, шлюзы и трек-номера.
$result = $facade->placeOrder('book', 2, 39.90, '4111111111111111', 'Baker Street 221B', 'john@example.com');

echo "App: {$result->message} ({$result->trackingNumber})" . PHP_EOL;

echo "\nApp: A declined payment releases the reserved stock.\n";
echo "---------------------------------\n";

$result = $facade->placeOrder('book', 1, 39.90, '4111111111110000', 'Baker Street 221B', 'john@example.com');

echo "App: {$result->message}" . PHP_EOL;

echo "\nApp: Not enough stock, the subsystems are never touched.\n";
echo "---------------------------------\n";

$result = $facade->placeOrder('keyboard', 3, 129.00, '4111111111111111', 'Baker Street 221B', 'john@example.com');

echo "App: {$result->message}" . PHP_EOL;

echo "\nApp: The facade does not block direct access to a subsystem.\n";
echo "---------------------------------\n";

// EN: A facade is a convenience, not a wall: when a report needs one
// specific call, it may use the subsystem class directly.
// RU: Фасад - это удобство, а не стена: если отчету нужен один конкретный
// вызов, он может обратиться к классу подсистемы напрямую.
$inventory->isAvailable('book', 1);
