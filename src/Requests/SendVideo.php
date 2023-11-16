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
video	InputFile or String	Yes	Video to send. Pass a file_id as String to send a video that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a video from the Internet, or upload a new video using multipart/form-data. More information on Sending Files »
duration	Integer	Optional	Duration of sent video in seconds
width	Integer	Optional	Video width
height	Integer	Optional	Video height
thumbnail	InputFile or String	Optional	Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
caption	String	Optional	Video caption (may also be used when resending videos by file_id), 0-1024 characters after entities parsing
parse_mode	String	Optional	Mode for parsing entities in the video caption. See formatting options for more details.
caption_entities	Array of MessageEntity	Optional	A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
has_spoiler	Boolean	Optional	Pass True if the video needs to be covered with a spoiler animation
supports_streaming	Boolean	Optional	Pass True if the uploaded video is suitable for streaming
disable_notification	Boolean	Optional	Sends the message silently. Users will receive a notification with no sound.
protect_content	Boolean	Optional	Protects the contents of the sent message from forwarding and saving
reply_to_message_id	Integer	Optional	If the message is a reply, ID of the original message
allow_sending_without_reply	Boolean	Optional	Pass True if the message should be sent even if the specified replied-to message is not found
reply_markup	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply	Optional	Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */

class SendVideo extends Request
{
    protected const SERIALIZE_JSON = [
        'reply_markup',
        'caption_entities',
    ];

    protected const TYPE_MAP = [
        'caption_entities' => MessageEntity::class,
    ];

    protected int|string $chat_id;
    protected ?int $message_thread_id = null;
    protected InputFile|string $video;
    protected ?int $duration = null;
    protected ?int $width = null;
    protected ?int $height = null;
    protected null|InputFile|string $thumbnail = null;
    protected ?string $caption = null;
    protected ?string $parse_mode = null;
    protected ?array $caption_entities = null;
    protected ?bool $has_spoiler = null;
    protected ?bool $supports_streaming = null;
    protected ?bool $disable_notification = null;
    protected ?bool $protect_content = null;
    protected ?int $reply_to_message_id = null;
    protected ?bool $allow_sending_without_reply = null;
    protected null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup = null;

    /**
     * @param int|string $chat_id
     * @return SendVideo
     */
    public function setChatId(int|string $chat_id): SendVideo
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    /**
     * @param int|null $message_thread_id
     * @return SendVideo
     */
    public function setMessageThreadId(?int $message_thread_id): SendVideo
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    /**
     * @param string|InputFile $video
     * @return SendVideo
     */
    public function setVideo(string|InputFile $video): SendVideo
    {
        $this->video = $video;
        return $this;
    }

    /**
     * @param int|null $duration
     * @return SendVideo
     */
    public function setDuration(?int $duration): SendVideo
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @param int|null $width
     * @return SendVideo
     */
    public function setWidth(?int $width): SendVideo
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param int|null $height
     * @return SendVideo
     */
    public function setHeight(?int $height): SendVideo
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @param string|InputFile|null $thumbnail
     * @return SendVideo
     */
    public function setThumbnail(string|InputFile|null $thumbnail): SendVideo
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @param string|null $caption
     * @return SendVideo
     */
    public function setCaption(?string $caption): SendVideo
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @param string|null $parse_mode
     * @return SendVideo
     */
    public function setParseMode(?string $parse_mode): SendVideo
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    /**
     * @param array|null $caption_entities
     * @return SendVideo
     */
    public function setCaptionEntities(?array $caption_entities): SendVideo
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @param bool|null $has_spoiler
     * @return SendVideo
     */
    public function setHasSpoiler(?bool $has_spoiler): SendVideo
    {
        $this->has_spoiler = $has_spoiler;
        return $this;
    }

    /**
     * @param bool|null $supports_streaming
     * @return SendVideo
     */
    public function setSupportsStreaming(?bool $supports_streaming): SendVideo
    {
        $this->supports_streaming = $supports_streaming;
        return $this;
    }

    /**
     * @param bool|null $disable_notification
     * @return SendVideo
     */
    public function setDisableNotification(?bool $disable_notification): SendVideo
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    /**
     * @param bool|null $protect_content
     * @return SendVideo
     */
    public function setProtectContent(?bool $protect_content): SendVideo
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    /**
     * @param int|null $reply_to_message_id
     * @return SendVideo
     */
    public function setReplyToMessageId(?int $reply_to_message_id): SendVideo
    {
        $this->reply_to_message_id = $reply_to_message_id;
        return $this;
    }

    /**
     * @param bool|null $allow_sending_without_reply
     * @return SendVideo
     */
    public function setAllowSendingWithoutReply(?bool $allow_sending_without_reply): SendVideo
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;
        return $this;
    }

    /**
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup
     * @return SendVideo
     */
    public function setReplyMarkup(ReplyKeyboardMarkup|ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|null $reply_markup): SendVideo
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }
}
