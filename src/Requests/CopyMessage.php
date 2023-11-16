<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\ForceReply;
use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardRemove;

/**
 * Parameter    Type    Required	Description
* chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target channel (in the format @channelusername)
* message_thread_id	Integer	Optional	Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
* from_chat_id	Integer or String	Yes	Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
* message_id	Integer	Yes	Message identifier in the chat specified in from_chat_id
* caption	String	Optional	New caption for media, 0-1024 characters after entities parsing. If not specified, the original caption is kept
* parse_mode	String	Optional	Mode for parsing entities in the new caption. See formatting options for more details.
* caption_entities	Array of MessageEntity	Optional	A JSON-serialized list of special entities that appear in the new caption, which can be specified instead of parse_mode
* disable_notification	Boolean	Optional	Sends the message silently. Users will receive a notification with no sound.
* protect_content	Boolean	Optional	Protects the contents of the sent message from forwarding and saving
* reply_to_message_id	Integer	Optional	If the message is a reply, ID of the original message
* allow_sending_without_reply	Boolean	Optional	Pass True if the message should be sent even if the specified replied-to message is not found
* reply_markup	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply	Optional	Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */

class CopyMessage extends Request
{
    protected const SERIALIZE_JSON = [
        'caption_entities',
        'reply_markup',
    ];

    protected int|string $chat_id;
    protected ?int $message_thread_id = null;
    protected int|string $from_chat_id;
    protected int $message_id;
    protected ?string $caption = null;
    protected ?string $parse_mode = null;
    protected ?array $caption_entities = null;
    protected ?bool $disable_notification = null;
    protected ?bool $protect_content = null;
    protected ?int $reply_to_message_id = null;
    protected ?bool $allow_sending_without_reply = null;
    protected InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null;

    public static function create(int|string $chatId, int|string $fromChatId, int $messageId): self
    {
        return new self([
            'chat_id' => $chatId,
            'from_chat_id' => $fromChatId,
            'message_id' => $messageId,
        ]);
    }

    /**
     * @param int|string $chat_id
     * @return CopyMessage
     */
    public function setChatId(int|string $chat_id): CopyMessage
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    /**
     * @param int|null $message_thread_id
     * @return CopyMessage
     */
    public function setMessageThreadId(?int $message_thread_id): CopyMessage
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    /**
     * @param int|string $from_chat_id
     * @return CopyMessage
     */
    public function setFromChatId(int|string $from_chat_id): CopyMessage
    {
        $this->from_chat_id = $from_chat_id;
        return $this;
    }

    /**
     * @param int $message_id
     * @return CopyMessage
     */
    public function setMessageId(int $message_id): CopyMessage
    {
        $this->message_id = $message_id;
        return $this;
    }

    /**
     * @param string|null $caption
     * @return CopyMessage
     */
    public function setCaption(?string $caption): CopyMessage
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @param string|null $parse_mode
     * @return CopyMessage
     */
    public function setParseMode(?string $parse_mode): CopyMessage
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    /**
     * @param array|null $caption_entities
     * @return CopyMessage
     */
    public function setCaptionEntities(?array $caption_entities): CopyMessage
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @param bool|null $disable_notification
     * @return CopyMessage
     */
    public function setDisableNotification(?bool $disable_notification): CopyMessage
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    /**
     * @param bool|null $protect_content
     * @return CopyMessage
     */
    public function setProtectContent(?bool $protect_content): CopyMessage
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    /**
     * @param int|null $reply_to_message_id
     * @return CopyMessage
     */
    public function setReplyToMessageId(?int $reply_to_message_id): CopyMessage
    {
        $this->reply_to_message_id = $reply_to_message_id;
        return $this;
    }

    /**
     * @param bool|null $allow_sending_without_reply
     * @return CopyMessage
     */
    public function setAllowSendingWithoutReply(?bool $allow_sending_without_reply): CopyMessage
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;
        return $this;
    }

    /**
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup
     * @return CopyMessage
     */
    public function setReplyMarkup(ReplyKeyboardMarkup|ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|null $reply_markup): CopyMessage
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

}
