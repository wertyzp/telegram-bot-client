<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
 * Field    Type    Description
 * label    String    Portion label
 * amount    Integer    Price of the product in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
 */
class LabeledPrice extends Type
{
    protected string $label;
    protected int $amount;

    public static function create(string $label, int $amount): self
    {
        return new static([
            'label' => $label,
            'amount' => $amount,
        ]);
    }
    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

}
