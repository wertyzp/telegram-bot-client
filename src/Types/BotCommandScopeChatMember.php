<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class BotCommandScopeChatMember extends BotCommandScope
{
    protected string $type = 'chat_member';
    protected int|string $chat_id;
    protected int $user_id;

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

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return BotCommandScopeChatMember
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return BotCommandScopeChatMember
     */
    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }
}
