<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
 * Field	Type	Description
file_id	String	Identifier for this file, which can be used to download or reuse the file
file_unique_id	String	Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
file_size	Integer	Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
file_path	String	Optional. File path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.
 */

class File extends Type
{
    /**
     * @var string
     */
    public string $file_id;

    /**
     * @var string
     */
    public string $file_unique_id;

    /**
     * @var int|null
     */
    public ?int $file_size = null;

    /**
     * @var string|null
     */
    public ?string $file_path = null;

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
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->file_size;
    }

    /**
     * @return string|null
     */
    public function getFilePath(): ?string
    {
        return $this->file_path;
    }
}
