<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Mapping\EmptyObject;

class Response extends EmptyObject
{
    protected bool $ok;
    protected mixed $result;
    protected string $description;
    protected int $error_code;

    protected const TYPE_MAP = [
        'ok' => self::T_BOOLEAN,
    ];
    /**
     * @return bool
     */
    public function isOk(): bool
    {
        return $this->ok;
    }

    /**
     * @return mixed
     */
    public function getResult(): mixed
    {
        return $this->result;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->error_code;
    }


}
