<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to get the current bot description for the given user
 * language. Returns BotDescription on success.
 */
class GetMyDescription extends Request
{
    /**
     * A two-letter ISO 639-1 language code or an empty string.
     */
    protected ?string $language_code = null;

    /**
     * @return string|null
     */
    public function getLanguageCode(): ?string
    {
        return $this->language_code;
    }

    /**
     * @param string|null $language_code
     * @return GetMyDescription
     */
    public function setLanguageCode(?string $language_code): self
    {
        $this->language_code = $language_code;

        return $this;
    }
}
