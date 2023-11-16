<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\InputMedia;
use Werty\Mapping\EmptyObject;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target channel (in the format @channelusername)
message_thread_id	Integer	Optional	Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
media	Array of InputMediaAudio, InputMediaDocument, InputMediaPhoto and InputMediaVideo	Yes	A JSON-serialized array describing messages to be sent, must include 2-10 items
disable_notification	Boolean	Optional	Sends messages silently. Users will receive a notification with no sound.
protect_content	Boolean	Optional	Protects the contents of the sent messages from forwarding and saving
reply_to_message_id	Integer	Optional	If the messages are a reply, ID of the original message
allow_sending_without_reply	Boolean	Optional	Pass True if the message should be sent even if the specified replied-to message is not found
 */
class SendMediaGroup extends Request
{
    protected int $chat_id;
    protected ?int $message_thread_id = null;
    protected array $media;
    protected ?bool $disable_notification = null;
    protected ?bool $protect_content = null;
    protected ?int $reply_to_message_id = null;
    protected ?bool $allow_sending_without_reply = null;

    protected const SERIALIZE_JSON = [
        'media',
    ];

    /**
     * @param int $chatId
     * @param InputMedia[] $media
     * @return static
     */
    public static function create(int $chatId, array $media = []): static
    {
        return new static([
            'chat_id' => $chatId,
            'media' => $media,
        ]);
    }

    public function addMedia(InputMedia $media): self
    {
        $this->media[] = $media;
        return $this;
    }

    /**
     * @param int $chat_id
     * @return SendMediaGroup
     */
    public function setChatId(int $chat_id): SendMediaGroup
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    /**
     * @param int|null $message_thread_id
     * @return SendMediaGroup
     */
    public function setMessageThreadId(?int $message_thread_id): SendMediaGroup
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    /**
     * @param array $media
     * @return SendMediaGroup
     */
    public function setMedia(array $media): SendMediaGroup
    {
        $this->media = $media;
        return $this;
    }

    /**
     * @param bool|null $disable_notification
     * @return SendMediaGroup
     */
    public function setDisableNotification(?bool $disable_notification): SendMediaGroup
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    /**
     * @param bool|null $protect_content
     * @return SendMediaGroup
     */
    public function setProtectContent(?bool $protect_content): SendMediaGroup
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    /**
     * @return int
     */
    public function getChatId(): int
    {
        return $this->chat_id;
    }

    /**
     * @return int|null
     */
    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    /**
     * @return InputMedia[]
     */
    public function getMedia(): array
    {
        return $this->media;
    }

    /**
     * @return bool|null
     */
    public function getDisableNotification(): ?bool
    {
        return $this->disable_notification;
    }

    /**
     * @return bool|null
     */
    public function getProtectContent(): ?bool
    {
        return $this->protect_content;
    }

    /**
     * @return int|null
     */
    public function getReplyToMessageId(): ?int
    {
        return $this->reply_to_message_id;
    }

    /**
     * @return bool|null
     */
    public function getAllowSendingWithoutReply(): ?bool
    {
        return $this->allow_sending_without_reply;
    }

    /**
     * @param int|null $reply_to_message_id
     * @return SendMediaGroup
     */
    public function setReplyToMessageId(?int $reply_to_message_id): SendMediaGroup
    {
        $this->reply_to_message_id = $reply_to_message_id;
        return $this;
    }

    /**
     * @param bool|null $allow_sending_without_reply
     * @return SendMediaGroup
     */
    public function setAllowSendingWithoutReply(?bool $allow_sending_without_reply): SendMediaGroup
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;
        return $this;
    }

    public function toPostData(): array
    {
        $data = parent::toPostData();
        foreach ($this->getMedia() as $medium) {
            $file = $medium->getMedia();

            if ($this->isUrl($file)) {
                continue;
            }

            $fileKey = 'item'.crc32($file);
            $mimeType = mime_content_type($file);
            $data[$fileKey] = new \CURLFile($file, $mimeType, basename($file));
        }
        return $data;
    }

}
