<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
text	String	Option text, 1-100 characters
voter_count	Integer	Number of users that voted for this option
 */

class PollOption extends Type
{
    protected string $text;
    protected int $voter_count;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Number of users that voted for this option
     * @return int
     */
    public function getVoterCount(): int
    {
        return $this->voter_count;
    }
}
