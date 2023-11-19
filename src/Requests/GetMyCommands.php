<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to get the current list of the bot's commands for the
 * given scope and user language. Returns an Array of BotCommand objects.
 *  If commands aren't set, an empty list is returned.
 */
class GetMyCommands extends Request
{
    protected const SERIALIZE_JSON = [
        'scope',
    ];

    /**
     * A JSON-serialized object, describing scope of users. Defaults to BotCo
     * mmandScopeDefault.
     */
    protected ?BotCommandScope $scope;
    /**
     * A two-letter ISO 639-1 language code or an empty string.
     */
    protected ?string $language_code;

    /**
     * @param BotCommandScope $scope
     * @return GetMyCommands
     */
    public function setScope(BotCommandScope $scope): self
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * @param string $languageCode
     * @return GetMyCommands
     */
    public function setLanguageCode(string $languageCode): self
    {
        $this->language_code = $languageCode;

        return $this;
    }

    /**
     * @return BotCommandScope
     */
    public function getScope(): BotCommandScope
    {
        return $this->scope;
    }

    /**
     * @return string
     */
    public function getLanguageCode(): string
    {
        return $this->language_code;
    }
}
