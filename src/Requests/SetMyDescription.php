<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to change the bot's description, which is shown in the
 *  chat with the bot if the chat is empty. Returns True on success.
 */
class SetMyDescription extends Request
{
    /**
     * New bot description; 0-512 characters. Pass an empty string to remove
     * the dedicated description for the given language.
     */
    protected ?string $description = null;
    /**
     * A two-letter ISO 639-1 language code. If empty, the description will b
     * e applied to all users for whose language there is no dedicated descri
     * ption.
     */
    protected ?string $language_code = null;

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return SetMyDescription
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
     * @return SetMyDescription
     */
    public function setLanguageCode(?string $language_code): self
    {
        $this->language_code = $language_code;

        return $this;
    }
}
