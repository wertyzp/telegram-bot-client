<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Model\Message;

use Werty\Mapping\EmptyObject;

class Entity extends EmptyObject
{
    public const TYPE_TEXT_LINK = 'text_link';
    public const TYPE_URL = 'url';

    protected $offset;
    protected $length;
    protected $type;
    protected $url;

    public function getType()
    {
        return $this->type;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function isLink(): bool
    {
        return in_array($this->type, ['text_link', 'url']);
    }

    public function getOffset()
    {
        return $this->offset;
    }

    public function getLength()
    {
        return $this->length;
    }

}

