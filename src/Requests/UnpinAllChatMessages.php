<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to clear the list of pinned messages in a chat. If the
 *  chat is not a private chat, the bot must be an administrator in the c
 * hat for this to work and must have the 'can_pin_messages' administrato
 * r right in a supergroup or 'can_edit_messages' administrator right in
 * a channel. Returns True on success.
 */
class UnpinAllChatMessages extends Request
{
    /**
     * Unique identifier for the target chat or username of the target channe
     * l (in the format @channelusername)
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
     * @return UnpinAllChatMessages
     */
    public function setChatId(int|string $chatId): UnpinAllChatMessages
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
