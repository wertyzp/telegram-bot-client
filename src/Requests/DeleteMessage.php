<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target channel (in the format @channelusername)
message_id	Integer	Yes	Identifier of the message to delete
 */
class DeleteMessage extends Request
{
    protected int|string $chat_id;
    protected int $message_id;

    public static function create(int|string $chat_id, int $message_id): self
    {
        return new self([
            'chat_id' => $chat_id,
            'message_id' => $message_id,
        ]);
    }
}
