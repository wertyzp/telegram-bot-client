<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class WebAppInfo extends Type
{
    protected string $url;

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public static function create(string $url): self
    {
        return new static([
            'url' => $url,
        ]);
    }
}
