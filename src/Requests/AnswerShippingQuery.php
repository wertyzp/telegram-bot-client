<?php

declare(strict_types=1);

namespace Werty\Http\Clients\TelegramBot\Requests;

/**
Parameter	Type	Required	Description
shipping_query_id	String	Yes	Unique identifier for the query to be answered
ok	Boolean	Yes	Pass True if delivery to the specified address is possible and False if there are any problems (for example, if delivery to the specified address is not possible)
shipping_options	Array of ShippingOption	Optional	Required if ok is True. A JSON-serialized array of available shipping options.
error_message	String	Optional	Required if ok is False. Error message in human readable form that explains why it is impossible to complete the order (e.g. "Sorry, delivery to your desired address is unavailable'). Telegram will display this message to the user.
 */
class AnswerShippingQuery extends Request
{
    protected string $shipping_query_id;
    protected bool $ok;
    protected ?array $shipping_options = null;
    protected ?string $error_message = null;

    public static function create(string $shippingQueryId, bool $ok): self
    {
        return new static([
            'shipping_query_id' => $shippingQueryId,
            'ok' => $ok,
        ]);
    }

    public function getShippingQueryId(): string
    {
        return $this->shipping_query_id;
    }

    public function isOk(): bool
    {
        return $this->ok;
    }

    public function getShippingOptions(): ?array
    {
        return $this->shipping_options;
    }

    public function setShippingOptions(?array $shipping_options): void
    {
        $this->shipping_options = $shipping_options;
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
