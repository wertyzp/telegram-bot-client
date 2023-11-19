<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
Parameter	Type	Required	Description
user_id	Integer	Yes	Unique identifier of the target user
offset	Integer	Optional	Sequential number of the first photo to be returned. By default, all photos are returned.
limit	Integer	Optional	Limits the number of photos to be retrieved. Values between 1-100 are accepted. Defaults to 100.
 */
class GetUserProfilePhotos extends Request
{
    protected int $user_id;
    protected ?int $offset = null;
    protected ?int $limit = null;

    public static function create(int $user_id): self
    {
        return new static(['user_id' => $user_id]);
    }

    /**
     * @param int $user_id
     * @return self
     */
    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @param int|null $offset
     * @return self
     */
    public function setOffset(?int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * @param int|null $limit
     * @return self
     */
    public function setLimit(?int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }
}
