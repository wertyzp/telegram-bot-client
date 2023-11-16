<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class BotCommandScopeAllGroupChats extends BotCommandScope
{
    protected string $type = 'all_group_chats';
}
