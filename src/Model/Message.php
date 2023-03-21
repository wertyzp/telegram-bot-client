<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Model;

use Werty\Mapping\EmptyObject;

class Message extends EmptyObject
{
    protected const TYPE_MAP = [
        'chat' => Contact::class,
        'from' => Contact::class,
        'voice' => File::class,
        'entities' => [Message\Entity::class],
    ];

    /**
     * @var Message\Entity[]
     */
    protected $entities = [];
    protected $date;
    protected $chat;
    protected $from;
    protected $message_id;
    protected $voice;
    protected $text;
    protected $mentioned;

    public function isMentioned(): bool
    {
        return $this->mentioned ?? false;
    }

    public function getVoice(): ?File
    {
        return $this->voice;
    }

    public function getChat(): ?Contact
    {
        return $this->chat;
    }

    public function getMessageId()
    {
        return $this->message_id;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getFrom(): ?Contact
    {
        return $this->from;
    }

    /**
     * @return array
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    public function hasLink(): bool
    {
        if (empty($this->entities)) {
            return false;
        }
        foreach ($this->entities as $entity)
        {
            if ($entity->isLink()) {
                return true;
            }
        }
        return false;
    }

}
