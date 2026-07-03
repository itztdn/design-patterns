<?php

namespace App\Behavioral\Observer;

/**
 * EN: A simple DTO to pass user data.
 * RU: Простой DTO для передачи данных пользователя.
 */
readonly class User
{
    public function __construct(
        public string $email,
        public string $name
    ) {}
}
