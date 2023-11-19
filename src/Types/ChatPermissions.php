<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
can_send_messages	Boolean	Optional. True, if the user is allowed to send text messages, contacts, invoices, locations and venues
can_send_audios	Boolean	Optional. True, if the user is allowed to send audios
can_send_documents	Boolean	Optional. True, if the user is allowed to send documents
can_send_photos	Boolean	Optional. True, if the user is allowed to send photos
can_send_videos	Boolean	Optional. True, if the user is allowed to send videos
can_send_video_notes	Boolean	Optional. True, if the user is allowed to send video notes
can_send_voice_notes	Boolean	Optional. True, if the user is allowed to send voice notes
can_send_polls	Boolean	Optional. True, if the user is allowed to send polls
can_send_other_messages	Boolean	Optional. True, if the user is allowed to send animations, games, stickers and use inline bots
can_add_web_page_previews	Boolean	Optional. True, if the user is allowed to add web page previews to their messages
can_change_info	Boolean	Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups
can_invite_users	Boolean	Optional. True, if the user is allowed to invite new users to the chat
can_pin_messages	Boolean	Optional. True, if the user is allowed to pin messages. Ignored in public supergroups
can_manage_topics	Boolean	Optional. True, if the user is allowed to create forum topics. If omitted defaults to the value of can_pin_messages
 */
class ChatPermissions extends Type
{
    protected ?bool $can_send_messages = null;
    protected ?bool $can_send_audios = null;
    protected ?bool $can_send_documents = null;
    protected ?bool $can_send_photos = null;
    protected ?bool $can_send_videos = null;
    protected ?bool $can_send_video_notes = null;
    protected ?bool $can_send_voice_notes = null;
    protected ?bool $can_send_polls = null;
    protected ?bool $can_send_other_messages = null;
    protected ?bool $can_add_web_page_previews = null;
    protected ?bool $can_change_info = null;
    protected ?bool $can_invite_users = null;
    protected ?bool $can_pin_messages = null;
    protected ?bool $can_manage_topics = null;

    /**
     * @return bool|null
     */
    public function getCanSendMessages(): ?bool
    {
        return $this->can_send_messages;
    }

    /**
     * @return bool|null
     */
    public function getCanSendAudios(): ?bool
    {
        return $this->can_send_audios;
    }

    /**
     * @return bool|null
     */
    public function getCanSendDocuments(): ?bool
    {
        return $this->can_send_documents;
    }

    /**
     * @return bool|null
     */
    public function getCanSendPhotos(): ?bool
    {
        return $this->can_send_photos;
    }

    /**
     * @return bool|null
     */
    public function getCanSendVideos(): ?bool
    {
        return $this->can_send_videos;
    }

    /**
     * @return bool|null
     */
    public function getCanSendVideoNotes(): ?bool
    {
        return $this->can_send_video_notes;
    }

    /**
     * @return bool|null
     */
    public function getCanSendVoiceNotes(): ?bool
    {
        return $this->can_send_voice_notes;
    }

    /**
     * @return bool|null
     */
    public function getCanSendPolls(): ?bool
    {
        return $this->can_send_polls;
    }

    /**
     * @return bool|null
     */
    public function getCanSendOtherMessages(): ?bool
    {
        return $this->can_send_other_messages;
    }

    /**
     * @return bool|null
     */
    public function getCanAddWebPagePreviews(): ?bool
    {
        return $this->can_add_web_page_previews;
    }

    /**
     * @return bool|null
     */
    public function getCanChangeInfo(): ?bool
    {
        return $this->can_change_info;
    }

    /**
     * @return bool|null
     */
    public function getCanInviteUsers(): ?bool
    {
        return $this->can_invite_users;
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
    public function getCanManageTopics(): ?bool
    {
        return $this->can_manage_topics;
    }

    /**
     * @param bool|null $can_send_messages
     * @return ChatPermissions
     */
    public function setCanSendMessages(?bool $can_send_messages): self
    {
        $this->can_send_messages = $can_send_messages;

        return $this;
    }

    /**
     * @param bool|null $can_send_audios
     * @return ChatPermissions
     */
    public function setCanSendAudios(?bool $can_send_audios): self
    {
        $this->can_send_audios = $can_send_audios;

        return $this;
    }

    /**
     * @param bool|null $can_send_documents
     * @return ChatPermissions
     */
    public function setCanSendDocuments(?bool $can_send_documents): self
    {
        $this->can_send_documents = $can_send_documents;

        return $this;
    }

    /**
     * @param bool|null $can_send_photos
     * @return ChatPermissions
     */
    public function setCanSendPhotos(?bool $can_send_photos): self
    {
        $this->can_send_photos = $can_send_photos;

        return $this;
    }

    /**
     * @param bool|null $can_send_videos
     * @return ChatPermissions
     */
    public function setCanSendVideos(?bool $can_send_videos): self
    {
        $this->can_send_videos = $can_send_videos;

        return $this;
    }

    /**
     * @param bool|null $can_send_video_notes
     * @return ChatPermissions
     */
    public function setCanSendVideoNotes(?bool $can_send_video_notes): self
    {
        $this->can_send_video_notes = $can_send_video_notes;

        return $this;
    }

    /**
     * @param bool|null $can_send_voice_notes
     * @return ChatPermissions
     */
    public function setCanSendVoiceNotes(?bool $can_send_voice_notes): self
    {
        $this->can_send_voice_notes = $can_send_voice_notes;

        return $this;
    }

    /**
     * @param bool|null $can_send_polls
     * @return ChatPermissions
     */
    public function setCanSendPolls(?bool $can_send_polls): self
    {
        $this->can_send_polls = $can_send_polls;

        return $this;
    }

    /**
     * @param bool|null $can_send_other_messages
     * @return ChatPermissions
     */
    public function setCanSendOtherMessages(?bool $can_send_other_messages): self
    {
        $this->can_send_other_messages = $can_send_other_messages;

        return $this;
    }

    /**
     * @param bool|null $can_add_web_page_previews
     * @return ChatPermissions
     */
    public function setCanAddWebPagePreviews(?bool $can_add_web_page_previews): self
    {
        $this->can_add_web_page_previews = $can_add_web_page_previews;

        return $this;
    }

    /**
     * @param bool|null $can_change_info
     * @return ChatPermissions
     */
    public function setCanChangeInfo(?bool $can_change_info): self
    {
        $this->can_change_info = $can_change_info;

        return $this;
    }

    /**
     * @param bool|null $can_invite_users
     * @return ChatPermissions
     */
    public function setCanInviteUsers(?bool $can_invite_users): self
    {
        $this->can_invite_users = $can_invite_users;

        return $this;
    }

    /**
     * @param bool|null $can_pin_messages
     * @return ChatPermissions
     */
    public function setCanPinMessages(?bool $can_pin_messages): self
    {
        $this->can_pin_messages = $can_pin_messages;

        return $this;
    }

    /**
     * @param bool|null $can_manage_topics
     * @return ChatPermissions
     */
    public function setCanManageTopics(?bool $can_manage_topics): self
    {
        $this->can_manage_topics = $can_manage_topics;

        return $this;
    }
}
