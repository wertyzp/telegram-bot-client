<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
message_thread_id	Integer	Unique identifier of the forum topic
name	String	Name of the topic
icon_color	Integer	Color of the topic icon in RGB format
icon_custom_emoji_id	String	Optional. Unique identifier of the custom emoji shown as the topic icon
 */
class ForumTopic extends Type
{
    protected int $message_thread_id;
    protected string $name;
    protected int $icon_color;
    protected ?string $icon_custom_emoji_id = null;

    /**
     * @return int
     */
    public function getMessageThreadId(): int
    {
        return $this->message_thread_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getIconColor(): int
    {
        return $this->icon_color;
    }

    /**
     * @return string|null
     */
    public function getIconCustomEmojiId(): ?string
    {
        return $this->icon_custom_emoji_id;
    }
}
