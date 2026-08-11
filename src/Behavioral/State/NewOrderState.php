<?php

namespace App\Behavioral\State;

/**
 * EN: A brand-new order. It can be paid or cancelled, but not shipped yet.
 * RU: Только что созданный заказ. Его можно оплатить или отменить,
 * но еще нельзя отгрузить.
 */
class NewOrderState implements OrderStateInterface
{
    public function getName(): string
    {
        return 'new';
    }

    public function pay(OrderContext $order): void
    {
        echo "NewOrderState: payment accepted" . PHP_EOL;
        $order->setState(new PaidOrderState());
    }

    public function ship(OrderContext $order): void
    {
        echo "NewOrderState: cannot ship an unpaid order" . PHP_EOL;
    }

    public function cancel(OrderContext $order): void
    {
        echo "NewOrderState: order cancelled before payment" . PHP_EOL;
        $order->setState(new CancelledOrderState());
    }
}
