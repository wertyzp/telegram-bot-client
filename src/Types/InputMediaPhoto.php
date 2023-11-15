<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
caption	String	Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
parse_mode	String	Optional. Mode for parsing entities in the photo caption. See formatting options for more details.
caption_entities	Array of MessageEntity	Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
has_spoiler	Boolean	Optional. Pass True if the photo needs to be covered with a spoiler animation
 */

class InputMediaPhoto extends InputMedia
{
    protected string $type = 'photo';
    protected ?string $caption = null;
    protected ?string $parse_mode = null;
    /** @var MessageEntity[] */
    protected ?array $caption_entities = null;
    protected ?bool $has_spoiler = null;

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
     * @return bool|null
     */
    public function getHasSpoiler(): ?bool
    {
        return $this->has_spoiler;
    }

    /**
     * @param string|InputFile $thumbnail
     * @return InputMediaPhoto
     */
    public function setThumbnail(string|InputFile $thumbnail): InputMediaPhoto
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @param string|null $caption
     * @return InputMediaPhoto
     */
    public function setCaption(?string $caption): InputMediaPhoto
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @param string|null $parse_mode
     * @return InputMediaPhoto
     */
    public function setParseMode(?string $parse_mode): InputMediaPhoto
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    /**
     * @param MessageEntity[] $caption_entities
     * @return InputMediaPhoto
     */
    public function setCaptionEntities(?array $caption_entities): InputMediaPhoto
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @param bool|null $has_spoiler
     * @return InputMediaPhoto
     */
    public function setHasSpoiler(?bool $has_spoiler): InputMediaPhoto
    {
        $this->has_spoiler = $has_spoiler;
        return $this;
    }

}
