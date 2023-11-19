<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
 * Field	Type	Description.
file_id	String	Identifier for this file, which can be used to download or reuse the file
file_unique_id	String	Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
width	Integer	Video width as defined by sender
height	Integer	Video height as defined by sender
duration	Integer	Duration of the video in seconds as defined by sender
thumbnail	PhotoSize	Optional. Video thumbnail
file_name	String	Optional. Original filename as defined by sender
mime_type	String	Optional. MIME type of the file as defined by sender
file_size	Integer	Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
 */
class Video extends Type
{
    protected const TYPE_MAP = [
        'thumbnail' => PhotoSize::class,
    ];

    protected string $file_id;
    protected string $file_unique_id;
    protected int $width;
    protected int $height;
    protected int $duration;
    protected ?PhotoSize $thumbnail = null;
    protected ?string $file_name = null;
    protected ?string $mime_type = null;
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
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->file_name;
    }

    /**
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mime_type;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->file_size;
    }
}
