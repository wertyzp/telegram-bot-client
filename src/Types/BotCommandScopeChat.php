<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class BotCommandScopeChat extends BotCommandScope
{
    protected string $type = 'chat';
    protected int|string $chat_id;

    /**
     * @return int|string
     */
    public function getChatId(): int|string
    {
        return $this->chat_id;
    }

    /**
     * @param int|string $chat_id
     * @return BotCommandScopeChat
     */
    public function setChatId(int|string $chat_id): self
    {
        $this->chat_id = $chat_id;

        return $this;
    }
}
