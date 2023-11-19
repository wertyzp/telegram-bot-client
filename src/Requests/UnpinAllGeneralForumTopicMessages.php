<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to clear the list of pinned messages in a General foru
 * m topic. The bot must be an administrator in the chat for this to work
 *  and must have the can_pin_messages administrator right in the supergr
 * oup. Returns True on success.
 */
class UnpinAllGeneralForumTopicMessages extends Request
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
     * @return UnpinAllGeneralForumTopicMessages
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
