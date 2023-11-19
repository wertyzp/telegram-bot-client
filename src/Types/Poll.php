<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
id	String	Unique poll identifier
question	String	Poll question, 1-300 characters
options	Array of PollOption	List of poll options
total_voter_count	Integer	Total number of users that voted in the poll
is_closed	Boolean	True, if the poll is closed
is_anonymous	Boolean	True, if the poll is anonymous
type	String	Poll type, currently can be “regular” or “quiz”
allows_multiple_answers	Boolean	True, if the poll allows multiple answers
correct_option_id	Integer	Optional. 0-based identifier of the correct answer option. Available only for polls in the quiz mode, which are closed, or was sent (not forwarded) by the bot or to the private chat with the bot.
explanation	String	Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters
explanation_entities	Array of MessageEntity	Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the explanation
open_period	Integer	Optional. Amount of time in seconds the poll will be active after creation
close_date	Integer	Optional. Point in time (Unix timestamp) when the poll will be automatically closed
 */
class Poll extends Type
{
    protected const TYPE_MAP = [
        'options' => PollOption::class,
        'explanation_entities' => [MessageEntity::class],
    ];

    protected string $id;
    protected string $question;
    protected array $options;
    protected int $total_voter_count;
    protected bool $is_closed;
    protected bool $is_anonymous;
    protected string $type;
    protected bool $allows_multiple_answers;
    protected ?int $correct_option_id = null;
    protected ?string $explanation = null;
    protected ?array $explanation_entities = null;
    protected ?int $open_period = null;
    protected ?int $close_date = null;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Poll question, 1-300 characters.
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * List of poll options.
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Total number of users that voted in the poll.
     * @return int
     */
    public function getTotalVoterCount(): int
    {
        return $this->total_voter_count;
    }

    /**
     * @return bool
     */
    public function isClosed(): bool
    {
        return $this->is_closed;
    }

    /**
     * @return bool
     */
    public function isAnonymous(): bool
    {
        return $this->is_anonymous;
    }

    /**
     * Poll type, currently can be “regular” or “quiz”.
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function allowsMultipleAnswers(): bool
    {
        return $this->allows_multiple_answers;
    }

    /**
     * @return bool
     */
    public function isIsClosed(): bool
    {
        return $this->is_closed;
    }

    /**
     * @return bool
     */
    public function isIsAnonymous(): bool
    {
        return $this->is_anonymous;
    }

    /**
     * @return bool
     */
    public function isAllowsMultipleAnswers(): bool
    {
        return $this->allows_multiple_answers;
    }

    /**
     * @return int|null
     */
    public function getCorrectOptionId(): ?int
    {
        return $this->correct_option_id;
    }

    /**
     * @return string|null
     */
    public function getExplanation(): ?string
    {
        return $this->explanation;
    }

    /**
     * @return array|null
     */
    public function getExplanationEntities(): ?array
    {
        return $this->explanation_entities;
    }

    /**
     * @return int|null
     */
    public function getOpenPeriod(): ?int
    {
        return $this->open_period;
    }

    /**
     * @return int|null
     */
    public function getCloseDate(): ?int
    {
        return $this->close_date;
    }
}
