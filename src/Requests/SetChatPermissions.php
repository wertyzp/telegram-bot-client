<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\ChatPermissions;

/**
 * Use this method to set default chat permissions for all members. The b
 * ot must be an administrator in the group or a supergroup for this to w
 * ork and must have the can_restrict_members administrator rights. Retur
 * ns True on success.
 */
class SetChatPermissions extends Request
{
    protected const SERIALIZE_JSON = [
        'permissions'
    ];

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
    protected ?bool $use_independent_chat_permissions = null;

    public static function create(int|string $chatId, ChatPermissions $permissions): self
    {
        return new self([
            'chat_id' => $chatId,
            'permissions' => $permissions,
        ]);
    }

    /**
     * @return int|string
     */
    public function getChatId(): int|string
    {
        return $this->chat_id;
    }

    /**
     * @param int|string $chat_id
     * @return SetChatPermissions
     */
    public function setChatId(int|string $chat_id): SetChatPermissions
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    /**
     * @return ChatPermissions
     */
    public function getPermissions(): ChatPermissions
    {
        return $this->permissions;
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
     * @return bool|null
     */
    public function getUseIndependentChatPermissions(): ?bool
    {
        return $this->use_independent_chat_permissions;
    }

    /**
     * @param bool|null $use_independent_chat_permissions
     * @return SetChatPermissions
     */
    public function setUseIndependentChatPermissions(?bool $use_independent_chat_permissions): SetChatPermissions
    {
        $this->use_independent_chat_permissions = $use_independent_chat_permissions;
        return $this;
    }

}
