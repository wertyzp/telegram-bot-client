<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
message_auto_delete_time	Integer	New auto-delete time for messages in the chat; in seconds
 */

class MessageAutoDeleteTimerChanged extends Type
{
    protected int $message_auto_delete_time;

    /**
     * @return int
     */
    public function getMessageAutoDeleteTime(): int
    {
        return $this->message_auto_delete_time;
    }
}
