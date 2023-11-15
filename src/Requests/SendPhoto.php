<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\ForceReply;
use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\InputFile;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardRemove;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target channel (in the format @channelusername)
message_thread_id	Integer	Optional	Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
photo	InputFile or String	Yes	Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new photo using multipart/form-data. The photo must be at most 10 MB in size. The photo's width and height must not exceed 10000 in total. Width and height ratio must be at most 20. More information on Sending Files »
caption	String	Optional	Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing
parse_mode	String	Optional	Mode for parsing entities in the photo caption. See formatting options for more details.
caption_entities	Array of MessageEntity	Optional	A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
has_spoiler	Boolean	Optional	Pass True if the photo needs to be covered with a spoiler animation
disable_notification	Boolean	Optional	Sends the message silently. Users will receive a notification with no sound.
protect_content	Boolean	Optional	Protects the contents of the sent message from forwarding and saving
reply_to_message_id	Integer	Optional	If the message is a reply, ID of the original message
allow_sending_without_reply	Boolean	Optional	Pass True if the message should be sent even if the specified replied-to message is not found
reply_markup	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply	Optional	Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */
class SendPhoto extends Request
{
    protected const TYPE_MAP = [
        'reply_markup' => [InlineKeyboardMarkup::class, ReplyKeyboardMarkup::class, ReplyKeyboardRemove::class, ForceReply::class],
    ];

    protected int|string $chat_id;
    protected ?int $message_thread_id = null;
    protected InputFile|string $photo;
    protected ?string $caption = null;
    protected ?string $parse_mode = null;
    protected ?array $caption_entities = null;
    protected ?bool $has_spoiler = null;
    protected ?bool $disable_notification = null;
    protected ?bool $protect_content = null;
    protected ?int $reply_to_message_id = null;
    protected ?bool $allow_sending_without_reply = null;
    protected null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup = null;


    public static function create(int|string $chatId, InputFile|string $photo): static
    {
        return (new static([
            'chat_id' => $chatId,
        ]))->setPhoto($photo);
    }

    /**
     * @param int|string $chat_id
     * @return SendPhoto
     */
    public function setChatId(int|string $chat_id): SendPhoto
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    /**
     * @param int|null $message_thread_id
     * @return SendPhoto
     */
    public function setMessageThreadId(?int $message_thread_id): SendPhoto
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    /**
     * @param string|InputFile $photo
     * @return SendPhoto
     */
    public function setPhoto(string|InputFile $photo): SendPhoto
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @param string|null $caption
     * @return SendPhoto
     */
    public function setCaption(?string $caption): SendPhoto
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @param string|null $parse_mode
     * @return SendPhoto
     */
    public function setParseMode(?string $parse_mode): SendPhoto
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    /**
     * @param array|null $caption_entities
     * @return SendPhoto
     */
    public function setCaptionEntities(?array $caption_entities): SendPhoto
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @param bool|null $has_spoiler
     * @return SendPhoto
     */
    public function setHasSpoiler(?bool $has_spoiler): SendPhoto
    {
        $this->has_spoiler = $has_spoiler;
        return $this;
    }

    /**
     * @param bool|null $disable_notification
     * @return SendPhoto
     */
    public function setDisableNotification(?bool $disable_notification): SendPhoto
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    /**
     * @param bool|null $protect_content
     * @return SendPhoto
     */
    public function setProtectContent(?bool $protect_content): SendPhoto
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    /**
     * @param int|null $reply_to_message_id
     * @return SendPhoto
     */
    public function setReplyToMessageId(?int $reply_to_message_id): SendPhoto
    {
        $this->reply_to_message_id = $reply_to_message_id;
        return $this;
    }

    /**
     * @param bool|null $allow_sending_without_reply
     * @return SendPhoto
     */
    public function setAllowSendingWithoutReply(?bool $allow_sending_without_reply): SendPhoto
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;
        return $this;
    }

    /**
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup
     * @return SendPhoto
     */
    public function setReplyMarkup(ReplyKeyboardMarkup|ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|null $reply_markup): SendPhoto
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function toArray($only = []): array
    {
        $data = parent::toArray($only);
        if ($data['photo'] instanceof InputFile) {
            $data['photo'] = $data['photo']->getFile();
        }

        if (!empty($data['caption_entities'])) {
            $data['caption_entities'] = json_encode($data['caption_entities']);
        }
        return $data;
    }

}
