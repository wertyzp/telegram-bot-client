<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
file_id	String	Identifier for this file, which can be used to download or reuse the file
file_unique_id	String	Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
type	String	Type of the sticker, currently one of “regular”, “mask”, “custom_emoji”. The type of the sticker is independent from its format, which is determined by the fields is_animated and is_video.
width	Integer	Sticker width
height	Integer	Sticker height
is_animated	Boolean	True, if the sticker is animated
is_video	Boolean	True, if the sticker is a video sticker
thumbnail	PhotoSize	Optional. Sticker thumbnail in the .WEBP or .JPG format
emoji	String	Optional. Emoji associated with the sticker
set_name	String	Optional. Name of the sticker set to which the sticker belongs
premium_animation	File	Optional. For premium regular stickers, premium animation for the sticker
mask_position	MaskPosition	Optional. For mask stickers, the position where the mask should be placed
custom_emoji_id	String	Optional. For custom emoji stickers, unique identifier of the custom emoji
needs_repainting	True	Optional. True, if the sticker must be repainted to a text color in messages, the color of the Telegram Premium badge in emoji status, white color on chat photos, or another appropriate color in other places
file_size	Integer	Optional. File size in bytes
 */
class Sticker extends Type
{
    protected const TYPE_MAP = [
        'thumbnail' => PhotoSize::class,
        'premium_animation' => File::class,
        'mask_position' => MaskPosition::class,
    ];

    protected string $fileId;
    protected string $fileUniqueId;
    protected string $type;
    protected int $width;
    protected int $height;
    protected bool $isAnimated;
    protected bool $isVideo;
    protected ?PhotoSize $thumbnail = null;
    protected ?string $emoji = null;
    protected ?string $setName = null;
    protected ?File $premiumAnimation = null;
    protected ?MaskPosition $maskPosition = null;
    protected ?string $customEmojiId = null;
    protected ?bool $needsRepainting = null;
    protected ?int $fileSize = null;

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @return string
     */
    public function getFileUniqueId(): string
    {
        return $this->fileUniqueId;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
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
     * @return bool
     */
    public function isAnimated(): bool
    {
        return $this->isAnimated;
    }

    /**
     * @return bool
     */
    public function isVideo(): bool
    {
        return $this->isVideo;
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
    public function getEmoji(): ?string
    {
        return $this->emoji;
    }

    /**
     * @return string|null
     */
    public function getSetName(): ?string
    {
        return $this->setName;
    }

    /**
     * @return File|null
     */
    public function getPremiumAnimation(): ?File
    {
        return $this->premiumAnimation;
    }

    /**
     * @return MaskPosition|null
     */
    public function getMaskPosition(): ?MaskPosition
    {
        return $this->maskPosition;
    }

    /**
     * @return string|null
     */
    public function getCustomEmojiId(): ?string
    {
        return $this->customEmojiId;
    }

    /**
     * @return bool|null
     */
    public function getNeedsRepainting(): ?bool
    {
        return $this->needsRepainting;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }
}
