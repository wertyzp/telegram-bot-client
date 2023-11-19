<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target channel (in the format @channelusername)
sender_chat_id	Integer	Yes	Unique identifier of the target sender chat
 */
class BanChatSenderChat extends Request
{
    protected int|string $chat_id;
    protected int $sender_chat_id;

    public static function create(int|string $chatId, int $senderChatId): self
    {
        return new static(['chat_id' => $chatId, 'sender_chat_id' => $senderChatId]);
    }

    /**
     * @param int|string $chat_id
     * @return self
     */
    public function setChatId(int|string $chat_id): self
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    /**
     * @param int $sender_chat_id
     * @return self
     */
    public function setSenderChatId(int $sender_chat_id): self
    {
        $this->sender_chat_id = $sender_chat_id;

        return $this;
    }
}
