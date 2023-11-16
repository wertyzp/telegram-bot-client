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
    protected ?bool $disable_notification;

    public static function create(int|string $chatId, int $messageId): self
    {
        return new self([
            'chat_id' => $chatId,
            'message_id' => $messageId,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return PinChatMessage
     */
    public function setChatId(int|string $chatId): PinChatMessage
    {
        $this->chat_id = $chatId;
        return $this;
    }

    /**
     * @param int $messageId
     * @return PinChatMessage
     */
    public function setMessageId(int $messageId): PinChatMessage
    {
        $this->message_id = $messageId;
        return $this;
    }

    /**
     * @param bool $disableNotification
     * @return PinChatMessage
     */
    public function setDisableNotification(bool $disableNotification): PinChatMessage
    {
        $this->disable_notification = $disableNotification;
        return $this;
    }
    /**
     * @return int|string
     */
    public function getChatId(): int|string
    {
        return $this->chat_id;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->message_id;
    }

    /**
     * @return bool
     */
    public function getDisableNotification(): bool
    {
        return $this->disable_notification;
    }
}
