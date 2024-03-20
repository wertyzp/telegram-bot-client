<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class MessageEntity extends Type
{
    public const TYPE_TEXT_LINK = 'text_link';
    public const TYPE_URL = 'url';
    public const TYPE_MENTION = 'mention';
    public const TYPE_TEXT_MENTION = 'text_mention';
    public const TYPE_CUSTOM_EMOJI = 'custom_emoji';
    public const TYPE_BOT_COMMAND = 'bot_command';
    public const TYPE_HASHTAG = 'hashtag';
    public const TYPE_CASHTAG = 'cashtag';
    public const TYPE_EMAIL = 'email';
    public const TYPE_PHONE_NUMBER = 'phone_number';
    public const TYPE_BOLD = 'bold';
    public const TYPE_ITALIC = 'italic';
    public const TYPE_UNDERLINE = 'underline';
    public const TYPE_STRIKETHROUGH = 'strikethrough';
    public const TYPE_SPOILER = 'spoiler';
    public const TYPE_CODE = 'code';
    public const TYPE_PRE = 'pre';

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
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param int $offset
     * @return MessageEntity
     */
    public function setOffset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * @param int $length
     * @return MessageEntity
     */
    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }

    /**
     * @param string|null $url
     * @return MessageEntity
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param User|null $user
     * @return MessageEntity
     */
    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @param string|null $language
     * @return MessageEntity
     */
    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @param string|null $custom_emoji_id
     * @return MessageEntity
     */
    public function setCustomEmojiId(?string $custom_emoji_id): self
    {
        $this->custom_emoji_id = $custom_emoji_id;

        return $this;
    }
}
