<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\Type;

/**
 * Parameter    Type    Required    Description
 * chat_id    Integer or String    Yes    Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * message_id    Integer    Yes    Identifier of the target message. If the message belongs to a media group, the reaction is set to the first non-deleted message in the group instead.
 * reaction    Array of ReactionType    Optional    A JSON-serialized list of reaction types to set on the message. Currently, as non-premium users, bots can set up to one reaction per message. A custom emoji reaction can be used if it is either already present on the message or explicitly allowed by chat administrators.
 * is_big    Boolean    Optional    Pass True to set the reaction with a big animation
 */

class SetMessageReaction extends Type
{
    protected const SERIALIZE_JSON = [
        'reaction',
    ];

    protected const TYPE_MAP = [
        'reaction' => [ReactionType::class],
    ];

    protected int|string $chatId;
    protected int $messageId;
    protected array $reaction;
    protected ?bool $is_big = null;

    public static function create(int|string $chatId, int $messageId, array $reaction, ?bool $isBig = null): self
    {
        return new static([
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'reaction' => $reaction,
            'is_big' => $isBig,
        ]);
    }

    public function setChatId(int|string $chatId): SetMessageReaction
    {
        $this->chatId = $chatId;
        return $this;
    }

    public function setMessageId(int $messageId): SetMessageReaction
    {
        $this->messageId = $messageId;
        return $this;
    }

    public function setReaction(array $reaction): SetMessageReaction
    {
        $this->reaction = $reaction;
        return $this;
    }

    public function setIsBig(?bool $is_big): SetMessageReaction
    {
        $this->is_big = $is_big;
        return $this;
    }

}
