<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
 * Field    Type    Description
 * type    String    Type of the message origin, always “hidden_user”
 * date    Integer    Date the message was sent originally in Unix time
 * sender_user_name    String    Name of the user that sent the message originally
 */

class MessageOriginUser extends MessageOrigin
{
    protected string $type = 'hidden_user';
    protected int $date;
    protected string $sender_user_name;

    public function getType(): string
    {
        return $this->type;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function getSenderUserName(): string
    {
        return $this->sender_user_name;
    }
}
