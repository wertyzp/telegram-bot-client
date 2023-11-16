<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to clear the list of pinned messages in a forum topic.
 *  The bot must be an administrator in the chat for this to work and mus
 * t have the can_pin_messages administrator right in the supergroup. Ret
 * urns True on success.
 */
class UnpinAllForumTopicMessages extends Request
{
    /**
     * Unique identifier for the target chat or username of the target superg
     * roup (in the format @supergroupusername)
     */
    protected int|string $chat_id;
    /**
     * Unique identifier for the target message thread of the forum topic
     */
    protected int $message_thread_id;

    public static function create(int|string $chatId, int $messageThreadId): self
    {
        return new self([
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return UnpinAllForumTopicMessages
     */
    public function setChatId(int|string $chatId): UnpinAllForumTopicMessages
    {
        $this->chat_id = $chatId;
        return $this;
    }

    /**
     * @param int $messageThreadId
     * @return UnpinAllForumTopicMessages
     */
    public function setMessageThreadId(int $messageThreadId): UnpinAllForumTopicMessages
    {
        $this->message_thread_id = $messageThreadId;
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
    public function getMessageThreadId(): int
    {
        return $this->message_thread_id;
    }
}
