<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
users	Array of User	New members that were invited to the video chat
 */

class VideoChatParticipantsInvited extends Type
{
    protected array $users;

    /**
     * @return User[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }

}
