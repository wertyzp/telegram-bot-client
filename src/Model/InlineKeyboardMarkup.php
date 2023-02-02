<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Model;

use Werty\Mapping\EmptyObject;

class InlineKeyboardMarkup extends EmptyObject
{
    protected const TYPE_MAP = [
        'inline_keyboard' => [InlineKeyboardButton::class],
    ];
    protected $inline_keyboard;

    public static function makeSimple(array ...$rows): string
    {
        $data = [];
        foreach ($rows as $row) {
            $buttons = [];
            foreach ($row as $text => $callbackData) {
                $item = [
                    'text' => $text,
                    'callback_data' => $callbackData,
                ];
                $buttons[] = $item;
            }
            $data[] = $buttons;
        }
        return json_encode(['inline_keyboard' => $data]);
    }
}
