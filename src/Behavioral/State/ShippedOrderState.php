<?php

namespace App\Behavioral\State;

/**
 * EN: A shipped order. This is a terminal state for our workflow:
 * it can no longer be paid, shipped again or cancelled.
 * RU: Отгруженный заказ. Для нашего процесса это конечное состояние:
 * его больше нельзя оплатить, отгрузить повторно или отменить.
 */
class ShippedOrderState implements OrderStateInterface
{
    public function getName(): string
    {
        return 'shipped';
    }

    public function pay(OrderContext $order): void
    {
        echo "ShippedOrderState: nothing to pay, already shipped" . PHP_EOL;
    }

    public function ship(OrderContext $order): void
    {
        echo "ShippedOrderState: already on its way" . PHP_EOL;
    }

    public function cancel(OrderContext $order): void
    {
        echo "ShippedOrderState: a shipped order cannot be cancelled" . PHP_EOL;
    }
}
