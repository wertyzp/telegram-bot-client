<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
force_reply	True	Shows reply interface to the user, as if they manually selected the bot's message and tapped 'Reply'
input_field_placeholder	String	Optional. The placeholder to be shown in the input field when the reply is active; 1-64 characters
selective	Boolean	Optional. Use this parameter if you want to force reply from specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
 */
class ForceReply extends Type
{
    protected bool $force_reply = true;
    protected ?string $input_field_placeholder = null;
    protected ?bool $selective = null;

    public function getForceReply(): bool
    {
        return $this->force_reply;
    }

    public function getInputFieldPlaceholder(): ?string
    {
        return $this->input_field_placeholder;
    }

    public function getSelective(): ?bool
    {
        return $this->selective;
    }
}
