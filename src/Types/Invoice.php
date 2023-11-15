<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
title	String	Product name
description	String	Product description
start_parameter	String	Unique bot deep-linking parameter that can be used to generate this invoice
currency	String	Three-letter ISO 4217 currency code
total_amount	Integer	Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 */

class Invoice extends Type
{
    protected string $title;
    protected string $description;
    protected string $start_parameter;
    protected string $currency;
    protected int $total_amount;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getStartParameter(): string
    {
        return $this->start_parameter;
    }

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

}
