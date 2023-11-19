<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to revoke an invite link created by the bot. If the pr
 * imary link is revoked, a new link is automatically generated. The bot
 * must be an administrator in the chat for this to work and must have th
 * e appropriate administrator rights. Returns the revoked invite link as
 *  ChatInviteLink object.
 */
class RevokeChatInviteLink extends Request
{
    /**
     * Unique identifier of the target chat or username of the target channel
     *  (in the format @channelusername).
     */
    protected int|string $chat_id;
    /**
     * The invite link to revoke.
     */
    protected string $invite_link;

    public static function create(int|string $chatId, string $inviteLink): self
    {
        return new self([
            'chat_id' => $chatId,
            'invite_link' => $inviteLink,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return RevokeChatInviteLink
     */
    public function setChatId(int|string $chatId): self
    {
        $this->chat_id = $chatId;

        return $this;
    }

    /**
     * @param string $inviteLink
     * @return RevokeChatInviteLink
     */
    public function setInviteLink(string $inviteLink): self
    {
        $this->invite_link = $inviteLink;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getChatId(): int|string
    {
        return $this->chat_id;
    }

    /**
     * @return string
     */
    public function getInviteLink(): string
    {
        return $this->invite_link;
    }
}
