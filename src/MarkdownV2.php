<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot;

class MarkdownV2
{
    private const MAP = [
        '%bs' => '*%s*',
        '%us' => '__%s__',
        '%is' => '_%s_',
    ];

    private $text = "";

    public static function escape($text)
    {
        settype($text, 'string');
        $search = ['_', '*', '[', ']', '(', ')', '~', '`', '>', '#', '+', '-', '=', '|', '{', '}', '.', '!'];
        $replace = ['\_', '\*', '\[', '\]', '\(', '\)', '\~', '\`', '\>', '\#', '\+', '\-', '\=', '\|', '\{', '\}', '\.', '\!'];
        return str_replace($search, $replace, $text);
    }

    public function __construct(string $format = "", ...$arguments)
    {
        $this->appendLine($format, ...$arguments);
    }

    public function appendLine(string $format, ...$arguments): self
    {
        if (empty($format)) {
            return $this;
        }
        $escapedFormat = MarkdownV2::escape($format);
        $escapedArguments = array_map([self::class, 'escape'], $arguments);
        $markdownFormat = str_replace(array_keys(self::MAP), array_values(self::MAP), $escapedFormat);
        $this->text .= vsprintf($markdownFormat, $escapedArguments) . PHP_EOL;
        return $this;
    }

    public function appendMardownV2(string $markdownV2String): self
    {
        $this->text .= $markdownV2String;
        return $this;
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function toString(): string
    {
        return $this->text;
    }
}

}
