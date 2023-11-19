<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
request_id	Integer	Identifier of the request
user_id	Integer	Identifier of the shared user. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier. The bot may not have access to the user and could be unable to use this identifier, unless the user is already known to the bot by some other means.
 */
class UserShared extends Type
{
    protected int $request_id;
    protected int $user_id;

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->request_id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }
}
