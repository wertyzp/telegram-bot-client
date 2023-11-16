<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/*
Field	Type	Description
chat	Chat	Chat the user belongs to
from	User	Performer of the action, which resulted in the change
date	Integer	Date the change was done in Unix time
old_chat_member	ChatMember	Previous information about the chat member
new_chat_member	ChatMember	New information about the chat member
invite_link	ChatInviteLink	Optional. Chat invite link, which was used by the user to join the chat; for joining by invite link events only.
via_chat_folder_invite_link	Boolean	Optional. True, if the user joined the chat via a chat folder invite link
*/
class ChatMemberUpdated extends Type
{
    protected const TYPE_MAP = [
        'chat' => Chat::class,
        'from' => User::class,
        'old_chat_member' => ChatMember::class,
        'new_chat_member' => ChatMember::class,
        'invite_link' => ChatInviteLink::class,
    ];

    protected Chat $chat;
    protected User $from;
    protected int $date;
    protected ChatMember $old_chat_member;
    protected ChatMember $new_chat_member;
    protected ?ChatInviteLink $invite_link = null;
    protected ?bool $via_chat_folder_invite_link = null;

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    public function getOldChatMember(): ChatMember
    {
        return $this->old_chat_member;
    }

    public function getNewChatMember(): ChatMember
    {
        return $this->new_chat_member;
    }

    /**
     * @return ChatInviteLink|null
     */
    public function getInviteLink(): ?ChatInviteLink
    {
        return $this->invite_link;
    }

    /**
     * @return bool|null
     */
    public function getViaChatFolderInviteLink(): ?bool
    {
        return $this->via_chat_folder_invite_link;
    }
}
