<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot;

class Response extends ModelBase
{
    protected bool $ok;
    protected mixed $result = null;
    protected ?string $description = null;
    protected ?int $error_code = null;

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
     * @return mixed|null
     */
    public function getResult(): mixed
    {
        return $this->result;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return int|null
     */
    public function getErrorCode(): ?int
    {
        return $this->error_code;
    }
}
