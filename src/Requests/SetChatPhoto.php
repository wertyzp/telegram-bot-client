<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\InputFile;

/**
 * Use this method to set a new profile photo for the chat. Photos can't
 * be changed for private chats. The bot must be an administrator in the
 * chat for this to work and must have the appropriate administrator righ
 * ts. Returns True on success.
 */
class SetChatPhoto extends Request
{
    /**
     * Unique identifier for the target chat or username of the target channe
     * l (in the format @channelusername).
     */
    protected int|string $chat_id;
    /**
     * New chat photo, uploaded using multipart/form-data.
     */
    protected InputFile $photo;

    public static function create(int|string $chatId, InputFile $photo): self
    {
        $instance = new self([
            'chat_id' => $chatId,
        ]);
        $instance->setPhoto($photo);

        return $instance;
    }

    /**
     * @param int|string $chatId
     * @return SetChatPhoto
     */
    public function setChatId(int|string $chatId): self
    {
        $this->chat_id = $chatId;

        return $this;
    }

    /**
     * @param InputFile $photo
     * @return SetChatPhoto
     */
    public function setPhoto(InputFile $photo): self
    {
        $this->photo = $photo;

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
     * @return InputFile
     */
    public function getPhoto(): InputFile
    {
        return $this->photo;
    }
}
