<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to get the current bot description for the given user
 * language. Returns BotDescription on success.
 */
class GetMyDescription extends Request
{
    /**
     * A two-letter ISO 639-1 language code or an empty string
     */
    protected ?string $language_code;


    /**
     * @param string $languageCode
     * @return GetMyDescription
     */
    public function setLanguageCode(string $languageCode): GetMyDescription
    {
        $this->language_code = $languageCode;
        return $this;
    }
    /**
     * @return string
     */
    public function getLanguageCode(): string
    {
        return $this->language_code;
    }
}
