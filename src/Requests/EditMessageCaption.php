<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;

/**
 * Parameter    Type    Required    Description
 * chat_id    Integer or String    Optional    Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * message_id    Integer    Optional    Required if inline_message_id is not specified. Identifier of the message to edit
 * inline_message_id    String    Optional    Required if chat_id and message_id are not specified. Identifier of the inline message
 * caption    String    Optional    New caption of the message, 0-1024 characters after entities parsing
 * parse_mode    String    Optional    Mode for parsing entities in the message caption. See formatting options for more details.
 * caption_entities    Array of MessageEntity    Optional    A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * reply_markup    InlineKeyboardMarkup    Optional    A JSON-serialized object for an inline keyboard.
 */

class EditMessageCaption extends Request
{
    protected const SERIALIZE_JSON = [
        'reply_markup',
        'caption_entities',
    ];

    protected string|int|null $chat_id = null;
    protected ?int $message_id = null;
    protected ?string $inline_message_id = null;
    protected ?string $caption = null;
    protected ?string $parse_mode = null;
    protected ?array $caption_entities = null;
    protected ?InlineKeyboardMarkup $reply_markup = null;

    public static function create(int|string $chatId, int $messageId, string $caption): self
    {
        return new static([
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'caption' => $caption,
        ]);
    }

    public function setChatId(int|string|null $chatId): EditMessageCaption
    {
        $this->chat_id = $chatId;
        return $this;
    }

    public function setMessageId(?int $messageId): EditMessageCaption
    {
        $this->message_id = $messageId;
        return $this;
    }

    public function setInlineMessageId(?string $inline_message_id): EditMessageCaption
    {
        $this->inline_message_id = $inline_message_id;
        return $this;
    }

    public function setCaption(?string $caption): EditMessageCaption
    {
        $this->caption = $caption;
        return $this;
    }

    public function setParseMode(?string $parse_mode): EditMessageCaption
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function setCaptionEntities(?array $caption_entities): EditMessageCaption
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): EditMessageCaption
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

}
