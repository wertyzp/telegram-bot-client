<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
data	String	The data. Be aware that a bad client can send arbitrary data in this field.
button_text	String	Text of the web_app keyboard button from which the Web App was opened. Be aware that a bad client can send arbitrary data in this field.
 */
class WebAppData extends Type
{
    protected string $data;
    protected string $button_text;

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * Text of the web_app keyboard button from which the Web App was opened. Be aware that a bad client can send arbitrary data in this field.
     * @return string
     */
    public function getButtonText(): string
    {
        return $this->button_text;
    }
}
