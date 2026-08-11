<?php

namespace App\Behavioral\State;

/**
 * EN: The State interface declares the actions that depend on the state.
 * Each concrete state decides what a given action means and which state
 * comes next, so the transition rules live inside the states themselves.
 * RU: Интерфейс состояния объявляет действия, зависящие от состояния.
 * Каждое конкретное состояние решает, что означает действие и какое
 * состояние идет следующим, поэтому правила переходов живут в самих состояниях.
 */
interface OrderStateInterface
{
    public function getName(): string;

    public function pay(OrderContext $order): void;

    public function ship(OrderContext $order): void;

    public function cancel(OrderContext $order): void;
}
