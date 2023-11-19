<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
name	String	Optional. User name
phone_number	String	Optional. User's phone number
email	String	Optional. User email
shipping_address	ShippingAddress	Optional. User shipping address
 */
class OrderInfo extends Type
{
    protected const TYPE_MAP = [
        'shipping_address' => ShippingAddress::class,
    ];

    protected ?string $name = null;
    protected ?string $phone_number = null;
    protected ?string $email = null;
    protected ?ShippingAddress $shipping_address = null;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return ShippingAddress|null
     */
    public function getShippingAddress(): ?ShippingAddress
    {
        return $this->shipping_address;
    }
}
