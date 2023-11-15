<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\InputFile;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardRemove;
use Werty\Mapping\EmptyObject;

/**
 * Parameter    Type    Required    Description
 * chat_id    Integer or String    Yes    Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * message_thread_id    Integer    Optional    Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
 * document    InputFile or String    Yes    File to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »
 * thumbnail    InputFile or String    Optional    Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
 * caption    String    Optional    Document caption (may also be used when resending documents by file_id), 0-1024 characters after entities parsing
 * parse_mode    String    Optional    Mode for parsing entities in the document caption. See formatting options for more details.
 * caption_entities    Array of MessageEntity    Optional    A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
 * disable_content_type_detection    Boolean    Optional    Disables automatic server-side content type detection for files uploaded using multipart/form-data
 * disable_notification    Boolean    Optional    Sends the message silently. Users will receive a notification with no sound.
 * protect_content    Boolean    Optional    Protects the contents of the sent message from forwarding and saving
 * reply_to_message_id    Integer    Optional    If the message is a reply, ID of the original message
 * allow_sending_without_reply    Boolean    Optional    Pass True if the message should be sent even if the specified replied-to message is not found
 * reply_markup    InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply    Optional    Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */

class SendDocument extends EmptyObject
{

    protected const TYPE_MAP = [
        'caption_entities' => [Message\MessageEntity::class],
    ];

    protected string|int $chat_id;
    protected ?int $message_thread_id = null;
    protected InputFile|string $document;
    protected null|InputFile|string $thumbnail = null;
    protected ?string $caption = null;
    protected ?string $parse_mode = null;
    protected ?array $caption_entities = null;
    protected ?bool $disable_content_type_detection = null;
    protected ?bool $disable_notification = null;
    protected ?bool $protect_content = null;
    protected ?int $reply_to_message_id = null;
    protected ?bool $allow_sending_without_reply = null;
    protected null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup = null;

    public static function create(int|string $chatId, InputFile|string $document): static
    {
        return new static([
            'chat_id' => $chatId,
            'document' => $document,
        ]);
    }

    /**
     * @param int|string $chat_id
     * @return SendDocument
     */
    public function setChatId(int|string $chat_id): SendDocument
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    /**
     * @param int|null $message_thread_id
     * @return SendDocument
     */
    public function setMessageThreadId(?int $message_thread_id): SendDocument
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    /**
     * @param string|InputFile $document
     * @return SendDocument
     */
    public function setDocument(string|InputFile $document): SendDocument
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @param string|InputFile|null $thumbnail
     * @return SendDocument
     */
    public function setThumbnail(string|InputFile|null $thumbnail): SendDocument
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @param string|null $caption
     * @return SendDocument
     */
    public function setCaption(?string $caption): SendDocument
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @param string|null $parse_mode
     * @return SendDocument
     */
    public function setParseMode(?string $parse_mode): SendDocument
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    /**
     * @param array|null $caption_entities
     * @return SendDocument
     */
    public function setCaptionEntities(?array $caption_entities): SendDocument
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @param bool|null $disable_content_type_detection
     * @return SendDocument
     */
    public function setDisableContentTypeDetection(?bool $disable_content_type_detection): SendDocument
    {
        $this->disable_content_type_detection = $disable_content_type_detection;
        return $this;
    }

    /**
     * @param bool|null $disable_notification
     * @return SendDocument
     */
    public function setDisableNotification(?bool $disable_notification): SendDocument
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    /**
     * @param bool|null $protect_content
     * @return SendDocument
     */
    public function setProtectContent(?bool $protect_content): SendDocument
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    /**
     * @param int|null $reply_to_message_id
     * @return SendDocument
     */
    public function setReplyToMessageId(?int $reply_to_message_id): SendDocument
    {
        $this->reply_to_message_id = $reply_to_message_id;
        return $this;
    }

    /**
     * @param bool|null $allow_sending_without_reply
     * @return SendDocument
     */
    public function setAllowSendingWithoutReply(?bool $allow_sending_without_reply): SendDocument
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;
        return $this;
    }

    /**
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup
     * @return SendDocument
     */
    public function setReplyMarkup(ForceReply|ReplyKeyboardMarkup|ReplyKeyboardRemove|InlineKeyboardMarkup|null $reply_markup): SendDocument
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

}
