<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
command	String	Text of the command; 1-32 characters. Can contain only lowercase English letters, digits and underscores.
description	String	Description of the command; 1-256 characters.
 */
class BotCommand extends Type
{
    protected string $command;
    protected string $description;

    public function getCommand(): string
    {
        return $this->command;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
