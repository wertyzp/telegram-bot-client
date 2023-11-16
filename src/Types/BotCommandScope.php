<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class BotCommandScope extends Type
{
    protected string $type;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return BotCommandScope
     */
    public function setType(string $type): BotCommandScope
    {
        $this->type = $type;
        return $this;
    }

}
