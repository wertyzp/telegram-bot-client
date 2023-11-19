<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to generate a new primary invite link for a chat; any
 * previously generated primary link is revoked. The bot must be an admin
 * istrator in the chat for this to work and must have the appropriate ad
 * ministrator rights. Returns the new invite link as String on success.
 */
class ExportChatInviteLink extends Request
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
     * @return ExportChatInviteLink
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
