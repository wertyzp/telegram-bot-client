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
    protected ?string $name = null;
    /**
     * A two-letter ISO 639-1 language code. If empty, the name will be shown
     *  to all users for whose language there is no dedicated name.
     */
    protected ?string $language_code = null;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return SetMyName
     */
    public function setName(?string $name): SetMyName
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguageCode(): ?string
    {
        return $this->language_code;
    }

    /**
     * @param string|null $language_code
     * @return SetMyName
     */
    public function setLanguageCode(?string $language_code): SetMyName
    {
        $this->language_code = $language_code;
        return $this;
    }

}
