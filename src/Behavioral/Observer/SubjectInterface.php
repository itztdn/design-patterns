<?php

namespace App\Behavioral\Observer;

interface SubjectInterface
{
    /**
     * EN: Attach an observer to the subject.
     * RU: Присоединить наблюдателя к издателю.
     */
    public function attach(ObserverInterface $observer): void;

    /**
     * EN: Detach an observer from the subject.
     * RU: Отсоединить наблюдателя от издателя.
     */
    public function detach(ObserverInterface $observer): void;

    /**
     * EN: Notify all observers about an event.
     * RU: Уведомить всех наблюдателей о событии.
     */
    public function notify(mixed $data = null): void;
}
