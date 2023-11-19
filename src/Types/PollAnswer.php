<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
poll_id	String	Unique poll identifier
voter_chat	Chat	Optional. The chat that changed the answer to the poll, if the voter is anonymous
user	User	Optional. The user that changed the answer to the poll, if the voter isn't anonymous
option_ids	Array of Integer	0-based identifiers of chosen answer options. May be empty if the vote was retracted.
 */
class PollAnswer extends Type
{
    protected const TYPE_MAP = [
        'user' => User::class,
        'voter_chat' => Chat::class,
    ];

    protected string $poll_id;
    protected ?Chat $voter_chat = null;
    protected ?User $user = null;
    protected array $option_ids;

    /**
     * @return string
     */
    public function getPollId(): string
    {
        return $this->poll_id;
    }

    /**
     * @return Chat|null
     */
    public function getVoterChat(): ?Chat
    {
        return $this->voter_chat;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * 0-based identifiers of chosen answer options. May be empty if the vote was retracted.
     * @return array
     */
    public function getOptionIds(): array
    {
        return $this->option_ids;
    }
}
