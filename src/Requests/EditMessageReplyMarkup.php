<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Optional	Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
message_id	Integer	Optional	Required if inline_message_id is not specified. Identifier of the message to edit
inline_message_id	String	Optional	Required if chat_id and message_id are not specified. Identifier of the inline message
reply_markup	InlineKeyboardMarkup	Optional	A JSON-serialized object for an inline keyboard.
 */
class EditMessageReplyMarkup extends Request
{
    protected const SERIALIZE_JSON = [
        'reply_markup',
    ];

    protected int|string|null $chat_id = null;
    protected ?int $message_id = null;
    protected ?string $inline_message_id = null;
    protected ?InlineKeyboardMarkup $reply_markup = null;

    public static function create(int|string $chatId, int $messageId, ?InlineKeyboardMarkup $markup): self
    {
        return new static([
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'reply_markup' => $markup,
        ]);
    }
}
