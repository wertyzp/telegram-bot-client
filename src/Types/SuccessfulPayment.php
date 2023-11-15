<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
currency	String	Three-letter ISO 4217 currency code
total_amount	Integer	Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
invoice_payload	String	Bot specified invoice payload
shipping_option_id	String	Optional. Identifier of the shipping option chosen by the user
order_info	OrderInfo	Optional. Order information provided by the user
telegram_payment_charge_id	String	Telegram payment identifier
provider_payment_charge_id	String	Provider payment identifier
 */

class SuccessfulPayment extends Type
{
    protected const TYPE_MAP = [
        'order_info' => OrderInfo::class,
    ];

    protected string $currency;
    protected int $total_amount;
    protected string $invoice_payload;
    protected ?string $shipping_option_id = null;
    protected ?OrderInfo $order_info = null;
    protected string $telegram_payment_charge_id;
    protected string $provider_payment_charge_id;

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return int
     */
    public function getTotalAmount(): int
    {
        return $this->total_amount;
    }

    /**
     * @return string
     */
    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    /**
     * @return string|null
     */
    public function getShippingOptionId(): ?string
    {
        return $this->shipping_option_id;
    }

    /**
     * @return OrderInfo|null
     */
    public function getOrderInfo(): ?OrderInfo
    {
        return $this->order_info;
    }

    /**
     * @return string
     */
    public function getTelegramPaymentChargeId(): string
    {
        return $this->telegram_payment_charge_id;
    }

    /**
     * @return string
     */
    public function getProviderPaymentChargeId(): string
    {
        return $this->provider_payment_charge_id;
    }

}
