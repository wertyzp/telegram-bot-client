<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
start_date	Integer	Point in time (Unix timestamp) when the video chat is supposed to be started by a chat administrator
 */

class VideoChatScheduled extends Type
{
    /**
     * @var int
     */
    public int $start_date;

    /**
     * @return int
     */
    public function getStartDate(): int
    {
        return $this->start_date;
    }

}
