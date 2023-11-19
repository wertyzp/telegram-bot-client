<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\ForceReply;
use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardRemove;

/**
 * Parameter    Type	Required	Description
 * chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * message_thread_id	Integer	Optional	Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * emoji	String	Optional	Emoji on which the dice throw animation is based. Currently, must be one of “🎲”, “🎯”, “🏀”, “⚽”, “🎳”, or “🎰”. Dice can have values 1-6 for “🎲”, “🎯” and “🎳”, values 1-5 for “🏀” and “⚽”, and values 1-64 for “🎰”. Defaults to “🎲”
 * disable_notification	Boolean	Optional	Sends the message silently. Users will receive a notification with no sound.
 * protect_content	Boolean	Optional	Protects the contents of the sent message from forwarding
 * reply_to_message_id	Integer	Optional	If the message is a reply, ID of the original message
 * allow_sending_without_reply	Boolean	Optional	Pass True if the message should be sent even if the specified replied-to message is not found
 * reply_markup	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply	Optional	Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */
class SendDice extends Request
{
    protected const SERIALIZE_JSON = [
        'reply_markup',
    ];

    protected int|string $chat_id;
    protected ?int $message_thread_id = null;
    protected ?string $emoji = null;
    protected ?bool $disable_notification = null;
    protected ?bool $protect_content = null;
    protected ?int $reply_to_message_id = null;
    protected ?bool $allow_sending_without_reply = null;
    protected null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup = null;

    public static function create($chat_id): self
    {
        return new static(['chat_id' => $chat_id]);
    }

    /**
     * @param int|string $chat_id
     * @return SendDice
     */
    public function setChatId(int|string $chat_id): self
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    /**
     * @param int|null $message_thread_id
     * @return SendDice
     */
    public function setMessageThreadId(?int $message_thread_id): self
    {
        $this->message_thread_id = $message_thread_id;

        return $this;
    }

    /**
     * @param string|null $emoji
     * @return SendDice
     */
    public function setEmoji(?string $emoji): self
    {
        $this->emoji = $emoji;

        return $this;
    }

    /**
     * @param bool|null $disable_notification
     * @return SendDice
     */
    public function setDisableNotification(?bool $disable_notification): self
    {
        $this->disable_notification = $disable_notification;

        return $this;
    }

    /**
     * @param bool|null $protect_content
     * @return SendDice
     */
    public function setProtectContent(?bool $protect_content): self
    {
        $this->protect_content = $protect_content;

        return $this;
    }

    /**
     * @param int|null $reply_to_message_id
     * @return SendDice
     */
    public function setReplyToMessageId(?int $reply_to_message_id): self
    {
        $this->reply_to_message_id = $reply_to_message_id;

        return $this;
    }

    /**
     * @param bool|null $allow_sending_without_reply
     * @return SendDice
     */
    public function setAllowSendingWithoutReply(?bool $allow_sending_without_reply): self
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;

        return $this;
    }

    /**
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup
     * @return SendDice
     */
    public function setReplyMarkup(ReplyKeyboardMarkup|ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|null $reply_markup): self
    {
        $this->reply_markup = $reply_markup;

        return $this;
    }
}
