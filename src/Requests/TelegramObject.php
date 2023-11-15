<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Mapping\EmptyObject;

class TelegramObject extends EmptyObject
{
    public static function isScalar(string $type): bool
    {
        return in_array($type, self::T_SCALAR);
    }
}
