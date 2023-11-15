<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
file_id	String	Identifier for this file, which can be used to download or reuse the file
file_unique_id	String	Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
length	Integer	Video width and height (diameter of the video message) as defined by sender
duration	Integer	Duration of the video in seconds as defined by sender
thumbnail	PhotoSize	Optional. Video thumbnail
file_size	Integer	Optional. File size in bytes
 */

class VideoNote extends Type
{
    protected const TYPE_MAP = [
        'thumbnail' => PhotoSize::class,
    ];

    protected string $file_id;
    protected string $file_unique_id;
    protected int $length;
    protected int $duration;
    protected ?PhotoSize $thumbnail = null;
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
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @return PhotoSize|null
     */
    public function getThumbnail(): ?PhotoSize
    {
        return $this->thumbnail;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->file_size;
    }
}
