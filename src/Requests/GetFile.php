<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;
/**
Parameter	Type	Required	Description
file_id	String	Yes	File identifier to get information about
 */
class GetFile extends Request
{
    protected string $file_id;

    public static function create(string $file_id): self
    {
        return new static(['file_id' => $file_id]);
    }

    /**
     * @param string $file_id
     * @return self
     */
    public function setFileId(string $file_id): self
    {
        $this->file_id = $file_id;
        return $this;
    }
}
