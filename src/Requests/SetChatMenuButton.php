<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to change the bot's menu button in a private chat, or
 * the default menu button. Returns True on success.
 */
class SetChatMenuButton extends Request
{
    /**
     * Unique identifier for the target private chat. If not specified, defau
     * lt bot's menu button will be changed
     */
    protected ?int $chat_id;
    /**
     * A JSON-serialized object for the bot's new menu button. Defaults to Me
     * nuButtonDefault
     */
    protected ?MenuButton $menu_button;


    /**
     * @param int $chatId
     * @return SetChatMenuButton
     */
    public function setChatId(int $chatId): SetChatMenuButton
    {
        $this->chat_id = $chatId;
        return $this;
    }

    /**
     * @param MenuButton $menuButton
     * @return SetChatMenuButton
     */
    public function setMenuButton(MenuButton $menuButton): SetChatMenuButton
    {
        $this->menu_button = $menuButton;
        return $this;
    }
    /**
     * @return int
     */
    public function getChatId(): int
    {
        return $this->chat_id;
    }

    /**
     * @return MenuButton
     */
    public function getMenuButton(): MenuButton
    {
        return $this->menu_button;
    }
}
