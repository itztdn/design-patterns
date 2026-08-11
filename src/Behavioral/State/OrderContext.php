<?php

namespace App\Behavioral\State;

/**
 * EN: The Context keeps a reference to the current state object and
 * delegates all state-specific work to it. The client talks to the
 * context, never to the states directly.
 * RU: Контекст хранит ссылку на объект текущего состояния и делегирует
 * ему всю зависящую от состояния работу. Клиент общается с контекстом,
 * а не с состояниями напрямую.
 */
class OrderContext
{
    private OrderStateInterface $state;

    public function __construct(
        public readonly string $id
    ) {
        // EN: A fresh order starts in the "new" state.
        // RU: Новый заказ начинает в состоянии "new".
        $this->state = new NewOrderState();
    }

    /**
     * EN: States call this to move the order forward. It is public
     * on purpose: the transition itself is triggered from within a state.
     * RU: Состояния вызывают это, чтобы продвинуть заказ. Метод публичный
     * намеренно: сам переход инициируется изнутри состояния.
     */
    public function setState(OrderStateInterface $state): void
    {
        echo "OrderContext: '{$this->id}' {$this->state->getName()} -> {$state->getName()}" . PHP_EOL;

        $this->state = $state;
    }

    public function getStateName(): string
    {
        return $this->state->getName();
    }

    public function pay(): void
    {
        $this->state->pay($this);
    }

    public function ship(): void
    {
        $this->state->ship($this);
    }

    public function cancel(): void
    {
        $this->state->cancel($this);
    }
}
