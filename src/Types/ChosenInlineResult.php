<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
result_id	String	The unique identifier for the result that was chosen
from	User	The user that chose the result
location	Location	Optional. Sender location, only for bots that require user location
inline_message_id	String	Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message. Will be also received in callback queries and can be used to edit the message.
query	String	The query that was used to obtain the result
 */
class ChosenInlineResult extends Type
{
    protected const TYPE_MAP = [
        'from' => User::class,
        'location' => Location::class,
    ];

    public string $result_id;
    public User $from;
    public ?Location $location = null;
    public ?string $inline_message_id = null;
    public string $query;

    /**
     * @return string
     */
    public function getResultId(): string
    {
        return $this->result_id;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @return string|null
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inline_message_id;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }
}
