<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Model;

use Werty\Mapping\EmptyObject;

class Update extends EmptyObject
{
    protected const TYPE_MAP = [
        'message' => Message::class,
        'callback_query' => CallbackQuery::class,
    ];
    protected $update_id;
    protected $message;
    protected $callback_query;

    public function getMessage(): ?Message
    {
        return $this->message;
    }

    public function getCallbackQuery(): ?CallbackQuery
    {
        return $this->callback_query;
    }
}
