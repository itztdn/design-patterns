<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Structural\Proxy\AccessControlledReportProxy;
use App\Structural\Proxy\LazyReportProxy;
use App\Structural\Proxy\ReportGenerator;
use App\Structural\Proxy\ReportServiceInterface;

/**
 * EN: The client depends only on the interface, so it treats the real
 * generator and any proxy exactly the same way.
 * RU: Клиент зависит только от интерфейса, поэтому обращается с реальным
 * генератором и любым заместителем совершенно одинаково.
 */
function printReport(ReportServiceInterface $service, string $id): void
{
    echo 'App: got -> ' . $service->getReport($id) . PHP_EOL;
}

echo "App: The real subject initializes eagerly, right on creation.\n";
echo "---------------------------------\n";

$real = new ReportGenerator();
printReport($real, 'sales-q1');

echo "\nApp: A lazy proxy that is never used costs nothing.\n";
echo "---------------------------------\n";

$unused = new LazyReportProxy();
echo 'App: proxy created, no generator behind it yet' . PHP_EOL;

echo "\nApp: On first use it creates the generator; repeats hit the cache.\n";
echo "---------------------------------\n";

$lazy = new LazyReportProxy();
printReport($lazy, 'sales-q1');
printReport($lazy, 'sales-q1');
printReport($lazy, 'sales-q2');

echo "\nApp: A protection proxy delegates only for an allowed role.\n";
echo "---------------------------------\n";

$analystView = new AccessControlledReportProxy($lazy, 'analyst');
printReport($analystView, 'sales-q1');

echo "\nApp: A forbidden role never reaches the service.\n";
echo "---------------------------------\n";

$guestView = new AccessControlledReportProxy($lazy, 'guest');

try {
    printReport($guestView, 'sales-q1');
} catch (RuntimeException $e) {
    echo 'App: blocked -> ' . $e->getMessage() . PHP_EOL;
}
