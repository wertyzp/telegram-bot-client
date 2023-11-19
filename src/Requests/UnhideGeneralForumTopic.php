<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to unhide the 'General' topic in a forum supergroup ch
 * at. The bot must be an administrator in the chat for this to work and
 * must have the can_manage_topics administrator rights. Returns True on
 * success.
 */
class UnhideGeneralForumTopic extends Request
{
    /**
     * Unique identifier for the target chat or username of the target superg
     * roup (in the format @supergroupusername).
     */
    protected int|string $chat_id;

    public static function create(int|string $chatId): self
    {
        return new self([
            'chat_id' => $chatId,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return UnhideGeneralForumTopic
     */
    public function setChatId(int|string $chatId): self
    {
        $this->chat_id = $chatId;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getChatId(): int|string
    {
        return $this->chat_id;
    }
}
