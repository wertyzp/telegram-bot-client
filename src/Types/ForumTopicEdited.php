<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
name	String	Optional. New name of the topic, if it was edited
icon_custom_emoji_id	String	Optional. New identifier of the custom emoji shown as the topic icon, if it was edited; an empty string if the icon was removed
 */

class ForumTopicEdited extends Type
{
    protected string $name;
    protected string $icon_custom_emoji_id;

    /**
     * Optional. New name of the topic, if it was edited
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Optional. New identifier of the custom emoji shown as the topic icon, if it was edited; an empty string if the icon was removed
     * @return string
     */
    public function getIconCustomEmojiId(): string
    {
        return $this->icon_custom_emoji_id;
    }
}
