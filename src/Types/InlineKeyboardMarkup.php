<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
inline_keyboard	Array of Array of InlineKeyboardButton	Array of button rows, each represented by an Array of InlineKeyboardButton objects
 */

class InlineKeyboardMarkup extends Type
{
    protected const TYPE_MAP = [
        'inline_keyboard' => [[InlineKeyboardButton::class]],
    ];

    protected array $inline_keyboard;

    public static function makeSimple(array $rows): string
    {
        $data = [];
        foreach ($rows as $row) {
            $chunks = array_chunk($row, 2);
            $buttons = [];
            foreach ($chunks as $chunk) {
                list ($text, $callbackData) = $chunk;
                $buttons[] = [
                    'text' => $text,
                    'callback_data' => $callbackData,
                ];
            }
            $data[] = $buttons;
        }
        return json_encode(['inline_keyboard' => $data]);
    }
}
