<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to get the number of members in a chat. Returns Int on
 *  success.
 */
class GetChatMemberCount extends Request
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
     * @return GetChatMemberCount
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
