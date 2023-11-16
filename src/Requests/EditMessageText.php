<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\MarkdownV2;
use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;
use Werty\Mapping\EmptyObject;

class EditMessageText extends EmptyObject
{
    /**
    Parameter	Type	Required	Description
    chat_id	Integer or String	Optional	Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
    message_id	Integer	Optional	Required if inline_message_id is not specified. Identifier of the message to edit
    inline_message_id	String	Optional	Required if chat_id and message_id are not specified. Identifier of the inline message
    text	String	Yes	New text of the message, 1-4096 characters after entities parsing
    parse_mode	String	Optional	Mode for parsing entities in the message text. See formatting options for more details.
    entities	Array of MessageEntity	Optional	A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode
    disable_web_page_preview	Boolean	Optional	Disables link previews for links in this message
    reply_markup	InlineKeyboardMarkup	Optional	A JSON-serialized object for an inline keyboard.
     */
    protected int|string $chat_id;
    protected int $message_id;
    protected string $inline_message_id;
    protected string $text;
    protected string $parse_mode;
    protected array $entities;
    protected bool $disable_web_page_preview;
    protected InlineKeyboardMarkup $reply_markup;

    public function __construct(int|string $chatId, int $messageId, string|MarkdownV2 $text)
    {
        parent::__construct([
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'text' => $text instanceof MarkdownV2 ? $text->toString() : $text,
        ]);
    }
}
