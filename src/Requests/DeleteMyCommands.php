<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to delete the list of the bot's commands for the given
 *  scope and user language. After deletion, higher level commands will b
 * e shown to affected users. Returns True on success.
 */
class DeleteMyCommands extends Request
{
    /**
     * A JSON-serialized object, describing scope of users for which the comm
     * ands are relevant. Defaults to BotCommandScopeDefault.
     */
    protected ?BotCommandScope $scope;
    /**
     * A two-letter ISO 639-1 language code. If empty, commands will be appli
     * ed to all users from the given scope, for whose language there are no
     * dedicated commands
     */
    protected ?string $language_code;


    /**
     * @param BotCommandScope $scope
     * @return DeleteMyCommands
     */
    public function setScope(BotCommandScope $scope): DeleteMyCommands
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * @param string $languageCode
     * @return DeleteMyCommands
     */
    public function setLanguageCode(string $languageCode): DeleteMyCommands
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
