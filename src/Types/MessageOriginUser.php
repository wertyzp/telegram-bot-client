<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
 * Field    Type    Description
 * type    String    Type of the message origin, always “user”
 * date    Integer    Date the message was sent originally in Unix time
 * sender_user    User    User that sent the message originally
 */

class MessageOriginUser extends MessageOrigin
{
    protected string $type = 'user';
    protected int $date;
    protected User $sender_user;

    protected const TYPE_MAP = [
        'sender_user' => User::class,
    ];

    public function getType(): string
    {
        return $this->type;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function getSenderUser(): User
    {
        return $this->sender_user;
    }

}
