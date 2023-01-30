<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot;

class MarkdownV2
{
    public static function escape($text)
    {
        $search = ['_', '*', '[', ']', '(', ')', '~', '`', '>', '#', '+', '-', '=', '|', '{', '}', '.', '!'];
        $replace = ['\_', '\*', '\[', '\]', '\(', '\)', '\~', '\`', '\>', '\#', '\+', '\-', '\=', '\|', '\{', '\}', '\.', '\!'];
        return str_replace($search, $replace, $text);
    }
}
