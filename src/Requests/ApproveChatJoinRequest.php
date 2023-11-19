<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to approve a chat join request. The bot must be an adm
 * inistrator in the chat for this to work and must have the can_invite_u
 * sers administrator right. Returns True on success.
 */
class ApproveChatJoinRequest extends Request
{
    /**
     * Unique identifier for the target chat or username of the target channe
     * l (in the format @channelusername).
     */
    protected int|string $chat_id;
    /**
     * Unique identifier of the target user.
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
     * @return ApproveChatJoinRequest
     */
    public function setChatId(int|string $chatId): self
    {
        $this->chat_id = $chatId;

        return $this;
    }

    /**
     * @param int $userId
     * @return ApproveChatJoinRequest
     */
    public function setUserId(int $userId): self
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
