<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to get the current value of the bot's menu button in a
 *  private chat, or the default menu button. Returns MenuButton on succe
 * ss.
 */
class GetChatMenuButton extends Request
{
    /**
     * Unique identifier for the target private chat. If not specified, defau
     * lt bot's menu button will be returned
     */
    protected ?int $chat_id;


    /**
     * @param int $chatId
     * @return GetChatMenuButton
     */
    public function setChatId(int $chatId): GetChatMenuButton
    {
        $this->chat_id = $chatId;
        return $this;
    }
    /**
     * @return int
     */
    public function getChatId(): int
    {
        return $this->chat_id;
    }
}
