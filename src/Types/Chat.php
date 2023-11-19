<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

use Werty\Http\Clients\TelegramBot\Requests\ChatLocation;

class Chat extends Type
{
    public const TYPE_PRIVATE = 'private';
    public const TYPE_GROUP = 'group';
    public const TYPE_SUPERGROUP = 'supergroup';
    public const TYPE_CHANNEL = 'channel';
    /**
    Field	Type	Description
    id	Integer	Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
    type	String	Type of chat, can be either “private”, “group”, “supergroup” or “channel”
    title	String	Optional. Title, for supergroups, channels and group chats
    username	String	Optional. Username, for private chats, supergroups and channels if available
    first_name	String	Optional. First name of the other party in a private chat
    last_name	String	Optional. Last name of the other party in a private chat
    is_forum	True	Optional. True, if the supergroup chat is a forum (has topics enabled)
    photo	ChatPhoto	Optional. Chat photo. Returned only in getChat.
    active_usernames	Array of String	Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and channels. Returned only in getChat.
    emoji_status_custom_emoji_id	String	Optional. Custom emoji identifier of emoji status of the other party in a private chat. Returned only in getChat.
    emoji_status_expiration_date	Integer	Optional. Expiration date of the emoji status of the other party in a private chat in Unix time, if any. Returned only in getChat.
    bio	String	Optional. Bio of the other party in a private chat. Returned only in getChat.
    has_private_forwards	True	Optional. True, if privacy settings of the other party in the private chat allows to use tg://user?id=<user_id> links only in chats with the user. Returned only in getChat.
    has_restricted_voice_and_video_messages	True	Optional. True, if the privacy settings of the other party restrict sending voice and video note messages in the private chat. Returned only in getChat.
    join_to_send_messages	True	Optional. True, if users need to join the supergroup before they can send messages. Returned only in getChat.
    join_by_request	True	Optional. True, if all users directly joining the supergroup need to be approved by supergroup administrators. Returned only in getChat.
    description	String	Optional. Description, for groups, supergroups and channel chats. Returned only in getChat.
    invite_link	String	Optional. Primary invite link, for groups, supergroups and channel chats. Returned only in getChat.
    pinned_message	Message	Optional. The most recent pinned message (by sending date). Returned only in getChat.
    permissions	ChatPermissions	Optional. Default chat member permissions, for groups and supergroups. Returned only in getChat.
    slow_mode_delay	Integer	Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unpriviledged user; in seconds. Returned only in getChat.
    message_auto_delete_time	Integer	Optional. The time after which all messages sent to the chat will be automatically deleted; in seconds. Returned only in getChat.
    has_aggressive_anti_spam_enabled	True	Optional. True, if aggressive anti-spam checks are enabled in the supergroup. The field is only available to chat administrators. Returned only in getChat.
    has_hidden_members	True	Optional. True, if non-administrators can only get the list of bots and administrators in the chat. Returned only in getChat.
    has_protected_content	True	Optional. True, if messages from the chat can't be forwarded to other chats. Returned only in getChat.
    sticker_set_name	String	Optional. For supergroups, name of group sticker set. Returned only in getChat.
    can_set_sticker_set	True	Optional. True, if the bot can change the group sticker set. Returned only in getChat.
    linked_chat_id	Integer	Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier. Returned only in getChat.
    location	ChatLocation	Optional. For supergroups, the location to which the supergroup is connected. Returned only in getChat.
     */
    protected const TYPE_MAP = [
        'photo' => ChatPhoto::class,
        'pinned_message' => Message::class,
        'permissions' => ChatPermissions::class,
        'location' => ChatLocation::class,
        'active_usernames' => [self::T_STRING],
    ];

    protected int $id;
    protected string $type;
    protected ?string $title;
    protected ?string $username;
    protected ?string $first_name;
    protected ?string $last_name;
    protected ?bool $is_forum;
    protected ?ChatPhoto $photo;
    protected ?array $active_usernames;
    protected ?string $emoji_status_custom_emoji_id;
    protected ?int $emoji_status_expiration_date;
    protected ?string $bio;
    protected ?bool $has_private_forwards;
    protected ?bool $has_restricted_voice_and_video_messages;
    protected ?bool $join_to_send_messages;
    protected ?bool $join_by_request;
    protected ?string $description;
    protected ?string $invite_link;
    protected ?Message $pinned_message;
    protected ?ChatPermissions $permissions;
    protected ?int $slow_mode_delay;
    protected ?int $message_auto_delete_time;
    protected ?bool $has_aggressive_anti_spam_enabled;
    protected ?bool $has_hidden_members;
    protected ?bool $has_protected_content;
    protected ?string $sticker_set_name;
    protected ?bool $can_set_sticker_set;
    protected ?int $linked_chat_id;
    protected ?ChatLocation $location;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * @return bool|null
     */
    public function getIsForum(): ?bool
    {
        return $this->is_forum;
    }

    /**
     * @return ChatPhoto|null
     */
    public function getPhoto(): ?ChatPhoto
    {
        return $this->photo;
    }

    /**
     * @return array|null
     */
    public function getActiveUsernames(): ?array
    {
        return $this->active_usernames;
    }

    /**
     * @return string|null
     */
    public function getEmojiStatusCustomEmojiId(): ?string
    {
        return $this->emoji_status_custom_emoji_id;
    }

    /**
     * @return int|null
     */
    public function getEmojiStatusExpirationDate(): ?int
    {
        return $this->emoji_status_expiration_date;
    }

    /**
     * @return string|null
     */
    public function getBio(): ?string
    {
        return $this->bio;
    }

    /**
     * @return bool|null
     */
    public function getHasPrivateForwards(): ?bool
    {
        return $this->has_private_forwards;
    }

    /**
     * @return bool|null
     */
    public function getHasRestrictedVoiceAndVideoMessages(): ?bool
    {
        return $this->has_restricted_voice_and_video_messages;
    }

    /**
     * @return bool|null
     */
    public function getJoinToSendMessages(): ?bool
    {
        return $this->join_to_send_messages;
    }

    /**
     * @return bool|null
     */
    public function getJoinByRequest(): ?bool
    {
        return $this->join_by_request;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function getInviteLink(): ?string
    {
        return $this->invite_link;
    }

    /**
     * @return Message|null
     */
    public function getPinnedMessage(): ?Message
    {
        return $this->pinned_message;
    }

    /**
     * @return ChatPermissions|null
     */
    public function getPermissions(): ?ChatPermissions
    {
        return $this->permissions;
    }

    /**
     * @return int|null
     */
    public function getSlowModeDelay(): ?int
    {
        return $this->slow_mode_delay;
    }

    /**
     * @return int|null
     */
    public function getMessageAutoDeleteTime(): ?int
    {
        return $this->message_auto_delete_time;
    }

    /**
     * @return bool|null
     */
    public function getHasAggressiveAntiSpamEnabled(): ?bool
    {
        return $this->has_aggressive_anti_spam_enabled;
    }

    /**
     * @return bool|null
     */
    public function getHasHiddenMembers(): ?bool
    {
        return $this->has_hidden_members;
    }

    /**
     * @return bool|null
     */
    public function getHasProtectedContent(): ?bool
    {
        return $this->has_protected_content;
    }

    /**
     * @return string|null
     */
    public function getStickerSetName(): ?string
    {
        return $this->sticker_set_name;
    }

    /**
     * @return bool|null
     */
    public function getCanSetStickerSet(): ?bool
    {
        return $this->can_set_sticker_set;
    }

    /**
     * @return int|null
     */
    public function getLinkedChatId(): ?int
    {
        return $this->linked_chat_id;
    }

    /**
     * @return ChatLocation|null
     */
    public function getLocation(): ?ChatLocation
    {
        return $this->location;
    }
}
