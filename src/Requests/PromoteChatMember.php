<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target channel (in the format @channelusername)
user_id	Integer	Yes	Unique identifier of the target user
is_anonymous	Boolean	Optional	Pass True if the administrator's presence in the chat is hidden
can_manage_chat	Boolean	Optional	Pass True if the administrator can access the chat event log, boost list in channels, see channel members, report spam messages, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege
can_delete_messages	Boolean	Optional	Pass True if the administrator can delete messages of other users
can_manage_video_chats	Boolean	Optional	Pass True if the administrator can manage video chats
can_restrict_members	Boolean	Optional	Pass True if the administrator can restrict, ban or unban chat members, or access supergroup statistics
can_promote_members	Boolean	Optional	Pass True if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by him)
can_change_info	Boolean	Optional	Pass True if the administrator can change chat title, photo and other settings
can_invite_users	Boolean	Optional	Pass True if the administrator can invite new users to the chat
can_post_messages	Boolean	Optional	Pass True if the administrator can post messages in the channel, or access channel statistics; channels only
can_edit_messages	Boolean	Optional	Pass True if the administrator can edit messages of other users and can pin messages; channels only
can_pin_messages	Boolean	Optional	Pass True if the administrator can pin messages, supergroups only
can_post_stories	Boolean	Optional	Pass True if the administrator can post stories in the channel; channels only
can_edit_stories	Boolean	Optional	Pass True if the administrator can edit stories posted by other users; channels only
can_delete_stories	Boolean	Optional	Pass True if the administrator can delete stories posted by other users; channels only
can_manage_topics	Boolean	Optional	Pass True if the user is allowed to create, rename, close, and reopen forum topics, supergroups only
 */

class PromoteChatMember extends Request
{
    protected int|string $chat_id;
    protected int $user_id;
    protected ?bool $is_anonymous = null;
    protected ?bool $can_manage_chat = null;
    protected ?bool $can_delete_messages = null;
    protected ?bool $can_manage_video_chats = null;
    protected ?bool $can_restrict_members = null;
    protected ?bool $can_promote_members = null;
    protected ?bool $can_change_info = null;
    protected ?bool $can_invite_users = null;
    protected ?bool $can_post_messages = null;
    protected ?bool $can_edit_messages = null;
    protected ?bool $can_pin_messages = null;
    protected ?bool $can_post_stories = null;
    protected ?bool $can_edit_stories = null;
    protected ?bool $can_delete_stories = null;
    protected ?bool $can_manage_topics = null;

    public static function create(int|string $chatId, int $userId): self
    {
        return new static(['chat_id' => $chatId, 'user_id' => $userId]);
    }

    /**
     * @param int|string $chat_id
     * @return PromoteChatMember
     */
    public function setChatId(int|string $chat_id): PromoteChatMember
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    /**
     * @param int $user_id
     * @return PromoteChatMember
     */
    public function setUserId(int $user_id): PromoteChatMember
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @param bool|null $is_anonymous
     * @return PromoteChatMember
     */
    public function setIsAnonymous(?bool $is_anonymous): PromoteChatMember
    {
        $this->is_anonymous = $is_anonymous;
        return $this;
    }

    /**
     * @param bool|null $can_manage_chat
     * @return PromoteChatMember
     */
    public function setCanManageChat(?bool $can_manage_chat): PromoteChatMember
    {
        $this->can_manage_chat = $can_manage_chat;
        return $this;
    }

    /**
     * @param bool|null $can_delete_messages
     * @return PromoteChatMember
     */
    public function setCanDeleteMessages(?bool $can_delete_messages): PromoteChatMember
    {
        $this->can_delete_messages = $can_delete_messages;
        return $this;
    }

    /**
     * @param bool|null $can_manage_video_chats
     * @return PromoteChatMember
     */
    public function setCanManageVideoChats(?bool $can_manage_video_chats): PromoteChatMember
    {
        $this->can_manage_video_chats = $can_manage_video_chats;
        return $this;
    }

    /**
     * @param bool|null $can_restrict_members
     * @return PromoteChatMember
     */
    public function setCanRestrictMembers(?bool $can_restrict_members): PromoteChatMember
    {
        $this->can_restrict_members = $can_restrict_members;
        return $this;
    }

    /**
     * @param bool|null $can_promote_members
     * @return PromoteChatMember
     */
    public function setCanPromoteMembers(?bool $can_promote_members): PromoteChatMember
    {
        $this->can_promote_members = $can_promote_members;
        return $this;
    }

    /**
     * @param bool|null $can_change_info
     * @return PromoteChatMember
     */
    public function setCanChangeInfo(?bool $can_change_info): PromoteChatMember
    {
        $this->can_change_info = $can_change_info;
        return $this;
    }

    /**
     * @param bool|null $can_invite_users
     * @return PromoteChatMember
     */
    public function setCanInviteUsers(?bool $can_invite_users): PromoteChatMember
    {
        $this->can_invite_users = $can_invite_users;
        return $this;
    }

    /**
     * @param bool|null $can_post_messages
     * @return PromoteChatMember
     */
    public function setCanPostMessages(?bool $can_post_messages): PromoteChatMember
    {
        $this->can_post_messages = $can_post_messages;
        return $this;
    }

    /**
     * @param bool|null $can_edit_messages
     * @return PromoteChatMember
     */
    public function setCanEditMessages(?bool $can_edit_messages): PromoteChatMember
    {
        $this->can_edit_messages = $can_edit_messages;
        return $this;
    }

    /**
     * @param bool|null $can_pin_messages
     * @return PromoteChatMember
     */
    public function setCanPinMessages(?bool $can_pin_messages): PromoteChatMember
    {
        $this->can_pin_messages = $can_pin_messages;
        return $this;
    }

    /**
     * @param bool|null $can_post_stories
     * @return PromoteChatMember
     */
    public function setCanPostStories(?bool $can_post_stories): PromoteChatMember
    {
        $this->can_post_stories = $can_post_stories;
        return $this;
    }

    /**
     * @param bool|null $can_edit_stories
     * @return PromoteChatMember
     */
    public function setCanEditStories(?bool $can_edit_stories): PromoteChatMember
    {
        $this->can_edit_stories = $can_edit_stories;
        return $this;
    }

    /**
     * @param bool|null $can_delete_stories
     * @return PromoteChatMember
     */
    public function setCanDeleteStories(?bool $can_delete_stories): PromoteChatMember
    {
        $this->can_delete_stories = $can_delete_stories;
        return $this;
    }

    /**
     * @param bool|null $can_manage_topics
     * @return PromoteChatMember
     */
    public function setCanManageTopics(?bool $can_manage_topics): PromoteChatMember
    {
        $this->can_manage_topics = $can_manage_topics;
        return $this;
    }

}
