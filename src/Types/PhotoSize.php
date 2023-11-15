<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class PhotoSize extends Type
{
/**
Field	Type	Description
file_id	String	Identifier for this file, which can be used to download or reuse the file
file_unique_id	String	Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
width	Integer	Photo width
height	Integer	Photo height
file_size	Integer	Optional. File size in bytes
 */
    protected string $file_id;
    protected string $file_unique_id;
    protected int $width;
    protected int $height;
    protected ?int $file_size = null;

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
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->file_size;
    }

}
