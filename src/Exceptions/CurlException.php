<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Exceptions;

class CurlException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, protected array $opts = [])
    {
        parent::__construct($message, $code);
    }

    public function getOpts(): array
    {
        return $this->opts;
    }

}
