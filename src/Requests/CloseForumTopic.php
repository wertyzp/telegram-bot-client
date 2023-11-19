<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to close an open topic in a forum supergroup chat. The
 *  bot must be an administrator in the chat for this to work and must ha
 * ve the can_manage_topics administrator rights, unless it is the creato
 * r of the topic. Returns True on success.
 */
class CloseForumTopic extends Request
{
    /**
     * Unique identifier for the target chat or username of the target superg
     * roup (in the format @supergroupusername).
     */
    protected int|string $chat_id;
    /**
     * Unique identifier for the target message thread of the forum topic.
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
     * @return CloseForumTopic
     */
    public function setChatId(int|string $chatId): self
    {
        $this->chat_id = $chatId;

        return $this;
    }

    /**
     * @param int $messageThreadId
     * @return CloseForumTopic
     */
    public function setMessageThreadId(int $messageThreadId): self
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
