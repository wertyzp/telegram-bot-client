<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to get the current bot name for the given user languag
 * e. Returns BotName on success.
 */
class GetMyName extends Request
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
     * @return GetMyName
     */
    public function setLanguageCode(?string $language_code): self
    {
        $this->language_code = $language_code;

        return $this;
    }
}
