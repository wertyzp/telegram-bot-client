<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Model;

use Werty\Mapping\EmptyObject;

class CallbackQuery extends EmptyObject
{
    protected const TYPE_MAP = [
        'from' => Contact::class,
        'message' => Message::class,
    ];

    protected $id;
    protected $from;
    protected $message;
    protected $chat_instance;
    protected $data;

    public function getId()
    {
        return $this->id;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getChatInstance()
    {
        return $this->chat_instance;
    }

    public function getData()
    {
        return $this->data;
    }

}
