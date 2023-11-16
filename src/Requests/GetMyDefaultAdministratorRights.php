<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to get the current default administrator rights of the
 *  bot. Returns ChatAdministratorRights on success.
 */
class GetMyDefaultAdministratorRights extends Request
{
    /**
     * Pass True to get default administrator rights of the bot in channels.
     * Otherwise, default administrator rights of the bot for groups and supe
     * rgroups will be returned.
     */
    protected ?bool $for_channels;


    /**
     * @param bool $forChannels
     * @return GetMyDefaultAdministratorRights
     */
    public function setForChannels(bool $forChannels): GetMyDefaultAdministratorRights
    {
        $this->for_channels = $forChannels;
        return $this;
    }
    /**
     * @return bool
     */
    public function getForChannels(): bool
    {
        return $this->for_channels;
    }
}
