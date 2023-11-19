<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
text	String	Label text on the button
url	String	Optional. HTTP or tg:// URL to be opened when the button is pressed. Links tg://user?id=<user_id> can be used to mention a user by their ID without using a username, if this is allowed by their privacy settings.
callback_data	String	Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
web_app	WebAppInfo	Optional. Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Available only in private chats between a user and the bot.
login_url	LoginUrl	Optional. An HTTPS URL used to automatically authorize the user. Can be used as a replacement for the Telegram Login Widget.
switch_inline_query	String	Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot's username and the specified inline query in the input field. May be empty, in which case just the bot's username will be inserted.
switch_inline_query_current_chat	String	Optional. If set, pressing the button will insert the bot's username and the specified inline query in the current chat's input field. May be empty, in which case only the bot's username will be inserted.

This offers a quick way for the user to open your bot in inline mode in the same chat - good for selecting something from multiple options.
switch_inline_query_chosen_chat	SwitchInlineQueryChosenChat	Optional. If set, pressing the button will prompt the user to select one of their chats of the specified type, open that chat and insert the bot's username and the specified inline query in the input field
callback_game	CallbackGame	Optional. Description of the game that will be launched when the user presses the button.

NOTE: This type of button must always be the first button in the first row.
pay	Boolean	Optional. Specify True, to send a Pay button.

NOTE: This type of button must always be the first button in the first row and can only be used in invoice messages.
 */
class InlineKeyboardButton extends Type
{
    protected const TYPE_MAP = [
        'callback_game' => CallbackGame::class,
        'login_url' => LoginUrl::class,
        'switch_inline_query_chosen_chat' => SwitchInlineQueryChosenChat::class,
        'web_app' => WebAppInfo::class,
    ];

    protected string $text;
    protected ?string $url = null;
    protected ?string $callback_data = null;
    protected ?WebAppInfo $web_app = null;
    protected ?LoginUrl $login_url = null;
    protected ?string $switch_inline_query = null;
    protected ?string $switch_inline_query_current_chat = null;
    protected ?SwitchInlineQueryChosenChat $switch_inline_query_chosen_chat = null;
    protected ?CallbackGame $callback_game = null;
    protected ?bool $pay = null;

    public static function create(string $text, ?string $callbackData = null): self
    {
        return new self([
            'text' => $text,
            'callback_data' => $callbackData,
        ]);
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @return string|null
     */
    public function getCallbackData(): ?string
    {
        return $this->callback_data;
    }

    /**
     * @return WebAppInfo|null
     */
    public function getWebApp(): ?WebAppInfo
    {
        return $this->web_app;
    }

    /**
     * @return LoginUrl|null
     */
    public function getLoginUrl(): ?LoginUrl
    {
        return $this->login_url;
    }

    /**
     * @return string|null
     */
    public function getSwitchInlineQuery(): ?string
    {
        return $this->switch_inline_query;
    }

    /**
     * @return string|null
     */
    public function getSwitchInlineQueryCurrentChat(): ?string
    {
        return $this->switch_inline_query_current_chat;
    }

    /**
     * @return SwitchInlineQueryChosenChat|null
     */
    public function getSwitchInlineQueryChosenChat(): ?SwitchInlineQueryChosenChat
    {
        return $this->switch_inline_query_chosen_chat;
    }

    /**
     * @return CallbackGame|null
     */
    public function getCallbackGame(): ?CallbackGame
    {
        return $this->callback_game;
    }

    /**
     * @return bool|null
     */
    public function getPay(): ?bool
    {
        return $this->pay;
    }

    /**
     * @param string $text
     * @return InlineKeyboardButton
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @param string|null $url
     * @return InlineKeyboardButton
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param string|null $callback_data
     * @return InlineKeyboardButton
     */
    public function setCallbackData(?string $callback_data): self
    {
        $this->callback_data = $callback_data;

        return $this;
    }

    /**
     * @param WebAppInfo|null $web_app
     * @return InlineKeyboardButton
     */
    public function setWebApp(?WebAppInfo $web_app): self
    {
        $this->web_app = $web_app;

        return $this;
    }

    /**
     * @param LoginUrl|null $login_url
     * @return InlineKeyboardButton
     */
    public function setLoginUrl(?LoginUrl $login_url): self
    {
        $this->login_url = $login_url;

        return $this;
    }

    /**
     * @param string|null $switch_inline_query
     * @return InlineKeyboardButton
     */
    public function setSwitchInlineQuery(?string $switch_inline_query): self
    {
        $this->switch_inline_query = $switch_inline_query;

        return $this;
    }

    /**
     * @param string|null $switch_inline_query_current_chat
     * @return InlineKeyboardButton
     */
    public function setSwitchInlineQueryCurrentChat(?string $switch_inline_query_current_chat): self
    {
        $this->switch_inline_query_current_chat = $switch_inline_query_current_chat;

        return $this;
    }

    /**
     * @param SwitchInlineQueryChosenChat|null $switch_inline_query_chosen_chat
     * @return InlineKeyboardButton
     */
    public function setSwitchInlineQueryChosenChat(?SwitchInlineQueryChosenChat $switch_inline_query_chosen_chat): self
    {
        $this->switch_inline_query_chosen_chat = $switch_inline_query_chosen_chat;

        return $this;
    }

    /**
     * @param CallbackGame|null $callback_game
     * @return InlineKeyboardButton
     */
    public function setCallbackGame(?CallbackGame $callback_game): self
    {
        $this->callback_game = $callback_game;

        return $this;
    }

    /**
     * @param bool|null $pay
     * @return InlineKeyboardButton
     */
    public function setPay(?bool $pay): self
    {
        $this->pay = $pay;

        return $this;
    }
}
