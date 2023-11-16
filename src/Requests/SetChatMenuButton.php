<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\MenuButton;

/**
 * Use this method to change the bot's menu button in a private chat, or
 * the default menu button. Returns True on success.
 */
class SetChatMenuButton extends Request
{
    protected const SERIALIZE_JSON = [
        'menu_button'
    ];

    /**
     * Unique identifier for the target private chat. If not specified, defau
     * lt bot's menu button will be changed
     */
    protected ?int $chat_id;
    /**
     * A JSON-serialized object for the bot's new menu button. Defaults to Me
     * nuButtonDefault
     */
    protected ?MenuButton $menu_button = null;

    /**
     * @return int|null
     */
    public function getChatId(): ?int
    {
        return $this->chat_id;
    }

    /**
     * @param int|null $chat_id
     * @return SetChatMenuButton
     */
    public function setChatId(?int $chat_id): SetChatMenuButton
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    /**
     * @return MenuButton|null
     */
    public function getMenuButton(): ?MenuButton
    {
        return $this->menu_button;
    }

    /**
     * @param MenuButton|null $menu_button
     * @return SetChatMenuButton
     */
    public function setMenuButton(?MenuButton $menu_button): SetChatMenuButton
    {
        $this->menu_button = $menu_button;
        return $this;
    }

}
