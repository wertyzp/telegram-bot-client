<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Http\Clients\TelegramBot\Types\ForceReply;
use Werty\Http\Clients\TelegramBot\Types\InlineKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\MessageEntity;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardMarkup;
use Werty\Http\Clients\TelegramBot\Types\ReplyKeyboardRemove;
use Werty\Http\Clients\TelegramBot\Types\Type;

/**
Parameter	Type	Required	Description
chat_id	Integer or String	Yes	Unique identifier for the target chat or username of the target channel (in the format @channelusername)
message_thread_id	Integer	Optional	Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
question	String	Yes	Poll question, 1-300 characters
options	Array of String	Yes	A JSON-serialized list of answer options, 2-10 strings 1-100 characters each
is_anonymous	Boolean	Optional	True, if the poll needs to be anonymous, defaults to True
type	String	Optional	Poll type, “quiz” or “regular”, defaults to “regular”
allows_multiple_answers	Boolean	Optional	True, if the poll allows multiple answers, ignored for polls in quiz mode, defaults to False
correct_option_id	Integer	Optional	0-based identifier of the correct answer option, required for polls in quiz mode
explanation	String	Optional	Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters with at most 2 line feeds after entities parsing
explanation_parse_mode	String	Optional	Mode for parsing entities in the explanation. See formatting options for more details.
explanation_entities	Array of MessageEntity	Optional	A JSON-serialized list of special entities that appear in the poll explanation, which can be specified instead of parse_mode
open_period	Integer	Optional	Amount of time in seconds the poll will be active after creation, 5-600. Can't be used together with close_date.
close_date	Integer	Optional	Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5 and no more than 600 seconds in the future. Can't be used together with open_period.
is_closed	Boolean	Optional	Pass True if the poll needs to be immediately closed. This can be useful for poll preview.
disable_notification	Boolean	Optional	Sends the message silently. Users will receive a notification with no sound.
protect_content	Boolean	Optional	Protects the contents of the sent message from forwarding and saving
reply_to_message_id	Integer	Optional	If the message is a reply, ID of the original message
allow_sending_without_reply	Boolean	Optional	Pass True if the message should be sent even if the specified replied-to message is not found
reply_markup	InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply	Optional	Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */
class SendPoll extends Request
{
    protected const SERIALIZE_JSON = [
        'options',
        'explanation_entities',
        'reply_markup',
    ];

    protected const TYPE_MAP = [
        'explanation_entities' => [MessageEntity::class],
        'options' => [self::T_STRING],
    ];

    protected int|string $chat_id;
    protected ?int $message_thread_id = null;
    protected string $question;
    protected array $options;
    protected ?bool $is_anonymous = null;
    protected ?string $type = null;
    protected ?bool $allows_multiple_answers = null;
    protected ?int $correct_option_id = null;
    protected ?string $explanation = null;
    protected ?string $explanation_parse_mode = null;
    protected ?array $explanation_entities = null;
    protected ?int $open_period = null;
    protected ?int $close_date = null;
    protected ?bool $is_closed = null;
    protected ?bool $disable_notification = null;
    protected ?bool $protect_content = null;
    protected ?int $reply_to_message_id = null;
    protected ?bool $allow_sending_without_reply = null;
    protected null|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup = null;

    public static function create(int|string $chatId, string $question, array $options): static
    {
        return new static([
            'chat_id' => $chatId,
            'question' => $question,
            'options' => $options,
        ]);
    }

    /**
     * @param int|string $chat_id
     * @return SendPoll
     */
    public function setChatId(int|string $chat_id): self
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    /**
     * @param int|null $message_thread_id
     * @return SendPoll
     */
    public function setMessageThreadId(?int $message_thread_id): self
    {
        $this->message_thread_id = $message_thread_id;

        return $this;
    }

    /**
     * @param string $question
     * @return SendPoll
     */
    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @param array $options
     * @return SendPoll
     */
    public function setOptions(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @param bool|null $is_anonymous
     * @return SendPoll
     */
    public function setIsAnonymous(?bool $is_anonymous): self
    {
        $this->is_anonymous = $is_anonymous;

        return $this;
    }

    /**
     * @param string|null $type
     * @return SendPoll
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param bool|null $allows_multiple_answers
     * @return SendPoll
     */
    public function setAllowsMultipleAnswers(?bool $allows_multiple_answers): self
    {
        $this->allows_multiple_answers = $allows_multiple_answers;

        return $this;
    }

    /**
     * @param int|null $correct_option_id
     * @return SendPoll
     */
    public function setCorrectOptionId(?int $correct_option_id): self
    {
        $this->correct_option_id = $correct_option_id;

        return $this;
    }

    /**
     * @param string|null $explanation
     * @return SendPoll
     */
    public function setExplanation(?string $explanation): self
    {
        $this->explanation = $explanation;

        return $this;
    }

    /**
     * @param string|null $explanation_parse_mode
     * @return SendPoll
     */
    public function setExplanationParseMode(?string $explanation_parse_mode): self
    {
        $this->explanation_parse_mode = $explanation_parse_mode;

        return $this;
    }

    /**
     * @param array|null $explanation_entities
     * @return SendPoll
     */
    public function setExplanationEntities(?array $explanation_entities): self
    {
        $this->explanation_entities = $explanation_entities;

        return $this;
    }

    /**
     * @param int|null $open_period
     * @return SendPoll
     */
    public function setOpenPeriod(?int $open_period): self
    {
        $this->open_period = $open_period;

        return $this;
    }

    /**
     * @param int|null $close_date
     * @return SendPoll
     */
    public function setCloseDate(?int $close_date): self
    {
        $this->close_date = $close_date;

        return $this;
    }

    /**
     * @param bool|null $is_closed
     * @return SendPoll
     */
    public function setIsClosed(?bool $is_closed): self
    {
        $this->is_closed = $is_closed;

        return $this;
    }

    /**
     * @param bool|null $disable_notification
     * @return SendPoll
     */
    public function setDisableNotification(?bool $disable_notification): self
    {
        $this->disable_notification = $disable_notification;

        return $this;
    }

    /**
     * @param bool|null $protect_content
     * @return SendPoll
     */
    public function setProtectContent(?bool $protect_content): self
    {
        $this->protect_content = $protect_content;

        return $this;
    }

    /**
     * @param int|null $reply_to_message_id
     * @return SendPoll
     */
    public function setReplyToMessageId(?int $reply_to_message_id): self
    {
        $this->reply_to_message_id = $reply_to_message_id;

        return $this;
    }

    /**
     * @param bool|null $allow_sending_without_reply
     * @return SendPoll
     */
    public function setAllowSendingWithoutReply(?bool $allow_sending_without_reply): self
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;

        return $this;
    }

    /**
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup
     * @return SendPoll
     */
    public function setReplyMarkup(ReplyKeyboardMarkup|ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|null $reply_markup): self
    {
        $this->reply_markup = $reply_markup;

        return $this;
    }
}
