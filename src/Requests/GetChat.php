<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to get up to date information about the chat (current
 * name of the user for one-on-one conversations, current username of a u
 * ser, group or channel, etc.). Returns a Chat object on success.
 */
class GetChat extends Request
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
     * @return GetChat
     */
    public function setChatId(int|string $chatId): GetChat
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
