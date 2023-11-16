<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/*
Field	Type	Description
status	String	The member's status in the chat, always “creator”
user	User	Information about the user
*/
class ChatMember extends Type
{
    protected const TYPE_MAP = [
        'user' => User::class,
    ];

    protected string $status;
    protected User $user;

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
