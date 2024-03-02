<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
 * Parameter    Type    Required    Description
 * pre_checkout_query_id    String    Yes    Unique identifier for the query to be answered
 * ok    Boolean    Yes    Specify True if everything is alright (goods are available, etc.) and the bot is ready to proceed with the order. Use False if there are any problems.
 * error_message    String    Optional    Required if ok is False. Error message in human readable form that explains the reason for failure to proceed with the checkout (e.g. "Sorry, somebody just bought the last of our amazing black T-shirts while you were busy filling out your payment details. Please choose a different color or garment!"). Telegram will display this message to the user.
 */
class AnswerPreCheckoutQuery extends Request
{
    protected string $pre_checkout_query_id;
    protected bool $ok;
    protected ?string $error_message = null;

    public static function create(string $preCheckoutQueryId, bool $ok): self
    {
        return new static([
            'pre_checkout_query_id' => $preCheckoutQueryId,
            'ok' => $ok,
        ]);
    }

    public function getPreCheckoutQueryId(): string
    {
        return $this->pre_checkout_query_id;
    }

    public function isOk(): bool
    {
        return $this->ok;
    }

    public function getErrorMessage(): ?string
    {
        return $this->error_message;
    }

    public function setErrorMessage(?string $error_message): void
    {
        $this->error_message = $error_message;
    }

}
