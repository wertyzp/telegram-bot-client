<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class MessageOrigin extends Type
{
    protected string $type;

    public static function create(array|object $data): static
    {
        $type = $data['type'];
        $class = match ($type) {
            'user' => MessageOriginUser::class,
            'chat' => MessageOriginChat::class,
            'hidden_user' => MessageOriginHiddenUser::class,
            'channel' => MessageOriginChannel::class,
            default => MessageOrigin::class,
        };
        return new $class($data);
    }
}
