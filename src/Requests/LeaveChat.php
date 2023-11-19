<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method for your bot to leave a group, supergroup or channel.
 * Returns True on success.
 */
class LeaveChat extends Request
{
    /**
     * Unique identifier for the target chat or username of the target superg
     * roup or channel (in the format @channelusername).
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
     * @return LeaveChat
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
