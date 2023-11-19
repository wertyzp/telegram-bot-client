<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\InputMedia;

class EditMessageMedia extends Request
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

    protected null|int|string $chat_id = null;
    protected ?int $message_id = null;
    protected ?string $inline_message_id = null;
    protected InputMedia $media;
    protected ?InlineKeyboardMarkup $reply_markup = null;

    public static function create(int|string $chatId, int $messageId, InputMedia $media): self
    {
        $editMessage = new self([
            'chat_id' => $chatId,
            'message_id' => $messageId,
        ]);
        $editMessage->setMedia($media);

        return $editMessage;
    }

    public static function inline(string $inlineMessageId, InputMedia $media): self
    {
        $editMessage = new self([
            'inline_message_id' => $inlineMessageId,
        ]);
        $editMessage->setMedia($media);

        return $editMessage;
    }

    /**
     * @param int|string|null $chat_id
     * @return EditMessageMedia
     */
    public function setChatId(int|string|null $chat_id): self
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    /**
     * @param int|null $message_id
     * @return EditMessageMedia
     */
    public function setMessageId(?int $message_id): self
    {
        $this->message_id = $message_id;

        return $this;
    }

    /**
     * @param string|null $inline_message_id
     * @return EditMessageMedia
     */
    public function setInlineMessageId(?string $inline_message_id): self
    {
        $this->inline_message_id = $inline_message_id;

        return $this;
    }

    /**
     * @param InputMedia $media
     * @return EditMessageMedia
     */
    public function setMedia(InputMedia $media): self
    {
        $this->media = $media;

        return $this;
    }

    /**
     * @param InlineKeyboardMarkup|null $reply_markup
     * @return EditMessageMedia
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): self
    {
        $this->reply_markup = $reply_markup;

        return $this;
    }
}
