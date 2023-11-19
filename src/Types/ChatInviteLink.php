<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
invite_link	String	The invite link. If the link was created by another chat administrator, then the second part of the link will be replaced with “…”.
creator	User	Creator of the link
creates_join_request	Boolean	True, if users joining the chat via the link need to be approved by chat administrators
is_primary	Boolean	True, if the link is primary
is_revoked	Boolean	True, if the link is revoked
name	String	Optional. Invite link name
expire_date	Integer	Optional. Point in time (Unix timestamp) when the link will expire or has been expired
member_limit	Integer	Optional. The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
pending_join_request_count	Integer	Optional. Number of pending join requests created using this link
 */
class ChatInviteLink extends Type
{
    protected const TYPE_MAP = [
        'creator' => User::class,
    ];

    protected string $invite_link;
    protected User $creator;
    protected bool $creates_join_request;
    protected bool $is_primary;
    protected bool $is_revoked;
    protected ?string $name = null;
    protected ?int $expire_date = null;
    protected ?int $member_limit = null;
    protected ?int $pending_join_request_count = null;

    /**
     * @return string
     */
    public function getInviteLink(): string
    {
        return $this->invite_link;
    }

    /**
     * @return User
     */
    public function getCreator(): User
    {
        return $this->creator;
    }

    /**
     * @return bool
     */
    public function getCreatesJoinRequest(): bool
    {
        return $this->creates_join_request;
    }

    /**
     * @return bool
     */
    public function getIsPrimary(): bool
    {
        return $this->is_primary;
    }

    /**
     * @return bool
     */
    public function getIsRevoked(): bool
    {
        return $this->is_revoked;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return int|null
     */
    public function getExpireDate(): ?int
    {
        return $this->expire_date;
    }

    /**
     * @return int|null
     */
    public function getMemberLimit(): ?int
    {
        return $this->member_limit;
    }

    /**
     * @return int|null
     */
    public function getPendingJoinRequestCount(): ?int
    {
        return $this->pending_join_request_count;
    }
}
