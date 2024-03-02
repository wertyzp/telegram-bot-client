<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
 * Field    Type    Description
 * type    String    Type of the message origin, always “chat”
 * date    Integer    Date the message was sent originally in Unix time
 * sender_chat    Chat    Chat that sent the message originally
 * author_signature    String    Optional. For messages originally sent by an anonymous chat administrator, original message author signature
 */
class MessageOriginChat extends MessageOrigin
{
    protected string $type = 'chat';
    protected int $date;
    protected Chat $sender_chat;
    protected ?string $author_signature = null;

    protected const TYPE_MAP = [
        'sender_chat' => Chat::class,
    ];

    public function getType(): string
    {
        return $this->type;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function getSenderChat(): Chat
    {
        return $this->sender_chat;
    }

    public function getAuthorSignature(): ?string
    {
        return $this->author_signature;
    }

}
