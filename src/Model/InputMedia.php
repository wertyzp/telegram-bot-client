<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Model;

use Werty\Mapping\EmptyObject;

class InputMedia extends EmptyObject
{
    public $type;
    public $media;
    public $caption;
    public $parse_mode;
    public $caption_entities;
    public $has_spoiler;

    public function toCleanArray(): array
    {
        return array_filter($this->toArray());
    }
}
