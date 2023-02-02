<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Model;

use Werty\Mapping\EmptyObject;

class File extends EmptyObject
{
    protected $file_id;
    protected $file_unique_id;
    protected $file_size;
    protected $file_path;

    public function getFilePath()
    {
        return $this->file_path;
    }

    public function getFileId()
    {
        return $this->file_id;
    }

    public function getFileUniqueId()
    {
        return $this->file_unique_id;
    }

    public function getFileSize()
    {
        return $this->file_size;
    }

}
