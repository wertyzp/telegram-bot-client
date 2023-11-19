<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
description	String	The bot's description
 */
class BotDescription extends Type
{
    protected string $description;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}
