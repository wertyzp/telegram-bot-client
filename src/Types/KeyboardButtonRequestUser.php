<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

use Werty\Http\Clients\TelegramBot\Requests\Request;

/**
Field	Type	Description
request_id	Integer	Signed 32-bit identifier of the request, which will be received back in the UserShared object. Must be unique within the message
user_is_bot	Boolean	Optional. Pass True to request a bot, pass False to request a regular user. If not specified, no additional restrictions are applied.
user_is_premium	Boolean	Optional. Pass True to request a premium user, pass False to request a non-premium user. If not specified, no additional restrictions are applied.
 */
class KeyboardButtonRequestUser extends Request
{
    protected int $request_id;
    protected ?bool $user_is_bot = null;
    protected ?bool $user_is_premium = null;

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->request_id;
    }

    /**
     * @return bool|null
     */
    public function getUserIsBot(): ?bool
    {
        return $this->user_is_bot;
    }

    /**
     * @return bool|null
     */
    public function getUserIsPremium(): ?bool
    {
        return $this->user_is_premium;
    }
}
