<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
location	Location	The location to which the supergroup is connected. Can't be a live location.
address	String	Location address; 1-64 characters, as defined by the chat owner
 */
class ChatLocation extends Type
{
    protected const TYPE_MAP = [
        'location' => Location::class,
    ];

    protected Location $location;
    protected string $address;

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}
