<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
 * Field    Type    Description
 * message_id    Integer    Identifier of the message that will be replied to in the current chat, or in the chat chat_id if it is specified
 * chat_id    Integer or String    Optional. If the message to be replied to is from a different chat, unique identifier for the chat or username of the channel (in the format @channelusername)
 * allow_sending_without_reply    Boolean    Optional. Pass True if the message should be sent even if the specified message to be replied to is not found; can be used only for replies in the same chat and forum topic.
 * quote    String    Optional. Quoted part of the message to be replied to; 0-1024 characters after entities parsing. The quote must be an exact substring of the message to be replied to, including bold, italic, underline, strikethrough, spoiler, and custom_emoji entities. The message will fail to send if the quote isn't found in the original message.
 * quote_parse_mode    String    Optional. Mode for parsing entities in the quote. See formatting options for more details.
 * quote_entities    Array of MessageEntity    Optional. A JSON-serialized list of special entities that appear in the quote. It can be specified instead of quote_parse_mode.
 * quote_position    Integer    Optional. Position of the quote in the original message in UTF-16 code units
 */
class ReplyParameters extends Type
{
    protected int $message_id;
    protected int|string|null $chat_id = null;
    protected ?bool $allow_sending_without_reply = null;
    protected ?string $quote = null;
    protected ?string $quote_parse_mode = null;
    protected ?array $quote_entities = null;
    protected ?int $quote_position = null;

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->message_id;
    }

    /**
     * @return int|string|null
     */
    public function getChatId(): int|string|null
    {
        return $this->chat_id;
    }

    /**
     * @return bool|null
     */
    public function getAllowSendingWithoutReply(): ?bool
    {
        return $this->allow_sending_without_reply;
    }

    /**
     * @return string|null
     */
    public function getQuote(): ?string
    {
        return $this->quote;
    }

    /**
     * @return string|null
     */
    public function getQuoteParseMode(): ?string
    {
        return $this->quote_parse_mode;
    }

    /**
     * @return array|null
     */
    public function getQuoteEntities(): ?array
    {
        return $this->quote_entities;
    }

    /**
     * @return int|null
     */
    public function getQuotePosition(): ?int
    {
        return $this->quote_position;
    }

    public function setMessageId(int $message_id): void
    {
        $this->message_id = $message_id;
    }

    public function setChatId(int|string|null $chat_id): void
    {
        $this->chat_id = $chat_id;
    }

    public function setAllowSendingWithoutReply(?bool $allow_sending_without_reply): void
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;
    }

    public function setQuote(?string $quote): void
    {
        $this->quote = $quote;
    }

    public function setQuoteParseMode(?string $quote_parse_mode): void
    {
        $this->quote_parse_mode = $quote_parse_mode;
    }

    public function setQuoteEntities(?array $quote_entities): void
    {
        $this->quote_entities = $quote_entities;
    }

    public function setQuotePosition(?int $quote_position): void
    {
        $this->quote_position = $quote_position;
    }

}
