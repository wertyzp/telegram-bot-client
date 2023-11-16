<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to get information about a member of a chat. The metho
 * d is only guaranteed to work for other users if the bot is an administ
 * rator in the chat. Returns a ChatMember object on success.
 */
class GetChatMember extends Request
{
    /**
     * Unique identifier for the target chat or username of the target superg
     * roup or channel (in the format @channelusername)
     */
    protected int|string $chat_id;
    /**
     * Unique identifier of the target user
     */
    protected int $user_id;

    public static function create(int|string $chatId, int $userId): self
    {
        return new self([
            'chat_id' => $chatId,
            'user_id' => $userId,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return GetChatMember
     */
    public function setChatId(int|string $chatId): GetChatMember
    {
        $this->chat_id = $chatId;
        return $this;
    }

    /**
     * @param int $userId
     * @return GetChatMember
     */
    public function setUserId(int $userId): GetChatMember
    {
        $this->user_id = $userId;
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
    public function getUserId(): int
    {
        return $this->user_id;
    }
}
