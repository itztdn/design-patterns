<?php

namespace App\Structural\Facade;

/**
 * EN: The Facade. It gives the client one simple entry point
 * to a whole subsystem: stock, payment, shipping and notifications.
 * The facade owns no business data - it only orchestrates the calls.
 * RU: Фасад. Он дает клиенту одну простую точку входа в целую подсистему:
 * склад, оплата, доставка и уведомления. Фасад не хранит бизнес-данные -
 * он только оркестрирует вызовы.
 */
class OrderFacade
{
    public function __construct(
        private readonly InventoryService $inventory,
        private readonly PaymentGateway $payments,
        private readonly ShippingService $shipping,
        private readonly NotificationService $notifications
    ) {}

    /**
     * EN: The client says what it wants, not how to achieve it.
     * All the ordering of steps and rollback logic lives here.
     * RU: Клиент говорит, чего хочет, а не как этого добиться.
     * Порядок шагов и логика отката живут здесь.
     */
    public function placeOrder(
        string $sku,
        int $quantity,
        float $price,
        string $cardNumber,
        string $address,
        string $email
    ): OrderResult {
        if (!$this->inventory->isAvailable($sku, $quantity)) {
            return OrderResult::rejected("'{$sku}' is out of stock");
        }

        $this->inventory->reserve($sku, $quantity);

        if (!$this->payments->charge($cardNumber, $price * $quantity)) {
            // EN: The facade also hides the compensating action from the client.
            // RU: Фасад скрывает от клиента и компенсирующее действие.
            $this->inventory->release($sku, $quantity);

            return OrderResult::rejected('Payment was declined');
        }

        $trackingNumber = $this->shipping->schedule($sku, $quantity, $address);

        $this->notifications->sendOrderConfirmation($email, $trackingNumber);

        return OrderResult::placed($trackingNumber);
    }
}
