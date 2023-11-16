<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to add a message to the list of pinned messages in a c
 * hat. If the chat is not a private chat, the bot must be an administrat
 * or in the chat for this to work and must have the 'can_pin_messages' a
 * dministrator right in a supergroup or 'can_edit_messages' administrato
 * r right in a channel. Returns True on success.
 */
class PinChatMessage extends Request
{
    /**
     * Unique identifier for the target chat or username of the target channe
     * l (in the format @channelusername)
     */
    protected int|string $chat_id;
    /**
     * Identifier of a message to pin
     */
    protected int $message_id;
    /**
     * Pass True if it is not necessary to send a notification to all chat me
     * mbers about the new pinned message. Notifications are always disabled
     * in channels and private chats.
     */
    protected ?bool $disable_notification = null;

    public static function create(int|string $chatId, int $messageId): self
    {
        return new self([
            'chat_id' => $chatId,
            'message_id' => $messageId,
        ]);
    }

    /**
     * @return int|string
     */
    public function getChatId(): int|string
    {
        return $this->chat_id;
    }

    /**
     * @param int|string $chat_id
     * @return PinChatMessage
     */
    public function setChatId(int|string $chat_id): PinChatMessage
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->message_id;
    }

    /**
     * @param int $message_id
     * @return PinChatMessage
     */
    public function setMessageId(int $message_id): PinChatMessage
    {
        $this->message_id = $message_id;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDisableNotification(): ?bool
    {
        return $this->disable_notification;
    }

    /**
     * @param bool|null $disable_notification
     * @return PinChatMessage
     */
    public function setDisableNotification(?bool $disable_notification): PinChatMessage
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

}
