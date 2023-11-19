<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
country_code	String	Two-letter ISO 3166-1 alpha-2 country code
state	String	State, if applicable
city	String	City
street_line1	String	First line for the address
street_line2	String	Second line for the address
post_code	String	Address post code
 */
class ShippingAddress extends Type
{
    protected string $country_code;
    protected string $state;
    protected string $city;
    protected string $street_line1;
    protected string $street_line2;
    protected string $post_code;

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->country_code;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getStreetLine1(): string
    {
        return $this->street_line1;
    }

    /**
     * @return string
     */
    public function getStreetLine2(): string
    {
        return $this->street_line2;
    }

    /**
     * @return string
     */
    public function getPostCode(): string
    {
        return $this->post_code;
    }
}
