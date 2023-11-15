<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
chat	Chat	Chat to which the request was sent
from	User	User that sent the join request
user_chat_id	Integer	Identifier of a private chat with the user who sent the join request. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier. The bot can use this identifier for 5 minutes to send messages until the join request is processed, assuming no other administrator contacted the user.
date	Integer	Date the request was sent in Unix time
bio	String	Optional. Bio of the user.
invite_link	ChatInviteLink	Optional. Chat invite link that was used by the user to send the join request
 */

class ChatJoinRequest extends Type
{
    protected const TYPE_MAP = [
        'chat' => Chat::class,
        'from' => User::class,
        'invite_link' => ChatInviteLink::class,
    ];

    protected Chat $chat;
    protected User $from;
    protected int $user_chat_id;
    protected int $date;
    protected ?string $bio = null;
    protected ?ChatInviteLink $invite_link = null;

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @return int
     */
    public function getUserChatId(): int
    {
        return $this->user_chat_id;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function getInviteLink(): ?ChatInviteLink
    {
        return $this->invite_link;
    }
}
