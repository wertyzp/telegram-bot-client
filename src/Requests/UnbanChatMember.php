<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
user_id	Integer	Yes	Unique identifier of the target user
only_if_banned	Boolean	Optional	Do nothing if the user is not banned
 */
class UnbanChatMember extends Request
{
    protected int|string $chat_id;
    protected int $user_id;
    protected ?bool $only_if_banned = null;

    public static function create(int|string $chatId, int $userId): self
    {
        return new static(['chat_id' => $chatId, 'user_id' => $userId]);
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
     * @param bool|null $only_if_banned
     * @return self
     */
    public function setOnlyIfBanned(?bool $only_if_banned): self
    {
        $this->only_if_banned = $only_if_banned;

        return $this;
    }
}
