<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Types;

/**
Field	Type	Description
url	String	An HTTPS URL to be opened with user authorization data added to the query string when the button is pressed. If the user refuses to provide authorization data, the original URL without information about the user will be opened. The data added is the same as described in Receiving authorization data.

NOTE: You must always check the hash of the received data to verify the authentication and the integrity of the data as described in Checking authorization.
forward_text	String	Optional. New text of the button in forwarded messages.
bot_username	String	Optional. Username of a bot, which will be used for user authorization. See Setting up a bot for more details. If not specified, the current bot's username will be assumed. The url's domain must be the same as the domain linked with the bot. See Linking your domain to the bot for more details.
request_write_access	Boolean	Optional. Pass True to request the permission for your bot to send messages to the user.
 */
class LoginUrl extends Type
{
    protected string $url;
    protected ?string $forward_text = null;
    protected ?string $bot_username = null;
    protected ?bool $request_write_access = null;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string|null
     */
    public function getForwardText(): ?string
    {
        return $this->forward_text;
    }

    /**
     * @return string|null
     */
    public function getBotUsername(): ?string
    {
        return $this->bot_username;
    }

    /**
     * @return bool|null
     */
    public function getRequestWriteAccess(): ?bool
    {
        return $this->request_write_access;
    }
}
