<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Model;

use Werty\Mapping\EmptyObject;

class InputMediaArray extends EmptyObject
{
    /**
     * @var InputMedia[]
     */
    protected array $items;

    public function __construct($items = [])
    {
        parent::__construct(['items' => $items]);
    }

    public function toArray($only = []): array
    {
        $result = [];
        foreach ($this->items as $item) {
            $result[] = $item->toArray();
        }
        return $result;
    }
}
