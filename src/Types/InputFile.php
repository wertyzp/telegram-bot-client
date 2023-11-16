<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class InputFile extends \CURLFile
{
    public function __construct(string $filename, string $mimetype = null)
    {
        parent::__construct($filename, $mimetype, basename($filename));
    }

    public function getFile(): \CURLFile
    {
        return $this->file;
    }

}
