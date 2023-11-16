<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\ForceReply;
use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\InputFile;
use Werty\Http\Clients\TelegramBot\Types\MessageEntity;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardRemove;
use Werty\Mapping\EmptyObject;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target channel (in the format @channelusername)
message_thread_id	Integer	Optional	Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
audio	InputFile or String	Yes	Audio file to send. Pass a file_id as String to send an audio file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an audio file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »
caption	String	Optional	Audio caption, 0-1024 characters after entities parsing
parse_mode	String	Optional	Mode for parsing entities in the audio caption. See formatting options for more details.
caption_entities	Array of MessageEntity	Optional	A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
duration	Integer	Optional	Duration of the audio in seconds
performer	String	Optional	Performer
title	String	Optional	Track name
thumbnail	InputFile or String	Optional	Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
disable_notification	Boolean	Optional	Sends the message silently. Users will receive a notification with no sound.
protect_content	Boolean	Optional	Protects the contents of the sent message from forwarding and saving
reply_to_message_id	Integer	Optional	If the message is a reply, ID of the original message
allow_sending_without_reply	Boolean	Optional	Pass True if the message should be sent even if the specified replied-to message is not found
reply_markup	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply	Optional	Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */

class SendAudio extends Request
{
    protected const SERIALIZE_JSON = [
        'caption_entities',
        'reply_markup'
    ];

    protected const TYPE_MAP = [
        'caption_entities' => [MessageEntity::class],
    ];

    protected int|string $chat_id;
    protected ?int $message_thread_id = null;
    protected InputFile|string $audio;
    protected ?string $caption = null;
    protected ?string $parse_mode = null;
    protected ?array $caption_entities = null;
    protected ?int $duration = null;
    protected ?string $performer = null;
    protected ?string $title = null;
    protected null|InputFile|string $thumbnail = null;
    protected ?bool $disable_notification = null;
    protected ?bool $protect_content = null;
    protected ?int $reply_to_message_id = null;
    protected ?bool $allow_sending_without_reply = null;
    protected null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup = null;

    public static function create(int|string $chatId, InputFile|string $audio): static
    {
        return new static([
            'chat_id' => $chatId,
            'audio' => $audio,
        ]);
    }

    /**
     * @param int|string $chat_id
     * @return SendAudio
     */
    public function setChatId(int|string $chat_id): SendAudio
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    /**
     * @param int|null $message_thread_id
     * @return SendAudio
     */
    public function setMessageThreadId(?int $message_thread_id): SendAudio
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    /**
     * @param string|InputFile $audio
     * @return SendAudio
     */
    public function setAudio(string|InputFile $audio): SendAudio
    {
        $this->audio = $audio;
        return $this;
    }

    /**
     * @param string|null $caption
     * @return SendAudio
     */
    public function setCaption(?string $caption): SendAudio
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @param string|null $parse_mode
     * @return SendAudio
     */
    public function setParseMode(?string $parse_mode): SendAudio
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    /**
     * @param array|null $caption_entities
     * @return SendAudio
     */
    public function setCaptionEntities(?array $caption_entities): SendAudio
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @param int|null $duration
     * @return SendAudio
     */
    public function setDuration(?int $duration): SendAudio
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @param string|null $performer
     * @return SendAudio
     */
    public function setPerformer(?string $performer): SendAudio
    {
        $this->performer = $performer;
        return $this;
    }

    /**
     * @param string|null $title
     * @return SendAudio
     */
    public function setTitle(?string $title): SendAudio
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string|InputFile|null $thumbnail
     * @return SendAudio
     */
    public function setThumbnail(string|InputFile|null $thumbnail): SendAudio
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @param bool|null $disable_notification
     * @return SendAudio
     */
    public function setDisableNotification(?bool $disable_notification): SendAudio
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    /**
     * @param bool|null $protect_content
     * @return SendAudio
     */
    public function setProtectContent(?bool $protect_content): SendAudio
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    /**
     * @param int|null $reply_to_message_id
     * @return SendAudio
     */
    public function setReplyToMessageId(?int $reply_to_message_id): SendAudio
    {
        $this->reply_to_message_id = $reply_to_message_id;
        return $this;
    }

    /**
     * @param bool|null $allow_sending_without_reply
     * @return SendAudio
     */
    public function setAllowSendingWithoutReply(?bool $allow_sending_without_reply): SendAudio
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;
        return $this;
    }

    /**
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup
     * @return SendAudio
     */
    public function setReplyMarkup(ReplyKeyboardMarkup|ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|null $reply_markup): SendAudio
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

}
