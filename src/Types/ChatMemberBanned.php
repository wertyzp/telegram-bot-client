<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;
/*
Field	Type	Description
until_date	Integer	Date when restrictions will be lifted for this user; Unix time. If 0, then the user is banned forever
*/
class ChatMemberBanned extends ChatMember
{
    protected int $until_date;

    /**
     * @return int
     */
    public function getUntilDate(): int
    {
        return $this->until_date;
    }

}
