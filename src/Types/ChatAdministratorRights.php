<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
is_anonymous	Boolean	True, if the user's presence in the chat is hidden
can_manage_chat	Boolean	True, if the administrator can access the chat event log, boost list in channels, see channel members, report spam messages, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege
can_delete_messages	Boolean	True, if the administrator can delete messages of other users
can_manage_video_chats	Boolean	True, if the administrator can manage video chats
can_restrict_members	Boolean	True, if the administrator can restrict, ban or unban chat members, or access supergroup statistics
can_promote_members	Boolean	True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by the user)
can_change_info	Boolean	True, if the user is allowed to change the chat title, photo and other settings
can_invite_users	Boolean	True, if the user is allowed to invite new users to the chat
can_post_messages	Boolean	Optional. True, if the administrator can post messages in the channel, or access channel statistics; channels only
can_edit_messages	Boolean	Optional. True, if the administrator can edit messages of other users and can pin messages; channels only
can_pin_messages	Boolean	Optional. True, if the user is allowed to pin messages; groups and supergroups only
can_post_stories	Boolean	Optional. True, if the administrator can post stories in the channel; channels only
can_edit_stories	Boolean	Optional. True, if the administrator can edit stories posted by other users; channels only
can_delete_stories	Boolean	Optional. True, if the administrator can delete stories posted by other users; channels only
can_manage_topics	Boolean	Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; supergroups only
 */

class ChatAdministratorRights extends Type
{
    protected bool $is_anonymous;
    protected bool $can_manage_chat;
    protected bool $can_delete_messages;
    protected bool $can_manage_video_chats;
    protected bool $can_restrict_members;
    protected bool $can_promote_members;
    protected bool $can_change_info;
    protected bool $can_invite_users;
    protected ?bool $can_post_messages = null;
    protected ?bool $can_edit_messages = null;
    protected ?bool $can_pin_messages = null;
    protected ?bool $can_post_stories = null;
    protected ?bool $can_edit_stories = null;
    protected ?bool $can_delete_stories = null;
    protected ?bool $can_manage_topics = null;

    /**
     * @return bool
     */
    public function isIsAnonymous(): bool
    {
        return $this->is_anonymous;
    }

    /**
     * @return bool
     */
    public function isCanManageChat(): bool
    {
        return $this->can_manage_chat;
    }

    /**
     * @return bool
     */
    public function isCanDeleteMessages(): bool
    {
        return $this->can_delete_messages;
    }

    /**
     * @return bool
     */
    public function isCanManageVideoChats(): bool
    {
        return $this->can_manage_video_chats;
    }

    /**
     * @return bool
     */
    public function isCanRestrictMembers(): bool
    {
        return $this->can_restrict_members;
    }

    /**
     * @return bool
     */
    public function isCanPromoteMembers(): bool
    {
        return $this->can_promote_members;
    }

    /**
     * @return bool
     */
    public function isCanChangeInfo(): bool
    {
        return $this->can_change_info;
    }

    /**
     * @return bool
     */
    public function isCanInviteUsers(): bool
    {
        return $this->can_invite_users;
    }

    /**
     * @return bool|null
     */
    public function getCanPostMessages(): ?bool
    {
        return $this->can_post_messages;
    }

    /**
     * @return bool|null
     */
    public function getCanEditMessages(): ?bool
    {
        return $this->can_edit_messages;
    }

    /**
     * @return bool|null
     */
    public function getCanPinMessages(): ?bool
    {
        return $this->can_pin_messages;
    }

    /**
     * @return bool|null
     */
    public function getCanPostStories(): ?bool
    {
        return $this->can_post_stories;
    }

    /**
     * @return bool|null
     */
    public function getCanEditStories(): ?bool
    {
        return $this->can_edit_stories;
    }

    /**
     * @return bool|null
     */
    public function getCanDeleteStories(): ?bool
    {
        return $this->can_delete_stories;
    }

    /**
     * @return bool|null
     */
    public function getCanManageTopics(): ?bool
    {
        return $this->can_manage_topics;
    }

}
