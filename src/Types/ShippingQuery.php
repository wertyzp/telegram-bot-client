<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
id	String	Unique query identifier
from	User	User who sent the query
invoice_payload	String	Bot specified invoice payload
shipping_address	ShippingAddress	User specified shipping address
 */

class ShippingQuery extends Type
{
    protected const TYPE_MAP = [
        'from' => User::class,
        'shipping_address' => ShippingAddress::class,
    ];

    protected string $id;
    protected User $from;
    protected string $invoice_payload;
    protected ShippingAddress $shipping_address;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    /**
     * @return ShippingAddress
     */
    public function getShippingAddress(): ShippingAddress
    {
        return $this->shipping_address;
    }



}
