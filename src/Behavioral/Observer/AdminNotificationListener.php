<?php

namespace App\Behavioral\Observer;

class AdminNotificationListener implements ObserverInterface
{
    public function __construct(
        private readonly string $adminEmail
    ) {}

    public function update(SubjectInterface $subject, mixed $data = null): void
    {
        if ($data instanceof User) {
            echo "AdminNotificationListener: Alerting admin at {$this->adminEmail} about new user {$data->name}\n";
        }
    }
}
