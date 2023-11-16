<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to create a topic in a forum supergroup chat. The bot
 * must be an administrator in the chat for this to work and must have th
 * e can_manage_topics administrator rights. Returns information about th
 * e created topic as a ForumTopic object.
 */
class CreateForumTopic extends Request
{
    /**
     * Unique identifier for the target chat or username of the target superg
     * roup (in the format @supergroupusername)
     */
    protected int|string $chat_id;
    /**
     * Topic name, 1-128 characters
     */
    protected string $name;
    /**
     * Color of the topic icon in RGB format. Currently, must be one of 73220
     * 96 (0x6FB9F0), 16766590 (0xFFD67E), 13338331 (0xCB86DB), 9367192 (0x8E
     * EE98), 16749490 (0xFF93B2), or 16478047 (0xFB6F5F)
     */
    protected ?int $icon_color;
    /**
     * Unique identifier of the custom emoji shown as the topic icon. Use get
     * ForumTopicIconStickers to get all allowed custom emoji identifiers.
     */
    protected ?string $icon_custom_emoji_id;

    public static function create(int|string $chatId, string $name): self
    {
        return new self([
            'chat_id' => $chatId,
            'name' => $name,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return CreateForumTopic
     */
    public function setChatId(int|string $chatId): CreateForumTopic
    {
        $this->chat_id = $chatId;
        return $this;
    }

    /**
     * @param string $name
     * @return CreateForumTopic
     */
    public function setName(string $name): CreateForumTopic
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param int $iconColor
     * @return CreateForumTopic
     */
    public function setIconColor(int $iconColor): CreateForumTopic
    {
        $this->icon_color = $iconColor;
        return $this;
    }

    /**
     * @param string $iconCustomEmojiId
     * @return CreateForumTopic
     */
    public function setIconCustomEmojiId(string $iconCustomEmojiId): CreateForumTopic
    {
        $this->icon_custom_emoji_id = $iconCustomEmojiId;
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getIconColor(): int
    {
        return $this->icon_color;
    }

    /**
     * @return string
     */
    public function getIconCustomEmojiId(): string
    {
        return $this->icon_custom_emoji_id;
    }
}
