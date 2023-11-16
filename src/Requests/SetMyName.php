<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to change the bot's name. Returns True on success.
 */
class SetMyName extends Request
{
    /**
     * New bot name; 0-64 characters. Pass an empty string to remove the dedi
     * cated name for the given language.
     */
    protected ?string $name;
    /**
     * A two-letter ISO 639-1 language code. If empty, the name will be shown
     *  to all users for whose language there is no dedicated name.
     */
    protected ?string $language_code;


    /**
     * @param string $name
     * @return SetMyName
     */
    public function setName(string $name): SetMyName
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $languageCode
     * @return SetMyName
     */
    public function setLanguageCode(string $languageCode): SetMyName
    {
        $this->language_code = $languageCode;
        return $this;
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLanguageCode(): string
    {
        return $this->language_code;
    }
}
