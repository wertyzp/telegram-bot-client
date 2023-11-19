<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
thumbnail	InputFile or String	Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
caption	String	Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
parse_mode	String	Optional. Mode for parsing entities in the document caption. See formatting options for more details.
caption_entities	Array of MessageEntity	Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
disable_content_type_detection	Boolean	Optional. Disables automatic server-side content type detection for files uploaded using multipart/form-data. Always True, if the document is sent as part of an album.
 */
class InputMediaDocument extends InputMedia
{
    protected string $type = 'document';
    protected InputFile|string|null $thumbnail = null;
    protected ?string $caption = null;
    protected ?string $parse_mode = null;
    /** @var MessageEntity[] */
    protected ?array $caption_entities = null;
    protected ?bool $disable_content_type_detection = null;

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
     * @return bool|null
     */
    public function getDisableContentTypeDetection(): ?bool
    {
        return $this->disable_content_type_detection;
    }

    /**
     * @param string|InputFile|null $thumbnail
     * @return InputMediaDocument
     */
    public function setThumbnail(string|InputFile|null $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * @param string|null $caption
     * @return InputMediaDocument
     */
    public function setCaption(?string $caption): self
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * @param string|null $parse_mode
     * @return InputMediaDocument
     */
    public function setParseMode(?string $parse_mode): self
    {
        $this->parse_mode = $parse_mode;

        return $this;
    }

    /**
     * @param MessageEntity[] $caption_entities
     * @return InputMediaDocument
     */
    public function setCaptionEntities(?array $caption_entities): self
    {
        $this->caption_entities = $caption_entities;

        return $this;
    }

    /**
     * @param bool|null $disable_content_type_detection
     * @return InputMediaDocument
     */
    public function setDisableContentTypeDetection(?bool $disable_content_type_detection): self
    {
        $this->disable_content_type_detection = $disable_content_type_detection;

        return $this;
    }
}
