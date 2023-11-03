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
        $search = [chr(92), '_', '*', '[', ']', '(', ')', '~', '`', '>', '#', '+', '-', '=', '|', '{', '}', '.', '!'];
        $replace = [chr(92).chr(92), '\_', '\*', '\[', '\]', '\(', '\)', '\~', '\`', '\>', '\#', '\+', '\-', '\=', '\|', '\{', '\}', '\.', '\!'];
        return str_replace($search, $replace, $text);
    }

    public function __construct(string $format = "", ...$arguments)
    {
        $this->appendLine($format, ...$arguments);
    }

    public function appendLine(?string $format = null, ...$arguments): self
    {
        if (empty($format)) {
            $this->text .= PHP_EOL;
            return $this;
        }
        $escapedFormat = MarkdownV2::escape($format);
        $escapedArguments = array_map([self::class, 'escape'], $arguments);
        $markdownFormat = str_replace(array_keys(self::MAP), array_values(self::MAP), $escapedFormat);
        $this->text .= vsprintf($markdownFormat, $escapedArguments) . PHP_EOL;
        return $this;
    }

    public function line(?string $format = null, ...$arguments): self
    {
        return $this->appendLine($format, ...$arguments);
    }

    public function raw(string $markdownV2String): self
    {
        $this->text .= $markdownV2String;
        return $this;
    }

    public function appendMarkdownV2(string $markdownV2String): self
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
