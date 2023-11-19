<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
total_count	Integer	Total number of profile pictures the target user has
photos	Array of Array of PhotoSize	Requested profile pictures (in up to 4 sizes each)
 */
class UserProfilePhotos extends Type
{
    protected const TYPE_MAP = [
        'photos' => [[PhotoSize::class]],
    ];

    protected int $total_count;
    /**
     * @var PhotoSize[][]
     */
    protected array $photos;

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->total_count;
    }

    /**
     * @return PhotoSize[][]
     */
    public function getPhotos(): array
    {
        return $this->photos;
    }
}
