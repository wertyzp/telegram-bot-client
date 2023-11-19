<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
name	String	Name of the topic
icon_color	Integer	Color of the topic icon in RGB format
icon_custom_emoji_id	String	Optional. Unique identifier of the custom emoji shown as the topic icon
 */
class ForumTopicCreated extends Type
{
    protected string $name;
    protected int $icon_color;
    protected string $icon_custom_emoji_id;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Color of the topic icon in RGB format.
     * @return int
     */
    public function getIconColor(): int
    {
        return $this->icon_color;
    }

    /**
     * Optional. Unique identifier of the custom emoji shown as the topic icon.
     * @return string
     */
    public function getIconCustomEmojiId(): string
    {
        return $this->icon_custom_emoji_id;
    }
}
