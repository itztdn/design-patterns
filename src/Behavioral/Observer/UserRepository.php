<?php

namespace App\Behavioral\Observer;

use SplObjectStorage;

class UserRepository implements SubjectInterface
{
    /**
     * EN: SplObjectStorage is a built-in PHP class for storing objects securely.
     * RU: SplObjectStorage - встроенный класс PHP для надежного хранения объектов.
     */
    private SplObjectStorage $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(ObserverInterface $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(ObserverInterface $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(mixed $data = null): void
    {
        /** @var ObserverInterface $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this, $data);
        }
    }

    /**
     * EN: Core business logic that triggers the notification.
     * RU: Основная бизнес-логика, которая запускает уведомление.
     */
    public function createUser(string $email, string $name): User
    {
        echo "UserRepository: Creating user {$name} ({$email})...\n";

        $user = new User($email, $name);

        // EN: Notify observers that a new user was created.
        // RU: Уведомляем наблюдателей о создании нового пользователя.
        $this->notify($user);

        return $user;
    }
}
