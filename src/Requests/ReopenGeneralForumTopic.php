<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to reopen a closed 'General' topic in a forum supergro
 * up chat. The bot must be an administrator in the chat for this to work
 *  and must have the can_manage_topics administrator rights. The topic w
 * ill be automatically unhidden if it was hidden. Returns True on succes
 * s.
 */
class ReopenGeneralForumTopic extends Request
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
     * @return ReopenGeneralForumTopic
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
