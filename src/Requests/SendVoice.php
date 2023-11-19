<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\ForceReply;
use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\InputFile;
use Werty\Http\Clients\TelegramBot\Types\MessageEntity;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardRemove;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target channel (in the format @channelusername)
message_thread_id	Integer	Optional	Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
voice	InputFile or String	Yes	Audio file to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »
caption	String	Optional	Voice message caption, 0-1024 characters after entities parsing
parse_mode	String	Optional	Mode for parsing entities in the voice message caption. See formatting options for more details.
caption_entities	Array of MessageEntity	Optional	A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
duration	Integer	Optional	Duration of the voice message in seconds
disable_notification	Boolean	Optional	Sends the message silently. Users will receive a notification with no sound.
protect_content	Boolean	Optional	Protects the contents of the sent message from forwarding and saving
reply_to_message_id	Integer	Optional	If the message is a reply, ID of the original message
allow_sending_without_reply	Boolean	Optional	Pass True if the message should be sent even if the specified replied-to message is not found
reply_markup	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply	Optional	Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */
class SendVoice extends Request
{
    protected const SERIALIZE_JSON = [
        'caption_entities',
        'reply_markup',
    ];

    protected const TYPE_MAP = [
        'caption_entities' => [MessageEntity::class],
    ];
    protected int|string $chat_id;
    protected ?int $message_thread_id = null;
    protected InputFile|string $voice;
    protected ?string $caption = null;
    protected ?string $parse_mode = null;
    protected ?array $caption_entities = null;
    protected ?int $duration = null;
    protected ?bool $disable_notification = null;
    protected ?bool $protect_content = null;
    protected ?int $reply_to_message_id = null;
    protected ?bool $allow_sending_without_reply = null;
    protected null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup = null;

    public static function create(int|string $chatId, InputFile|string $voice): static
    {
        return new static([
            'chat_id' => $chatId,
            'voice' => $voice,
        ]);
    }

    /**
     * @param int|string $chat_id
     * @return SendVoice
     */
    public function setChatId(int|string $chat_id): self
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    /**
     * @param int|null $message_thread_id
     * @return SendVoice
     */
    public function setMessageThreadId(?int $message_thread_id): self
    {
        $this->message_thread_id = $message_thread_id;

        return $this;
    }

    /**
     * @param string|InputFile $voice
     * @return SendVoice
     */
    public function setVoice(string|InputFile $voice): self
    {
        $this->voice = $voice;

        return $this;
    }

    /**
     * @param string|null $caption
     * @return SendVoice
     */
    public function setCaption(?string $caption): self
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * @param string|null $parse_mode
     * @return SendVoice
     */
    public function setParseMode(?string $parse_mode): self
    {
        $this->parse_mode = $parse_mode;

        return $this;
    }

    /**
     * @param array|null $caption_entities
     * @return SendVoice
     */
    public function setCaptionEntities(?array $caption_entities): self
    {
        $this->caption_entities = $caption_entities;

        return $this;
    }

    /**
     * @param int|null $duration
     * @return SendVoice
     */
    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @param bool|null $disable_notification
     * @return SendVoice
     */
    public function setDisableNotification(?bool $disable_notification): self
    {
        $this->disable_notification = $disable_notification;

        return $this;
    }

    /**
     * @param bool|null $protect_content
     * @return SendVoice
     */
    public function setProtectContent(?bool $protect_content): self
    {
        $this->protect_content = $protect_content;

        return $this;
    }

    /**
     * @param int|null $reply_to_message_id
     * @return SendVoice
     */
    public function setReplyToMessageId(?int $reply_to_message_id): self
    {
        $this->reply_to_message_id = $reply_to_message_id;

        return $this;
    }

    /**
     * @param bool|null $allow_sending_without_reply
     * @return SendVoice
     */
    public function setAllowSendingWithoutReply(?bool $allow_sending_without_reply): self
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;

        return $this;
    }

    /**
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup
     * @return SendVoice
     */
    public function setReplyMarkup(ReplyKeyboardMarkup|ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|null $reply_markup): self
    {
        $this->reply_markup = $reply_markup;

        return $this;
    }
}
