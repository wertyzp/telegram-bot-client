<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Exceptions;

use JetBrains\PhpStorm\Pure;
use Werty\Http\Clients\TelegramBot\Requests\Response;

class HttpException extends \Exception
{
    private string|Response $response;
    private array $request;
    #[Pure] public function __construct(string $message = "", int $code = 0, array $request = [], string|Response $response)
    {
        parent::__construct($message, $code);

        $this->request = $request;
        $this->response = $response;
    }

    public function getRequest(): array
    {
        return $this->request;
    }

    public function getResponse(): string|Response
    {
        return $this->response;
    }

}
