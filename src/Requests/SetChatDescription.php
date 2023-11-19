<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to change the description of a group, a supergroup or
 * a channel. The bot must be an administrator in the chat for this to wo
 * rk and must have the appropriate administrator rights. Returns True on
 *  success.
 */
class SetChatDescription extends Request
{
    /**
     * Unique identifier for the target chat or username of the target channe
     * l (in the format @channelusername).
     */
    protected int|string $chat_id;
    /**
     * New chat description, 0-255 characters.
     */
    protected ?string $description = null;

    public static function create(int|string $chatId): self
    {
        return new self([
            'chat_id' => $chatId,
        ]);
    }

    /**
     * @return int|string
     */
    public function getChatId(): int|string
    {
        return $this->chat_id;
    }

    /**
     * @param int|string $chat_id
     * @return SetChatDescription
     */
    public function setChatId(int|string $chat_id): self
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return SetChatDescription
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
