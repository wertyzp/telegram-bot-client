<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class MessageEntity extends Type
{
    public const TYPE_TEXT_LINK = 'text_link';
    public const TYPE_URL = 'url';

    /**
    Field	Type	Description
    type	String	Type of the entity. Currently, can be “mention” (@username), “hashtag” (#hashtag), “cashtag” ($USD), “bot_command” (/start@jobs_bot), “url” (https://telegram.org), “email” (do-not-reply@telegram.org), “phone_number” (+1-212-555-0123), “bold” (bold text), “italic” (italic text), “underline” (underlined text), “strikethrough” (strikethrough text), “spoiler” (spoiler message), “code” (monowidth string), “pre” (monowidth block), “text_link” (for clickable text URLs), “text_mention” (for users without usernames), “custom_emoji” (for inline custom emoji stickers)
    offset	Integer	Offset in UTF-16 code units to the start of the entity
    length	Integer	Length of the entity in UTF-16 code units
    url	String	Optional. For “text_link” only, URL that will be opened after user taps on the text
    user	User	Optional. For “text_mention” only, the mentioned user
    language	String	Optional. For “pre” only, the programming language of the entity text
    custom_emoji_id	String	Optional. For “custom_emoji” only, unique identifier of the custom emoji. Use getCustomEmojiStickers to get full information about the sticker
     */

    protected string $type;
    protected int $offset;
    protected int $length;
    protected ?string $url = null;
    protected ?User $user = null;
    protected ?string $language = null;
    protected ?string $custom_emoji_id = null;

    public static function create(string $type, int $offset, int $length): static
    {
        return new static([
            'type' => $type,
            'offset' => $offset,
            'length' => $length,
        ]);
    }
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @return string|null
     */
    public function getCustomEmojiId(): ?string
    {
        return $this->custom_emoji_id;
    }

    public function isLink(): bool
    {
        return in_array($this->type, ['text_link', 'url']);
    }

    /**
     * @param string $type
     * @return MessageEntity
     */
    public function setType(string $type): MessageEntity
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param int $offset
     * @return MessageEntity
     */
    public function setOffset(int $offset): MessageEntity
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @param int $length
     * @return MessageEntity
     */
    public function setLength(int $length): MessageEntity
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @param string|null $url
     * @return MessageEntity
     */
    public function setUrl(?string $url): MessageEntity
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param User|null $user
     * @return MessageEntity
     */
    public function setUser(?User $user): MessageEntity
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @param string|null $language
     * @return MessageEntity
     */
    public function setLanguage(?string $language): MessageEntity
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @param string|null $custom_emoji_id
     * @return MessageEntity
     */
    public function setCustomEmojiId(?string $custom_emoji_id): MessageEntity
    {
        $this->custom_emoji_id = $custom_emoji_id;
        return $this;
    }

}

