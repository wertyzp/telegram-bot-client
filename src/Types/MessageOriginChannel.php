<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
 * Field    Type    Description
 * type    String    Type of the message origin, always “channel”
 * date    Integer    Date the message was sent originally in Unix time
 * chat    Chat    Channel chat to which the message was originally sent
 * message_id    Integer    Unique message identifier inside the chat
 * author_signature    String    Optional. Signature of the original post author
 */
class MessageOriginChannel extends Type
{
    protected string $type = 'channel';
    protected int $date;
    protected Chat $chat;
    protected int $message_id;
    protected ?string $author_signature = null;

    protected const TYPE_MAP = [
        'chat' => Chat::class,
    ];

    public function getType(): string
    {
        return $this->type;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function getAuthorSignature(): ?string
    {
        return $this->author_signature;
    }

}
