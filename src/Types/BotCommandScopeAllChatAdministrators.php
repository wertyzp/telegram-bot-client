<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class BotCommandScopeAllChatAdministrators extends BotCommandScope
{
    protected string $type = 'all_chat_administrators';

}
