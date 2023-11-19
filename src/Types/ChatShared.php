<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
request_id	Integer	Identifier of the request
chat_id	Integer	Identifier of the shared chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier. The bot may not have access to the chat and could be unable to use this identifier, unless the chat is already known to the bot by some other means.
 */
class ChatShared extends Type
{
    protected int $request_id;
    protected int $chat_id;

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->request_id;
    }

    /**
     * @return int
     */
    public function getChatId(): int
    {
        return $this->chat_id;
    }
}
