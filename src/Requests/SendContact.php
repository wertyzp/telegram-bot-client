<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardRemove;
use Werty\Mapping\EmptyObject;
/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target channel (in the format @channelusername)
message_thread_id	Integer	Optional	Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
phone_number	String	Yes	Contact's phone number
first_name	String	Yes	Contact's first name
last_name	String	Optional	Contact's last name
vcard	String	Optional	Additional data about the contact in the form of a vCard, 0-2048 bytes
disable_notification	Boolean	Optional	Sends the message silently. Users will receive a notification with no sound.
protect_content	Boolean	Optional	Protects the contents of the sent message from forwarding and saving
reply_to_message_id	Integer	Optional	If the message is a reply, ID of the original message
allow_sending_without_reply	Boolean	Optional	Pass True if the message should be sent even if the specified replied-to message is not found
reply_markup	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply	Optional	Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */
class SendContact extends EmptyObject
{

    protected int|string $chat_id;
    protected ?int $message_thread_id = null;
    protected string $phone_number;
    protected string $first_name;
    protected ?string $last_name = null;
    protected ?string $vcard = null;
    protected ?bool $disable_notification = null;
    protected ?bool $protect_content = null;
    protected ?int $reply_to_message_id = null;
    protected ?bool $allow_sending_without_reply = null;
    protected null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove $reply_markup = null;

    public static function create(int|string $chatId, string $phoneNumber, string $firstName): static
    {
        return new static([
            'chat_id' => $chatId,
            'phone_number' => $phoneNumber,
            'first_name' => $firstName,
        ]);
    }

    /**
     * @param int|string $chat_id
     * @return SendContact
     */
    public function setChatId(int|string $chat_id): SendContact
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    /**
     * @param int|null $message_thread_id
     * @return SendContact
     */
    public function setMessageThreadId(?int $message_thread_id): SendContact
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    /**
     * @param string $phone_number
     * @return SendContact
     */
    public function setPhoneNumber(string $phone_number): SendContact
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    /**
     * @param string $first_name
     * @return SendContact
     */
    public function setFirstName(string $first_name): SendContact
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * @param string|null $last_name
     * @return SendContact
     */
    public function setLastName(?string $last_name): SendContact
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * @param string|null $vcard
     * @return SendContact
     */
    public function setVcard(?string $vcard): SendContact
    {
        $this->vcard = $vcard;
        return $this;
    }

    /**
     * @param bool|null $disable_notification
     * @return SendContact
     */
    public function setDisableNotification(?bool $disable_notification): SendContact
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    /**
     * @param bool|null $protect_content
     * @return SendContact
     */
    public function setProtectContent(?bool $protect_content): SendContact
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    /**
     * @param int|null $reply_to_message_id
     * @return SendContact
     */
    public function setReplyToMessageId(?int $reply_to_message_id): SendContact
    {
        $this->reply_to_message_id = $reply_to_message_id;
        return $this;
    }

    /**
     * @param bool|null $allow_sending_without_reply
     * @return SendContact
     */
    public function setAllowSendingWithoutReply(?bool $allow_sending_without_reply): SendContact
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;
        return $this;
    }

    /**
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup
     * @return SendContact
     */
    public function setReplyMarkup(ReplyKeyboardMarkup|ReplyKeyboardRemove|InlineKeyboardMarkup|null $reply_markup): SendContact
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function toArray($only = []): array
    {
        $data = parent::toArray($only);
        if (isset($data['reply_markup'])) {
            $data['reply_markup'] = json_encode($data['reply_markup']);
        }
        return $data;
    }

}
