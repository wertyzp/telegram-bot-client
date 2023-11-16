<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
id	String	Unique identifier for this query
from	User	Sender
query	String	Text of the query (up to 256 characters)
offset	String	Offset of the results to be returned, can be controlled by the bot
chat_type	String	Optional. Type of the chat from which the inline query was sent. Can be either “sender” for a private chat with the inline query sender, “private”, “group”, “supergroup”, or “channel”. The chat type should be always known for requests sent from official clients and most third-party clients, unless the request was sent from a secret chat
location	Location	Optional. Sender location, only for bots that request user location
 */

class InlineQuery extends Type
{
    protected const TYPE_MAP = [
        'from' => User::class,
        'location' => Location::class,
    ];

    public string $id;
    public User $from;
    public string $query;
    public string $offset;
    public ?string $chat_type = null;
    public ?Location $location = null;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @return string
     */
    public function getOffset(): string
    {
        return $this->offset;
    }

    /**
     * @return string|null
     */
    public function getChatType(): ?string
    {
        return $this->chat_type;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

}
