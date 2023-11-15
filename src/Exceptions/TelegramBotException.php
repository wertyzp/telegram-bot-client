<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Exceptions;

class TelegramBotException extends \Exception
{
    protected $response;
    public function __construct($response)
    {
        parent::__construct("Response not ok");
        $this->response = $response;
    }

    public function __toString()
    {
        $message = parent::__toString();
        return $message . ": " . json_encode($this->response);
    }
}
