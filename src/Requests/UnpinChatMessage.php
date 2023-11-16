<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to remove a message from the list of pinned messages i
 * n a chat. If the chat is not a private chat, the bot must be an admini
 * strator in the chat for this to work and must have the 'can_pin_messag
 * es' administrator right in a supergroup or 'can_edit_messages' adminis
 * trator right in a channel. Returns True on success.
 */
class UnpinChatMessage extends Request
{
    /**
     * Unique identifier for the target chat or username of the target channe
     * l (in the format @channelusername)
     */
    protected int|string $chat_id;
    /**
     * Identifier of a message to unpin. If not specified, the most recent pi
     * nned message (by sending date) will be unpinned.
     */
    protected ?int $message_id;

    public static function create(int|string $chatId): self
    {
        return new self([
            'chat_id' => $chatId,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return UnpinChatMessage
     */
    public function setChatId(int|string $chatId): UnpinChatMessage
    {
        $this->chat_id = $chatId;
        return $this;
    }

    /**
     * @param int $messageId
     * @return UnpinChatMessage
     */
    public function setMessageId(int $messageId): UnpinChatMessage
    {
        $this->message_id = $messageId;
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
}
