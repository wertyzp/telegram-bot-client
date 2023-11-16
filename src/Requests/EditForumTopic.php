<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to edit name and icon of a topic in a forum supergroup
 *  chat. The bot must be an administrator in the chat for this to work a
 * nd must have can_manage_topics administrator rights, unless it is the
 * creator of the topic. Returns True on success.
 */
class EditForumTopic extends Request
{
    /**
     * Unique identifier for the target chat or username of the target superg
     * roup (in the format @supergroupusername)
     */
    protected int|string $chat_id;
    /**
     * Unique identifier for the target message thread of the forum topic
     */
    protected int $message_thread_id;
    /**
     * New topic name, 0-128 characters. If not specified or empty, the curre
     * nt name of the topic will be kept
     */
    protected ?string $name = null;
    /**
     * New unique identifier of the custom emoji shown as the topic icon. Use
     *  getForumTopicIconStickers to get all allowed custom emoji identifiers
     * . Pass an empty string to remove the icon. If not specified, the curre
     * nt icon will be kept
     */
    protected ?string $icon_custom_emoji_id = null;

    public static function create(int|string $chatId, int $messageThreadId): self
    {
        return new self([
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return EditForumTopic
     */
    public function setChatId(int|string $chatId): EditForumTopic
    {
        $this->chat_id = $chatId;
        return $this;
    }

    /**
     * @param int $messageThreadId
     * @return EditForumTopic
     */
    public function setMessageThreadId(int $messageThreadId): EditForumTopic
    {
        $this->message_thread_id = $messageThreadId;
        return $this;
    }

    /**
     * @param string $name
     * @return EditForumTopic
     */
    public function setName(string $name): EditForumTopic
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $iconCustomEmojiId
     * @return EditForumTopic
     */
    public function setIconCustomEmojiId(string $iconCustomEmojiId): EditForumTopic
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

    /**
     * @return string
     */
    public function getIconCustomEmojiId(): string
    {
        return $this->icon_custom_emoji_id;
    }
}
