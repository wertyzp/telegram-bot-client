<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Model;

use Werty\Mapping\EmptyObject;

class InputMedia extends EmptyObject
{
    protected $type;
    protected $media;
    protected $caption;
    protected $parse_mode;
    protected $caption_entities;
    protected $has_spoiler;


}
