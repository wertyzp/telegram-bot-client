<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
thumbnail	InputFile or String	Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
caption	String	Optional. Caption of the audio to be sent, 0-1024 characters after entities parsing
parse_mode	String	Optional. Mode for parsing entities in the audio caption. See formatting options for more details.
caption_entities	Array of MessageEntity	Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
duration	Integer	Optional. Duration of the audio in seconds
performer	String	Optional. Performer of the audio
title	String	Optional. Title of the audio
 */

class InputMediaAudio extends InputMedia
{
    protected string $type = 'audio';
    protected InputFile|string|null $thumbnail = null;
    protected ?string $caption = null;
    protected ?string $parse_mode = null;
    /** @var MessageEntity[] */
    protected ?array $caption_entities = null;
    protected ?int $duration = null;
    protected ?string $performer = null;
    protected ?string $title = null;

    /**
     * @return string|InputFile|null
     */
    public function getThumbnail(): string|InputFile|null
    {
        return $this->thumbnail;
    }

    /**
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @return string|null
     */
    public function getParseMode(): ?string
    {
        return $this->parse_mode;
    }

    /**
     * @return MessageEntity[]
     */
    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    /**
     * @return int|null
     */
    public function getDuration(): ?int
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
     * @param string|InputFile|null $thumbnail
     * @return InputMediaAudio
     */
    public function setThumbnail(string|InputFile|null $thumbnail): InputMediaAudio
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @param string|null $caption
     * @return InputMediaAudio
     */
    public function setCaption(?string $caption): InputMediaAudio
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @param string|null $parse_mode
     * @return InputMediaAudio
     */
    public function setParseMode(?string $parse_mode): InputMediaAudio
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    /**
     * @param MessageEntity[] $caption_entities
     * @return InputMediaAudio
     */
    public function setCaptionEntities(?array $caption_entities): InputMediaAudio
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @param int|null $duration
     * @return InputMediaAudio
     */
    public function setDuration(?int $duration): InputMediaAudio
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @param string|null $performer
     * @return InputMediaAudio
     */
    public function setPerformer(?string $performer): InputMediaAudio
    {
        $this->performer = $performer;
        return $this;
    }

    /**
     * @param string|null $title
     * @return InputMediaAudio
     */
    public function setTitle(?string $title): InputMediaAudio
    {
        $this->title = $title;
        return $this;
    }

}
