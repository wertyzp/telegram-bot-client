<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target channel (in the format @channelusername)
message_thread_id	Integer	Optional	Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
from_chat_id	Integer or String	Yes	Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
disable_notification	Boolean	Optional	Sends the message silently. Users will receive a notification with no sound.
protect_content	Boolean	Optional	Protects the contents of the forwarded message from forwarding and saving
message_id	Integer	Yes	Message identifier in the chat specified in from_chat_id
 */
class ForwardMessage extends Request
{
    protected int|string $chat_id;
    protected ?int $message_thread_id = null;
    protected int|string $from_chat_id;
    protected ?bool $disable_notification = null;
    protected ?bool $protect_content = null;
    protected int $message_id;

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
     * @return ForwardMessage
     */
    public function setChatId(int|string $chat_id): self
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    /**
     * @param int|null $message_thread_id
     * @return ForwardMessage
     */
    public function setMessageThreadId(?int $message_thread_id): self
    {
        $this->message_thread_id = $message_thread_id;

        return $this;
    }

    /**
     * @param int|string $from_chat_id
     * @return ForwardMessage
     */
    public function setFromChatId(int|string $from_chat_id): self
    {
        $this->from_chat_id = $from_chat_id;

        return $this;
    }

    /**
     * @param bool|null $disable_notification
     * @return ForwardMessage
     */
    public function setDisableNotification(?bool $disable_notification): self
    {
        $this->disable_notification = $disable_notification;

        return $this;
    }

    /**
     * @param bool|null $protect_content
     * @return ForwardMessage
     */
    public function setProtectContent(?bool $protect_content): self
    {
        $this->protect_content = $protect_content;

        return $this;
    }

    /**
     * @param int $message_id
     * @return ForwardMessage
     */
    public function setMessageId(int $message_id): self
    {
        $this->message_id = $message_id;

        return $this;
    }
}
