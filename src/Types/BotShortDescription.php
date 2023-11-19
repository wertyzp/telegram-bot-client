<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
short_description	String	The bot's short description
 */
class BotShortDescription extends Type
{
    protected string $short_description;

    /**
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->short_description;
    }
}
