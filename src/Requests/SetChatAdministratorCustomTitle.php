<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
user_id	Integer	Yes	Unique identifier of the target user
custom_title	String	Yes	New custom title for the administrator; 0-16 characters, emoji are not allowed
 */

class SetChatAdministratorCustomTitle extends Request
{
    protected int|string $chat_id;
    protected int $user_id;
    protected string $custom_title;

    public static function create(int|string $chatId, int $userId, string $customTitle): self
    {
        return new static(['chat_id' => $chatId, 'user_id' => $userId, 'custom_title' => $customTitle]);
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
     * @param int $user_id
     * @return self
     */
    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @param string $custom_title
     * @return self
     */
    public function setCustomTitle(string $custom_title): self
    {
        $this->custom_title = $custom_title;
        return $this;
    }
}
