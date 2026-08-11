<?php

namespace App\Behavioral\State;

/**
 * EN: A cancelled order. A terminal state that rejects every action.
 * RU: Отмененный заказ. Конечное состояние, отвергающее любое действие.
 */
class CancelledOrderState implements OrderStateInterface
{
    public function getName(): string
    {
        return 'cancelled';
    }

    public function pay(OrderContext $order): void
    {
        echo "CancelledOrderState: cannot pay a cancelled order" . PHP_EOL;
    }

    public function ship(OrderContext $order): void
    {
        echo "CancelledOrderState: cannot ship a cancelled order" . PHP_EOL;
    }

    public function cancel(OrderContext $order): void
    {
        echo "CancelledOrderState: the order is already cancelled" . PHP_EOL;
    }
}
