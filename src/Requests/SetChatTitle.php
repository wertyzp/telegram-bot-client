<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to change the title of a chat. Titles can't be changed
 *  for private chats. The bot must be an administrator in the chat for t
 * his to work and must have the appropriate administrator rights. Return
 * s True on success.
 */
class SetChatTitle extends Request
{
    /**
     * Unique identifier for the target chat or username of the target channe
     * l (in the format @channelusername).
     */
    protected int|string $chat_id;
    /**
     * New chat title, 1-128 characters.
     */
    protected string $title;

    public static function create(int|string $chatId, string $title): self
    {
        return new self([
            'chat_id' => $chatId,
            'title' => $title,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return SetChatTitle
     */
    public function setChatId(int|string $chatId): self
    {
        $this->chat_id = $chatId;

        return $this;
    }

    /**
     * @param string $title
     * @return SetChatTitle
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}
