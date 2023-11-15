<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
is_anonymous	Boolean	True, if the user's presence in the chat is hidden
custom_title	String	Optional. Custom title for this user
 */

class ChatMemberOwner extends ChatMember
{
    protected bool $is_anonymous;
    protected ?string $custom_title = null;

    /**
     * @return bool
     */
    public function getIsAnonymous(): bool
    {
        return $this->is_anonymous;
    }

    /**
     * @return string|null
     */
    public function getCustomTitle(): ?string
    {
        return $this->custom_title;
    }
}
