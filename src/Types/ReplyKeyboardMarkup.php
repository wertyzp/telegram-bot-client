<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
keyboard	Array of Array of KeyboardButton	Array of button rows, each represented by an Array of KeyboardButton objects
is_persistent	Boolean	Optional. Requests clients to always show the keyboard when the regular keyboard is hidden. Defaults to false, in which case the custom keyboard can be hidden and opened with a keyboard icon.
resize_keyboard	Boolean	Optional. Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller if there are just two rows of buttons). Defaults to false, in which case the custom keyboard is always of the same height as the app's standard keyboard.
one_time_keyboard	Boolean	Optional. Requests clients to hide the keyboard as soon as it's been used. The keyboard will still be available, but clients will automatically display the usual letter-keyboard in the chat - the user can press a special button in the input field to see the custom keyboard again. Defaults to false.
input_field_placeholder	String	Optional. The placeholder to be shown in the input field when the keyboard is active; 1-64 characters
selective	Boolean	Optional. Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.

Example: A user requests to change the bot's language, bot replies to the request with a keyboard to select the new language. Other users in the group don't see the keyboard.
 */

class ReplyKeyboardMarkup extends Type
{
    protected const TYPE_MAP = [
        'keyboard' => [[KeyboardButton::class]],
    ];

    protected array $keyboard;
    protected ?bool $is_persistent;
    protected ?bool $resize_keyboard;
    protected ?bool $one_time_keyboard;
    protected ?string $input_field_placeholder;
    protected ?bool $selective;

    /**
     * @return KeyboardButton[][]
     */
    public function getKeyboard(): array
    {
        return $this->keyboard;
    }

    /**
     * @return bool|null
     */
    public function getIsPersistent(): ?bool
    {
        return $this->is_persistent;
    }

    /**
     * @return bool|null
     */
    public function getResizeKeyboard(): ?bool
    {
        return $this->resize_keyboard;
    }

    /**
     * @return bool|null
     */
    public function getOneTimeKeyboard(): ?bool
    {
        return $this->one_time_keyboard;
    }

    /**
     * @return string|null
     */
    public function getInputFieldPlaceholder(): ?string
    {
        return $this->input_field_placeholder;
    }

    /**
     * @return bool|null
     */
    public function getSelective(): ?bool
    {
        return $this->selective;
    }


}
