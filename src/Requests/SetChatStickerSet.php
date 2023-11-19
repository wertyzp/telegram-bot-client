<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to set a new group sticker set for a supergroup. The b
 * ot must be an administrator in the chat for this to work and must have
 *  the appropriate administrator rights. Use the field can_set_sticker_s
 * et optionally returned in getChat requests to check if the bot can use
 *  this method. Returns True on success.
 */
class SetChatStickerSet extends Request
{
    /**
     * Unique identifier for the target chat or username of the target superg
     * roup (in the format @supergroupusername).
     */
    protected int|string $chat_id;
    /**
     * Name of the sticker set to be set as the group sticker set.
     */
    protected string $sticker_set_name;

    public static function create(int|string $chatId, string $stickerSetName): self
    {
        return new self([
            'chat_id' => $chatId,
            'sticker_set_name' => $stickerSetName,
        ]);
    }

    /**
     * @param int|string $chatId
     * @return SetChatStickerSet
     */
    public function setChatId(int|string $chatId): self
    {
        $this->chat_id = $chatId;

        return $this;
    }

    /**
     * @param string $stickerSetName
     * @return SetChatStickerSet
     */
    public function setStickerSetName(string $stickerSetName): self
    {
        $this->sticker_set_name = $stickerSetName;

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
    public function getStickerSetName(): string
    {
        return $this->sticker_set_name;
    }
}
