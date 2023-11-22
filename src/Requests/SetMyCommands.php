<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\BotCommandScope;

/**
 * Use this method to change the list of the bot's commands. See this man
 * ual for more details about bot commands. Returns True on success.
 */
class SetMyCommands extends Request
{
    protected const SERIALIZE_JSON = [
        'commands',
        'scope',
    ];

    /**
     * A JSON-serialized list of bot commands to be set as the list of the bo
     * t's commands. At most 100 commands can be specified.
     * @var array of BotCommand[]
     */
    protected array $commands;
    /**
     * A JSON-serialized object, describing scope of users for which the comm
     * ands are relevant. Defaults to BotCommandScopeDefault.
     */
    protected ?BotCommandScope $scope = null;
    /**
     * A two-letter ISO 639-1 language code. If empty, commands will be appli
     * ed to all users from the given scope, for whose language there are no
     * dedicated commands.
     */
    protected ?string $language_code;

    public static function create(array $commands): self
    {
        return new self([
            'commands' => $commands,
        ]);
    }

    /**
     * @param array $commands
     * @return SetMyCommands
     */
    public function setCommands(array $commands): self
    {
        $this->commands = $commands;

        return $this;
    }

    /**
     * @param BotCommandScope $scope
     * @return SetMyCommands
     */
    public function setScope(BotCommandScope $scope): self
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * @param string $languageCode
     * @return SetMyCommands
     */
    public function setLanguageCode(string $languageCode): self
    {
        $this->language_code = $languageCode;

        return $this;
    }

    /**
     * @return array
     */
    public function getCommands(): array
    {
        return $this->commands;
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
