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
video_note	InputFile or String	Yes	Video note to send. Pass a file_id as String to send a video note that exists on the Telegram servers (recommended) or upload a new video using multipart/form-data. More information on Sending Files ». Sending video notes by a URL is currently unsupported
duration	Integer	Optional	Duration of sent video in seconds
length	Integer	Optional	Video width and height, i.e. diameter of the video message
thumbnail	InputFile or String	Optional	Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
disable_notification	Boolean	Optional	Sends the message silently. Users will receive a notification with no sound.
protect_content	Boolean	Optional	Protects the contents of the sent message from forwarding and saving
reply_to_message_id	Integer	Optional	If the message is a reply, ID of the original message
allow_sending_without_reply	Boolean	Optional	Pass True if the message should be sent even if the specified replied-to message is not found
reply_markup	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply	Optional	Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */

class SendVideoNote extends Request
{
    protected const TYPE_MAP = [
        'thumbnail' => [InputFile::class],
        'caption_entities' => [MessageEntity::class],
    ];
    protected int|string $chat_id;
    protected ?int $message_thread_id = null;
    protected InputFile|string $video_note;
    protected ?int $duration = null;
    protected ?int $length = null;
    protected null|InputFile|string $thumbnail;
    protected ?bool $disable_notification = null;
    protected ?bool $protect_content = null;
    protected ?int $reply_to_message_id = null;
    protected ?bool $allow_sending_without_reply = null;
    protected null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup = null;

    public static function create(int|string $chatId, InputFile|string $videoNote): static
    {
        return new static([
            'chat_id' => $chatId,
            'video_note' => $videoNote,
        ]);
    }

    /**
     * @param int|string $chat_id
     * @return SendVideoNote
     */
    public function setChatId(int|string $chat_id): SendVideoNote
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    /**
     * @param int|null $message_thread_id
     * @return SendVideoNote
     */
    public function setMessageThreadId(?int $message_thread_id): SendVideoNote
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    /**
     * @param string|InputFile $video_note
     * @return SendVideoNote
     */
    public function setVideoNote(string|InputFile $video_note): SendVideoNote
    {
        $this->video_note = $video_note;
        return $this;
    }

    /**
     * @param int|null $duration
     * @return SendVideoNote
     */
    public function setDuration(?int $duration): SendVideoNote
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @param int|null $length
     * @return SendVideoNote
     */
    public function setLength(?int $length): SendVideoNote
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @param string|InputFile $thumbnail
     * @return SendVideoNote
     */
    public function setThumbnail(string|InputFile $thumbnail): SendVideoNote
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @param bool|null $disable_notification
     * @return SendVideoNote
     */
    public function setDisableNotification(?bool $disable_notification): SendVideoNote
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    /**
     * @param bool|null $protect_content
     * @return SendVideoNote
     */
    public function setProtectContent(?bool $protect_content): SendVideoNote
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    /**
     * @param int|null $reply_to_message_id
     * @return SendVideoNote
     */
    public function setReplyToMessageId(?int $reply_to_message_id): SendVideoNote
    {
        $this->reply_to_message_id = $reply_to_message_id;
        return $this;
    }

    /**
     * @param bool|null $allow_sending_without_reply
     * @return SendVideoNote
     */
    public function setAllowSendingWithoutReply(?bool $allow_sending_without_reply): SendVideoNote
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;
        return $this;
    }

    /**
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup
     * @return SendVideoNote
     */
    public function setReplyMarkup(ReplyKeyboardMarkup|ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|null $reply_markup): SendVideoNote
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

}
