<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
is_member	Boolean	True, if the user is a member of the chat at the moment of the request
can_send_messages	Boolean	True, if the user is allowed to send text messages, contacts, invoices, locations and venues
can_send_audios	Boolean	True, if the user is allowed to send audios
can_send_documents	Boolean	True, if the user is allowed to send documents
can_send_photos	Boolean	True, if the user is allowed to send photos
can_send_videos	Boolean	True, if the user is allowed to send videos
can_send_video_notes	Boolean	True, if the user is allowed to send video notes
can_send_voice_notes	Boolean	True, if the user is allowed to send voice notes
can_send_polls	Boolean	True, if the user is allowed to send polls
can_send_other_messages	Boolean	True, if the user is allowed to send animations, games, stickers and use inline bots
can_add_web_page_previews	Boolean	True, if the user is allowed to add web page previews to their messages
can_change_info	Boolean	True, if the user is allowed to change the chat title, photo and other settings
can_invite_users	Boolean	True, if the user is allowed to invite new users to the chat
can_pin_messages	Boolean	True, if the user is allowed to pin messages
can_manage_topics	Boolean	True, if the user is allowed to create forum topics
until_date	Integer	Date when restrictions will be lifted for this user; Unix time. If 0, then the user is restricted forever
 */

class ChatMemberRestricted extends ChatMember
{
    protected bool $is_member;
    protected bool $can_send_messages;
    protected bool $can_send_audios;
    protected bool $can_send_documents;
    protected bool $can_send_photos;
    protected bool $can_send_videos;
    protected bool $can_send_video_notes;
    protected bool $can_send_voice_notes;
    protected bool $can_send_polls;
    protected bool $can_send_other_messages;
    protected bool $can_add_web_page_previews;
    protected bool $can_change_info;
    protected bool $can_invite_users;
    protected bool $can_pin_messages;
    protected bool $can_manage_topics;
    protected int $until_date;

    /**
     * @return bool
     */
    public function isIsMember(): bool
    {
        return $this->is_member;
    }

    /**
     * @return bool
     */
    public function isCanSendMessages(): bool
    {
        return $this->can_send_messages;
    }

    /**
     * @return bool
     */
    public function isCanSendAudios(): bool
    {
        return $this->can_send_audios;
    }

    /**
     * @return bool
     */
    public function isCanSendDocuments(): bool
    {
        return $this->can_send_documents;
    }

    /**
     * @return bool
     */
    public function isCanSendPhotos(): bool
    {
        return $this->can_send_photos;
    }

    /**
     * @return bool
     */
    public function isCanSendVideos(): bool
    {
        return $this->can_send_videos;
    }

    /**
     * @return bool
     */
    public function isCanSendVideoNotes(): bool
    {
        return $this->can_send_video_notes;
    }

    /**
     * @return bool
     */
    public function isCanSendVoiceNotes(): bool
    {
        return $this->can_send_voice_notes;
    }

    /**
     * @return bool
     */
    public function isCanSendPolls(): bool
    {
        return $this->can_send_polls;
    }

    /**
     * @return bool
     */
    public function isCanSendOtherMessages(): bool
    {
        return $this->can_send_other_messages;
    }

    /**
     * @return bool
     */
    public function isCanAddWebPagePreviews(): bool
    {
        return $this->can_add_web_page_previews;
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
     * @return bool
     */
    public function isCanPinMessages(): bool
    {
        return $this->can_pin_messages;
    }

    /**
     * @return bool
     */
    public function isCanManageTopics(): bool
    {
        return $this->can_manage_topics;
    }

    /**
     * @return int
     */
    public function getUntilDate(): int
    {
        return $this->until_date;
    }

}
