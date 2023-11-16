<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to create an additional invite link for a chat. The bo
 * t must be an administrator in the chat for this to work and must have
 * the appropriate administrator rights. The link can be revoked using th
 * e method revokeChatInviteLink. Returns the new invite link as ChatInvi
 * teLink object.
 */
class CreateChatInviteLink extends Request
{
    /**
     * Unique identifier for the target chat or username of the target channe
     * l (in the format @channelusername)
     */
    protected int|string $chat_id;
    /**
     * Invite link name; 0-32 characters
     */
    protected ?string $name;
    /**
     * Point in time (Unix timestamp) when the link will expire
     */
    protected ?int $expire_date;
    /**
     * The maximum number of users that can be members of the chat simultaneo
     * usly after joining the chat via this invite link; 1-99999
     */
    protected ?int $member_limit;
    /**
     * True, if users joining the chat via the link need to be approved by ch
     * at administrators. If True, member_limit can't be specified
     */
    protected ?bool $creates_join_request;

    public static function create(int|string $chatId): self
    {
        return new self([
            'chat_id' => $chatId,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return CreateChatInviteLink
     */
    public function setChatId(int|string $chatId): CreateChatInviteLink
    {
        $this->chat_id = $chatId;
        return $this;
    }

    /**
     * @param string $name
     * @return CreateChatInviteLink
     */
    public function setName(string $name): CreateChatInviteLink
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param int $expireDate
     * @return CreateChatInviteLink
     */
    public function setExpireDate(int $expireDate): CreateChatInviteLink
    {
        $this->expire_date = $expireDate;
        return $this;
    }

    /**
     * @param int $memberLimit
     * @return CreateChatInviteLink
     */
    public function setMemberLimit(int $memberLimit): CreateChatInviteLink
    {
        $this->member_limit = $memberLimit;
        return $this;
    }

    /**
     * @param bool $createsJoinRequest
     * @return CreateChatInviteLink
     */
    public function setCreatesJoinRequest(bool $createsJoinRequest): CreateChatInviteLink
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