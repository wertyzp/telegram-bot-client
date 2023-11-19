<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to edit the name of the 'General' topic in a forum sup
 * ergroup chat. The bot must be an administrator in the chat for this to
 *  work and must have can_manage_topics administrator rights. Returns Tr
 * ue on success.
 */
class EditGeneralForumTopic extends Request
{
    /**
     * Unique identifier for the target chat or username of the target superg
     * roup (in the format @supergroupusername).
     */
    protected int|string $chat_id;
    /**
     * New topic name, 1-128 characters.
     */
    protected string $name;

    public static function create(int|string $chatId, string $name): self
    {
        return new self([
            'chat_id' => $chatId,
            'name' => $name,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return EditGeneralForumTopic
     */
    public function setChatId(int|string $chatId): self
    {
        $this->chat_id = $chatId;

        return $this;
    }

    /**
     * @param string $name
     * @return EditGeneralForumTopic
     */
    public function setName(string $name): self
    {
        $this->name = $name;

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
}
