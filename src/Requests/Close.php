<?php

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Use this method to close the bot instance before moving it from one lo
 * cal server to another. You need to delete the webhook before calling t
 * his method to ensure that the bot isn't launched again after server re
 * start. The method will return error 429 in the first 10 minutes after
 * the bot is launched. Returns True on success. Requires no parameters.
 */
class Close extends Request
{
}
