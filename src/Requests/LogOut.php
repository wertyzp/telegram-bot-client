<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to log out from the cloud Bot API server before launch
 * ing the bot locally. You must log out the bot before running it locall
 * y, otherwise there is no guarantee that the bot will receive updates.
 * After a successful call, you can immediately log in on a local server,
 *  but will not be able to log in back to the cloud Bot API server for 1
 * 0 minutes. Returns True on success. Requires no parameters.
 */
class LogOut extends Request
{
}
