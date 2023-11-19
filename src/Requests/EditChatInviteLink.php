<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to edit a non-primary invite link created by the bot.
 * The bot must be an administrator in the chat for this to work and must
 *  have the appropriate administrator rights. Returns the edited invite
 * link as a ChatInviteLink object.
 */
class EditChatInviteLink extends Request
{
    /**
     * Unique identifier for the target chat or username of the target channe
     * l (in the format @channelusername).
     */
    protected int|string $chat_id;
    /**
     * The invite link to edit.
     */
    protected string $invite_link;
    /**
     * Invite link name; 0-32 characters.
     */
    protected ?string $name;
    /**
     * Point in time (Unix timestamp) when the link will expire.
     */
    protected ?int $expire_date = null;
    /**
     * The maximum number of users that can be members of the chat simultaneo
     * usly after joining the chat via this invite link; 1-99999.
     */
    protected ?int $member_limit = null;
    /**
     * True, if users joining the chat via the link need to be approved by ch
     * at administrators. If True, member_limit can't be specified.
     */
    protected ?bool $creates_join_request = null;

    public static function create(int|string $chatId, string $inviteLink): self
    {
        return new self([
            'chat_id' => $chatId,
            'invite_link' => $inviteLink,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return EditChatInviteLink
     */
    public function setChatId(int|string $chatId): self
    {
        $this->chat_id = $chatId;

        return $this;
    }

    /**
     * @param string $inviteLink
     * @return EditChatInviteLink
     */
    public function setInviteLink(string $inviteLink): self
    {
        $this->invite_link = $inviteLink;

        return $this;
    }

    /**
     * @param string $name
     * @return EditChatInviteLink
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param int $expireDate
     * @return EditChatInviteLink
     */
    public function setExpireDate(int $expireDate): self
    {
        $this->expire_date = $expireDate;

        return $this;
    }

    /**
     * @param int $memberLimit
     * @return EditChatInviteLink
     */
    public function setMemberLimit(int $memberLimit): self
    {
        $this->member_limit = $memberLimit;

        return $this;
    }

    /**
     * @param bool $createsJoinRequest
     * @return EditChatInviteLink
     */
    public function setCreatesJoinRequest(bool $createsJoinRequest): self
    {
        $this->creates_join_request = $createsJoinRequest;

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

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getExpireDate(): int
    {
        return $this->expire_date;
    }

    /**
     * @return int
     */
    public function getMemberLimit(): int
    {
        return $this->member_limit;
    }

    /**
     * @return bool
     */
    public function getCreatesJoinRequest(): bool
    {
        return $this->creates_join_request;
    }
}
