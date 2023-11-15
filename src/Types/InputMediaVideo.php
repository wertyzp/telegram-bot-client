<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
thumbnail	InputFile or String	Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
caption	String	Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
parse_mode	String	Optional. Mode for parsing entities in the video caption. See formatting options for more details.
caption_entities	Array of MessageEntity	Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
width	Integer	Optional. Video width
height	Integer	Optional. Video height
duration	Integer	Optional. Video duration in seconds
supports_streaming	Boolean	Optional. Pass True if the uploaded video is suitable for streaming
has_spoiler	Boolean	Optional. Pass True if the video needs to be covered with a spoiler animation
 */

class InputMediaVideo extends InputMedia
{
    protected string $type = 'video';
    protected InputFile|string|null $thumbnail = null;
    protected ?string $caption = null;
    protected ?string $parse_mode = null;
    /** @var MessageEntity[] */
    protected ?array $caption_entities = null;
    protected ?int $width = null;
    protected ?int $height = null;
    protected ?int $duration = null;
    protected ?bool $supports_streaming = null;
    protected ?bool $has_spoiler = null;

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
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @return bool|null
     */
    public function getSupportsStreaming(): ?bool
    {
        return $this->supports_streaming;
    }

    /**
     * @return bool|null
     */
    public function getHasSpoiler(): ?bool
    {
        return $this->has_spoiler;
    }

    /**
     * @param string|InputFile|null $thumbnail
     * @return InputMediaVideo
     */
    public function setThumbnail(string|InputFile|null $thumbnail): InputMediaVideo
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @param string|null $caption
     * @return InputMediaVideo
     */
    public function setCaption(?string $caption): InputMediaVideo
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @param string|null $parse_mode
     * @return InputMediaVideo
     */
    public function setParseMode(?string $parse_mode): InputMediaVideo
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    /**
     * @param MessageEntity[] $caption_entities
     * @return InputMediaVideo
     */
    public function setCaptionEntities(?array $caption_entities): InputMediaVideo
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @param int|null $width
     * @return InputMediaVideo
     */
    public function setWidth(?int $width): InputMediaVideo
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param int|null $height
     * @return InputMediaVideo
     */
    public function setHeight(?int $height): InputMediaVideo
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @param int|null $duration
     * @return InputMediaVideo
     */
    public function setDuration(?int $duration): InputMediaVideo
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @param bool|null $supports_streaming
     * @return InputMediaVideo
     */
    public function setSupportsStreaming(?bool $supports_streaming): InputMediaVideo
    {
        $this->supports_streaming = $supports_streaming;
        return $this;
    }

    /**
     * @param bool|null $has_spoiler
     * @return InputMediaVideo
     */
    public function setHasSpoiler(?bool $has_spoiler): InputMediaVideo
    {
        $this->has_spoiler = $has_spoiler;
        return $this;
    }

}
