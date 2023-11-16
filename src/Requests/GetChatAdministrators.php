<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to get a list of administrators in a chat, which aren'
 * t bots. Returns an Array of ChatMember objects.
 */
class GetChatAdministrators extends Request
{
    /**
     * Unique identifier for the target chat or username of the target superg
     * roup or channel (in the format @channelusername)
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
     * @return GetChatAdministrators
     */
    public function setChatId(int|string $chatId): GetChatAdministrators
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
