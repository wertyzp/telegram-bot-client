<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
id	Integer	Unique identifier for this user or bot. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
is_bot	Boolean	True, if this user is a bot
first_name	String	User's or bot's first name
last_name	String	Optional. User's or bot's last name
username	String	Optional. User's or bot's username
language_code	String	Optional. IETF language tag of the user's language
is_premium	True	Optional. True, if this user is a Telegram Premium user
added_to_attachment_menu	True	Optional. True, if this user added the bot to the attachment menu
can_join_groups	Boolean	Optional. True, if the bot can be invited to groups. Returned only in getMe.
can_read_all_group_messages	Boolean	Optional. True, if privacy mode is disabled for the bot. Returned only in getMe.
supports_inline_queries	Boolean	Optional. True, if the bot supports inline queries. Returned only in getMe.
 */

class User extends Type
{
    protected int $id;
    protected bool $is_bot;
    protected string $first_name;
    protected ?string $last_name = null;
    protected ?string $username = null;
    protected ?string $language_code = null;
    protected ?bool $is_premium = null;
    protected ?bool $added_to_attachment_menu = null;
    protected ?bool $can_join_groups = null;
    protected ?bool $can_read_all_group_messages = null;
    protected ?bool $supports_inline_queries = null;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isIsBot(): bool
    {
        return $this->is_bot;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
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
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return string|null
     */
    public function getLanguageCode(): ?string
    {
        return $this->language_code;
    }

    /**
     * @return bool|null
     */
    public function getIsPremium(): ?bool
    {
        return $this->is_premium;
    }

    /**
     * @return bool|null
     */
    public function getAddedToAttachmentMenu(): ?bool
    {
        return $this->added_to_attachment_menu;
    }

    /**
     * @return bool|null
     */
    public function getCanJoinGroups(): ?bool
    {
        return $this->can_join_groups;
    }

    /**
     * @return bool|null
     */
    public function getCanReadAllGroupMessages(): ?bool
    {
        return $this->can_read_all_group_messages;
    }

    /**
     * @return bool|null
     */
    public function getSupportsInlineQueries(): ?bool
    {
        return $this->supports_inline_queries;
    }

}
