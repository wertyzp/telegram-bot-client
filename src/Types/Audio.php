<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class Audio extends Type
{
    /**
    Field	Type	Description
    file_id	String	Identifier for this file, which can be used to download or reuse the file
    file_unique_id	String	Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
    duration	Integer	Duration of the audio in seconds as defined by sender
    performer	String	Optional. Performer of the audio as defined by sender or by audio tags
    title	String	Optional. Title of the audio as defined by sender or by audio tags
    file_name	String	Optional. Original filename as defined by sender
    mime_type	String	Optional. MIME type of the file as defined by sender
    file_size	Integer	Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
    thumbnail	PhotoSize	Optional. Thumbnail of the album cover to which the music file belongs
     */
    protected const TYPE_MAP = [
        'thumbnail' => PhotoSize::class,
    ];

    protected string $file_id;
    protected string $file_unique_id;
    protected int $duration;
    protected ?string $performer = null;
    protected ?string $title = null;
    protected ?string $file_name = null;
    protected ?string $mime_type = null;
    protected ?int $file_size = null;
    protected ?PhotoSize $thumbnail = null;

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
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @return string|null
     */
    public function getPerformer(): ?string
    {
        return $this->performer;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
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

    /**
     * @return PhotoSize|null
     */
    public function getThumbnail(): ?PhotoSize
    {
        return $this->thumbnail;
    }
}
