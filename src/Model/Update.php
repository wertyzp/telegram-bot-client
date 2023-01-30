<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Model;

use Werty\Mapping\EmptyObject;

class Update extends EmptyObject
{
    protected const TYPE_MAP = [
        'message' => Message::class,
    ];
    protected $update_id;
    protected $message;

    public function getMessage(): ?Message
    {
        return $this->message;
    }
}
