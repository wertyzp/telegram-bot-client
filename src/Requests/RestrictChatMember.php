<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\ChatPermissions;

/**
 * Parameter	Type	Required	Description
 * chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * user_id	Integer	Yes	Unique identifier of the target user
 * permissions	ChatPermissions	Yes	A JSON-serialized object for new user permissions
 * use_independent_chat_permissions	Boolean	Optional	Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos, can_send_videos, can_send_video_notes, and can_send_voice_notes permissions; the can_send_polls permission will imply the can_send_messages permission.
 * until_date	Integer	Optional	Date when restrictions will be lifted for the user; Unix time. If user is restricted for more than 366 days or less than 30 seconds from the current time, they are considered to be restricted forever.
 */
class RestrictChatMember extends Request
{
    protected const SERIALIZE_JSON = [
        'permissions',
    ];

    protected int|string $chat_id;
    protected int $user_id;
    protected ChatPermissions $permissions;
    protected ?bool $use_independent_chat_permissions = null;
    protected ?int $until_date = null;

    public static function create(int|string $chatId, int $userId, ChatPermissions $permissions): self
    {
        return new static(['chat_id' => $chatId, 'user_id' => $userId, 'permissions' => $permissions]);
    }

    /**
     * @param int|string $chat_id
     * @return self
     */
    public function setChatId(int|string $chat_id): self
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    /**
     * @param int $user_id
     * @return self
     */
    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @param ChatPermissions $permissions
     * @return self
     */
    public function setPermissions(ChatPermissions $permissions): self
    {
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * @param bool|null $use_independent_chat_permissions
     * @return self
     */
    public function setUseIndependentChatPermissions(?bool $use_independent_chat_permissions): self
    {
        $this->use_independent_chat_permissions = $use_independent_chat_permissions;

        return $this;
    }

    /**
     * @param int|null $until_date
     * @return self
     */
    public function setUntilDate(?int $until_date): self
    {
        $this->until_date = $until_date;

        return $this;
    }
}
