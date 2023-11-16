<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to set default chat permissions for all members. The b
 * ot must be an administrator in the group or a supergroup for this to w
 * ork and must have the can_restrict_members administrator rights. Retur
 * ns True on success.
 */
class SetChatPermissions extends Request
{
    /**
     * Unique identifier for the target chat or username of the target superg
     * roup (in the format @supergroupusername)
     */
    protected int|string $chat_id;
    /**
     * A JSON-serialized object for new default chat permissions
     */
    protected ChatPermissions $permissions;
    /**
     * Pass True if chat permissions are set independently. Otherwise, the ca
     * n_send_other_messages and can_add_web_page_previews permissions will i
     * mply the can_send_messages, can_send_audios, can_send_documents, can_s
     * end_photos, can_send_videos, can_send_video_notes, and can_send_voice_
     * notes permissions; the can_send_polls permission will imply the can_se
     * nd_messages permission.
     */
    protected ?bool $use_independent_chat_permissions;

    public static function create(int|string $chatId, ChatPermissions $permissions): self
    {
        return new self([
            'chat_id' => $chatId,
            'permissions' => $permissions,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return SetChatPermissions
     */
    public function setChatId(int|string $chatId): SetChatPermissions
    {
        $this->chat_id = $chatId;
        return $this;
    }

    /**
     * @param ChatPermissions $permissions
     * @return SetChatPermissions
     */
    public function setPermissions(ChatPermissions $permissions): SetChatPermissions
    {
        $this->permissions = $permissions;
        return $this;
    }

    /**
     * @param bool $useIndependentChatPermissions
     * @return SetChatPermissions
     */
    public function setUseIndependentChatPermissions(bool $useIndependentChatPermissions): SetChatPermissions
    {
        $this->use_independent_chat_permissions = $useIndependentChatPermissions;
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
     * @return ChatPermissions
     */
    public function getPermissions(): ChatPermissions
    {
        return $this->permissions;
    }

    /**
     * @return bool
     */
    public function getUseIndependentChatPermissions(): bool
    {
        return $this->use_independent_chat_permissions;
    }
}
