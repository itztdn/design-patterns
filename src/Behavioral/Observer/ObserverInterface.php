<?php

namespace App\Behavioral\Observer;

interface ObserverInterface
{
    /**
     * EN: Receive update from subject.
     * RU: Получить обновление от издателя.
     */
    public function update(SubjectInterface $subject, mixed $data = null): void;
}
