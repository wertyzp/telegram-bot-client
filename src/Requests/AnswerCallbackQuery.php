<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

use Werty\Mapping\EmptyObject;

class AnswerCallbackQuery extends EmptyObject
{
/**
Parameter	Type	Required	Description
callback_query_id	String	Yes	Unique identifier for the query to be answered
text	String	Optional	Text of the notification. If not specified, nothing will be shown to the user, 0-200 characters
show_alert	Boolean	Optional	If True, an alert will be shown by the client instead of a notification at the top of the chat screen. Defaults to false.
url	String	Optional	URL that will be opened by the user's client. If you have created a Game and accepted the conditions via @BotFather, specify the URL that opens your game - note that this will only work if the query comes from a callback_game button.

Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a parameter.
cache_time	Integer	Optional	The maximum amount of time in seconds that the result of the callback query may be cached client-side. Telegram apps will support caching starting in version 3.14. Defaults to 0.
 */
    protected string $callback_query_id;
    protected string $text;
    protected bool $show_alert;
    protected string $url;
    protected int $cache_time;

    public function __construct(string $callbackQueryId)
    {
        parent::__construct([
            'callback_query_id' => $callbackQueryId,
        ]);
    }

}
