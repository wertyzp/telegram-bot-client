<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class BotCommandScopeAllPrivateChats extends BotCommandScope
{
    protected string $type = 'all_private_chats';
}
