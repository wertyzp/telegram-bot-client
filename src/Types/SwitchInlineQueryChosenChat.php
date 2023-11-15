<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
query	String	Optional. The default inline query to be inserted in the input field. If left empty, only the bot's username will be inserted
allow_user_chats	Boolean	Optional. True, if private chats with users can be chosen
allow_bot_chats	Boolean	Optional. True, if private chats with bots can be chosen
allow_group_chats	Boolean	Optional. True, if group and supergroup chats can be chosen
allow_channel_chats	Boolean	Optional. True, if channel chats can be chosen
 */

class SwitchInlineQueryChosenChat extends Type
{
    protected ?string $query = null;
    protected ?bool $allow_user_chats = null;
    protected ?bool $allow_bot_chats = null;
    protected ?bool $allow_group_chats = null;
    protected ?bool $allow_channel_chats = null;

    /**
     * @return string|null
     */
    public function getQuery(): ?string
    {
        return $this->query;
    }

    /**
     * @return bool|null
     */
    public function getAllowUserChats(): ?bool
    {
        return $this->allow_user_chats;
    }

    /**
     * @return bool|null
     */
    public function getAllowBotChats(): ?bool
    {
        return $this->allow_bot_chats;
    }

    /**
     * @return bool|null
     */
    public function getAllowGroupChats(): ?bool
    {
        return $this->allow_group_chats;
    }

    /**
     * @return bool|null
     */
    public function getAllowChannelChats(): ?bool
    {
        return $this->allow_channel_chats;
    }

}
