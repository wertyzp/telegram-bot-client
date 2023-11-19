<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\MarkdownV2;
use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;

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
class EditMessageText extends Request
{
    protected const SERIALIZE_JSON = [
        'entities',
        'reply_markup',
    ];

    protected int|string $chat_id;
    protected ?int $message_id = null;
    protected ?string $inline_message_id = null;
    protected string $text;
    protected ?string $parse_mode = null;
    protected ?array $entities = null;
    protected ?bool $disable_web_page_preview = null;
    protected ?InlineKeyboardMarkup $reply_markup = null;

    public static function create(int|string $chatId, int $messageId, string|MarkdownV2 $text): self
    {
        return new self([
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'text' => $text instanceof MarkdownV2 ? $text->toString() : $text,
        ]);
    }

    /**
     * @param int|string $chat_id
     * @return EditMessageText
     */
    public function setChatId(int|string $chat_id): self
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    /**
     * @param int|null $message_id
     * @return EditMessageText
     */
    public function setMessageId(?int $message_id): self
    {
        $this->message_id = $message_id;

        return $this;
    }

    /**
     * @param string|null $inline_message_id
     * @return EditMessageText
     */
    public function setInlineMessageId(?string $inline_message_id): self
    {
        $this->inline_message_id = $inline_message_id;

        return $this;
    }

    /**
     * @param string $text
     * @return EditMessageText
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @param string|null $parse_mode
     * @return EditMessageText
     */
    public function setParseMode(?string $parse_mode): self
    {
        $this->parse_mode = $parse_mode;

        return $this;
    }

    /**
     * @param array|null $entities
     * @return EditMessageText
     */
    public function setEntities(?array $entities): self
    {
        $this->entities = $entities;

        return $this;
    }

    /**
     * @param bool|null $disable_web_page_preview
     * @return EditMessageText
     */
    public function setDisableWebPagePreview(?bool $disable_web_page_preview): self
    {
        $this->disable_web_page_preview = $disable_web_page_preview;

        return $this;
    }

    /**
     * @param InlineKeyboardMarkup|null $reply_markup
     * @return EditMessageText
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): self
    {
        $this->reply_markup = $reply_markup;

        return $this;
    }
}
