<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to unban a previously banned channel chat in a supergr
 * oup or channel. The bot must be an administrator for this to work and
 * must have the appropriate administrator rights. Returns True on succes
 * s.
 */
class UnbanChatSenderChat extends Request
{
    /**
     * Unique identifier for the target chat or username of the target channe
     * l (in the format @channelusername)
     */
    protected int|string $chat_id;
    /**
     * Unique identifier of the target sender chat
     */
    protected int $sender_chat_id;

    public static function create(int|string $chatId, int $senderChatId): self
    {
        return new self([
            'chat_id' => $chatId,
            'sender_chat_id' => $senderChatId,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return UnbanChatSenderChat
     */
    public function setChatId(int|string $chatId): UnbanChatSenderChat
    {
        $this->chat_id = $chatId;
        return $this;
    }

    /**
     * @param int $senderChatId
     * @return UnbanChatSenderChat
     */
    public function setSenderChatId(int $senderChatId): UnbanChatSenderChat
    {
        $this->sender_chat_id = $senderChatId;
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
    public function getSenderChatId(): int
    {
        return $this->sender_chat_id;
    }
}
