<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
user_id	Integer	Yes	Unique identifier of the target user
until_date	Integer	Optional	Date when the user will be unbanned; Unix time. If user is banned for more than 366 days or less than 30 seconds from the current time they are considered to be banned forever. Applied for supergroups and channels only.
revoke_messages	Boolean	Optional	Pass True to delete all messages from the chat for the user that is being removed. If False, the user will be able to see messages in the group that were sent before the user was removed. Always True for supergroups and channels.
 */

class BanChatMember extends Request
{
    protected int|string $chat_id;
    protected int $user_id;
    protected ?int $until_date = null;
    protected ?bool $revoke_messages = null;

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
     * @param int|null $until_date
     * @return self
     */
    public function setUntilDate(?int $until_date): self
    {
        $this->until_date = $until_date;
        return $this;
    }

    /**
     * @param bool|null $revoke_messages
     * @return self
     */
    public function setRevokeMessages(?bool $revoke_messages): self
    {
        $this->revoke_messages = $revoke_messages;
        return $this;
    }
}
