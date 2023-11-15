<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\InputMedia;

class EditMessageMedia extends Sendable
{
    /**
    Parameter	Type	Required	Description
    chat_id	Integer or String	Optional	Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
    message_id	Integer	Optional	Required if inline_message_id is not specified. Identifier of the message to edit
    inline_message_id	String	Optional	Required if chat_id and message_id are not specified. Identifier of the inline message
    media	InputMedia	Yes	A JSON-serialized object for a new media content of the message
    reply_markup	InlineKeyboardMarkup	Optional	A JSON-serialized object for a new inline keyboard.
     */
    protected const TYPE_MAP = [
        'media' => InputMedia::class,
        'reply_markup' => InlineKeyboardMarkup::class,
    ];

    protected int|string $chat_id;
    protected int $message_id;
    protected string $inline_message_id;
    protected InputMedia $media;
    protected InlineKeyboardMarkup $reply_markup;

    public function __construct(int|string $chatId, int $messageId, InputMedia $media)
    {
        parent::__construct([
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'media' => $media,
        ]);
    }
}
