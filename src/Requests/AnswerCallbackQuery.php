<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

class AnswerCallbackQuery extends Request
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
    protected ?string $text = null;
    protected ?bool $show_alert = null;
    protected ?string $url = null;
    protected ?int $cache_time = null;

    public static function create(string $callbackQueryId, ?string $text = null): self
    {
        return new self([
            'callback_query_id' => $callbackQueryId,
            'text' => $text,
        ]);
    }

    /**
     * @param string $callback_query_id
     * @return AnswerCallbackQuery
     */
    public function setCallbackQueryId(string $callback_query_id): self
    {
        $this->callback_query_id = $callback_query_id;

        return $this;
    }

    /**
     * @param string $text
     * @return AnswerCallbackQuery
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @param bool $show_alert
     * @return AnswerCallbackQuery
     */
    public function setShowAlert(bool $show_alert): self
    {
        $this->show_alert = $show_alert;

        return $this;
    }

    /**
     * @param string $url
     * @return AnswerCallbackQuery
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param int $cache_time
     * @return AnswerCallbackQuery
     */
    public function setCacheTime(int $cache_time): self
    {
        $this->cache_time = $cache_time;

        return $this;
    }
}
