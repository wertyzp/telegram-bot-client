<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
traveler	User	User that triggered the alert
watcher	User	User that set the alert
distance	Integer	The distance between the users
 */

class ProximityAlertTriggered extends Type
{
    protected User $traveler;
    protected User $watcher;
    protected int $distance;

    /**
     * @return User
     */
    public function getTraveler(): User
    {
        return $this->traveler;
    }

    /**
     * @return User
     */
    public function getWatcher(): User
    {
        return $this->watcher;
    }

    /**
     * @return int
     */
    public function getDistance(): int
    {
        return $this->distance;
    }
}
