<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\Type;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target channel (in the format @channelusername)
message_thread_id	Integer	Optional	Unique identifier for the target message thread; supergroups only
action	String	Yes	Type of action to broadcast. Choose one, depending on what the user is about to receive: typing for text messages, upload_photo for photos, record_video or upload_video for videos, record_voice or upload_voice for voice notes, upload_document for general files, choose_sticker for stickers, find_location for location data, record_video_note or upload_video_note for video notes.
 */
class SendChatAction extends Type
{
    public const ACTION_TYPING = 'typing';
    public const ACTION_UPLOAD_PHOTO = 'upload_photo';
    public const ACTION_RECORD_VIDEO = 'record_video';
    public const ACTION_UPLOAD_VIDEO = 'upload_video';
    public const ACTION_RECORD_VOICE = 'record_voice';
    public const ACTION_UPLOAD_VOICE = 'upload_voice';
    public const ACTION_UPLOAD_DOCUMENT = 'upload_document';
    public const ACTION_FIND_LOCATION = 'find_location';
    public const ACTION_RECORD_VIDEO_NOTE = 'record_video_note';
    public const ACTION_UPLOAD_VIDEO_NOTE = 'upload_video_note';
    public const ACTION_CHOOSE_STICKER = 'choose_sticker';

    protected int|string $chat_id;
    protected ?int $message_thread_id = null;
    protected string $action;

    public static function create($chat_id, string $action): self
    {
        return new static(['chat_id' => $chat_id, 'action' => $action]);
    }

    /**
     * @param int|string $chat_id
     * @return SendChatAction
     */
    public function setChatId(int|string $chat_id): self
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    /**
     * @param int|null $message_thread_id
     * @return SendChatAction
     */
    public function setMessageThreadId(?int $message_thread_id): self
    {
        $this->message_thread_id = $message_thread_id;

        return $this;
    }

    /**
     * @param string $action
     * @return SendChatAction
     */
    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }
}
