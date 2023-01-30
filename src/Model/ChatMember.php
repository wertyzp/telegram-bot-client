<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Model;

use Werty\Mapping\EmptyObject;

class ChatMember extends EmptyObject
{
    protected const TYPE_MAP = [
        'user' => Contact::class,
    ];
    /**
     * @var string
     */
    protected $status;
    protected $user;

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return Contact
     */
    public function getUser()
    {
        return $this->user;
    }

    public function isAdmin(): bool
    {
        return in_array($this->status, ['creator', 'administrator']);
    }

}
