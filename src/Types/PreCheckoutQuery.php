<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
id	String	Unique query identifier
from	User	User who sent the query
currency	String	Three-letter ISO 4217 currency code
total_amount	Integer	Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
invoice_payload	String	Bot specified invoice payload
shipping_option_id	String	Optional. Identifier of the shipping option chosen by the user
order_info	OrderInfo	Optional. Order information provided by the user
 */
class PreCheckoutQuery extends Type
{
    protected const TYPE_MAP = [
        'from' => User::class,
        'order_info' => OrderInfo::class,
    ];

    protected string $id;
    protected User $from;
    protected string $currency;
    protected int $total_amount;
    protected string $invoice_payload;
    protected ?string $shipping_option_id = null;
    protected ?OrderInfo $order_info = null;

    public function getId(): string
    {
        return $this->id;
    }

    public function getFrom(): User
    {
        return $this->from;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getTotalAmount(): int
    {
        return $this->total_amount;
    }

    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    public function getShippingOptionId(): ?string
    {
        return $this->shipping_option_id;
    }

    public function getOrderInfo(): ?OrderInfo
    {
        return $this->order_info;
    }
}
