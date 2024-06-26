<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
type	String	Type of the result, must be photo
media	String	File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »
 */
abstract class InputMedia extends Type
{
    protected string $type;
    protected string $media;

    public static function create(string $media): static
    {
        return new static([
            'media' => $media,
        ]);
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    public function getMedia(): string
    {
        return $this->media;
    }

    public function setMedia(string $media): static
    {
        $this->media = $media;

        return $this;
    }

    public function willAttach(): bool
    {
        if (!$this->isUrl($this->media) && file_exists($this->media)) {
            return true;
        }
        return false;
    }

    public function getFileKey(): string
    {
        return 'item' . crc32($this->media);
    }

    public function toPostData(): array
    {
        $data = parent::toPostData();
        $file = $this->media;

        if ($this->isUrl($file)) {
            return $data;
        }

        if (file_exists($file)) {
            $fileKey = $this->getFileKey();
            $data['media'] = "attach://$fileKey";

            return $data;
        }

        // case when media is a file_id
        $data['media'] = $file;
        return $data;
    }
}
