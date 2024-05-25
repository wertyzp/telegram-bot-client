<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\ForceReply;
use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\LinkPreviewOptions;
use Werty\Http\Clients\TelegramBot\Types\MessageEntity;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardRemove;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target channel (in the format @channelusername)
message_thread_id	Integer	Optional	Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
text	String	Yes	Text of the message to be sent, 1-4096 characters after entities parsing
parse_mode	String	Optional	Mode for parsing entities in the message text. See formatting options for more details.
entities	Array of MessageEntity	Optional	A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode
link_preview_options 	LinkPreviewOptions 	Optional 	Link preview generation options for the message
disable_web_page_preview	Boolean	Optional	Disables link previews for links in this message
disable_notification	Boolean	Optional	Sends the message silently. Users will receive a notification with no sound.
protect_content	Boolean	Optional	Protects the contents of the sent message from forwarding and saving
reply_to_message_id	Integer	Optional	If the message is a reply, ID of the original message
allow_sending_without_reply	Boolean	Optional	Pass True if the message should be sent even if the specified replied-to message is not found
reply_markup	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply	Optional	Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */
class SendMessage extends Request
{
    protected const TYPE_MAP = [
        'entities' => [MessageEntity::class],
        'link_preview_options' => LinkPreviewOptions::class,
    ];

    protected const SERIALIZE_JSON = [
        'entities',
        'reply_markup',
        'link_preview_options',
    ];

    protected int|string $chat_id;
    /**
     * @var MessageEntity[]
     */
    protected ?array $entities = null;
    protected ?LinkPreviewOptions $link_preview_options = null;
    protected ?int $message_thread_id = null;
    protected string $text;
    protected ?string $parse_mode = null;
    protected ?bool $disable_web_page_preview = null;
    protected ?bool $disable_notification = null;
    protected ?bool $protect_content = null;
    protected ?bool $allow_sending_without_reply = null;
    protected ?int $reply_to_message_id = null;
    protected InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null;

    public static function create(int|string $chatId, string $text): static
    {
        return new static([
            'chat_id' => $chatId,
            'text' => $text,
        ]);
    }

    /**
     * @param int|string $chat_id
     * @return SendMessage
     */
    public function setChatId(int|string $chat_id): self
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function setLinkPreviewOptions(?LinkPreviewOptions $link_preview_options): SendMessage
    {
        $this->link_preview_options = $link_preview_options;
        return $this;
    }

    /**
     * @param MessageEntity[] $entities
     * @return SendMessage
     */
    public function setEntities(array $entities): self
    {
        $this->entities = $entities;

        return $this;
    }

    /**
     * @param int $message_thread_id
     * @return SendMessage
     */
    public function setMessageThreadId(int $message_thread_id): self
    {
        $this->message_thread_id = $message_thread_id;

        return $this;
    }

    /**
     * @param string $text
     * @return SendMessage
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @param string $parse_mode
     * @return SendMessage
     */
    public function setParseMode(string $parse_mode): self
    {
        $this->parse_mode = $parse_mode;

        return $this;
    }

    /**
     * @param bool $disable_web_page_preview
     * @return SendMessage
     */
    public function setDisableWebPagePreview(bool $disable_web_page_preview): self
    {
        $this->disable_web_page_preview = $disable_web_page_preview;

        return $this;
    }

    /**
     * @param bool $disable_notification
     * @return SendMessage
     */
    public function setDisableNotification(bool $disable_notification): self
    {
        $this->disable_notification = $disable_notification;

        return $this;
    }

    /**
     * @param bool $protect_content
     * @return SendMessage
     */
    public function setProtectContent(bool $protect_content): self
    {
        $this->protect_content = $protect_content;

        return $this;
    }

    /**
     * @param bool $allow_sending_without_reply
     * @return SendMessage
     */
    public function setAllowSendingWithoutReply(bool $allow_sending_without_reply): self
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;

        return $this;
    }

    /**
     * @param int $reply_to_message_id
     * @return SendMessage
     */
    public function setReplyToMessageId(int $reply_to_message_id): self
    {
        $this->reply_to_message_id = $reply_to_message_id;

        return $this;
    }

    /**
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove $reply_markup
     * @return SendMessage
     */
    public function setReplyMarkup(ForceReply|InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup $reply_markup): self
    {
        $this->reply_markup = $reply_markup;

        return $this;
    }
}
