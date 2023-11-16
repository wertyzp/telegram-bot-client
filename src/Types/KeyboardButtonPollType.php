<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

use Werty\Mapping\EmptyObject;

/**
Field	Type	Description
type	String	Optional. If quiz is passed, the user will be allowed to create only polls in the quiz mode. If regular is passed, only regular polls will be allowed. Otherwise, the user will be allowed to create a poll of any type.
 */

class KeyboardButtonPollType extends EmptyObject
{
    protected ?string $type = null;

    public function getType(): ?string
    {
        return $this->type;
    }
}
