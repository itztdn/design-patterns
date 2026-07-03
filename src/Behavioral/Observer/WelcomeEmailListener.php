<?php

namespace App\Behavioral\Observer;

class WelcomeEmailListener implements ObserverInterface
{
    public function update(SubjectInterface $subject, mixed $data = null): void
    {
        if ($data instanceof User) {
            echo "WelcomeEmailListener: Sending welcome email to {$data->email}\n";
        }
    }
}
