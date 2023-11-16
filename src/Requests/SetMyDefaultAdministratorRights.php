<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to change the default administrator rights requested b
 * y the bot when it's added as an administrator to groups or channels. T
 * hese rights will be suggested to users, but they are free to modify th
 * e list before adding the bot. Returns True on success.
 */
class SetMyDefaultAdministratorRights extends Request
{
    /**
     * A JSON-serialized object describing new default administrator rights.
     * If not specified, the default administrator rights will be cleared.
     */
    protected ?ChatAdministratorRights $rights;
    /**
     * Pass True to change the default administrator rights of the bot in cha
     * nnels. Otherwise, the default administrator rights of the bot for grou
     * ps and supergroups will be changed.
     */
    protected ?bool $for_channels;


    /**
     * @param ChatAdministratorRights $rights
     * @return SetMyDefaultAdministratorRights
     */
    public function setRights(ChatAdministratorRights $rights): SetMyDefaultAdministratorRights
    {
        $this->rights = $rights;
        return $this;
    }

    /**
     * @param bool $forChannels
     * @return SetMyDefaultAdministratorRights
     */
    public function setForChannels(bool $forChannels): SetMyDefaultAdministratorRights
    {
        $this->for_channels = $forChannels;
        return $this;
    }
    /**
     * @return ChatAdministratorRights
     */
    public function getRights(): ChatAdministratorRights
    {
        return $this->rights;
    }

    /**
     * @return bool
     */
    public function getForChannels(): bool
    {
        return $this->for_channels;
    }
}
