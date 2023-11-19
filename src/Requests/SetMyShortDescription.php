<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to change the bot's short description, which is shown
 * on the bot's profile page and is sent together with the link when user
 * s share the bot. Returns True on success.
 */
class SetMyShortDescription extends Request
{
    /**
     * New short description for the bot; 0-120 characters. Pass an empty str
     * ing to remove the dedicated short description for the given language.
     */
    protected ?string $short_description = null;
    /**
     * A two-letter ISO 639-1 language code. If empty, the short description
     * will be applied to all users for whose language there is no dedicated
     * short description.
     */
    protected ?string $language_code = null;

    /**
     * @return string|null
     */
    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }

    /**
     * @param string|null $short_description
     * @return SetMyShortDescription
     */
    public function setShortDescription(?string $short_description): self
    {
        $this->short_description = $short_description;

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
     * @return SetMyShortDescription
     */
    public function setLanguageCode(?string $language_code): self
    {
        $this->language_code = $language_code;

        return $this;
    }
}
