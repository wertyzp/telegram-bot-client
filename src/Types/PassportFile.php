<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
file_id	String	Identifier for this file, which can be used to download or reuse the file
file_unique_id	String	Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
file_size	Integer	File size in bytes
file_date	Integer	Unix time when the file was uploaded
 */

class PassportFile extends Type
{
    protected string $file_id;
    protected string $file_unique_id;
    protected int $file_size;
    protected int $file_date;

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->file_id;
    }

    /**
     * @return string
     */
    public function getFileUniqueId(): string
    {
        return $this->file_unique_id;
    }

    /**
     * @return int
     */
    public function getFileSize(): int
    {
        return $this->file_size;
    }

    /**
     * @return int
     */
    public function getFileDate(): int
    {
        return $this->file_date;
    }

}
