<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class MenuButton extends Type
{
    protected string $type;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

}
