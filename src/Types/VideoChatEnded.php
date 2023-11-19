<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
duration	Integer	Video chat duration in seconds
 */
class VideoChatEnded extends Type
{
    protected int $duration;

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }
}
