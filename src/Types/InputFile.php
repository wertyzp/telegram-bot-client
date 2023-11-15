<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class InputFile
{
    private \CURLFile $file;
    public function __construct(string $filename, string $mimetype = null)
    {
        $this->file = new \CURLFile($filename, $mimetype, basename($filename));
    }

    public function getFile(): \CURLFile
    {
        return $this->file;
    }

}
