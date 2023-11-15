<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

class KeyboardButton extends Type
{
/**
text	String	Text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed
request_user	KeyboardButtonRequestUser	Optional. If specified, pressing the button will open a list of suitable users. Tapping on any user will send their identifier to the bot in a “user_shared” service message. Available in private chats only.
request_chat	KeyboardButtonRequestChat	Optional. If specified, pressing the button will open a list of suitable chats. Tapping on a chat will send its identifier to the bot in a “chat_shared” service message. Available in private chats only.
request_contact	Boolean	Optional. If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only.
request_location	Boolean	Optional. If True, the user's current location will be sent when the button is pressed. Available in private chats only.
request_poll	KeyboardButtonPollType	Optional. If specified, the user will be asked to create a poll and send it to the bot when the button is pressed. Available in private chats only.
web_app	WebAppInfo	Optional. If specified, the described Web App will be launched when the button is pressed. The Web App will be able to send a “web_app_data” service message. Available in private chats only.
 */
    protected const TYPE_MAP = [
        'request_user' => KeyboardButtonRequestUser::class,
        'request_chat' => KeyboardButtonRequestChat::class,
        'request_poll' => KeyboardButtonPollType::class,
        'web_app' => WebAppInfo::class,
    ];


    protected string $text;
    protected ?KeyboardButtonRequestUser $request_user = null;
    protected ?KeyboardButtonRequestChat $request_chat = null;
    protected ?bool $request_contact = null;
    protected ?bool $request_location = null;
    protected ?KeyboardButtonPollType $request_poll = null;
    protected ?WebAppInfo $web_app = null;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return KeyboardButtonRequestUser|null
     */
    public function getRequestUser(): ?KeyboardButtonRequestUser
    {
        return $this->request_user;
    }

    /**
     * @return KeyboardButtonRequestChat|null
     */
    public function getRequestChat(): ?KeyboardButtonRequestChat
    {
        return $this->request_chat;
    }

    /**
     * @return bool|null
     */
    public function getRequestContact(): ?bool
    {
        return $this->request_contact;
    }

    /**
     * @return bool|null
     */
    public function getRequestLocation(): ?bool
    {
        return $this->request_location;
    }

    /**
     * @return KeyboardButtonPollType|null
     */
    public function getRequestPoll(): ?KeyboardButtonPollType
    {
        return $this->request_poll;
    }

    /**
     * @return WebAppInfo|null
     */
    public function getWebApp(): ?WebAppInfo
    {
        return $this->web_app;
    }

}
