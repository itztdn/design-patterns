<?php

namespace App\Behavioral\State;

/**
 * EN: A paid order. It can be shipped or cancelled (with a refund),
 * but paying again is not allowed.
 * RU: Оплаченный заказ. Его можно отгрузить или отменить (с возвратом
 * денег), но повторно оплатить нельзя.
 */
class PaidOrderState implements OrderStateInterface
{
    public function getName(): string
    {
        return 'paid';
    }

    public function pay(OrderContext $order): void
    {
        echo "PaidOrderState: the order is already paid" . PHP_EOL;
    }

    public function ship(OrderContext $order): void
    {
        echo "PaidOrderState: handed to the courier" . PHP_EOL;
        $order->setState(new ShippedOrderState());
    }

    public function cancel(OrderContext $order): void
    {
        echo "PaidOrderState: cancelled, issuing a refund" . PHP_EOL;
        $order->setState(new CancelledOrderState());
    }
}
