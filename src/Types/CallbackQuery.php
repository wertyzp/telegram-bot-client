<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
id	String	Unique identifier for this query
from	User	Sender
message	Message	Optional. Message with the callback button that originated the query. Note that message content and message date will not be available if the message is too old
inline_message_id	String	Optional. Identifier of the message sent via the bot in inline mode, that originated the query.
chat_instance	String	Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent. Useful for high scores in games.
data	String	Optional. Data associated with the callback button. Be aware that the message originated the query can contain no callback buttons with this data.
game_short_name	String	Optional. Short name of a Game to be returned, serves as the unique identifier for the game
 */
class CallbackQuery extends Type
{
    protected const TYPE_MAP = [
        'from' => User::class,
        'message' => Message::class,
    ];

    protected string $id;
    protected User $from;
    protected ?Message $message = null;
    protected ?string $inline_message_id = null;
    protected ?string $chat_instance = null;
    protected ?string $data = null;
    protected ?string $game_short_name = null;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @return Message|null
     */
    public function getMessage(): ?Message
    {
        return $this->message;
    }

    /**
     * @return string|null
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inline_message_id;
    }

    /**
     * @return string|null
     */
    public function getChatInstance(): ?string
    {
        return $this->chat_instance;
    }

    /**
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @return string|null
     */
    public function getGameShortName(): ?string
    {
        return $this->game_short_name;
    }
}
