<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to delete a group sticker set from a supergroup. The b
 * ot must be an administrator in the chat for this to work and must have
 *  the appropriate administrator rights. Use the field can_set_sticker_s
 * et optionally returned in getChat requests to check if the bot can use
 *  this method. Returns True on success.
 */
class DeleteChatStickerSet extends Request
{
    /**
     * Unique identifier for the target chat or username of the target superg
     * roup (in the format @supergroupusername).
     */
    protected int|string $chat_id;

    public static function create(int|string $chatId): self
    {
        return new self([
            'chat_id' => $chatId,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return DeleteChatStickerSet
     */
    public function setChatId(int|string $chatId): self
    {
        $this->chat_id = $chatId;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getChatId(): int|string
    {
        return $this->chat_id;
    }
}
