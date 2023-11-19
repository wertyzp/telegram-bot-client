<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to delete a chat photo. Photos can't be changed for pr
 * ivate chats. The bot must be an administrator in the chat for this to
 * work and must have the appropriate administrator rights. Returns True
 * on success.
 */
class DeleteChatPhoto extends Request
{
    /**
     * Unique identifier for the target chat or username of the target channe
     * l (in the format @channelusername).
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
     * @return DeleteChatPhoto
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
