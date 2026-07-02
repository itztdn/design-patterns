<?php

namespace App\Behavioral\Strategy;

class OrderContext
{
    private ?PaymentStrategy $paymentStrategy = null;

    /**
     * EN: Allows setting or changing the strategy at runtime.
     * RU: Позволяет установить или изменить стратегию во время выполнения.
     */
    public function setPaymentStrategy(PaymentStrategy $strategy): void
    {
        $this->paymentStrategy = $strategy;
    }

    /**
     * EN: The context delegates the work to the strategy object.
     * RU: Контекст делегирует работу объекту стратегии.
     */
    public function processCheckout(float $amount): void
    {
        if ($this->paymentStrategy === null) {
            echo "Error: Payment method is not selected." . PHP_EOL;
            return;
        }

        // EN: We don't care WHICH strategy is used, just that it has a pay() method.
        // RU: Нам не важно КАКАЯ стратегия используется, главное, что у неё есть метод pay().
        $this->paymentStrategy->pay($amount);
    }
}
