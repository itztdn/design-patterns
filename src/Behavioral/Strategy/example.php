<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Behavioral\Strategy\OrderContext;
use App\Behavioral\Strategy\CreditCardPayment;
use App\Behavioral\Strategy\PayPalPayment;

$order = new OrderContext();
$orderAmount = 150.75;

echo "App: Client selected Credit Card.\n";
$creditCardStrategy = new CreditCardPayment('1234567890123456', '123');
$order->setPaymentStrategy($creditCardStrategy);
$order->processCheckout($orderAmount);

echo "\nApp: Client changed their mind, selected PayPal.\n";
$paypalStrategy = new PayPalPayment('user@example.com');
$order->setPaymentStrategy($paypalStrategy);
$order->processCheckout($orderAmount);
