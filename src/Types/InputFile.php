<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class InputFile extends \CURLFile
{
    public function __construct(string $filename, string $mimetype = null)
    {
        if (!file_exists($filename)) {
            throw new \InvalidArgumentException('File not found');
        }
        parent::__construct($filename, $mimetype, basename($filename));
    }

}
