<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
emoji	String	Emoji on which the dice throw animation is based
value	Integer	Value of the dice, 1-6 for “🎲”, “🎯” and “🎳” base emoji, 1-5 for “🏀” and “⚽” base emoji, 1-64 for “🎰” base emoji
 */
class Dice extends Type
{
    protected string $emoji;
    protected int $value;

    /**
     * @return string
     */
    public function getEmoji(): string
    {
        return $this->emoji;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}
