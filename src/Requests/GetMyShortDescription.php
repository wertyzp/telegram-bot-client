<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to get the current bot short description for the given
 *  user language. Returns BotShortDescription on success.
 */
class GetMyShortDescription extends Request
{
    /**
     * A two-letter ISO 639-1 language code or an empty string
     */
    protected ?string $language_code;


    /**
     * @param string $languageCode
     * @return GetMyShortDescription
     */
    public function setLanguageCode(string $languageCode): GetMyShortDescription
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
