<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Behavioral\Observer\UserRepository;
use App\Behavioral\Observer\WelcomeEmailListener;
use App\Behavioral\Observer\AdminNotificationListener;

$repository = new UserRepository();

$welcomeEmailListener = new WelcomeEmailListener();
$adminListener = new AdminNotificationListener('admin@system.com');

$repository->attach($welcomeEmailListener);
$repository->attach($adminListener);

echo "App: Registering a new user...\n";
echo "---------------------------------\n";

$repository->createUser('johndoe@example.com', 'John Doe');

echo "\nApp: Detaching Admin Listener and registering another user...\n";
echo "---------------------------------\n";
$repository->detach($adminListener);
$repository->createUser('janedoe@example.com', 'Jane Doe');
