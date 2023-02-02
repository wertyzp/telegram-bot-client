<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Model;

use Werty\Mapping\EmptyObject;

class InlineKeyboardButton extends EmptyObject
{
    protected $text;
    protected $callback_data;
}
