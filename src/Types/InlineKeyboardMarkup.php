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

    /**
     * @param InlineKeyboardButton[] $row
     */
    public function addRow(array $row): self
    {
        $this->inline_keyboard[] = $row;

        return $this;
    }

    /**
     * @param int $index
     * @return InlineKeyboardButton[]
     */
    public function getRow(int $index): array
    {
        return $this->inline_keyboard[$index];
    }

    /**
     * @return array
     */
    public function getInlineKeyboard(): array
    {
        return $this->inline_keyboard;
    }

    /**
     * @param InlineKeyboardButton[][] $inline_keyboard
     * @return InlineKeyboardMarkup
     */
    public function setInlineKeyboard(array $inline_keyboard): self
    {
        $this->inline_keyboard = $inline_keyboard;

        return $this;
    }

    protected array $inline_keyboard;

    public static function makeSimple(array $rows): string
    {
        $data = [];
        foreach ($rows as $row) {
            $chunks = array_chunk($row, 2);
            $buttons = [];
            foreach ($chunks as $chunk) {
                list($text, $callbackData) = $chunk;
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
