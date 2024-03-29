<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
request_id	Integer	Signed 32-bit identifier of the request, which will be received back in the ChatShared object. Must be unique within the message
chat_is_channel	Boolean	Pass True to request a channel chat, pass False to request a group or a supergroup chat.
chat_is_forum	Boolean	Optional. Pass True to request a forum supergroup, pass False to request a non-forum chat. If not specified, no additional restrictions are applied.
chat_has_username	Boolean	Optional. Pass True to request a supergroup or a channel with a username, pass False to request a chat without a username. If not specified, no additional restrictions are applied.
chat_is_created	Boolean	Optional. Pass True to request a chat owned by the user. Otherwise, no additional restrictions are applied.
user_administrator_rights	ChatAdministratorRights	Optional. A JSON-serialized object listing the required administrator rights of the user in the chat. The rights must be a superset of bot_administrator_rights. If not specified, no additional restrictions are applied.
bot_administrator_rights	ChatAdministratorRights	Optional. A JSON-serialized object listing the required administrator rights of the bot in the chat. The rights must be a subset of user_administrator_rights. If not specified, no additional restrictions are applied.
bot_is_member	Boolean	Optional. Pass True to request a chat with the bot as a member. Otherwise, no additional restrictions are applied.
 */
class KeyboardButtonRequestChat extends Type
{
    protected const TYPE_MAP = [
        'user_administrator_rights' => ChatAdministratorRights::class,
        'bot_administrator_rights' => ChatAdministratorRights::class,
    ];

    protected int $request_id;
    protected bool $chat_is_channel;
    protected ?bool $chat_is_forum = null;
    protected ?bool $chat_has_username = null;
    protected ?bool $chat_is_created = null;
    protected ?ChatAdministratorRights $user_administrator_rights = null;
    protected ?ChatAdministratorRights $bot_administrator_rights = null;
    protected ?bool $bot_is_member = null;

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->request_id;
    }

    /**
     * @return bool
     */
    public function isChatIsChannel(): bool
    {
        return $this->chat_is_channel;
    }

    /**
     * @return bool|null
     */
    public function getChatIsForum(): ?bool
    {
        return $this->chat_is_forum;
    }

    /**
     * @return bool|null
     */
    public function getChatHasUsername(): ?bool
    {
        return $this->chat_has_username;
    }

    /**
     * @return bool|null
     */
    public function getChatIsCreated(): ?bool
    {
        return $this->chat_is_created;
    }

    /**
     * @return ChatAdministratorRights|null
     */
    public function getUserAdministratorRights(): ?ChatAdministratorRights
    {
        return $this->user_administrator_rights;
    }

    /**
     * @return ChatAdministratorRights|null
     */
    public function getBotAdministratorRights(): ?ChatAdministratorRights
    {
        return $this->bot_administrator_rights;
    }

    /**
     * @return bool|null
     */
    public function getBotIsMember(): ?bool
    {
        return $this->bot_is_member;
    }
}
