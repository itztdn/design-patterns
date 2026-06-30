<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Creational\FactoryMethod\EmailNotificationFactory;
use App\Creational\FactoryMethod\SmsNotificationFactory;
use App\Creational\FactoryMethod\NotificationFactory;

/**
 * EN: Client code works with an instance of a concrete creator, 
 * but through its base interface.
 * RU: Клиентский код работает с экземпляром конкретного создателя, 
 * но через его базовый интерфейс.
 */
function clientCode(NotificationFactory $creator, string $message)
{
    $creator->notifyUser($message);
}

echo "App: Testing Email Notification Factory.\n";
$emailFactory = new EmailNotificationFactory('admin@example.com');
clientCode($emailFactory, 'System is going down for maintenance!');

echo "\nApp: Testing SMS Notification Factory.\n";
$smsFactory = new SmsNotificationFactory('+1234567890');
clientCode($smsFactory, 'Your verification code is 8839.');
